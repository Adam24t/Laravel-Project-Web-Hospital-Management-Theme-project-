<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class br_chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $results = DB::table('rawat_inap')
            ->select(
                DB::raw('COUNT(Tanggal_Masuk) as tm_count_msk'),
                DB::raw('COUNT(Tanggal_Keluar) as tm_count_klr'),
                'Tanggal_Masuk as tm'
            )
            ->groupBy('tm')
            ->get();

        $labels = [];
        $data_msk = [];
        $data_klr = [];

        foreach ($results as $result) {
            $labels[] = $result->tm;
            $data_msk[] = $result->tm_count_msk;
            $data_klr[] = $result->tm_count_klr;
        }

        return $this->chart->barChart()
            ->setTitle('Jumlah Masuk dan Keluar Dalam Tanggal')
            ->setColors(['#FFC107', '#D32F2F'])
            ->addData('Masuk', $data_msk)
            ->addData('Keluar', $data_klr)
            ->setXAxis($labels);
    }
}
