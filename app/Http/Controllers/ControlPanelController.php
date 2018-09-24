<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Model\ControlPanel\Category;
use App\Model\ControlPanel\Post;
use App\Model\ControlPanel\Uploadphoto;
use App\User;
use Image;

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
    public function showallposts()
    {
      /*orderBy ထည့္ခ်င္ရင္ all function မထည့္ရပါ အလုိလိုယူပီးသားျဖစ္သည္*/
      /*with function ထဲမွာ array ပံုစံ ထည့္ေပးရမည္ category က တစ္ခုုတည္းမဟုတ္တဲ့ အတြက္ echo  လုပ္ခ်င္ရင္ foreach ပတ္ေပးရမည္ */
      $posts = Post::where('user_id',Auth::user()->id)->with(['category'])->orderBy('id','desc')->paginate(5);
      return view('ControlPanel/post/showallposts',[
        'posts'=>$posts
      ]);
    }
    public function mypost($id)
    {
      $posts =Post::where('user_id',$id)->with(['category'])->orderBy('id','desc')->paginate(20);
      return view('mypost',[
        'posts'=>$posts,
        'homenav'=>'mypost'
      ]);
    }
    public function addpost()
    {
      $categories = Category::all();
      $user = User::where('name',Auth::user()->name)->first();
      return view('ControlPanel/post/addpost',[
        'categories' => $categories,
        'user' => $user,
        'homenav'=>'createpost'
      ]);
    }
    public function submitpost()
    {
      $this->validate(Request(),[
        'titlephoto'=>'required',
        'whatabout'=>'required',
        'content'=>'required',
      ]);
      $post = new Post();
      $post->titlephoto = Request()->titlephoto;
      $post->whatabout = Request()->whatabout;
      $post->content = Request()->content;
      $post->publish = Request()->publish;
      $post->user_id = Auth::user()->id;
      $post->save();
      $post->category()->sync(Request()->categories);
      return redirect('/blog');
    }
    public function submiteditpost($id)
    {
      $this->validate(Request(),[
        'titlephoto'=>'required',
        'whatabout'=>'required',
        'content'=>'required',
      ]);
      $post = Post::find($id);
      $post->titlephoto = Request()->titlephoto;
      $post->whatabout = Request()->whatabout;
      $post->content = Request()->content;
      $post->publish = Request()->publish;
      $post->user_id = Auth::user()->id;
      $post->save();
      $post->category()->sync(Request()->categories);
      return redirect('/mypost'.'/'.Auth::user()->id);

    }
    public function editpost($id)
    {
      $post = Post::where('id',$id)->with(['category'])->first();

      $user  = User::where('name',Auth::user()->name)->first();
      $categories =Category::all();
      return view('editpost',[
        'post'=>$post,
        'user'=>$user,
        'categories'=>$categories,
        'homenav'=>'mypost'
      ]);
    }


    /*End Post ဆုိင္ရာ*/

    /*gallery ဆိုင္ရာ*/
    public function yourgallery($id)
    {
      $user = User::find($id);
      return view('ControlPanel/yourgallery/yourgallery',[
        'user'=>$user,
        'homenav'=>'mygallery'
      ]);
    }
    public function yourgallerysubmit($id)
    {
      $this->validate(Request(),[
        'image'=>'required|image|max:2048|mimes:jpeg,png,jpg'
      ]);
      $foldername = Auth::user()->id;
      Storage::makeDirectory("public/$foldername");

      $imagename = time() . '.jpg';
      Image::make(Request()->image)->save("storage/$foldername/"."origin"."$imagename")->fit('300','300')->save("storage/$foldername/$imagename");

      $uploadphoto = new Uploadphoto();
      $uploadphoto->name = $imagename;
      $uploadphoto->user_id = Auth::user()->id;
      $uploadphoto->save();

      return back()->with('message','Successful Upload Image');

    }
    public function editgallery($id)
    {
      $user = User::find($id);
      return view('ControlPanel/yourgallery/editgallery',[
        'user'=>$user,
        'homenav'=>'mygallery'
      ]);
    }
    public function updategallery()
    {

      if (Request()->photoid) {
        $uploadphoto = Uploadphoto::find(Request()->photoid);
        $uploadphoto->place =Request()->place;
        $uploadphoto->note = Request()->note;
        $uploadphoto->save();
        return back()->with('message','Update Successful Place = ( '.Request()->place.' ) And '.'Note = ( ' .Request()->note .' ).');
      }
      if (Request()->image) {
        $this->validate(Request(),[
          'image'=>'required|image|max:2048|mimes:jpeg,png,jpg'
        ]);
        $foldername = Auth::user()->created_at->toDateString() . Auth::user()->id;
        Storage::makeDirectory("public/$foldername");

        $imagename = time() . '.jpg';
        Image::make(Request()->image)->save("storage/$foldername/"."origin"."$imagename")->fit('300','300')->save("storage/$foldername/$imagename");

        $uploadphoto = new Uploadphoto();
        $uploadphoto->name = $imagename;
        $uploadphoto->user_id = Auth::user()->id;
        $uploadphoto->save();
        return back()->with('message','successful Upload Image');
      }

    }
    public function delgallery($id)
    {
      Uploadphoto::find($id)->delete();
      return back()->with('message','Delete Image Successful');
    }
    /*end gallery ဆိုင္ရာ*/

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
