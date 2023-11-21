<?php

namespace App\Actions;

use Illuminate\Database\QueryException;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;
use LaravelViews\Actions\Confirmable;

class DeleteDokterAction extends Action
{
    public function getConfirmationMessage($item = null)
{
    return 'Apakah anda yakin hapus user ini?';
}
    use Confirmable;
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Hapus data";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "trash-2";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        // Your code here
        try {
            // Your code that may cause a QueryException
            $model->delete();
            $this->success();
        } catch (QueryException $e) {
            // Handle the exception here
            // You can get details about the exception using $e->getMessage(), $e->getCode(), etc.
            $this->error("There has been a mistake. Please refresh the page.");
            }
    }
}
