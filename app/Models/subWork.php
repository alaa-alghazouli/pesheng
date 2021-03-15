<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class subWork extends Model
{
    protected $fillable = ['title','disc','work_id','img','vid'];

    public function work()
    {
        return $this->belongsTo('App\Work', 'work_id');
    }
}
