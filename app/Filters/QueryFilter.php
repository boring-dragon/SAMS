<?php

namespace App\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use ReflectionClass;

abstract class QueryFilter
{
    protected $request;

    protected $builder;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->filters() as $name => $value) {
            if (method_exists($this, $name)) {
                call_user_func_array([$this, $name], array_filter([$value]));
            }
        }

        return $this->builder;
    }

    public function filters()
    {
        return $this->request->all();
    }

    public function filterNames()
    {
        $class = new ReflectionClass($this);
        $methods = $class->getMethods();
        return collect($methods)->filter(function ($item) use ($class) {
            return $item->class == $class->name;
        })->pluck('name')->toArray();
    }
}
