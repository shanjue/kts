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
        return view('home',[
          'homenav'=>'slash'
        ]);
    }
    public function blog()
    {
      $categories = Category::all();
      $posts = Post::where('publish',1)->with(['category'])->orderBy('id','desc')->paginate(10);
      return view('blog',[
        'posts'=>$posts,
        'categories'=>$categories,
        'categorystatus'=>'ShowAllPost',
        'homenav'=>'newposts'
      ]);
    }

    public function viewpost($id)
    {
      $post = Post::find($id);
      return view('post',[
        'post'=>$post,
        'categorystatus'=>'blog',
        'homenav'=>'mypost'
      ]);
    }
    public function categoryfilter(Category $category)
    {
      $categories = Category::all();
      $posts = $category->post()->orderBy('id','desc')->paginate(10);
      return view('blog',[
        'posts'=>$posts,
        'categories'=>$categories,
        'categorystatus'=>$category->name,
        'homenav'=>'newposts'
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
    public function gallery()
    {
      $users = User::all();
      return view('gallery',[
        'users'=>$users,
        'homenav'=>'gallery'
      ]);
    }
    public function moregallery($id)
    {
      $user = User::find($id);
      return view('moregallery',[
        'user'=>$user,
        'homenav'=>'moregallery'
      ]);
    }
}
