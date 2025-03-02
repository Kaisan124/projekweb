<h3><center>Laporan Data produk</center></h3>
<table  border="1" cellspacing="0" cellpadding="5">
  <tr>
    <th>#ID</th>
    <th>nama produk</th>
    <th>harga produk</th>
    <th>jenis produk</th>
    <th>stok produk</th>

  </tr>
  @foreach($produk as $s) 
  <tr>
    <td>{{$s->id}}</td>
    <td>{{$s->namaproduk}}</td>
    <td>{{$s->hargaproduk}}</td>
    <td>{{$s->jenisproduk}}</td>
    <td>{{$s->stokproduk}}</td>
    
  </tr>
  @endforeach
</table>