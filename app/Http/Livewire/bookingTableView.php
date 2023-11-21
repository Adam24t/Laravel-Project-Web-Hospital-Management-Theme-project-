<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;
use App\Models\diagnosa;
use App\Models\booking;
use App\Models\perawat;
use App\Models\pasien;
use App\Models\dokter;
use App\Models\jenis_booking;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\Views\Traits\WithAlerts;
use App\Actions\DeletedokterAction;
use Illuminate\Database\QueryException;

class bookingTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = booking::class;
    protected $primaryKey = 'ID';
    protected $paginate = 20;
    public $searchBy = ['Tanggal_Booking'];

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('ID'),
            Header::title('Tanggal Booking')->sortBy('Tanggal_Booking'),
            'Nama Pasien',
            'Nama Dokter',
            'Nama Perawat',
            'Diagnosa',
            'Jenis',
            Header::title('Biaya')->sortBy('Biaya'),
            'Deskripsi',
    ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        $pasien = pasien::where('ID', $model->ID_Pasien)->first();
        $dokter = dokter::where('ID', $model->ID_Dokter)->first();
        $perawat = perawat::where('ID', $model->ID_Perawat)->first();
        $diagnosa = diagnosa::where('ID', $model->ID_Diagnosa)->first();
        $jenisbooking = jenis_booking::where('ID', $model->ID_Jenis_Booking)->first();
        return [
            $model->ID,
            $model->Tanggal_Booking,
            $pasien->Nama,
            $dokter->Nama_Dokter,
            $perawat->Nama_Perawat,
            $diagnosa->Nama_Diagnosa,
            $jenisbooking->Jenis_Booking,
            $model->Biaya,
            $model->Deskripsi_Pemeriksaan
        ];
    }
    use WithAlerts;
    
    public function update($model, $data)
    {

        try {
            // Your code that may cause a QueryException
            $model = diagnosa::where($model)->update($data);
            $this->success();
        } catch (QueryException $e) {
            // Handle the exception here
            // You can get details about the exception using $e->getMessage(), $e->getCode(), etc.
            $this->error("There has been a mistake. Please refresh the page.");
            }
        }
    

    protected function actionsByRow()
    {
        return [
            new DeletedokterAction
        ];
    }
}
