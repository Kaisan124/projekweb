<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;
class authentikasicontroller extends Controller
{
    public function register(){
return view('register');

    }
    public function portal(){
        return view('portal');
        
            }
    public function registerproses(Request $minta)
    {
        $user = User::create([
            'username' => $minta->username,
            'password' => Hash::make($minta->password),
            'alamat' => $minta->alamat,
            'handphone' => $minta->handphone,
            'negara' => $minta->negara,
            'kota' => $minta->kota,
        ]);

        Session::flash('pesan', 'Register Berhasil. Akun Anda sudah Aktif silahkan Login menggunakan username dan password.');
        return redirect('register');
    }




    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }else{
            return view('login');
        }
    }

    public function loginproses(Request $request)
    {
        $data = [
            'negara' => $request->input('negara'),
            'password' => $request->input('password'),
        ];

        if (Auth::Attempt($data)) {
            return redirect('home');
        }else{
            Session::flash('error', 'username atau Password Salah');
            return redirect('/login');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
    public function home()
    {
        return view('home');
    }

}
