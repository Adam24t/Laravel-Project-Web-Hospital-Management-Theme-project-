<?php

namespace App\Http\Controllers;

use App\Charts\Graph_sp as ChartsSpecChart;
use App\Charts\Transaksi_pie as trs_chart;
use App\Charts\br_chart as brs_chart;
use App\Charts\br_book_chart as brs_chart_2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 




class dashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(
        Request $request,
        ChartsSpecChart $SpChart,
        trs_chart $Count_transactions,
        brs_chart $results,
        brs_chart_2 $book_brs
        )
    {
        $numRoom = DB::table('ruangan')
            ->where('status', 'Tersedia')
            ->count();

        

        $patientCount = DB::table('pasien')->count();

        $numDoctor = DB::table('dokter')->count();

        // Total Current Rawat Inap
        $numRawat = DB::table('rawat_inap')->count();

        // Total unpaid transactions 
        $unpaid_transaction = DB::table('tagihan')
            ->where('STATUS', 'Belum Lunas')
            ->select(DB::raw('SUM(Jumlah_Transaksi) as unpaid_transaction'))
            ->first();

        // Total Paid Transactions
         $paidTransaction = DB::table('tagihan')
            ->where('STATUS', 'Lunas')
            ->select(DB::raw('SUM(Jumlah_Transaksi) as paid_transaction'))
            ->first();
        
        $timeline_data = DB::table('rawat_inap')
            ->select('ID', 'ID_Pasien', 'ID_Ruangan', 'Tanggal_Masuk', 'Tanggal_Keluar')
            ->get();
        
        $dischargedCount = DB::table('rawat_inap')
            ->whereNotNull('Tanggal_Keluar')
            ->count();
        
        $admitted = DB::table('rawat_inap')
            ->whereNull('Tanggal_Keluar')
            ->count();
        
        

            return view('dashboard', [
                // charts 
                'SpChart' => $SpChart->build(),
                'Count_transactions' => $Count_transactions->build(),
                'results' => $results -> build(),
                'book_brs' => $book_brs ->build(),

                //json file
                response()->json($timeline_data),
                
            
                // MySQL prompts
                'dischargedCount' => $dischargedCount,
                'admitted' => $admitted,
                'numRoom' => $numRoom,
                'patientCount' => $patientCount,
                'numDoctor' => $numDoctor,
                'numRawat' => $numRawat,
                'unpaid_transaction' => $unpaid_transaction->unpaid_transaction, // Access the property correctly
                'paidTransaction' => $paidTransaction->paid_transaction// Access the property correctly
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
