@extends('layout')
@section('container')
<body class="ol">
<div class="gam mx-5">
    <div class="total">
        <br>
        <h4 class="fw-bold text-break mt-4 mx-3 text-white">Akun User</h4>
        <hr class="text-white">
    </div>
        <div class="icons" style="display: flex; justify-content: flex-end;">
            <a href="/createUser" class="text-decoration-none">
                <i class="fa-sharp fa-solid fa-circle-plus"></i>
            </a>
        </div>
    <br>
    <table class="table text-white table-striped table-bordered ">
        <tr>
            <td class="text-white">No</td>
            <td class="text-white">Nama</td>
            <td class="text-white">Email</td>
            <td class="text-white">Role</td>
            <td class="text-white">Action</td>
        </tr>
        
        @foreach ($user as $index => $item)
            <tr class="table-rows">
                <td class="text-white"> {{ $index +1 }}</td>
                <td class="text-white">{{ $item->nama}}</td>
                <td class="text-white">{{ $item->email}}</td>
                <td class="text-white">{{ $item->role}}</td>
                <td class="d-flex gap-2 text-white">
                    <a href="{{route('editUser', $item['id'])}}" class="btn btn-warning">Edit</a>
                    <form action="/deleteUser/{{ $item['id'] }}" method="POST">
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




{{-- @extends('layout')
@section('container')
<body class="ol">
    <section class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Detail Penjualan') }}</div>

                    <div class="card-body">
                        @foreach($mergedDetails as $index => $detail)
                            <div class="mb-4">
                                <h4>Penjualan ID: {{ $detail['penjualan_id']['id'] }}</h4>
                                <p>Tanggal Penjualan: {{ $detail['penjualan_id']['tanggal_penjualan'] }}</p>
                                <p>Total Harga: {{ $detail['penjualan_id']['total_harga'] }}</p>
                                <p>Pelanggan ID: {{ $detail['penjualan_id']['pelanggan_id'] }}</p>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Pelanggan</th>
                                            <th>Produk</th>
                                            <th>Jumlah</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($detail['items'] as $item)
                                            <tr>
                                                <td>{{$index +1}}</td>
                                                <td>{{ $item['produk_id'] }}</td>
                                                <td>{{ $item['jumlah_produk'] }}</td>
                                                <td>{{ $item['subtotal'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section>
</body>
@endsection --}}
