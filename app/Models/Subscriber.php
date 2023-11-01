<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use SoftDeletes;

    protected $table = 'subscribers';
    protected $guarded = [];


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
