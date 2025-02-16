<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class produk extends Model
{
    use HasFactory;

    protected $table = 'produks';
    protected $primaryKey = 'id';
    protected $fillable = ['namaproduk', 'hargaproduk', 'stokproduk', 'jenisproduk', 'gambarproduk'];
 
}
