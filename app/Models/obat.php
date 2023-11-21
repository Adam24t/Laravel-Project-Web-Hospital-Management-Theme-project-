<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\diagnosa;

class obat extends Model
{
    use HasFactory;
    protected $table = 'obat';
    protected $fillable=['ID','Nama_Obat','Deskripsi_Obat','Harga'];
    public $timestamps = false;
    protected $primaryKey = 'ID';
    public function obatdiagnosa() {
        return $this->belongsTo(diagnosa::class, 'ID_Obat');
    }
}
