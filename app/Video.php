<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table  = 'videos';

    public function course()
    {
        return $this->belongsToMany(Course::class);
    }

}
