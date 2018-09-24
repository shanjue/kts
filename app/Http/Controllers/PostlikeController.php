<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\ControlPanel\user_post;
use App\Model\ControlPanel\Post;
use App\User;
use App\Model\ControlPanel\commentofpost;

class PostlikeController extends Controller
{

  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth',['except'=>['ajaxgetlikeofpost','ajaxgetcommentofpost']]);
  }

  public function commentofpost()
  {

    $comment = new commentofpost();
    $comment->user_id =Request()->user_id;
    $comment->comment =Request()->comment;
    $comment->save();
    $comment->getpost()->sync(Request()->post_id);
      return back();
  }

  public function ajaxgetlikeofpost()
  {

    $post = Post::where('id',Request()->id)->with('userlike')->first();
    $users = $post->userlike;
    $user_posts = user_post::all();
    return [$users, $user_posts, $post];
  }

  public function ajaxgetcommentofpost()
  {

    $post = Post::where('id',Request()->id)->with('getcomment')->first();
    $comments = $post->getcomment;
    $users = User::all();
    return [$comments, $users];
  }

    public function postlike($id)
    {
      // check လုပ္ရာတြင္ first() ပါမွ ရမည္
      $check = user_post::where('post_id',Request()->post_id)->where('user_id',Request()->user_id)->first();
      if ($check) {
        $delete = user_post::where('post_id',Request()->post_id)->where('user_id',Request()->user_id);
        $delete->delete();
        return back();
      } else {
        $user_post = new user_post();
        $user_post->user_id = Request()->user_id;
        $user_post->post_id = Request()->post_id;
        $user_post->save();
        return back();
      }





    }
}
