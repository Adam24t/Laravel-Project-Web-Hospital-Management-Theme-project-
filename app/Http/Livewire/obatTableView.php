<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;
use App\Models\obat;
use LaravelViews\Facades\Header;
use LaravelViews\Facades\UI;
use LaravelViews\Views\Traits\WithAlerts;
use App\Actions\DeletedokterAction;
use Illuminate\Database\QueryException;

class obatTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = obat::class;
    protected $primaryKey = 'ID';
    protected $paginate = 20;
    public $searchBy = ['ID','Nama_Obat','Deskripsi_Obat'];

    /**
     * Sets the headers of the table as you want to be displayed
     *
     * @return array<string> Array of headers
     */
    public function headers(): array
    {
        return [
            Header::title('ID')->sortBy('ID'),
            Header::title('Nama Obat')->sortBy('Nama_Obat'),
            Header::title('Deskripsi Obat')->sortBy('Deskripsi_Obat'),
            Header::title('Harga')->sortBy('Harga')
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
            UI::editable($model, 'Nama_Obat'),
            UI::editable($model, 'Deskripsi_Obat'),
            UI::editable($model, 'Harga')
        ];
    }
    use WithAlerts;
    
    public function update($model, $data)
    {

        try {
            // Your code that may cause a QueryException
            $model = obat::where($model)->update($data);
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
