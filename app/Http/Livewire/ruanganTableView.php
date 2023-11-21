<?php

namespace App\Http\Livewire;

use LaravelViews\Views\TableView;
use App\Models\ruangan;
use LaravelViews\Facades\Header;
use App\Filters\Filterjenisruangan;
use App\Filters\Filterstatusruangan;
use LaravelViews\Facades\UI;
use LaravelViews\Views\Traits\WithAlerts;
use App\Actions\DeletedokterAction;
use App\Actions\StatusruanganAction;
use Illuminate\Database\QueryException;

class ruanganTableView extends TableView
{
    /**
     * Sets a model class to get the initial data
     */
    protected $model = ruangan::class;
    protected $primaryKey = 'ID';
    protected $paginate = 20;
    public $searchBy = ['ID','Jenis_Ruangan','Kapasitas_Ruangan','Status'];

    protected function filters()
    {
        return [
            new Filterjenisruangan,
            new Filterstatusruangan
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
            Header::title('ID Ruangan')->sortBy('ID'),
            Header::title('Jenis Ruangan')->sortBy('Jenis_Ruangan'),
            Header::title('Kapasitas')->sortBy('Kapasitas_Ruangan'),
            Header::title('Status')->sortBy('Status'),
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
        $status=($model->Status == 'Penuh')?UI::badge($model->Status, 'danger'):UI::badge($model->Status, 'success');
        return [
            $model->ID,
            $model->Jenis_Ruangan,
            UI::editable($model, 'Kapasitas_Ruangan'),
            $status,
            UI::editable($model, 'Harga'),
        ];
    }

    use WithAlerts;
    
    public function update($model, $data)
    {

        try {
            // Your code that may cause a QueryException
            $model = ruangan::where($model)->update($data);
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
            new StatusruanganAction,
            new DeletedokterAction,
        ];
    }
}
