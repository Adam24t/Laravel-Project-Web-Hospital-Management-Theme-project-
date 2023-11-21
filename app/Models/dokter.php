<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dokter extends Model
{
    use HasFactory;
    protected $table = 'dokter';
    protected $fillable=['ID','Nama_Dokter','Tanggal_Lahir','Jenis_Kelamin','Alamat',
    'No_HP','ID_Spesialisasi'];
    public $timestamps = false;
    protected $primaryKey = 'ID';
}
