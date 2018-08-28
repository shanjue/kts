@extends('layouts/BlogApp')
@section('back')
  <a class="navbar-brand" href="{{url('blog')}}">Back</a>
@endsection
@section('content')
<!-- Page Header -->
<header class="masthead" style="background-image: url('https://localhost/kts/public/image/cleanblog/post-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-heading">
          <h1>{{ $post->whatabout }}</h1>
          <!-- <h2 class="subheading">Problems look mighty small from 150 miles up</h2> -->
          <span class="meta">Posted by <a href="#"> {{$post->user->name}}</a>

            on {{$post->created_at->diffForHumans()}}</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Post Content -->
<article>
  <div class="row">

    <div class="col-lg-8 col-md-10 mx-auto">
      {!! htmlspecialchars_decode($post->content) !!}
      <div class="alert alert-default text-center">
        <a href="{{url('blog')}}" class="btn btn-primary">Back</a>
        Category of @foreach($post->category as $cats) <a href="{{url('categoryfilter',$cats->name)}}" >({{$cats->name}}) </a> @endforeach
      </div>
    </div>
  </div>
</article>

<hr>
@endsection
