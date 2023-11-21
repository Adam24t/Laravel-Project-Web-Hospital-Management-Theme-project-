<?php

namespace App\Actions;

use LaravelViews\Actions\Action;
use LaravelViews\Views\View;
use Carbon\Carbon;

class KeluarrawatinapAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Pasien keluar";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "log-out";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $timestamp = Carbon::now()->format('Y-m-d');
        if ($model->Tanggal_Keluar == null) {
            $model->Tanggal_Keluar = $timestamp;
        }
        $model->save();
    }
}
