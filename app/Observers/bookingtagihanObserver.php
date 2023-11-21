<?php

namespace App\Observers;

use App\Models\booking;
use App\Models\daftar_tagihan;

class bookingtagihanObserver
{
    /**
     * Handle the booking "created" event.
     */
    public function created(booking $booking): void
    {
        daftar_tagihan::create([
            'ID_Pasien' => $booking->ID_Pasien,
            'ID_Booking'=> $booking->ID,
            'Harga'=> $booking->Biaya
        ]);
    }

    /**
     * Handle the booking "updated" event.
     */
    public function updated(booking $booking): void
    {
        //
    }

    /**
     * Handle the booking "deleted" event.
     */
    public function deleted(booking $booking): void
    {
        //
    }

    /**
     * Handle the booking "restored" event.
     */
    public function restored(booking $booking): void
    {
        //
    }

    /**
     * Handle the booking "force deleted" event.
     */
    public function forceDeleted(booking $booking): void
    {
        //
    }
}
