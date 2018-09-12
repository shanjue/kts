@extends('layouts/HomeApp')
@section('style')
<!-- Custom styles for this template -->
<link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
<style>
.pagination
{
    display: flex;
    list-style: none;
}
.pagination li
{
    margin-right: 2px;
}
.pagination li a:hover, .pagination li span:hover
{
    background-color: gray;
}
.pagination li a, .pagination li span
{
      border:1px solid gray;
      border-radius: 5px;
      padding:5px 20px;
      background: lightblue;
}

</style>
@endsection

@section('content')
  <br>

  <div class="row clean-blog">
    <div class="col-md-2 mx-auto">
      <h2>Category</h2>

      <!-- left menu box တည္ရွိရာ -->
      <ul class="list-group">
        <li  class="list-group-item d-flex justify-content-between align-items-center"><a href="{{url('blog')}}">All Post</a></li>
        @foreach($categories as $category)

        <li class="list-group-item d-flex justify-content-between align-items-center">

          <a href="{{url('categoryfilter',$category->name)}}" @if($categorystatus==$category->name)class="btn-warning"@endif>{{$category->name}}</a>
          <span class="badge badge-primary badge-pill">{{ count($category->post) }}</span>
        </li>
        @endforeach
      </ul>

    </div>
    <div class="col-lg-8 col-md-10 mx-auto">
      @foreach($posts as $post)
      <div class="post-preview">
        <a href="{{ url('userpost/'. $post->id ) }}">
          <h2 class="post-title">
            {{ $post->whatabout }}
          </h2>

          <h3 class="post-subtitle">
            {!! Str::words($post->content, 10) !!}
          </h3>
        </a>
        <p class="post-meta">Posted by
          <a href="#">{{ $post->user->name }}</a>
          on {{$post->created_at->diffForHumans()}}
          Categories-@foreach($post->category as $cat)<a href="{{url('/categoryfilter',$cat->name)}}" @if($categorystatus==$cat->name)class="btn-warning"@endif>({{ $cat->name  }})</a>@endforeach
        </p>

        </div>
        <hr>
      @endforeach


      <!-- Pager -->

      <div class="">
        {{ $posts->links() }}
      </div>
      
    </div>
  </div>


<hr>



@endsection
