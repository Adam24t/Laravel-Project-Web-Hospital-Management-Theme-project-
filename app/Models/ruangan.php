<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ruangan extends Model
{
    use HasFactory;
    protected $table = 'ruangan';
    protected $fillable=['ID','Jenis_Ruangan','Kapasitas_Ruangan','Status','Harga'];
    public $timestamps = false;
    protected $primaryKey = 'ID';
}
