<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use SoftDeletes;

    protected $table = 'wishlists';
    protected $guarded = [];
}
