<?php

namespace App\Http\Controllers;

use App\Models\daftar_tagihan;
use App\Models\pasien;
use App\Models\tagihan;
use Illuminate\Http\Request;
use LaravelViews\Views\Traits\WithAlerts;

class tagihanController extends Controller
{
    use WithAlerts;
    //
    public function index()
    {
        $pasien = pasien::pluck('Nama', 'ID');

        $uniquePasienIds = daftar_tagihan::distinct()->pluck('ID_Pasien');

        foreach ($uniquePasienIds as $id_pasien) {
            $sum = daftar_tagihan::where('ID_Pasien', $id_pasien)
            ->where('Status', 'Belum lunas')
            ->sum('Harga');
            

            if ($sum > 0) {
            tagihan::updateOrCreate(
                ['ID_Pasien' => $id_pasien],
                ['Jumlah_Transaksi' => $sum]
            );
        }
        }

        return view('tagihan',
    [
        'pasien'=>$pasien,
    ]);
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'ID_Pasien' => 'required',
            'Tanggal_Transaksi',
            'Jumlah_Transaksi',
            'Status'
        ]);

        // Save the form data to the database
        $model = tagihan::create(
            [
            'ID_Pasien' => $request->input('ID_Pasien'),
            'Tanggal_Transaksi' => $request->input('Tanggal_Transaksi'),
            'Jumlah_Transaksi' => $request->input('Jumlah_Transaksi'),
            'Status'=> $request->input('Status'),
            ]
        );

        if (!$model) {
            \Log::info('Request data', ['attributes' => $request->all()]);
            \Log::error('Failed to save dokter', ['attributes' => $request->all()]);
        }
        return redirect('/tagihan');
    }
}
