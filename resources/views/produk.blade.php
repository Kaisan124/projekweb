@extends('home')

@section('konten')
<h3>Tampil Data Produk</h3>
<a class="btn btn-success" href="{{ route('produktambah') }}"><i class="fa fa-plus"></i> Produk tambah</a><br><br>
<a class="btn btn-default" href="{{route('cetak')}}" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a>

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
    <td>{{ $s->id }}</td>
    <td>{{ $s->namaproduk }}</td>
    <td>{{ $s->hargaproduk }}</td>
    <td>{{ $s->jenisproduk }}</td>
    <td>{{ $s->stokproduk }}</td>
    
    <!-- Tampilkan gambar menggunakan <img> -->
    <td>
        <img src="{{ asset('storage/produk/'.$s->gambarproduk) }}" alt="Gambar Produk" width="100" height="100">
    </td> 

    <td>{{ $s->hargaproduk * $s->stokproduk }}</td>
    <td>{{ $s->hargaproduk * 0.1 }}</td>
    <td>{{ ($s->hargaproduk * $s->stokproduk) - ($s->hargaproduk * 0.1) }}</td>

    <td>
      <a href="editproduk/{{ $s->id }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
      <a href="/hapus/{{ $s->id }}" onclick="return confirm('Apakah Anda Yakin Menghapus Data?');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
    </td>
  </tr>
  @endforeach
</table>

<!-- Pagination -->
<div class="pagination-wrapper">
    <!-- Pagination with Bootstrap styling -->
    <nav aria-label="Page navigation">
        <ul class="pagination justify-content-center">
            <!-- Previous Page Link -->
            @if ($produk->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $produk->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @endif

            <!-- Page Number Links -->
            @foreach ($produk->getUrlRange(1, $produk->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $produk->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            <!-- Next Page Link -->
            @if ($produk->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $produk->nextPageUrl() }}" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            @else
                <li class="page-item disabled">
                    <span class="page-link">Next</span>
                </li>
            @endif
        </ul>
    </nav>
</div>

@endsection
