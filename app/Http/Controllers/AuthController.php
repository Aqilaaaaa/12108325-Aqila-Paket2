<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index () {
        return view('dashboard');
    }

    public function indexLogin () {
        return view ('auth.login');
    }
    
    public function login (Request $request) {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ], [
            'email.required' => 'email wajib di isi',
            'password.required' => 'passwordd wajib di isi'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        if(Auth::attempt($infoLogin)) {
            
            return redirect('/');
        }else{
            return redirect()->back()->withErrors('email dan password tidak sesuai')->withInput();
        }
    }

    public function logout() {
        Auth::logout();
        return redirect('/login');
    }

    public function getAllUser ()
    {
        $user = User::all();
        return view('auth.user', compact('user'));
    }
    
    public function createUserIndex ()
    {
        return view('auth.createUser');
    }

    public function createUser(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'nullable',
        ]);

        User::create([
            'nama' => $validate['nama'],
            'email' => $validate['email'],
            'password' => bcrypt($validate['password']),
            'role' => $validate['role'] ?? 'kasir',
        ]);

        return redirect('/user')->with(compact('validate'));
    }

    public function updateIndex ($id)
    {
        $user = User::where('id', $id)->first();
        return view('auth.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $rules = [
            'nama' => 'required',
            'email' => 'required',
            'role' => 'required',
        ];

        $request->validate($rules);

        $user->update([
            'nama' => $request -> nama,
            'email' => $request -> email,
            'role' => $request -> role,
        ]);

        return redirect('/user');
    }

    public function delete ($id)
    {
        User::where('id', $id)->delete();
        return redirect()->back();
    }

}
