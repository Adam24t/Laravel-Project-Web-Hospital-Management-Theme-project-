<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\booking;

class jenis_booking extends Model
{
    use HasFactory;
    protected $table = 'jenis_booking';
    protected $fillable=['ID','Jenis_Booking','Biaya'];
    public $timestamps = false;
    protected $primaryKey = 'ID';
    public function jenisBooking() {
        return $this->hasOne(booking::class, 'ID_Jenis_Booking');
    }
}

