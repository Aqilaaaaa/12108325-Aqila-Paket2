<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Produk;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{

    public function index()
    {
        $pelanggan = Pelanggan::all();
        $produks = Produk::all(); 

        return view('penjualan.index', compact('produks', 'pelanggan'));
    }

    public function createPenjualan(Request $request)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggan,id',
            'detail.*.produk_id' => 'required|exists:produk,id',
            'detail.*.jumlah_produk' => 'required|integer:min:1',
        ]);
        
        $totalHarga = 0;

        $penjualan = new Penjualan();
        $penjualan->tanggal_penjualan = $request->input('tanggal_penjualan');
        $penjualan->total_harga = $totalHarga;
        $penjualan->pelanggan_id = $request->input('pelanggan_id');
        $penjualan->save();

        foreach ($request->input('detail') as $detail) {
            $produk = Produk::findOrFail($detail['produk_id']);
            $subtotal = $produk->harga * $detail['jumlah_produk'];
            $totalHarga += $subtotal;

            $detailBuying = new DetailPenjualan(); // nyimpen detail pembelian
            $detailBuying->penjualan_id = $penjualan->id;
            $detailBuying->produk_id = $detail['produk_id'];
            $detailBuying->jumlah_produk = $detail['jumlah_produk'];
            $detailBuying->Subtotal = $subtotal; // pake hasil perkalian langsung
            $detailBuying->save();

            $produk->stok -= $detail['jumlah_produk']; //ngurangin stok produk
            $produk->save();
        }
        
        $penjualan->total_harga = $totalHarga; //perbaruin total harga 
        $penjualan->save();
            
        // $pdfData = [

        //     'penjualan' => $penjualan, // Anda mungkin perlu mengirimkan objek penjualan ke tampilan PDF
        //     'details' => $penjualan->detailPenjualan // Jika Anda memiliki relasi detail penjualan di model Penjualan
        // ];
    
        // $pdf = $this->generatePdf('pdf_template', $pdfData);
    
        // // Simpan PDF ke file jika diperlukan
        // $pdfContent = $pdf->output();
        // file_put_contents(public_path('penjualan.pdf'), $pdfContent);
    
        // Atau kirimkan PDF sebagai respons langsung ke pengguna
        // return $pdf->stream('penjualan.pdf');

        return redirect('/detailPrint');
    }

    public function downloadPDF($id)
    {
        $buyingDetails = DetailPenjualan::all();
        
        foreach ($buyingDetails as $detail) {
            $pelanggan_id = $detail->penjualan->pelanggan_id;
            $pelanggan = Pelanggan::find($pelanggan_id);
        }

        $dompdf = new Dompdf();
        $html = view('penjualan.detailPrint', compact('buyingDetails'))->render();
        $dompdf->loadHtml($html);
        $dompdf->render(); //proses render dan simpen ke file or tampilin langsung

        return $dompdf->stream('penjualan.pdf'); //unduh pdf ke browser
    }

    public function detail($id)
    {
        $buyingDetails = DetailPenjualan::all();
        $mergedDetails = [];
        
        foreach ($buyingDetails as $detail) {
            $pelanggan_id = $detail->penjualan->pelanggan_id;
            $pelanggan = Pelanggan::find($pelanggan_id); 

            if (!isset($mergedDetails[$pelanggan_id])) {
                $mergedDetails[$pelanggan_id] = [
                    'penjualan_id' => [
                        'id' => $detail->penjualan->id,
                        'tanggal_penjualan' => $detail->penjualan->tanggal_penjualan,
                        'nomor_telepon' => $detail->penjualan->nomor_telepon,
                        'total_harga' => $detail->penjualan->total_harga,
                        'pelanggan_id' => $pelanggan_id
                    ],
                    'items' => [],
                ];
            }
            $mergedDetails[$pelanggan_id]['items'][] = [
                'produk_id' => $detail->produk,
                'jumlah_produk' => $detail->jumlah_produk,
                'subtotal' => $detail->subtotal
            ];
        }
    
    $mergedDetails = array_values($mergedDetails);
        $html = view('penjualan.detailPrint', compact('buyingDetails'))->render();
    }

    public function getAllPenjualanDetail()
    {
        $buyingDetails = DetailPenjualan::all();
        $mergedDetails = [];
        
        foreach ($buyingDetails as $detail) {
            $pelanggan_id = $detail->penjualan->pelanggan_id;
            $pelanggan = Pelanggan::find($pelanggan_id); 
            $nama_pelanggan = $pelanggan ? $pelanggan->nama : 'Pelanggan Tidak Ditemukan';

            if (!isset($mergedDetails[$pelanggan_id])) {
                $mergedDetails[$pelanggan_id] = [
                    'penjualan_id' => [
                        'id' => $detail->penjualan->id,
                        'tanggal_penjualan' => $detail->penjualan->tanggal_penjualan,
                        'total_harga' => $detail->penjualan->total_harga,
                        'pelanggan_id' => $pelanggan_id,
                        'nama_pelanggan' => $nama_pelanggan
                    ],
                    'items' => [],
                ];
            }
            $mergedDetails[$pelanggan_id]['items'][] = [
                'produk_id' => $detail->produk,
                'jumlah_produk' => $detail->jumlah_produk,
                'subtotal' => $detail->subtotal
            ];
        }
        
        $mergedDetails = array_values($mergedDetails);
        
        return view('penjualan.detail', compact('mergedDetails', 'buyingDetails'));
    }


    public function delete($id)
    {
        $detailPenjualan = DetailPenjualan::where('penjualan_id', $id)->get();
    
        foreach ($detailPenjualan as $detail) {
            $detail->delete();
        }
    
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();
    
        return redirect()->back();
    }

    public function detailPrint ()
    {
        
        return view('penjualan.detailPrint');
    }
}
