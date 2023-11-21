<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;

class br_book_chart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $book_brs = DB::table('booking')
            ->select(DB::raw('COUNT(Tanggal_Booking) as TB_C'), 'Tanggal_Booking as TB')
            ->groupBy('TB')
            ->get();

        $labels = [];
        $data = [];

        foreach ($book_brs as $book_brs) {
            $labels[] = $book_brs->TB;
            $data[] = $book_brs->TB_C;
        }

        return $this->chart->barChart()
            ->setTitle('Booking Counts by Tanggal_Booking')
            ->addData('TB_C', $data)
            ->setXAxis($labels);
    }
}
