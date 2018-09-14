@extends('layouts/HomeApp')

@section('style')

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
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link @if($categorystatus=='ShowAllPost') active @endif" href="{{url('blog')}}">All Post</a>
    </li>
    @foreach($categories as $category)
    <li class="nav-item">
      <a class="nav-link @if($categorystatus==$category->name) active  @endif" href="{{url('categoryfilter',$category->name)}}"  > {{$category->name}} <span class="badge badge-primary badge-pill">{{ count($category->post) }}</span></a>
    </li>
    @endforeach
  </ul>
  <br>


    <div class="row">
      @foreach($posts as $post)
      <div class="col-lg-4 col-sm-6 portfolio-item">
        <div class="card h-100">
          <img class="card-img-top" src="{{asset('image/homepage/700X400.jpg')}}" alt="">
          <div class="card-body">
            <h4 class="card-title">
              <a href="{{url('viewpost/'.$post->id)}}">{{ $post->whatabout }}</a>
            </h4>
            <p class="card-text">{!! Str::words($post->content, 10) !!}</p>
            <small>
            Posted by
              <a href="#">{{ $post->user->name }}</a>
              on {{$post->created_at->diffForHumans()}}<br>
              Categories-@foreach($post->category as $cat)({{ $cat->name  }})@endforeach</small>
          </div>
        </div>
      </div>
      @endforeach
    </div><!--end row-->




<hr>



@endsection
