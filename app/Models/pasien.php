<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pasien extends Model
{
    use HasFactory;
    protected $table = 'pasien';
    protected $fillable=['ID','Nama','Tanggal_Lahir','Alamat',
    'Jenis_Kelamin','Kontak_Darurat'];
    public $timestamps = false;
    protected $primaryKey = 'ID';
}
