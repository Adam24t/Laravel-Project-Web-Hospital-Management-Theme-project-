<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\perawat;
use App\Models\spesialisasi_perawat;
use Carbon\Carbon;
use LaravelViews\Views\Traits\WithAlerts;

class perawatController extends Controller
{
    use WithAlerts;
    //
    public function index()
    {
        $perawat=perawat::class;
        $spesialisasi = spesialisasi_perawat::pluck('Bidang_Spesialisasi', 'ID');
        return view('perawat',
    [
        'perawat'=>$perawat,
        'spesialisasi'=>$spesialisasi
    ]);
    }
    public function store(Request $request)
    {
        // Validate the form data
        $request->validate([
            'ID' => 'required|max:15',
            'Nama_Perawat' => 'required|string|max:100',
            'Tanggal_Lahir' => 'required',
            'Jenis_Kelamin' => 'required',
            'Alamat' => 'required|string|max:250',
            'No_HP' => 'required',
            'ID_Spesialisasi' => 'required',
        ]);

        $tanggal_lahir = Carbon::parse($request->input('Tanggal_Lahir'))->format('Y-m-d');

        // Save the form data to the database
        $model = perawat::create(
            [
            'ID' => $request->input('ID'),
            'Nama_Perawat' => $request->input('Nama_Perawat'),
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
        return redirect('/perawat');
    }
}
