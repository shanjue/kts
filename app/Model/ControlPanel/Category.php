<?php

namespace App\Model\ControlPanel;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public function post()
  {
    return $this->belongsToMany('App\Model\ControlPanel\Post','post_categories');
  }
  public function getRouteKeyName()
  {
    return 'name';
  }
}
