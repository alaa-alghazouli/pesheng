<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['title','disc','img'];

    public function albums()
    {
        return $this->hasMany("App\Photo","album_id");
    }
}
