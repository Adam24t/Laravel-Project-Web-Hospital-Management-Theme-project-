<?php

namespace App\Observers;

use App\Models\rawat_inap;
use App\Models\daftar_tagihan;
use App\Models\ruangan;
use Carbon\Carbon;

class rawatinapObserver
{
    /**
     * Handle the rawat_inap "created" event.
     */
    public function created(rawat_inap $rawat_inap): void
    {
    }

    /**
     * Handle the rawat_inap "updated" event.
     */
    public function updated(rawat_inap $rawat_inap): void
    {
        if ($rawat_inap->isDirty('Tanggal_Keluar')) {
            $inDate = Carbon::parse($rawat_inap->Tanggal_Masuk);
        $outDate = Carbon::parse($rawat_inap->Tanggal_Keluar);
        $id = $rawat_inap->ID_Ruangan;
        $harga = ruangan::find($id)->Harga;
        $biaya = $inDate->diffInDays($outDate) * $harga;

        daftar_tagihan::create([
            'ID_Pasien' => $rawat_inap->ID_Pasien,
            'ID_Rawat_Inap'=> $rawat_inap->ID,
            'Harga'=> $biaya
        ]);
    }
}

    /**
     * Handle the rawat_inap "deleted" event.
     */
    public function deleted(rawat_inap $rawat_inap): void
    {
        //
    }

    /**
     * Handle the rawat_inap "restored" event.
     */
    public function restored(rawat_inap $rawat_inap): void
    {
        //
    }

    /**
     * Handle the rawat_inap "force deleted" event.
     */
    public function forceDeleted(rawat_inap $rawat_inap): void
    {
        //
    }
}
