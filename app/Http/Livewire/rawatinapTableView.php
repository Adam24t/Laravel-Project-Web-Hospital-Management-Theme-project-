<?php

namespace App\Http\Livewire;

use App\Actions\DeleterawatinapAction;
use LaravelViews\Views\TableView;
use App\Models\rawat_inap;
use App\Models\pasien;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\Views\Traits\WithAlerts;
use Illuminate\Database\QueryException;
use App\Actions\KeluarrawatinapAction;


class rawatinapTableView extends TableView
{
    
    /**
     * Sets a model class to get the initial data
     */
    protected $model = rawat_inap::class;
    protected $primaryKey = 'ID';
    protected $paginate = 20;
    public $searchBy = ['ID','ID_Pasien','ID_Ruangan','Tanggal_Masuk','Tanggal_Keluar'];

    protected function filters()
    {
        return [
        ];
    }


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
            Header::title('Nama Pasien'),
            Header::title('ID Ruangan')->sortBy('ID_Ruangan'),
            Header::title('Tanggal Masuk')->sortBy('Tanggal_Masuk'),
            Header::title('Tanggal Keluar')->sortBy('Tanggal Keluar')
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
            UI::editable($model, 'ID_Ruangan'),
            $model->Tanggal_Masuk,
            $model->Tanggal_Keluar
        ];
    }
    use WithAlerts;
    
    public function update($model, $data)
    {

        try {
            // Your code that may cause a QueryException
            $model = rawat_inap::where($model)->update($data);
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
            new KeluarrawatinapAction,
            new DeleterawatinapAction,
        ];
        
    }
}
