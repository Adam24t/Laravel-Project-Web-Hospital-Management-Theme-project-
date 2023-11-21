<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\daftar_tagihan;
use App\Models\pasien;
use App\Models\rawat_inap;
use App\Models\booking;
use Carbon\Carbon;
use LaravelViews\Views\Traits\WithAlerts;

class daftartagihanController extends Controller
{
    use WithAlerts;
    //
    public function index()
    {
        $pasien = pasien::pluck('Nama', 'ID');
        $rawat_inap = rawat_inap::pluck('ID');
        $booking = booking::pluck('ID');
        return view('daftar_tagihan',
    [
        'pasien'=>$pasien,
        'rawat_inap'=>$rawat_inap,
        'booking'=>$booking
    ]);
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'ID_Pasien' => 'required',
            'ID_Rawat_Inap',
            'ID_Booking',
        ]);

        // Save the form data to the database
        $model = daftar_tagihan::create(
            [
            'ID_Pasien' => $request->input('ID_Pasien'),
            'ID_Rawat_Inap' => $request->input('ID_Rawat_Inap'),
            'ID_Booking' => $request->input('ID_Booking'),
            ]
        );

        if (!$model) {
            \Log::info('Request data', ['attributes' => $request->all()]);
            \Log::error('Failed to save dokter', ['attributes' => $request->all()]);
        }
        return redirect('/perawat');
    }
}