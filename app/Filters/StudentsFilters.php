<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;

class StudentsFilters extends QueryFilter
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
        return $this->builder
            ->where('first_name', 'like', '%' . $search . '%')
            ->orWhere('last_name', 'like', '%' . $search . '%')
            ->orWhere('phone_number', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%');
    }
}
