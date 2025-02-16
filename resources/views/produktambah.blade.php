@extends('home')

@section('konten')
<h3>Form Input Data Produk</h3>
<form method="post" action="{{route('produkproses')}}" enctype="multipart/form-data"> <!-- Tambahkan enctype -->
  @csrf
  <div class="form-group">
    <label>Nama Produk</label>
    <input type="text" name="namaproduk" class="form-control" placeholder="Nama Produk" required="">
  </div>
  <div class="form-group">
    <label>Harga Produk</label>
    <input type="text" name="hargaproduk" class="form-control" placeholder="Harga Produk" required="">
  </div>
  <div class="form-group">
    <label>Stok Produk</label>
    <input type="text" name="stokproduk" class="form-control" placeholder="Stok Produk" required="">
  </div>
  <div class="form-group">
    <label>Jenis Produk</label>
    <textarea name="jenisproduk" rows="3" class="form-control" placeholder="Jenis Produk" required=""></textarea>
  </div>
  <div class="form-group">
    <label>Gambar Produk</label>
    <input type="file" name="gambarproduk" class="form-control" accept="image/jpeg,image/png" required=""> <!-- Ubah menjadi input file -->
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
  </div>
</form>
@endsection
