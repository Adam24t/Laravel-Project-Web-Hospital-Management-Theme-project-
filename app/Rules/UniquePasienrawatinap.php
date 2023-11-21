<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use App\Models\rawat_inap;
use Illuminate\Contracts\Validation\Rule;

class UniquePasienrawatinap implements Rule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function passes($attribute,$value)
    {

        // Check if there are any records with the same 'ID_Pasien' and where 'Tanggal_Keluar' is null
    $hasNullTanggalKeluar = rawat_inap::where('ID_Pasien', $value)
    ->whereNull('Tanggal_Keluar')
    ->exists();

// Check if there are more than one records with the same 'ID_Pasien'
$hasMultipleRecords = rawat_inap::where('ID_Pasien', $value)
    ->count() > 1;

// If there are both null and non-null Tanggal_Keluar records for the same ID_Pasien, return false
if ($hasNullTanggalKeluar && $hasMultipleRecords) {
    return false;
}

return true;

    }

    public function message()
    {
        return 'The :attribute must be unique when :Tanggal_Keluar is null.';
    }
    }

