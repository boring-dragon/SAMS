<?php
namespace App\Filters;

use App\Filters\QueryFilter;

trait Filterable
{
    /**
     * Apply all the query filters
     *
     * @param  mixed $query
     * @param  mixed $filters
     * @return void
     */
    public function scopeFilter($query, QueryFilter $filters)
    {
        return $filters->apply($query);
    }
}
