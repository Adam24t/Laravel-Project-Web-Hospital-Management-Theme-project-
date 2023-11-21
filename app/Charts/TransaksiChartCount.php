<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class TransaksiChartCount
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $Count_transactions = DB::table('tagihan')
        ->select(
        DB::raw('SUM(CASE WHEN Status = "Lunas" THEN 1 ELSE 0 END) AS trs_lunas'),
        DB::raw('SUM(CASE WHEN Status = "Belum Lunas" THEN 1 ELSE 0 END) AS trs_not_lunas')
        )
        ->first();

        $dataCounts = [
            'Lunas' => $Count_transactions->trs_lunas,
            'Belum Lunas' => $Count_transactions->trs_not_lunas,
        ];

        $labels = array_keys($dataCounts);

         return $this->chart->donutChart()
        ->setTitle('Data Transaksi Tagihan')
        ->setSubtitle('Jumlah transaksi')
        ->addData(array_values($dataCounts))
        ->setLabels($labels);
        }
}
