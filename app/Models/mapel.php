<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mapel extends Model
{
    use HasFactory;
    protected $table = 'mapels';
    protected $primaryKey = 'id';
    protected $fillable = ['nama_mapel', 'hari', 'catatan', 'nama_guru', 'foto_mapel'];
}
