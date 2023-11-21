<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;
use App\Models\pasien;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\Views\Traits\WithAlerts;
use App\Actions\DeletedokterAction;
use Illuminate\Database\QueryException;

class pasienTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = pasien::class;
    protected $primaryKey = 'ID';
    protected $paginate = 20;
    public $searchBy = ['ID','Nama','Alamat','Kontak_Darurat'];

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('ID'),
            Header::title('Nama Pasien')->sortBy('Nama'),
            Header::title('Tanggal Lahir')->sortBy('Tanggal_Lahir'),
            Header::title('Jenis Kelamin')->sortBy('Jenis_Kelamin'),
        'Alamat',
        'Kontak_Darurat'
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
            UI::editable($model, 'Nama'),
            $model->Tanggal_Lahir,
            $model->Jenis_Kelamin,
            UI::editable($model, 'Alamat'),
            UI::editable($model, 'Kontak_Darurat'),
        ];
    }
    use WithAlerts;
    
    public function update($model, $data)
    {

        try {
            // Your code that may cause a QueryException
            $model = pasien::where($model)->update($data);
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
