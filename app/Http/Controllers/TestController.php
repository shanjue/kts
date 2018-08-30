<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\test;

class TestController extends Controller
{
    /*Start testimagecrop ဆိုင္ရာ*/
    public function testimagecrop()
    {
      return view('ControlPanel/test/testimagecrop');
    }
    public function testimagecroppost(Request $request)
    {
      $data = $request->image;
      list($type, $data) = explode(';', $data);

      list(, $data)      = explode(',', $data);


      $data = base64_decode($data);

      $image_name= time().'.png';

      $path = public_path() . "/upload/" . $image_name;


      file_put_contents($path, $data);


      return response()->json(['success'=>'done']);
    }
     /*End testimagecrop ဆိုင္ရာ*/

     /*Start testslimscroll ဆိုင္ရာ*/
    public function testslimscroll()
    {
      return view('ControlPanel/test/testslimscroll');
    }
    /*End testslimscroll ဆိုင္ရာ*/
    public function testjquerycrop()
    {
      return view('ControlPanel/test/test-jquery-cropper');
    }

    public function testjquerycroppost()
    {

    }
}
