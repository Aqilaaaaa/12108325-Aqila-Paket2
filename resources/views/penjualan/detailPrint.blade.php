<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembelian</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
        }
        .nota-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .card {
            margin-bottom: 30px;
        }
        .total {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container"> 
        <div class="card nota-header">
            <h3>Nota Pembelian Kasir Kasirin</h3>
            @foreach($buyingDetails as $detail)
            <p>Tanggal: {{$detail->penjualan->tanggal_penjualan}}</p>
            <p>Nama Pelanggan: {{$detail->penjualan->pelanggan->nama_pelanggan}} </p>
            <p>Alamat Pelanggan: {{$detail->penjualan->pelanggan->alamat}}</p>
            <p>No HP Pelanggan: {{$detail->penjualan->pelanggan->nomor_telepon}}</p>
            @endforeach
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Detail Pembelian</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <th>Nama Produk</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <th>Qty</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <th>Harga</th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <th>Sub Total</th>
                        </tr>
                    </thead><br>
                    <tbody>
                        @foreach($buyingDetails as $index => $penjualan)
                        <tr>
                            <td>{{$index +1}}</td>&nbsp;&nbsp;
                            <td>{{ $penjualan->produk->nama_produk }}</td>&nbsp;&nbsp;
                            <td>{{ $penjualan->jumlah_produk }}</td>&nbsp;&nbsp;
                            <td>{{ $penjualan->produk->harga }}</td>&nbsp;&nbsp;
                            <td>{{ $penjualan->subtotal }}</td>&nbsp;&nbsp;
                        </tr>
                        @endforeach 
                    </tbody>
                </table>
                <p class="total">Total Harga: Rp. {{$penjualan->subtotal}}</p>
            </div>
        </div>
        <p>Terima kasih atas pembelian Anda! | Kasir</p>
    </div>
</body>
</html>
