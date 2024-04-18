<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session as FacadesSession;

class PelangganController extends Controller
{

    public function indexPelanggan()
    {
        return view('penjualan.pelanggan');
    }
    
    public function createPelanggan(Request $request)
    {
        $rules = [
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'nomor_telepon' => 'required'
        ];

        $validate = $request->validate($rules);
        Pelanggan::create($validate);
        return redirect('detail');
    }


}
