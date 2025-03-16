<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Mapel;
use App\Models\Produk;
use Session;
use PDF;
use DataTables;
class mapelcontroller extends Controller
{
    public function mapel()
    {
        // Ambil data mapel dengan pagination, 5 per halaman
        $mapel = Mapel::paginate(5);
    
        // Ambil nama mapel dan harga mapel untuk grafik
        $mapelnames = $mapel->pluck('nama_mapel');
        $hari = $mapel->pluck('hari');
        
        return view('mapel', [
            'mapel' => $mapel,
            'mapelnames' =>$mapelnames,
            'hari' => $hari,


        ]);
    }
    public function mapeltambah()
    {
        return view('mapeltambah');
    }
    public function mapelproses(Request $request)
{
    // Validasi input
    // $request->validate([
    //     'nama_mapel' => 'required|string|max:255',
    //     'hari' => 'required|numeric',
    //     'catatan' => 'required|string',
    //     'nama_guru' => 'required|string',
    //     'foto_mapel' => 'required|image|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
    // ]);

    // // Proses upload gambar
    if ($request->hasFile('foto_mapel')) {
        // Ambil file gambar
        $foto = $request->file('foto_mapel');
        
        // Tentukan nama file yang unik
        $fotoName = time() . '.' . $foto->getClientOriginalExtension();
        
        // Simpan gambar ke folder storage/public/produk
        $path = $foto->storeAs('public/mapel', $fotoName); // Path relatif terhadap storage

        // Simpan path gambar di database
        $fotoPath = $fotoName; // Simpan path relatif
    }

    // Simpan data produk ke database, termasuk path gambar
    Mapel::create([
        'nama_mapel' => $request->nama_mapel,
        'hari' => $request->hari,
        'catatan' => $request->catatan,
        'nama_guru' => $request->nama_guru,
        'foto_mapel' => $fotoPath, // Simpan path gambar yang relatif]\
        'uts' => $request->uts,
        'uas' => $request->uas,

    ]);

    // Redirect ke halaman produk
    return redirect()->route('mapel');
}
public function editmapel($id)
{
    // Ambil produk berdasarkan ID
    $mapel = Mapel::find($id);

    // Jika produk tidak ditemukan, bisa return 404 atau redirect
    if (!$mapel) {
        return redirect()->route('mapel')->with('error', 'Mapel tidak ditemukan');
    }

    return view('editmapel', ['mapel' => $mapel]);
}

public function editmapelproses(Request $request)
{
    // Validasi input
    // $request->validate([
    //     'nama_mapel' => 'required|string|max:255',
    //     'hari' => 'required|numeric',
    //     'catatan' => 'required|integer',
    //     'nama_guru' => 'required|string',
    //     'foto_mapel' => 'nullable|image|mimes:jpg,jpeg,png|max:2048', // Validasi gambar
    // ]);

    // Cari produk yang akan diedit
    $mapel = Mapel::find($request->id);

    // Jika produk tidak ditemukan, redirect kembali
    if (!$mapel) {
        return redirect()->route('mapel')->with('error', 'Mapel tidak ditemukan');
    }

    // Proses upload gambar jika ada
    if ($request->hasFile('foto_mapel')) {
        // Hapus gambar lama jika ada
        if ($mapel->foto_mapel && file_exists(storage_path('app/public/mapel/' . $mapel->foto_mapel))) {
            unlink(storage_path('app/public/mapel/' . $mapel->foto_mapel));
        }

        // Ambil file gambar
        $foto = $request->file('foto_mapel');
        
        // Tentukan nama file yang unik
        $fotoName = time() . '.' . $foto->getClientOriginalExtension();
        
        // Simpan gambar ke folder storage/public/produk
        $path = $foto->storeAs('public/mapel', $fotoName);

        // Simpan path gambar baru
        $fotoPath = $fotoName;
    } else {
        // Jika tidak ada gambar baru, tetap menggunakan gambar lama
        $fotoPath = $mapel->foto_mapel;
    }

    // Update produk dengan data baru
    $mapel->update([
        'nama_mapel' => $request->nama_mapel,
        'hari' => $request->hari,
        'catatan' => $request->catatan,
        'nama_guru' => $request->nama_guru,
        'foto_mapel' => $fotoPath, // Simpan gambar yang baru (atau yang lama)
        'uts' => $request->uts,
        'hari' => $request->hari,
        'uas' => $request->uas,
    ]);

    // Redirect kembali ke halaman produk
    return redirect()->route('mapel')->with('success', 'mapel berhasil diperbarui');
}
public function hapusmapel($id)
{
    $mapel = Mapel::where('id', $id)
              ->delete();

    return redirect()->route('mapel');
}
public function cetakmapel()
{
  $mapel = Mapel::select('*')
            ->get();

  $pdf = PDF::loadView('cetakmapel', ['mapel' => $mapel]);
  return $pdf->stream('Laporan-Data-mapel.pdf');
}
}
