<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use App\Filters\QueryFilter;
use Illuminate\Database\Eloquent\Builder;

class Product extends Model
{
    use SoftDeletes;
    use Sluggable;

    protected $table = 'products';
    protected $guarded = [];

    public function sluggable(): array
    {
        return [
            'coffee_slug' => [
                'source' => 'coffee_title'
            ]
        ];
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeFilter(Builder $builder, QueryFilter $filter){
        return $filter->apply($builder);
    }
}
