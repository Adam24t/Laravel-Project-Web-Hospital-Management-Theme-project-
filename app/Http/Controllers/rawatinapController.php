<?php

namespace App\Http\Controllers;

use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use App\Models\rawat_inap;
use App\Models\pasien;
use App\Models\ruangan;
use App\Rules\UniquePasienrawatinap;
use App\Events\statusruanganEvent;
use LaravelViews\Views\Traits\WithAlerts;
use Carbon\Carbon;

class rawatinapController extends Controller
{
    //
    public function index()
    {
        event(new statusruanganEvent());
        $pasien_id = pasien::pluck('Nama', 'ID');
        $ruangan_id = ruangan::pluck('Jenis_Ruangan', 'ID')->map(function ($item, $key) {
            $Status = ruangan::where('ID', $key)->pluck('Status')->first(); // Assuming there is a Status column in the ruangan table.
            return $item . ', ' . $Status;});
        return view('rawatinap',
    [
        'pasien_id'=>$pasien_id,
        'ruangan_id'=>$ruangan_id
    ]);
    }
    use WithAlerts;
    public function store(Request $request)
    {

        try {
        // Validate the form data
        $request->validate([
            'ID_Pasien' => ['required','max:15',new UniquePasienrawatinap],
            'ID_Ruangan' => 'required|max:15',
            'Tanggal_Masuk' => 'required',
            'Tanggal_Keluar',
        ]);
    } catch (QueryException $e) {
        return redirect('/rawat_inap')->with('error', 'There has been a mistake. Please try again.');
    }
    
        $ruangan = Ruangan::find($request->input('ID_Ruangan'));
        if ($ruangan && $ruangan->Status === 'Penuh') {
            session()->flash('error', 'The selected room is occupied.');
            return redirect('/rawat_inap');
        }

        $tanggalMasuk = Carbon::parse($request->input('Tanggal_Masuk'))->format('Y-m-d');
        $tanggalKeluar = $request->input('Tanggal_Keluar') ? Carbon::parse($request->input('Tanggal_Keluar'))->format('Y-m-d') : null;

        // Save the form data to the database
        $model = rawat_inap::create([
            'ID_Pasien' => $request->input('ID_Pasien'),
        'ID_Ruangan' => $request->input('ID_Ruangan'),
        'Tanggal_Masuk' => $tanggalMasuk,
        'Tanggal_Keluar' => $tanggalKeluar,
        ]);
        if (!$model) {
            \Log::info('Request data', ['attributes' => $request->all()]);
            \Log::error('Failed to save dokter', ['attributes' => $request->all()]);
        }
        return redirect('/rawat_inap');
    }
    
}
