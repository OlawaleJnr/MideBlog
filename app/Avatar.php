<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Avatar extends Model
{
    protected $fillable = [
        'filename'
    ];

    protected $path = '/storage/images/';

    public function getFilenameAttribute($photo)
    {
        return $this->path . $photo;
    }
}
