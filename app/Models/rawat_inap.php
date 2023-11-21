<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rawat_inap extends Model
{
    use HasFactory;
    protected $table = 'rawat_inap';
    protected $fillable=['ID','ID_Pasien','ID_Ruangan','Tanggal_Masuk','Tanggal_Keluar'];
    public $timestamps = false;
    protected $primaryKey = 'ID';
}
