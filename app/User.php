<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;

class User extends Authenticatable
{
    public function uploadphoto()
    {
      return $this->hasMany('App\Model\ControlPanel\Uploadphoto')->orderBy('id','desc');
    }
    public function postlike()
    {
      return $this->belongsToMany('App\Model\ControlPanel\Post','user_posts');
    }
    public function getCreatedAtAttribute($value)
    {
       return Carbon::parse($value)->diffForHumans();
    }

    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'profile', 'name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
