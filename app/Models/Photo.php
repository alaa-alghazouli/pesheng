<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = ['title','disc','album_id','img'];

    public function album()
    {
        return $this->belongsTo('App\Album', 'album_id');
    }
}
