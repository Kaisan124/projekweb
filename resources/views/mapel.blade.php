@extends('home')

@section('konten')
<h3>Tampil Data Mapel</h3>
<a class="btn btn-success" href="{{ route('mapeltambah') }}"><i class="fa fa-plus"></i> Mapel tambah</a><br><br>
<a class="btn btn-default" href="{{route('cetak')}}" target="_blank"><i class="fa fa-print"></i> Cetak PDF</a>

<!-- Tabel Data mapel -->
<table class="table table-bordered table-hover">
  <tr>
    <th>#ID</th>
    <th>nama mapel</th>
    <th>hari</th>
    <th>catatan</th>
    <th>nama guru</th>
    <th>foto mapel</th>
    
    <th>Aksi</th>
  </tr>
  @foreach($mapel as $s)
  <tr>
    <td>{{ $s->id }}</td>
    <td>{{ $s->nama_mapel }}</td>
    <td>{{ $s->hari }}</td>
    <td>{{ $s->catatan }}</td>
    <td>{{ $s->nama_guru }}</td>
    
    <!-- Tampilkan gambar menggunakan <img> -->
    <td>
        <img src="{{ asset('storage/mapel/'.$s->foto_mapel) }}" alt="foto mapel" width="100" height="100">
    </td> 

   
    <td>
      <a href="editmapel/{{ $s->id }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
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
            @if ($mapel->onFirstPage())
                <li class="page-item disabled">
                    <span class="page-link">Previous</span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $mapel->previousPageUrl() }}" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
            @endif

            <!-- Page Number Links -->
            @foreach ($mapel->getUrlRange(1, $mapel->lastPage()) as $page => $url)
                <li class="page-item {{ $page == $mapel->currentPage() ? 'active' : '' }}">
                    <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                </li>
            @endforeach

            <!-- Next Page Link -->
            @if ($mapel->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $mapel->nextPageUrl() }}" aria-label="Next">
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
