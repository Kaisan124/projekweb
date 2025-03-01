@extends('home')

@section('konten')
<h3>Edit Data Produk</h3>

<!-- Form untuk edit produk -->
<form action="{{ route('editproses') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $produk->id }}">

    <div class="form-group">
        <label for="namaproduk">Nama Produk</label>
        <input type="text" name="namaproduk" id="namaproduk" class="form-control" value="{{ $produk->namaproduk }}" required>
    </div>

    <div class="form-group">
        <label for="hargaproduk">Harga Produk</label>
        <input type="number" name="hargaproduk" id="hargaproduk" class="form-control" value="{{ $produk->hargaproduk }}" required>
    </div>

    <div class="form-group">
        <label for="stokproduk">Stok Produk</label>
        <input type="number" name="stokproduk" id="stokproduk" class="form-control" value="{{ $produk->stokproduk }}" required>
    </div>

    <div class="form-group">
        <label for="jenisproduk">Jenis Produk</label>
        <input type="text" name="jenisproduk" id="jenisproduk" class="form-control" value="{{ $produk->jenisproduk }}" required>
    </div>

    <div class="form-group">
        <label for="gambarproduk">Gambar Produk</label>
        <input type="file" name="gambarproduk" id="gambarproduk" class="form-control">
        <small>Biarkan kosong jika tidak ingin mengganti gambar.</small>
    </div>

    <!-- Menampilkan gambar lama -->
    <div class="form-group">
        <label>Gambar Produk Sebelumnya</label><br>
        <img src="{{ asset('storage/produk/'.$produk->gambarproduk) }}" alt="Gambar Produk" width="100" height="100">
    </div>

    <button type="submit" class="btn btn-primary">Update Produk</button>
    <a href="{{ route('produk') }}" class="btn btn-secondary">Batal</a>
</form>

@endsection
