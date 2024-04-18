@extends('layout')
@section('container')
<body class="ol">
<div class="gam mx-5">
    <div class="total">
        <br>
        <h4 class="fw-bold text-break mt-4 mx-3 text-white">List Produk</h4>
        <hr class="text-white">
        </div>
    <br>
    </div>
    <table class="table text-white table-striped table-bordered ">
        <tr>
            <td class="text-white">No</td>
            <td class="text-white">Foto Produk</td>
            <td class="text-white">Nama Produk</td>
            <td class="text-white">Harga</td>
            <td class="text-white">Stok</td>
            <td class="text-white">Action</td>
        </tr>
        
        @foreach ($produk as $index => $produk)
            <tr class="table-rows">
                <td class="text-white">{{$index +1}}</td>
                <td class="text-white"><img src="{{ asset('storage/foto_produk/' . $produk->foto_produk) }}" width="40" height="40"></td>
                <td class="text-white">{{ $produk->nama_produk}}</td>
                <td class="text-white">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td class="text-white">{{ $produk->stok}}</td>
                <td class="d-flex gap-2 text-white">
                    <a href="{{route('editIndex', $produk['id'])}}" class="btn btn-warning">Edit</a>
                    <a href="{{route('stokIndex', $produk['id'])}}" class="btn btn-primary">Update Stok</a>
        
                  <form action="/delete/{{ $produk['id'] }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-white me-2">Hapus</button>
                  </form>
                </td>
            </tr>
            
        @endforeach
    </table>
</div>
</body>
@endsection