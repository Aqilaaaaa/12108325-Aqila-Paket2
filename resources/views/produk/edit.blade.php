@extends('layout')
@section('container')
<body class="ol">
    <section class="container">
        <div class="total">
            <br>
            <h4 class="fw-bold text-break mt-4 mx-3 text-black">Update Produk</h4>
            <hr class="text-black">
        </div>
        <form action="{{ route('updateProduk', $produk['id'])}}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="input-box">
                <label>Nama Produk</label>
                <input type="text" placeholder="Masukkan nama produk" name="nama_produk" value="{{ $produk->nama_produk}}"/>
            </div>

            <div class="input-box">
                <label>Harga</label>
                <input type="number" placeholder="Masukkan harga" name="harga" value="{{$produk->harga}}"/>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Stok</label>
                    <input type="number" placeholder="Masukkan stok" name="stok" value="{{ $produk->stok}}" readonly/>

                </div>

                <div class="input-box">
                    <label>Foto Produk</label>
                    {{-- <img src="{{ asset('storage/foto_produk/' . $produk->foto_produk) }}"> --}}
                    <input type="file" placeholder="Pilih foto produk" name="foto_produk" value="{{$produk->foto_produk}}"/>
                </div> 
              
            </div>
            <button type="submit" class="btn submit" id="btn">Submit</button>  
        </form>
    </section>
</body>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produk</title>
</head>
<body>
    <div>
    <form action="{{ route('updateProduk', $produk['id'])}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
          <input type="text" name="nama_produk" class="form-control" value="{{ $produk->nama_produk}}">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Harga</label>
          <input type="number" name="harga" class="form-control" value="{{ $produk->harga}}">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{$produk->stok}}" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Foto Produk</label>
            <input type="file" name="foto_produk" class="form-control" value="{{$produk->foto_produk}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

</body>
</html> --}}
