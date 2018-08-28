<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ControlPanel\Post;
use App\Model\ControlPanel\Category;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function imagecropuser(Request $request)
    {
      $data = $request->image;
      list($type, $data) = explode(';', $data);

      list(, $data)      = explode(',', $data);


      $data = base64_decode($data);

      $image_name= time().'.jpg';
      //folder တည္ေဆာက္ေသာအခါ public/ မထည့္ရပါ။
      // Storage::makeDirectory("public".Auth::user()->name);
      $path = public_path() . "/storage/userprofile/" . $image_name;

      file_put_contents($path, $data);


      return response()->json(['success'=>$image_name]);
    }

    public function index()
    {
        return view('home');
    }
    public function blog()
    {
      $categories = Category::all();
      $posts = Post::where('publish',1)->with(['category'])->paginate(2);
      return view('blog',[
        'posts'=>$posts,
        'categories'=>$categories,
        'categorystatus'=>'blog'
      ]);
    }
    public function post($id)
    {
      $post = Post::find($id);
      return view('post',[
        'post'=>$post
      ]);
    }
    public function categoryfilter(Category $category)
    {
      $categories = Category::all();
      $posts = $category->post()->paginate(1);
      return view('blog',[
        'posts'=>$posts,
        'categories'=>$categories,
        'categorystatus'=>$category->name
      ]);
    }
    public function cpanel()
    {
      return view('ControlPanel/welcome');
    }
}
