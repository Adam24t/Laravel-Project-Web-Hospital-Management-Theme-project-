<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class Filterspesialisasidokter extends Filter
{
    /**
     * Modify the current query when the filter is used
     *
     * @param Builder $query Current query
     * @param $value Value selected by the user
     * @return Builder Query modified
     */
    public function apply(Builder $query, $value, $request): Builder
    {
        return $query->where('Bidang_Spesialisasi', $value);
    }

    /**
     * Defines the title and value for each option
     *
     * @return Array associative array with the title and values
     */
    public function options(): Array
    {
        return [
            'Spesialis Saraf'=>'Spesialis Saraf',
            'Spesialis Radiologi'=>'Spesialis Radiologi',
            'Spesialis Kedokteran Jiwa'=>'Spesialis Kedokteran Jiwa',
            'Spesialis Anestesi'=>'Spesialis Anestesi',
            'Psikolog'=>'Psikolog',
            'Dokter Umum'=>'Dokter Umum',
            'Dokter Gigi'=>'Dokter Gigi'
        ];
    }
}
