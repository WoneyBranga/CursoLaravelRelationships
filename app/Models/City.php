<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{

    function companies()
    {
        return $this->belongsToMany(Company::class,'company_city');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class,'commentable');
    }
}
