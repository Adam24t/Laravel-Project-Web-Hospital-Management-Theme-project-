<?php

namespace App\Actions;

use App\Events\TagihanUpdated;
use LaravelViews\Actions\Action;
use LaravelViews\Views\View;
use Carbon\Carbon;

class lunasAction extends Action
{
    /**
     * Any title you want to be displayed
     * @var String
     * */
    public $title = "Lunas";

    /**
     * This should be a valid Feather icon string
     * @var String
     */
    public $icon = "credit-card";

    /**
     * Execute the action when the user clicked on the button
     *
     * @param $model Model object of the list where the user has clicked
     * @param $view Current view where the action was executed from
     */
    public function handle($model, View $view)
    {
        $timestamp = Carbon::now()->format('Y-m-d');
        if ($model->Tanggal_Transaksi == null) {
            $model->Tanggal_Transaksi = $timestamp;
        }
        if ($model->Status == 'Belum lunas') {
            $model->Status = 'Lunas';
        }
        $model->save();
        event(new TagihanUpdated($model));
    }
}
