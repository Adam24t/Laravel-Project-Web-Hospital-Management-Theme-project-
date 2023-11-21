<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;
use App\Models\diagnosa;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\Views\Traits\WithAlerts;
use App\Actions\DeletedokterAction;
use Illuminate\Database\QueryException;

class diagnosaTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = diagnosa::class;
    protected $primaryKey = 'ID';
    protected $paginate = 20;
    public $searchBy = ['ID','Nama_Diagnosa','Deskripsi_Diagnosa','Tindakan_Medis_Yang_Dibutuhkan'];

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('ID'),
            Header::title('Tanggal Diagnosa')->sortBy('Tanggal_Diagnosa'),
            Header::title('Nama Diagnosa')->sortBy('Nama_Diagnosa'),
            Header::title('Deskripsi Diagnosa')->sortBy('Deskripsi_Diagnosa'),
            Header::title('Tindakan Medis Yang Dibutuhkan')->sortBy('Tindakan_Medis_Yang_Dibutuhkan'),
            Header::title('ID Obat')->sortBy('ID_Obat'),
            Header::title('Jumlah Obat')->sortBy('Jumlah_Obat'),
    ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        return [
            $model->ID,
            $model->Tanggal_Diagnosa,
            UI::editable($model, 'Nama_Diagnosa'),
            UI::editable($model, 'Deskripsi_Diagnosa'),
            UI::editable($model,'Tindakan_Medis_Yang_Dibutuhkan'),
            $model->ID_Obat,
            $model->Jumlah_Obat,
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
