<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;
use App\Models\daftar_tagihan;
use App\Models\pasien;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\Views\Traits\WithAlerts;
use App\Actions\DeletedokterAction;
use Illuminate\Database\QueryException;

class daftartagihanTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = daftar_tagihan::class;
    protected $primaryKey = 'ID';
    protected $paginate = 20;
    public $searchBy = ['ID','ID_Pasien'];
    /*
    protected function filters()
    {
        return [
            new Filterspesialisasiperawat,
        ];
    }
    */

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('ID'),
            Header::title('ID Pasien')->sortBy('ID_Pasien'),
            'Nama Pasien',
            Header::title('ID Rawat Inap')->sortBy('ID_Rawat_Inap '),
            Header::title('ID Booking')->sortBy('ID_Booking'),
        'Harga',
        'Status'
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
        return [
            $model->ID,
            $model->ID_Pasien,
            $pasien->Nama,
            $model->ID_Rawat_Inap,
            $model->ID_Booking,
            $model->Harga,
            $model->Status
        ];
    }
    use WithAlerts;
    
    public function update($model, $data)
    {

        try {
            // Your code that may cause a QueryException
            $model = daftar_tagihan::where($model)->update($data);
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
