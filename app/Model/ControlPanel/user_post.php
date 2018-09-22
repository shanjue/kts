<?php

namespace App\Model\ControlPanel;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class user_post extends Model
{
  public function getCreatedAtAttribute($value)
  {
    return Carbon::parse($value)->diffForHumans();
  }
}
