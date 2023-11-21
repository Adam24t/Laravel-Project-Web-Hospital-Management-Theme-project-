<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;
use App\Models\perawat;
use App\Models\spesialisasi_perawat;
use LaravelViews\Facades\Header;
use App\Filters\Filterspesialisasiperawat;
use LaravelViews\Facades\UI;
use LaravelViews\Views\Traits\WithAlerts;
use App\Actions\DeletedokterAction;
use Illuminate\Database\QueryException;

class perawatTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = perawat::class;
    protected $primaryKey = 'ID';
    protected $paginate = 20;
    public $searchBy = ['ID','Nama_Perawat'];
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
            Header::title('NIP')->sortBy('ID'),
            Header::title('Nama')->sortBy('Nama_Perawat'),
            Header::title('Tanggal Lahir')->sortBy('Tanggal_Lahir'),
            Header::title('Jenis Kelamin')->sortBy('Jenis_Kelamin'),
        'Alamat',
        'No HP',
        Header::title('Bidang Spesialisasi')
    ];
    }

    /**
     * Sets the data to every cell of a single row
     *
     * @param $model Current model for each row
     */
    public function row($model): array
    {
        $spesialisasi = spesialisasi_perawat::where('ID', $model->ID_Spesialisasi)->first();
        return [
            $model->ID,
            UI::editable($model, 'Nama_Perawat'),
            $model->Tanggal_Lahir,
            $model->Jenis_Kelamin,
            UI::editable($model, 'Alamat'),
            UI::editable($model, 'No_HP'),
            $spesialisasi->Bidang_Spesialisasi
        ];
    }
    use WithAlerts;
    
    public function update($model, $data)
    {

        try {
            // Your code that may cause a QueryException
            $model = perawat::where($model)->update($data);
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
