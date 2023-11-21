<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\booking;
use App\Models\obat;

class diagnosa extends Model
{
    use HasFactory;
    protected $table = 'diagnosa';
    protected $fillable=['ID','Tanggal_Diagnosa','Nama_Diagnosa','Deskripsi_Diagnosa','Tindakan_Medis_Yang_Dibutuhkan',
    'ID_Obat','Jumlah_Obat'];
    public $timestamps = false;
    protected $primaryKey = 'ID';

    public function diagnosabooking() {
        return $this->hasOne(booking::class, 'ID_Diagnosa');
    }
    public function diagnosaobat() {
        return $this->belongsTo(obat::class, 'ID_Obat');
    }
}

