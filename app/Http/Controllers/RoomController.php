<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    
    public function showRoomCount()
    {
        $numRoom = DB::table('ruangan')
            ->where('status', 'Tersedia')
            ->count();
    
        return view('dashboard', ['numRoom' => $numRoom]);
    }
    
    
}

    

