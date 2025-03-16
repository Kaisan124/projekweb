<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan Admin
        User::create([
            'username' => 'Admin',
            'alamat'=>'banyuasin',
            'negara'=>'banyuasin',
            'kota'=>'banyuasin',
            'handphone'=>'0830480483',
            'password' => Hash::make('admin123'), // Ganti dengan password yang aman
            'role' => 'admin',
        ]);

        // Tambahkan Siswa
        User::create([
            'username' => 'Siswa',
            'alamat'=>'palembang',
            'negara'=>'palembang',
            'kota'=>'palembang',
            'handphone'=>'0830480483',
            'password' => Hash::make('siswa123'), // Ganti dengan password yang aman
            'role' => 'siswa',
        ]);
    }
}
