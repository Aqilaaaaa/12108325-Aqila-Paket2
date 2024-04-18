@extends('layout')
@section('container')

<body class="ol">
<div class="gam mx-5">
    <div class="total">
        <br>
        <h4 class="fw-bold text-break mt-4 mx-3 text-black">Produk</h4>
        <hr class="text-black">
        <br>
        @if(Auth::check() && Auth::user()->role == 'admin')
        <div class="icons" style="display: flex; justify-content: flex-end;">
            <a href="/addProduk" class="text-decoration-none">
                <i class="fa-sharp fa-solid fa-circle-plus"></i>
            </a>
        </div>
        @endif
    <br>
    </div>
    <table class="table text-black table-striped table-bordered ">
        <tr>
            <td class="text-black">No</td>
            <td class="text-black">Foto Produk</td>
            <td class="text-black">Nama Produk</td>
            <td class="text-black">Harga</td>
            <td class="text-black">Stok</td>
            @if(Auth::check() && Auth::user()->role == 'admin')
            <td class="text-black">Action</td>
            @endif
        </tr>
        
        @foreach ($produk as $index => $produk)
            <tr class="table-rows">
                <td class="text-black">{{$index +1}}</td>
                <td class="text-black"><img src="{{ asset('storage/foto_produk/' . $produk->foto_produk) }}" width="40" height="40"></td>
                <td class="text-black">{{ $produk->nama_produk}}</td>
                <td class="text-black">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td class="text-black">{{ $produk->stok}}</td>
                @if(Auth::check() && Auth::user()->role == 'admin')
                <td class="d-flex gap-2 text-black">
                    <a href="{{route('editIndex', $produk['id'])}}" class="btn btn-warning">Edit</a>
                    <a href="{{route('stokIndex', $produk['id'])}}" class="btn btn-primary">Update Stok</a>
        
                  <form action="/delete/{{ $produk['id'] }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-black me-2">Hapus</button>
                  </form>
                </td>
                @endif
            </tr>
            
        @endforeach
    </table>
</div>
</body>
@endsection

{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Produk</title>
</head>
    <body>
        <div>
            <a href="/addProduk" class="btn btn-info">Tambah Produk</a>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Stok</th>
                        <th>Foto</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produk as $produk)
                  <tr>
                    <td></td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $produk->stok }}</td>
                    <td>
                        <img src="{{ asset('storage/foto_produk/' . $produk->foto_produk) }}" width="60">
                    </td>
                    <td>
                        <a href="{{route('editIndex', $produk['id'])}}" class="btn btn-warning">Edit</a>
                        <a href="{{route('stokIndex', $produk['id'])}}" class="btn btn-primary">Update Stok</a>
                        <form action="/delete/{{ $produk['id'] }}" method="POST" class="d-inline">
                          @csrf
                          @method('delete')
                          <button class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </body>
</html> --}}