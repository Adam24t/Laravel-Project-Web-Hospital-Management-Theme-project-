<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class spesialisasi_perawat extends Model
{
    use HasFactory;
    protected $table = 'spesialisasi_perawat';
    protected $fillable=['ID','Bidang_Spesialisasi'];
    public $timestamps = false;
    protected $primaryKey = 'ID';
}
