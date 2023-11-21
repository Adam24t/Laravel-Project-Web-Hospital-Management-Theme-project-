<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 
use App\Charts\Graph_sp;


class DatabaseDisplaysController extends Controller
{
    public function showDashboardData()
    {
        $numRoom = DB::table('ruangan')
            ->where('status', 'Tersedia')
            ->count();

        $patientCount = DB::table('pasien')->count();

        $numDoctor = DB::table('dokter')->count();

        $numRawat = DB::table('rawat_inap')->count();

        return view('dashboard', [
            'numRoom' => $numRoom,
            'patientCount' => $patientCount,
            'numDoctor' => $numDoctor,
            'numRawat' => $numRawat
            
        ]);
    }
}
