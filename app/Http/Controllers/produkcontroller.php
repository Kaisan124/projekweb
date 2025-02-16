<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use Session;
class produkcontroller extends Controller
{
    public function produk(){
        $produk = Produk::select('*')->get();

        // Ambil nama produk dan harga produk untuk grafik
        $produkNames = $produk->pluck('namaproduk');
        $produkPrices = $produk->pluck('hargaproduk');
    
        return view('produk', [
            'produk' => $produk,
            'produkNames' => $produkNames,
            'produkPrices' => $produkPrices,
        ]);
        
            }
            public function produktambah()
            {
                return view('produktambah');
            }
         
public function produkproses(Request $request)
{
    // Validasi input
    $request->validate([
        'namaproduk' => 'required|string|max:255',
        'hargaproduk' => 'required|numeric',
        'stokproduk' => 'required|integer',
        'jenisproduk' => 'required|string',
        'gambarproduk' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
    ]);

    // Proses upload gambar
    if ($request->hasFile('gambarproduk')) {
        // Ambil file gambar
        $gambar = $request->file('gambarproduk');
        
        // Tentukan nama file yang unik
        $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
        
        // Simpan gambar ke folder storage/public/produk
        $path = $gambar->storeAs('public/produk', $gambarName); // Path relatif terhadap storage

        // Simpan path gambar di database
        $gambarPath = $gambarName; // Simpan path relatif
    }

    // Simpan data produk ke database, termasuk path gambar
    Produk::create([
        'namaproduk' => $request->namaproduk,
        'hargaproduk' => $request->hargaproduk,
        'stokproduk' => $request->stokproduk,
        'jenisproduk' => $request->jenisproduk,
        'gambarproduk' => $gambarPath, // Simpan path gambar yang relatif
    ]);

    // Redirect ke halaman produk
    return redirect()->route('produk');
}
}