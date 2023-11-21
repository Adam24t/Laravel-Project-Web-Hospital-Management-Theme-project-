<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;
use LaravelViews\Actions\Confirmable;

class StatusruanganAction extends Action
{
    public function getConfirmationMessage($item = null)
{
    return 'Apakah anda yakin ingin mengubah status ruangan?';
}
    use Confirmable;
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Ubah";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "edit-2";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        // Your code here
        if ($model->Status == 'Penuh') {
            $model->Status = 'Tersedia';
        } else {
            $model->Status = 'Penuh';
        }
        $model->save();
    }
}
