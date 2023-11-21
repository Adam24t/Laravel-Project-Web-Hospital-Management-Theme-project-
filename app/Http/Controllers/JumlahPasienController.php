<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB; 

class JumlahPasienController extends Controller
{
    public function countPatients()
    {
        $patientCount = DB::table('pasien')->count();

        return view('dashboard', ['patientCount' => $patientCount]);
    }
}
