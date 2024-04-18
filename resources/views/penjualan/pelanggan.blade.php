@extends('layout')
@section('container')
<body class="ol">
    <section class="container">
        <br>
        <form action="{{ route('pelanggan')}}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-box">
                <label>Nama</label>
                <input type="text" placeholder="Masukkan nama lengkap" name="nama_pelanggan"/>
            </div>

            <div class="input-box">
                <label>Alamat</label>
                <input type="text" placeholder="Masukkan Alamat" name="alamat"/>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>No. TLP</label>
                    <input type="number" placeholder="Masukkan nomor telepon" name="nomor_telepon" />

                </div>
            </div>
            <button type="submit" class="btn submit" id="btn">Submit</button>  
        </form>
    </section>
</body>
@endsection