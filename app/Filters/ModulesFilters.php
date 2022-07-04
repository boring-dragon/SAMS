<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class ModulesFilters extends QueryFilter
{



    /**
     * Filter all the stories to only show articles in trash
     *
     * @return Builder
     */
    public function trashed()
    {
       return $this->builder->allowed()->onlyTrashed();
    }


    /**
     * Search throught stories
     *
     * @param $search $search [explicite description]
     *
     * @return Builder
     */
    public function search($search)
    {
        return $this->builder->where('name', 'like', '%' . $search . '%')
        ->orWhere('module_code', 'like', '%' . $search . '%')
        ->orWhere('type', 'like', '%' . $search . '%');
    }
}
