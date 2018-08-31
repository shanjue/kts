<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Model\ControlPanel\Category;
use App\Model\ControlPanel\Post;
use App\Model\ControlPanel\User;
use App\Model\ControlPanel\Uploadphoto;

class ControlPanelController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*Post  ဆိုင္ရာ*/
    public function viewpost($id)
    {
      $post = Post::find($id);
      return view('ControlPanel/post/viewpost',[
        'post'=>$post,
        'categorystatus'=>'blog'
      ]);
    }
    public function showallposts()
    {
      /*orderBy ထည့္ခ်င္ရင္ all function မထည့္ရပါ အလုိလိုယူပီးသားျဖစ္သည္*/
      /*with function ထဲမွာ array ပံုစံ ထည့္ေပးရမည္ category က တစ္ခုုတည္းမဟုတ္တဲ့ အတြက္ echo  လုပ္ခ်င္ရင္ foreach ပတ္ေပးရမည္ */
      $posts = Post::where('user_id',Auth::user()->id)->with(['category'])->orderBy('id','desc')->paginate(1);
      return view('ControlPanel/post/showallposts',[
        'posts'=>$posts
      ]);
    }
    public function addpost()
    {
      $categories = Category::all();
      $user = User::where('name',Auth::user()->name)->first();
      return view('ControlPanel/post/addpost',[
        'categories' => $categories,
        'user' => $user
      ]);
    }
    public function submitpost()
    {
      $this->validate(Request(),[
        'whatabout'=>'required',
        'content'=>'required',
      ]);
      $post = new Post();
      $post->whatabout = Request()->whatabout;
      $post->content = Request()->content;
      $post->publish = Request()->publish;
      $post->user_id = Auth::user()->id;
      $post->save();
      $post->category()->sync(Request()->categories);
      return redirect('/post/showallposts');
    }

  

    /*End Post ဆုိင္ရာ*/

    /*Category ဆိုင္ရာ*/
    public function cat()
    {
      $categories = Category::all();

      return view('ControlPanel/cat',[
        'categories' => $categories
      ]);
    }
    public function addcat()
    {
      $category = new Category();
      $category->name = request()->text;
      $category->save();
      return 'saved';
    }
    public function catdel()
    {
      $category = Category::find(request()->id);
      $category->delete();
      return 'deleted';
    }
    public function catupdate()
    {
      $category = Category::find(request()->id);
      $category->name = request()->text;
      $category->save();
      return 'updated';
    }
}
