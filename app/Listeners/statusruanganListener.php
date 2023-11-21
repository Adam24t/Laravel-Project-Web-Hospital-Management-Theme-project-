<?php

namespace App\Listeners;

use App\Events\statusruanganEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\rawat_inap;
use App\Models\ruangan;

class statusruanganListener
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
    public function handle(statusruanganEvent $event): void
    {
        $roomIds = $event->roomId;

        foreach ($roomIds as $roomId) {

            $rowCount = rawat_inap::where('ID_Ruangan', $roomId)->count();
            $threshold = ruangan::where('ID', $roomId)->value('Kapasitas_Ruangan');

            if ($rowCount >= $threshold) {
                $rowsWithNotNullDate = rawat_inap::where('ID_Ruangan', $roomId)->whereNotNull('Tanggal_Keluar')->count();
                if ($rowCount-$rowsWithNotNullDate>=$threshold) {
                    ruangan::where('ID', $roomId)->update(['Status' => 'Penuh']);
                }
             else {
                ruangan::where('ID', $roomId)->update(['Status' => 'Tersedia']);
            }
    }
}
    }
}