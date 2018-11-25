<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    
    public function comments() {
        return $this->belongsToMany('App\User', 'post_comments')->withPivot('comment');
    }

    public function user() {
        return $this->hasOne('App\User');
    }

    public function categories() {
        return $this->belongsToMany('App\Category', 'post_category_details');
    }

    public function transactions() {
        return $this->belongsToMany('App\Transaction', 'transaction_details');
    }

}
