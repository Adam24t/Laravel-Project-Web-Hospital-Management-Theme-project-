<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class TransaksiDateChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $results = DB::table('rawat_inap')
            ->select(DB::raw('COUNT(Tanggal_Masuk) as tm_count'), 'Tanggal_Masuk as tm')
            ->groupBy('tm')
            ->get();

        $labels = [];
        $data = [];

        foreach ($results as $result) {
            $labels[] = $result->tm;
            $data[] = $result->tm_count;
        }

        return $this->chart->horizontalBarChart()
            ->setTitle('Jumlah Masuk Dalam Dalam Tanggal')
            ->setSubtitle('text')
            ->setColors(['#FFC107', '#D32F2F'])
            ->addData('Count', $data)
            ->setXAxis($labels);
    }
}
