@extends('home')

@section('konten')
  <h4>Selamat Datang <b>{{Auth::user()->username}}</b></b>.</h4>
  <br>
 <h4>
    Saya berasal dari {{Auth::user()->negara}}
</h4> 
<h4>Nomor saya {{Auth::user()->handphone}}
    </h4><br>
    <h4>
        alamat saya {{Auth::user()->alamat}}
    </h4>
     <br>
     <h5>kota saya {{Auth::user()->kota}}</h5>
@endsection