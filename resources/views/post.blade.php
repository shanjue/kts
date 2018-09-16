@extends('layouts/HomeApp')

@section('style')
<!-- Custom styles for this template -->
<link href="{{asset('css/clean-blog.min.css')}}" rel="stylesheet">
@endsection


@section('content-for-viewpost-blade')
<!-- Page Header -->
<header class="masthead" style="background-image: url({{$post->titlephoto}})">
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
    </div>


  </div>
  <div class="alert alert-default text-center">
    <a href="{{url('blog')}}" class="btn btn-primary">Back</a>
    Category of @foreach($post->category as $cats) <a href="{{url('categoryfilter',$cats->name)}}" >({{$cats->name}}) </a> @endforeach
  </div>
</article>

<hr>
@endsection
