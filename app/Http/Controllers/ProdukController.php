<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Exception;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function dashboard()
    {
        return view('index');
    }
    
    public function addIndex()
    {
        return view('produk.add');
    }

    public function getAllProduk(){
        $produk = Produk::all();
        return view('produk.produk', compact('produk'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_produk' =>'required',
            'harga' =>'required|numeric',
            'stok' => 'required',
            'foto_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $fileFoto = $request->file('foto_produk');
        $foto_produk = time().'.'.$fileFoto->getClientOriginalExtension();
        $fileFoto->storeAs('public/foto_produk', $foto_produk);

        $produk = new Produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->foto_produk = $foto_produk;


        $produk->save();

        return redirect('/produk');
    }

    public function delete ($id)
    {
        Produk::where('id', $id)->delete();
        return redirect()->back();
    }


    public function edit($id)
    {
        $produk = Produk::where('id', $id)->first();
        return view('produk.edit', compact('produk'));
    }


    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $rules = [
            'nama_produk' => 'required',
            'harga' => 'required',
            'stok' => 'required',
        ];

        $request->validate($rules);
        $produk->update([
            'nama_produk' => $request->nama_produk,
            'harga' => $request->harga,
            'stok' => $request->stok,
        ]);

        return redirect('/produk');
    }

    public function stokIndex($id) 
    {
        $produk = Produk::findOrFail($id);
        return view('produk.editStok', compact('produk'));
    }

    public function updateStok (Request $request, $id)
    {
        $request->validate([
            'stok' => 'required',
        ]);
    
        $produk = Produk::findOrFail($id);
        $produk->stok = $request->stok;
        $produk->save();
    
        return redirect('/produk');
    }
    
}