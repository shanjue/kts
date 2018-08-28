<?php

namespace App\Model\ControlPanel;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
  public function uploadphoto()
  {
    return $this->hasMany('App\Model\ControlPanel\Uploadphoto');
  }
}
