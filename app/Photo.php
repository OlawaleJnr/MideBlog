<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $path = '/storage/images/';

    protected $fillable = [
        'picture'
    ];

    public function getPictureAttribute($picture)
    {
        return $this->path . $picture;
    }

}

