<?php

namespace App\Model\ControlPanel;

use Illuminate\Database\Eloquent\Model;

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
}
