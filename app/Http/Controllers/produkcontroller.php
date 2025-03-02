<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Produk;
use Session;
use PDF;
class produkcontroller extends Controller
{
    public function produk()
{
    // Ambil data produk dengan pagination, 5 per halaman
    $produk = Produk::paginate(5);

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
public function editproduk($id)
{
    // Ambil produk berdasarkan ID
    $produk = Produk::find($id);

    // Jika produk tidak ditemukan, bisa return 404 atau redirect
    if (!$produk) {
        return redirect()->route('produk')->with('error', 'Produk tidak ditemukan');
    }

    return view('editproduk', ['produk' => $produk]);
}

public function editproses(Request $request)
{
    // Validasi input
    $request->validate([
        'namaproduk' => 'required|string|max:255',
        'hargaproduk' => 'required|numeric',
        'stokproduk' => 'required|integer',
        'jenisproduk' => 'required|string',
        'gambarproduk' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
    ]);

    // Cari produk yang akan diedit
    $produk = Produk::find($request->id);

    // Jika produk tidak ditemukan, redirect kembali
    if (!$produk) {
        return redirect()->route('produk')->with('error', 'Produk tidak ditemukan');
    }

    // Proses upload gambar jika ada
    if ($request->hasFile('gambarproduk')) {
        // Hapus gambar lama jika ada
        if ($produk->gambarproduk && file_exists(storage_path('app/public/produk/' . $produk->gambarproduk))) {
            unlink(storage_path('app/public/produk/' . $produk->gambarproduk));
        }

        // Ambil file gambar
        $gambar = $request->file('gambarproduk');
        
        // Tentukan nama file yang unik
        $gambarName = time() . '.' . $gambar->getClientOriginalExtension();
        
        // Simpan gambar ke folder storage/public/produk
        $path = $gambar->storeAs('public/produk', $gambarName);

        // Simpan path gambar baru
        $gambarPath = $gambarName;
    } else {
        // Jika tidak ada gambar baru, tetap menggunakan gambar lama
        $gambarPath = $produk->gambarproduk;
    }

    // Update produk dengan data baru
    $produk->update([
        'namaproduk' => $request->namaproduk,
        'hargaproduk' => $request->hargaproduk,
        'stokproduk' => $request->stokproduk,
        'jenisproduk' => $request->jenisproduk,
        'gambarproduk' => $gambarPath, // Simpan gambar yang baru (atau yang lama)
    ]);

    // Redirect kembali ke halaman produk
    return redirect()->route('produk')->with('success', 'Produk berhasil diperbarui');
}
public function hapus($id)
{
    $produk = Produk::where('id', $id)
              ->delete();

    return redirect()->route('produk');
}
public function cetak()
{
  $produk = Produk::select('*')
            ->get();

  $pdf = PDF::loadView('cetak', ['produk' => $produk]);
  return $pdf->stream('Laporan-Data-produk.pdf');
}

}