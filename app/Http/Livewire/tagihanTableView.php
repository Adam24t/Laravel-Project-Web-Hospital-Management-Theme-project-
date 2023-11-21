<?php

namespace App\Http\Livewire;

use App\Actions\DeleteDokterAction;
use App\Actions\lunasAction;
use App\Models\pasien;
use App\Models\tagihan;
use Illuminate\Database\QueryException;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\Views\TableView;
use LaravelViews\Views\Traits\WithAlerts;

class tagihanTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = tagihan::class;
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
            Header::title('Tanggal_Transaksi')->sortBy('Tanggal_Transaksi'),
            Header::title('Jumlah_Transaksi')->sortBy('Jumlah_Transaksi'),
Header::title('Status')->sortBy('Status'),
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
        $status=($model->Status == 'Belum lunas')?UI::badge($model->Status, 'danger'):UI::badge($model->Status, 'success');
        return [
            $model->ID,
            $model->ID_Pasien,
            $pasien->Nama,
            $model->Tanggal_Transaksi,
            $model->Jumlah_Transaksi,
            $status
        ];
    }
    use WithAlerts;
    
    public function update($model, $data)
    {

        try {
            // Your code that may cause a QueryException
            $model = tagihan::where($model)->update($data);
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
            new lunasAction,
            new DeleteDokterAction
        ];
    }
}
