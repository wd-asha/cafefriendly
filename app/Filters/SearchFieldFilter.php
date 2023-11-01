<?php

namespace App\Filters;

class SearchFieldFilter extends QueryFilter
{
    public function search_field($search_string = ''){
        return $this->builder
            ->where('post_title', 'LIKE', '%'.$search_string.'%')
            ->orWhere('post_content', 'LIKE', '%'.$search_string.'%');
    }
}
