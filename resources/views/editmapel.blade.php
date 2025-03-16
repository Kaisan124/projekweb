@extends('home')

@section('konten')
<h3>Edit Data mapel</h3>

<!-- Form untuk edit mapel -->
<form action="{{ route('editmapelproses') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $mapel->id }}">

    <div class="form-group">
        <label for="nama_mapel">Nama Mapel</label>
        <input type="text" name="nama_mapel" id="nama_mapel" class="form-control" value="{{ $mapel->nama_mapel }}" required>
    </div>

    <div class="form-group">
        <label for="hari">Hari</label>
        <input type="text" name="hari" id="hari" class="form-control" value="{{ $mapel->hari }}" required>
    </div>

    <div class="form-group">
        <label for="catatan">Catatan</label>
        <input type="text" name="catatan" id="catatan" class="form-control" value="{{ $mapel->catatan }}" required>
    </div>

    <div class="form-group">
        <label for="nama_guru">Nama Guru</label>
        <input type="text" name="nama_guru" id="nama_guru" class="form-control" value="{{ $mapel->nama_guru }}" required>
    </div>

    <div class="form-group">
        <label for="foto_mapel">Foto mapel</label>
        <input type="file" name="foto_mapel" id="foto_mapel" class="form-control">
        <small>Biarkan kosong jika tidak ingin mengganti gambar.</small>
    </div>

    <!-- Menampilkan gambar lama -->
    <div class="form-group">
        <label>Foto mapel Sebelumnya</label><br>
        <img src="{{ asset('storage/mapel/'.$mapel->foto_mapel) }}" alt="Foto mapel" width="100" height="100">
    </div>
    <div class="form-group">
        <label for="uts">Uts</label>
        <input type="text" name="uts" id="uts" class="form-control" value="{{ $mapel->uts }}" required>
    </div>
    <div class="form-group">
        <label for="uas">Uas</label>
        <input type="text" name="uas" id="uas" class="form-control" value="{{ $mapel->uas }}" required>
    </div>

    <button type="submit" class="btn btn-primary">Update mapel</button>
    <a href="{{ route('mapel') }}" class="btn btn-secondary">Batal</

    
</form>

@endsection
