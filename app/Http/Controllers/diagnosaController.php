<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\diagnosa;
use App\Models\obat;

class diagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $obat = obat::pluck('Nama_Obat', 'ID');
        return view('diagnosa',
        [
            'obat'=>$obat,
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
            'Tanggal_Diagnosa' => 'required',
            'Nama_Diagnosa' => 'required',
            'Deskripsi_Diagnosa' => 'required',
            'Tindakan_Medis_Yang_Dibutuhkan' => 'required',
            'ID_Obat' => 'required',
            'Jumlah_Obat' => 'required',
        ]);

        $tanggal_diagnosa = Carbon::parse($request->input('Tanggal_Diagnosa'))->format('Y-m-d');

        // Save the form data to the database
        $model = diagnosa::create(
            [
            'Tanggal_Diagnosa' => $tanggal_diagnosa,
            'Nama_Diagnosa' => $request->input('Nama_Diagnosa'),
            'Deskripsi_Diagnosa' => $request->input('Deskripsi_Diagnosa'),
            'Tindakan_Medis_Yang_Dibutuhkan' => $request->input('Tindakan_Medis_Yang_Dibutuhkan'),
            'ID_Obat' => $request->input('ID_Obat'),
            'Jumlah_Obat' => $request->input('Jumlah_Obat'),
            ]
        );
        if (!$model) {
            \Log::info('Request data', ['attributes' => $request->all()]);
            \Log::error('Failed to save dokter', ['attributes' => $request->all()]);
        }
        return redirect('/diagnosa');
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