@extends('home')

@section('konten')
<h3>Tampil Data Produk</h3>
<a class="btn btn-success" href="{{route('produktambah')}}"><i class="fa fa-plus"></i> Produk tambah</a><br><br>

<!-- Grafik Harga Produk -->
{{-- <h4>Grafik Harga Produk</h4>
<div style="display: flex; justify-content: space-evenly; padding: 20px;">
    @foreach($produk as $s)
        <!-- Grafik Bar (Harga Produk) -->
        <div style="text-align: center;">
            <div style="width: 50px; height: {{ min($s->hargaproduk, 200) }}px; background-color: #4CAF50; margin: 10px;">
            </div>
            <div style="text-align: center; font-size: 12px;">{{ $s->namaproduk }}</div>
            <div style="text-align: center; font-size: 14px; font-weight: bold;">{{ $s->hargaproduk }}</div>
        </div>
    @endforeach
</div> --}}

<!-- Tabel Data Produk -->
<table class="table table-bordered table-hover">
  <tr>
    <th>#ID</th>
    <th>Nama Produk</th>
    <th>Harga Produk</th>
    <th>Jenis Produk</th>
    <th>Stok Produk</th>
    <th>Gambar Produk</th>
    <th>Jumlah total harga produk</th>
    <th>Jumlah total diskon 10%</th>
    <th>Jumlah total harga yang sudah diskon</th>
    <th>Aksi</th>
  </tr>
  @foreach($produk as $s) 
  <tr>
    <td>{{$s->id}}</td>
    <td>{{$s->namaproduk}}</td>
    <td>{{$s->hargaproduk}}</td>
    <td>{{$s->jenisproduk}}</td>
    <td>{{$s->stokproduk}}</td>

    <!-- Tampilkan gambar menggunakan <img> -->
    <td>
        <img src="{{ asset('storage/produk/'.$s->gambarproduk) }}" alt="Gambar Produk" width="100" height="100">
    </td> 

    <td>{{$s->hargaproduk * $s->stokproduk}}</td>
    <td>{{$s->hargaproduk * 0.1}}</td>
    <td>{{($s->hargaproduk * $s->stokproduk) - ($s->hargaproduk * 0.1)}}</td>

    <td>
      <a href="ubahproduk/{{$s->id}}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
      <a href="/hapus/{{$s->id}}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
  @endforeach
</table>

@endsection
