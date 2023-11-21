<?php

namespace App\Http\Controllers;

use App\Models\spesialisasi_perawat;
use Illuminate\Http\Request;

class spesialisasiperawatController extends Controller
{
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'Bidang_Spesialisasi' => 'required',
        ]);

        // Save the form data to the database
        $model = spesialisasi_perawat::create($request->all());
        if (!$model) {
            \Log::info('Request data', ['attributes' => $request->all()]);
            \Log::error('Failed to save dokter', ['attributes' => $request->all()]);
        }
        return redirect('/perawat');
    }
}
