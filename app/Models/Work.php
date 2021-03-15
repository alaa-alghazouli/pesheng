<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $fillable = ['title','disc','img'];

    public function works()
    {
        return $this->hasMany("App\subWork","work_id");
    }
}
