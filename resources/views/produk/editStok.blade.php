@extends('layout')
@section('container')
<body class="ol">
    <section class="container">
        <div class="total">
            <br>
            <h4 class="fw-bold text-break mt-4 mx-3 text-black">Update Stok</h4>
            <hr class="text-black">
        </div>
        <form action="{{ route('updateStok', $produk->id)}}" class="form" method="POST">
            @csrf
            @method('PUT')
            <div class="column">
                <div class="input-box">
                    <label>Stok</label>
                    <input type="number" placeholder="Masukkan stok" name="stok" value="{{ $produk->stok }}" />
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
                <form action="{{ route('updateStok', $produk->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="stok" class="form-label">Stok</label>
                        <input type="number" id="stok" name="stok" class="form-control" value="{{ $produk->stok }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </body>
        </html> --}}