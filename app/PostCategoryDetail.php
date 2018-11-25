<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostCategoryDetail extends Model
{
    
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function post() {
        return $this->belongsTo('App\Post');
    }

}
