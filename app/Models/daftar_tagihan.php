<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class daftar_tagihan extends Model
{
    use HasFactory;
    protected $table = 'daftar_tagihan';
    protected $fillable=['ID','ID_Pasien','ID_Rawat_Inap','ID_Booking','Harga',
    'Harga'];
    public $timestamps = false;
    protected $primaryKey = 'ID';
}