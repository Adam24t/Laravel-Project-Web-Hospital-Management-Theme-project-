<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class perawat extends Model
{
    use HasFactory;
    protected $table = 'perawat';
    protected $fillable=['ID','Nama_Perawat','Tanggal_Lahir','Jenis_Kelamin','Alamat',
    'No_HP','ID_Spesialisasi'];
    public $timestamps = false;
    protected $primaryKey = 'ID';
}
