<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
    <div class="sidebar">
        <div class="brand">
            <i class="fa-solid fa-cash-register"></i>&nbsp;&nbsp;&nbsp;&nbsp;
            <h1>KASIRIN</h1>
        </div>
        <ul>
            <li><i class="fa-solid fa-qrcode"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Dashboard</span></li>
            <li><i class="fa-solid fa-shop"></i>&nbsp;&nbsp;&nbsp;<span>Produk</span></li>
            <li><i class="fa-solid fa-cart-shopping"></i>&nbsp;&nbsp;&nbsp;<span>Pembelian</span></li>
            <li><i class="fa-solid fa-user"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>User</span></li>
            <li>
                <a href="{{ route('logout') }}" style="color: red">
                    <i class="fa-solid fa-right-from-bracket"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Logout</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="container">
        <div class="header">
            <div class="nav">
                <div class="search">
                    <input type="text" placeholder="Pencarian">&nbsp;&nbsp;
                    <button type="submit"><li><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
                <div class="user">
                    <a href="" class="btn"><i class="fa-solid fa-user"></i></a>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        <form action="" method="" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="nama_produk">Nama Barang</label>
                                <input type="text" id="nama_produk" name="nama_produk" class="form-control" placeholder="Masukkan nama barang">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <input type="number" id="harga" name="harga" class="form-control" placeholder="Masukkan harga">
                            </div>
                            <div class="form-group">
                                <label for="stok">Stok</label>
                                <input type="number" id="stok" name="stok" class="form-control" placeholder="Masukkan jumlah stok">
                            </div>
                            <div class="form-group">
                                <label for="foto_produk">Foto Produk</label>
                                <input type="file" id="foto_produk" name="foto_produk" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>        
    
</body>
</html>