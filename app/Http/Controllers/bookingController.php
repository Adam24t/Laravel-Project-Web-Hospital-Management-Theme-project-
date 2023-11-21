<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\diagnosa;
use App\Models\booking;
use App\Models\perawat;
use App\Models\pasien;
use App\Models\dokter;
use App\Models\jenis_booking;
use App\Models\obat;

class bookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $diagnosa = diagnosa::pluck('Nama_Diagnosa', 'ID');
        $perawat = perawat::pluck('Nama_Perawat', 'ID');
        $pasien = pasien::pluck('Nama', 'ID');
        $dokter = dokter::pluck('Nama_Dokter', 'ID');
        $jenis_booking = jenis_booking::pluck('Jenis_Booking', 'ID');
        return view('booking',
        [
            'diagnosa'=> $diagnosa,
            'perawat'=> $perawat,
            'pasien'=> $pasien,
            'dokter'=> $dokter,
            'jenis_booking'=> $jenis_booking
        ]
    );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'Tanggal_Booking'=> 'required',
            'ID_Pasien'=> 'required',
            'ID_Dokter'=> 'required',
            'ID_Perawat'=> 'required',
            'ID_Diagnosa'=> 'required',
            'ID_Jenis_Booking'=> 'required',
            'Deskripsi_Pemeriksaan',
        ]);

        $Tanggal_Booking = Carbon::parse($request->input('Tanggal_Booking'))->format('Y-m-d');

        $ID_Jenis_Booking=$request->input('ID_Jenis_Booking');
        $biaya_jenis=jenis_booking::find($ID_Jenis_Booking)->Biaya;

        $ID_Diagnosa=$request->input('ID_Diagnosa');
        $kuant_obat=diagnosa::find($ID_Diagnosa)->Jumlah_Obat;

        $ID_Obat=diagnosa::find($ID_Diagnosa)->ID_Obat;
        $harga_obat=obat::find($ID_Obat)->Harga;

        $biaya = $biaya_jenis + ($kuant_obat * $harga_obat);

        // Save the form data to the database
        $model = booking::create(
            [
            'Tanggal_Booking' => $Tanggal_Booking,
            'ID_Pasien'=> $request->input('ID_Pasien'),
            'ID_Dokter'=> $request->input('ID_Dokter'),
            'ID_Perawat'=> $request->input('ID_Perawat'),
            'ID_Diagnosa'=> $request->input('ID_Diagnosa'),
            'ID_Jenis_Booking'=> $request->input('ID_Jenis_Booking'),
            'Deskripsi_Pemeriksaan'=> $request->input('Deskripsi_Pemeriksaan'),
            'Biaya'=> $biaya,
            ]
        );
        if (!$model) {
            \Log::info('Request data', ['attributes' => $request->all()]);
            \Log::error('Failed to save dokter', ['attributes' => $request->all()]);
        }
        return redirect('/booking');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}