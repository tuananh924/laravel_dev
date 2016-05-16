<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table  = 'courses';

    protected $fillable = ['title_course', 'alias_course', 'image_course'];

    public function videos()
    {
        return $this->belongsToMany(Video::class);
    }
}
