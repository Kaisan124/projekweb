@extends('home')

@section('konten')
<h3>Form Input Data Mapel</h3>
<form method="post" action="{{route('mapelproses')}}" enctype="multipart/form-data"> <!-- Tambahkan enctype -->
  @csrf
  <div class="form-group">
    <label>Nama mapel</label>
    <input type="text" name="nama_mapel" class="form-control" placeholder="Nama Mapel" required="">
  </div>
  <div class="form-group">
    <label>Hari</label>
    <input type="text" name="hari" class="form-control" placeholder="Hari" required="">
  </div>
  <div class="form-group">
    <label>catatan</label>
    <input type="text" name="catatan" class="form-control" placeholder="Catatan" required="">
  </div>
  <div class="form-group">
    <label>Nama Guru</label>
    <input type="text" name="nama_guru" rows="3" class="form-control" placeholder="Nama Guru" required=""></textarea>
  </div>
  <div class="form-group">
    <label>Foto Mapel</label>
    <input type="file" name="foto_mapel" class="form-control" accept="image/jpeg,image/png" required=""> <!-- Ubah menjadi input file -->
  </div>
  <div class="form-group">
    <label>UTS</label>
    <input type="number" name="uts" rows="3" class="form-control" placeholder="UTS" required=""></textarea>
  </div>
  <div class="form-group">
    <label>UAS</label>
    <input type="number" name="uas" rows="3" class="form-control" placeholder="UAS" required=""></textarea>
  </div>
  <div class="form-group text-right">
    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
  </div>
</form>
@endsection
