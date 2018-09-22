<?php

namespace App\Model\ControlPanel;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Post extends Model
{
    public function user()
    {
      /*ဒီpost ကို user table ထဲက ဘယ္သူက ပိုင္ဆုိင္သည္*/
      return $this->belongsTo('App\User');
    }

    public function category()
    {
      return $this->belongsToMany('App\Model\ControlPanel\Category','post_categories');
    }

    public function userlike()
    {
      return $this->belongsToMany('App\User','user_posts')->withTimestamps();
    }

    public function getcomment()
    {
      return $this->belongsToMany('App\Model\ControlPanel\Commentofpost','commentofpost_posts');
    }
    public function getCreatedAtAttribute($value)
    {
      return Carbon::parse($value)->diffForHumans();
    }

}
