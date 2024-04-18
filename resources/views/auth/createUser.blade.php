@extends('layout')
@section('container')
<body class="ol">
    <section class="container">
        <br>
        <form action="{{ route('user.store')}}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="input-box">
                <label>Nama Lengkap</label>
                <input type="text" placeholder="Masukkan nama lengkap" name="nama"/>
            </div>

            <div class="input-box">
                <label>Email</label>
                <input type="email" placeholder="Masukkan email" name="email"/>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Password</label>
                    <input type="text" placeholder="Masukkan passwordd" name="password" />

                </div>

                <div class="input-box">
                    <label>Role</label>
                    <select name="role" class="input-box text-black">
                        <option value="kasir">Kasir</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
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
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>

    <div class="content">
        <div class="cards">
            <div class="card">
                <div class="box">
                    <form action="{{ route('user.store')}}" method="POST" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group">
                            <label for="nama_produk">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama" class="form-control" placeholder="Masukkan nama lengkap">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan email">
                        </div>
                        <div class="form-group">
                            <label for="stok">Password</label>
                            <input type="text" id="password" name="password" class="form-control" placeholder="Masukkan jumlah stok">
                        </div>
                        <div class="form-group">
                            <label for="foto_produk">Role</label>
                            <select name="role" id="">
                              <option value="admin">Admin</option>
                              <option value="kasir">Kasir</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>    --}} 


    {{-- <form action="{{ route('user.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
          <input type="text" name="nama" class="form-control">
        </div>
        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Email</label>
          <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Role</label>
            <select name="role">
                <option value="admin">Admin</option>
                <option value="kasir">Kasir</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form> --}}

      {{-- <div>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
            <tbody>
                @foreach($produk as $user)    
              <tr>
                <td></td>
                <td>{{ $user->nama }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->role }}</td>
                <td> --}}
                    {{-- <a href="{{route('editUser', $users['id'])}}"   class="btn btn-warning">Edit</a> --}}
                    {{-- <form action="/delete/user/{{ $user['id'] }}" method="POST" class="d-inline">
                      @csrf
                      @method('delete')
                      <button class="btn btn-danger">Hapus</button>
                    </form> --}}
                {{-- </td>
              </tr>
              @endforeach
            </tbody>
          </table>
      </div> --}}
{{-- </body>
</html> --}}