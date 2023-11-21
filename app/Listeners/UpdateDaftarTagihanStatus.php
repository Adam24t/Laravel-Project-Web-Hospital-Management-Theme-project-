<?php

namespace App\Listeners;

use App\Events\TagihanUpdated;
use App\Models\daftar_tagihan;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateDaftarTagihanStatus
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TagihanUpdated $event): void
    {
        $tagihan = $event->tagihan;
        $id_pasien = $tagihan->ID_Pasien;

        // Update the status in daftar_tagihan
        daftar_tagihan::where('ID_Pasien', $id_pasien)
            ->update(['Status' => 'Lunas']);
    }
}
