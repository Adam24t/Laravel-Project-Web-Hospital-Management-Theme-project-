<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tagihan extends Model
{
    use HasFactory;
    protected $table = 'tagihan';
    protected $fillable=['ID','ID_Pasien','Tanggal_Transaksi','Jumlah_Transaksi','Status'];
    public $timestamps = false;
    protected $primaryKey = 'ID';
}
