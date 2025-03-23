@extends('home')

@section('konten')
  {{-- <h4>Selamat Datang <b>{{Auth::user()->username}}</b></b>.</h4>
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
     <h5>kota saya {{Auth::user()->kota}}</h5> --}}
     <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">Jumlah Produk</h3>
                    </div>
                    <div class="panel-body text-center">
                        <h1 class="display-4">{{ $jumlahProduk }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="panel panel-primary">
                    <div class="panel-heading text-center">
                        <h3 class="panel-title">Jumlah Mapel</h3>
                    </div>
                    <div class="panel-body text-center">
                        <h1 class="display-4">{{ $jumlahMapel }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection