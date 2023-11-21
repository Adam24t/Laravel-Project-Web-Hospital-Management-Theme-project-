<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dokter;
use App\Models\spesialisasi_dokter;
use Carbon\Carbon;

class dokterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors=dokter::class;
        $spesialisasi = spesialisasi_dokter::pluck('Bidang_Spesialisasi', 'ID');
        return view('doctors',
    
        [
            'spesialisasi'=>$spesialisasi
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
            'ID' => 'required|max:15',
            'Nama_Dokter' => 'required|string|max:100',
            'Tanggal_Lahir' => 'required',
            'Jenis_Kelamin' => 'required',
            'Alamat' => 'required|string|max:250',
            'No_HP' => 'required',
            'ID_Spesialisasi' => 'required',
        ]);

        $tanggal_lahir = Carbon::parse($request->input('Tanggal_Lahir'))->format('Y-m-d');

        // Save the form data to the database
        $model = dokter::create(
            [
                'ID' => $request->input('ID'),
            'Nama_Dokter' => $request->input('Nama_Dokter'),
            'Tanggal_Lahir' => $tanggal_lahir,
            'Alamat' => $request->input('Alamat'),
            'Jenis_Kelamin' => $request->input('Jenis_Kelamin'),
            'No_HP' => $request->input('No_HP'),
            'ID_Spesialisasi' => $request->input('ID_Spesialisasi'),
            ]
        );
        if (!$model) {
            \Log::info('Request data', ['attributes' => $request->all()]);
            \Log::error('Failed to save dokter', ['attributes' => $request->all()]);
        }
        return redirect('/dokter');
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
