<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function hasManyComments()
    {
    	return $this->hasMany('App\Comment', 'post_id','id');
    }
}
