@extends('layout')
@section('container')
<body class="ol">
    <section class="container">
        <div class="total">
            <br>
            <h4 class="fw-bold text-break mt-4 mx-3 text-black">Edit Account User</h4>
            <hr class="text-black">
        </div>
        <form action="{{ route('edit.store', $user['id'])}}" class="form" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="input-box">
                <label>Nama Lengkap</label>
                <input type="text" placeholder="Masukkan nama lengkap" name="nama" value="{{ $user->nama}}"/>
            </div>

            <div class="input-box">
                <label>Email</label>
                <input type="email" placeholder="Masukkan email" name="email" value="{{$user->email}}"/>
            </div>

            <div class="column">
                <div class="input-box">
                    <label>Password</label>
                    <input type="text" placeholder="Masukkan passwordd" name="password"/>

                </div>

                <div class="input-box">
                    <label>Role</label>
                    <select name="role" class="input-box text-black">
                        <option value="kasir" {{ old('role', $user->role) == 'kasir' ? 'selected' :  ''}}>Kasir</option>
                        <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' :  ''}}>Admin</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn submit" id="btn">Submit</button>  
        </form>
    </section>
</body>
@endsection