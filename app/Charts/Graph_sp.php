<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use Illuminate\Support\Facades\DB;


class Graph_sp
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\DonutChart
    {
        $SpChart = DB::table('spesialisasi_dokter')
            ->select('Bidang_Spesialisasi', DB::raw('COUNT(*) as SpecialistCount'))
            ->groupBy('Bidang_Spesialisasi')
            ->get();

        $labels = [];
        $dataCounts = [];

        foreach ($SpChart as $Spesialisasi) {
            $labels[] = $Spesialisasi->Bidang_Spesialisasi;
            $dataCounts[] = $Spesialisasi->SpecialistCount; // Corrected variable name
        }

        return $this->chart->donutChart()
            ->setTitle('Data Spesialisasi Dokter')
            ->setSubtitle('Jumlah spesialis ')
            ->addData($dataCounts)
            ->setLabels($labels);
    }
}