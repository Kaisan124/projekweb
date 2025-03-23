<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Produk;
use App\Models\Mapel;
use Session;
class authentikasicontroller extends Controller
{
    public function register(){
return view('register');

    }
    public function portal(){
        $jumlahProduk = Produk::count(); // Menghitung total produk
        $jumlahMapel = Mapel::count(); // Menghitung total produk

        return view('portal', compact('jumlahProduk','jumlahMapel'));
        
            }
    public function registerproses(Request $minta)
    {
        $minta->validate([
            'username' => 'required|string|unique:users,username',
            'role' => 'required|string',
            'password' => 'required|string',
            'alamat' => 'required|string',
            'handphone' => 'required|numeric',
            'negara' => 'required|string', // Cek di tabel 'users' kolom 'negara'
            'kota' => 'required|string',

        ],
        [
            'username.unique' => 'username yang Anda masukkan sudah terdaftar. Silakan gunakan username lain.',
        ]
    );
        
        $user = User::create([
            'username' => $minta->username,
            'role' => $minta->role,
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
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ], [
            'username.required' => 'Nama username wajib diisi.',
            'password.required' => 'Kata sandi wajib diisi.',
        ]);
    
        // Cek apakah pengguna ada di database
        $user = User::where('username', $request->username)->first();
    
        if (!$user) {
            return redirect()->back()->with('error', 'username tidak ditemukan.');
        }
    
        // Cek apakah password cocok
        if (!password_verify($request->password, $user->password)) {
            return redirect()->back()->with('error', 'Kata sandi salah. Silakan coba lagi.');
        }
        $data = [
            'username' => $request->input('username'),
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
        return redirect('/');
    }
    public function home()
    {
      return view('home');

}
}
