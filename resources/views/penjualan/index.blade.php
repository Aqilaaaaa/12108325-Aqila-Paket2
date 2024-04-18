@extends('layout')
@section('container')
<body class="ol">
    <section class="container">
        <br>
        <h4 class="text-black"> <b>Transaksi Penjualan</b></h4>
        <hr class="text-black">
                        <form method="POST" action="{{ route('penjualan.store') }}">
                            @csrf

                            <div class="input-box">
                                <label for="tanggal_penjualan" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Penjualan') }}</label>

                                <div class="col-md-6">
                                    <input id="tanggal_penjualan" type="date" class="form-control @error('tanggal_penjualan') is-invalid @enderror" name="tanggal_penjualan" value="{{ old('tanggal_penjualan') }}" required autocomplete="tanggal_penjualan" autofocus>

                                    @error('tanggal_penjualan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="input-box">
                                <label for="pelanggan_id" class="col-md-4 col-form-label text-md-right">{{ __('Pelanggan') }}</label>

                                <div class="col-md-6">
                                    <select id="pelanggan_id" class="form-control @error('pelanggan_id') is-invalid @enderror" name="pelanggan_id" required>
                                        <option value="">Pilih Pelanggan</option>
                                        @foreach ($pelanggan as $p)
                                            <option class="text-black" value="{{ $p->id }}"  {{ old('pelanggan_id') == $p->id ? 'selected' : '' }} >{{ $p->nama_pelanggan }}</option>
                                        @endforeach
                                    </select>

                                    @error('pelanggan_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="column">
                            <div id="produk_fields">
                                <div class="input-box">
                                    <label for="produk_id" class="col-md-4 col-form-label text-md-right">{{ __('Produk') }}</label>
                                    
                                    <div class="col-md-4 text-black" >
                                        <select id="produk_id" class="form-control @error('detail.*.produk_id') is-invalid @enderror" name="detail[0][produk_id]" required>
                                            <option value="">Pilih Produk</option>
                                            @foreach ($produks as $produk)
                                            <option class="text-black" value="{{ $produk->id }}" {{ old('detail.0.produk_id') == $produk->id ? 'selected' : '' }}>{{ $produk->nama_produk }}</option>
                                            @endforeach
                                        </select>
                                        
                                        @error('detail.*.produk_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    
                                    <label for="jumlah_produk" class="col-md-2 col-form-label text-md-right">{{ __('Jumlah') }}</label>
                                    <div class="col-md-2">
                                        <input id="jumlah_produk" type="number" class="form-control @error('detail.*.jumlah_produk') is-invalid @enderror" name="detail[0][jumlah_produk]" value="{{ old('detail.0.jumlah_produk') }}" required>

                                        @error('detail.*.jumlah_produk')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            </div><br><br><br>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="button" class="btn btn-secondary" onclick="addProdukField()">Tambah Produk</button>
                                    <button type="submit" class="btn btn-primary">{{ __('Simpan') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        var produkFieldIndex = 0;

        function addProdukField() {
            produkFieldIndex++;

            var produkField = `
                <div class="input-box" id="produk_field_${produkFieldIndex}">
                    <label for="produk_id_${produkFieldIndex}" class="col-md-4 col-form-label text-md-right">{{ __('Produk') }}</label>
                    
                    <div class="col-md-4">
                        <select id="produk_id_${produkFieldIndex}" class="form-control" name="detail[${produkFieldIndex}][produk_id]" required>
                            <option value="">Pilih Produk</option>
                            @foreach ($produks as $produk)
                            <option value="{{ $produk->id }}">{{ $produk->nama }}</option>
                            @endforeach
                            </select>
                            </div>
                            
                    <label for="jumlah_produk_${produkFieldIndex}" class="col-md-2 col-form-label text-md-right">{{ __('Jumlah') }}</label>
                    <div class="col-md-2">
                        <input id="jumlah_produk_${produkFieldIndex}" type="number" class="form-control" name="detail[${produkFieldIndex}][jumlah_produk]" required>
                    </div>
                    <br>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-danger" onclick="removeProdukField(${produkFieldIndex})">Hapus</button>
                    </div>
                </div>
            `;

            document.getElementById('produk_fields').insertAdjacentHTML('beforeend', produkField);
        }

        function removeProdukField(index) {
            var produkField = document.getElementById('produk_field_' + index);
            produkField.remove();
        }
    </script>
    </body>
@endsection