<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\jenis_booking;

class booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable=['ID','Tanggal_Booking','ID_Pasien','ID_Dokter','ID_Perawat',
    'ID_Diagnosa','ID_Jenis_Booking','Deskripsi_Pemeriksaan','Biaya'];
    public $timestamps = false;
    protected $primaryKey = 'ID';

    public function bookingjenis() {
        return $this->belongsTo(jenis_booking::class, 'ID_Jenis_Booking');
    }

    public function bookingdiagnosa() {
        return $this->belongsTo(jenis_booking::class, 'ID_Diagnosa');
    }
}