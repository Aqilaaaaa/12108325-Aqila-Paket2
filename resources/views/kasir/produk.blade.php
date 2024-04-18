@extends('layout')
@section('container')
<body class="ol">
<div class="gam mx-5">
    <div class="total">
        <br>
        <h4 class="fw-bold text-break mt-4 mx-3 text-black">List Produk</h4>
        <hr class="text-black">
        </div>
    <br>
    </div>
    <table class="table text-black table-striped table-bordered ">
        <tr>
            <td class="text-black">No</td>
            <td class="text-black">Foto Produk</td>
            <td class="text-black">Nama Produk</td>
            <td class="text-black">Harga</td>
            <td class="text-black">Stok</td>
            <td class="text-black">Action</td>
        </tr>
        
        @foreach ($produk as $index => $produk)
            <tr class="table-rows">
                <td class="text-black">{{$index +1}}</td>
                <td class="text-black"><img src="{{ asset('storage/foto_produk/'.$produk->foto_produk) }}" alt="Foto Produk" width="40" height="40"></td>>                    
                <td class="text-black">{{ $produk->nama_produk}}</td>
                <td class="text-black">Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                <td class="text-black">{{ $produk->stok}}</td>
                <td class="d-flex gap-2 text-black">
                    <a href="{{route('editIndex', $produk['id'])}}" class="btn btn-warning">Edit</a>
                    <a href="{{route('stokIndex', $produk['id'])}}" class="btn btn-primary">Update Stok</a>
        
                  <form action="/delete/{{ $produk['id'] }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger text-black me-2">Hapus</button>
                  </form>
                </td>
            </tr>
            
        @endforeach
    </table>
</div>
</body>
@endsection