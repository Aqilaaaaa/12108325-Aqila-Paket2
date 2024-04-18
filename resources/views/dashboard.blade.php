@extends('layout')
@section('container')
<body class="ol">
    <section class="main-header">
        <div class="main-text">
            <h5>Hallo, {{Auth::user()->role;}} {{Auth::user()->nama;}} !</h5> 
            <h3>Selamat Datang<br> <span>:)</span></h3>

            <br>
        </div>
    </div>
    </section>
    <img src="assets/img/logo.png"  class="col-4" style="margin-left: 70px; margin-top: 10px">
</body>

@endsection
