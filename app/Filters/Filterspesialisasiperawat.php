<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use LaravelViews\Filters\Filter;

class Filterspesialisasiperawat extends Filter
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
            'Keperawatan Anak'=>'Keperawatan Anak',
            'Keperawatan Jiwa'=>'Keperawatan Jiwa',
            'Tidak Ada'=>'Tidak Ada'
        ];
    }
}
