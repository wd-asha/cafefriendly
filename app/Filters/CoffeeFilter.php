<?php

namespace App\Filters;

class CoffeeFilter extends QueryFilter
{

    public function amount($id = null){
        return $this->builder->when($id, function($query) use($id){
            $query->where('amount', $id);
        });
    }

    /*public function search_field($search_string = ''){
        return $this->builder
            ->where('title', 'LIKE', '%'.$search_string.'%')
            ->orWhere('description', 'LIKE', '%'.$search_string.'%');
    }*/
}
