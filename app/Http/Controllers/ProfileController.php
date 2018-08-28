<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function yourprofile()
    {
      return view('ControlPanel/profile/yourprofile');
    }
    public function allprofile()
    {
      return view('ControlPanel/profile/allprofile');
    }
}
