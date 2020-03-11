<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dislike extends Model
{
    public function post(){
        return $this->belongsTo('App\Post');
    }
}
