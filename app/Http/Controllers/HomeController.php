<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ControlPanel\Post;
use App\Model\ControlPanel\Category;
use Illuminate\Support\Facades\Storage;
use App\User;

class HomeController extends Controller
{


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
    public function allusers()
    {
      $users = User::all();
      return view('allusers',[
        'users'=>$users
      ]);
    }
}
