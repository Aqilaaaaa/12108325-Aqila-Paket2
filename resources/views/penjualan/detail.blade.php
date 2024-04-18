@extends('layout')
@section('container')
<body class="ol">
<div class="gam mx-5">
    <div class="total">
        <br>
        <h4 class="fw-bold text-break mt-4 mx-3 text-white">Penjualan</h4>
        <hr class="text-white">
    </div>
    <div class="icons" style="display: flex; justify-content: flex-end;">
        <a href="{{route('penjualan.excel')}}" class="icon text-decoration-none">Export Penjualan (.xlsx)</a>  &nbsp; &nbsp; &nbsp;
        <a href="/penjualan" class="icon text-decoration-none">Tambah Penjualan</a> &nbsp; &nbsp; &nbsp;
        @if(Auth::check() && Auth::user()->role == 'kasir')
        <a href="/penjualan" class="icon text-decoration-none">Tambah Penjualan</a> &nbsp; &nbsp; &nbsp;
        <a href="/pelanggan" class="icon text-decoration-none">Tambah Pelanggan</a>
        @endif
    </div>
    <br>
    <table class="table text-white table-striped table-bordered ">
        <tr style="background-color: #2a89db; color: white; font-weight: bold;">
            <td class="text-white">No</td>
            <td class="text-white">Nama Pelanggan</td>
            <td class="text-white">Tanggal Penjualan</td>
            <td class="text-white">Total Harga</td>
            <td class="text-white">Dibuat Oleh</td>
            <td class="text-white">Action</td>
        </tr>
        
        @foreach($buyingDetails as $index => $pelanggan)
        {{-- @foreach ($mergedDetails as $index => $detail) --}}
        {{-- @foreach($detail['items'] as $item) --}}
            <tr class="table-rows">
                <td class="text-black">{{ $index +1 }}</td>
                <td class="text-black">{{ $pelanggan['penjualan']['pelanggan']['nama_pelanggan']}}</td>
                <td class="text-black">{{ $pelanggan['penjualan']['tanggal_penjualan']}}</td>
                <td class="text-black">Rp {{ number_format( $pelanggan['subtotal'], 0, ',', '.') }}</td>
                <td class="text-black">Kasir</td>
                <td class="d-flex gap-2 text-white">
                    <a href="" class="btn btn-warning">Lihat</a>
                    <a href="{{ url('/penjualan/' . $pelanggan->id . '/download-pdf') }}" class="btn btn-primary">Unduh Bukti</a>
                    {{-- @if(isset($detail['id'])) --}}
                    @if(Auth::user()->role == 'kasir')
                    <form action="/deleteDetail/{{ $pelanggan['penjualan']['id'] }}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger text-white me-2">Hapus</button>
                      </form>
                      @endif
                    {{-- @endif --}}
                </td>
            </tr>
            @endforeach
        {{-- @endforeach --}}
        {{-- @endforeach --}}
    </table>
</div>
</body>
@endsection