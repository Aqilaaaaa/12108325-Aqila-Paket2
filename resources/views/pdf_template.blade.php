<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembelian</title>
    <style>
        /* Gaya CSS untuk format PDF */
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .title {
            text-align: center;
            font-size: 20px;
            margin-bottom: 20px;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="title">Struk Pembelian</div>
    {{-- @foreach ($penjualan as $index => $data) --}}
    <div class="invoice-details">
        <div><strong>Nomor Invoice: 09842</div>
        <div><strong>Tanggal Pembelian:</strong> 14 April 2024</div>
        <div><strong>Nama Kasir:</strong> Kasir Nazifa</div>
    </div>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Foto Produk</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            {{-- @foreach ($data['items'] as $itemIndex => $item) --}}
                <tr>
                    <td>1</td>
                    <td>Yupi</td>
                    <td>3</td>
                    <td>Rp. 18.000,00</td>
                </tr>
            {{-- @endforeach --}}
        </tbody>
    </table>
    {{-- @endforeach --}}
</body>
</html>
