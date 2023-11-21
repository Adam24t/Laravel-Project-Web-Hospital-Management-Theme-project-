<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Events\statusruanganEvent;

class ruanganController extends Controller
{
    //
    public function index()
    {
        event(new statusruanganEvent());
        $ruangan=ruangan::class;
        return view('ruangan',
    [
        'ruangan'=>$ruangan
    ]);
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'Jenis_Ruangan' => 'required|string|max:50',
            'Kapasitas_Ruangan' => 'required',
            'Status' => 'required',
            'Harga' => 'required',
        ]);

        // Save the form data to the database
        $model = ruangan::create($request->all());
        if (!$model) {
            \Log::info('Request data', ['attributes' => $request->all()]);
            \Log::error('Failed to save dokter', ['attributes' => $request->all()]);
        }
        return redirect('/ruangan');
    }
}
