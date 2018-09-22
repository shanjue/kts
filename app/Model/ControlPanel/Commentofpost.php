<?php

namespace App\Model\ControlPanel;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Commentofpost extends Model
{
  public function getpost()
  {
    return $this->belongsToMany('App\Model\ControlPanel\Post','commentofpost_posts');
  }
  public function getCreatedAtAttribute($value)
  {
    return Carbon::parse($value)->diffForHumans();
  }
  public function user()
  {
    return $this->belongsTo('App\User');
  }
}
