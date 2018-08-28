@extends('layouts/ControlPanelApp')

@section('content-header')
<section class="content-header">
  <h1>
    Show All Posts Control Page
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/post/showallposts')}}"><i class="fa fa-dashboard"></i>Show All Posts Control Page </a></li>
  </ol>
</section>
@endsection

@section('content')




@foreach($posts as $post)

<div class="row" style="margin-left:5px;margin-right:5px;">
    <div class="panel panel-primary">
      <div class="panel-heading">
        <h3 class="panel-title text-center"> {!! Str::words($post->whatabout, 6,'...')  !!}</h3>
      </div>
      <div class="panel-body">
          {!! Str::words($post->content, 20,'... ')  !!}<a href="{{asset('viewpost/'.$post->id)}}">Read more</a>
      </div>
      <div class="row">
        <!--ပံု အၾကိးထည့္ေသာအခါ ျဖစ္ေသာျပသနာကို div row ခံကာ ေျဖရွင္းထားသည္-->
      </div>
      <ul class="list-group">
        <li class="list-group-item">Posted By:<b> {{$post->user->name}}</b></li>
        <li class="list-group-item">Category:<b> @foreach($post->category as $categories) -{{$categories->name}}- @endforeach </b></li>
        <li class="list-group-item">Publish: @if($post->publish == 1)<span class="glyphicon glyphicon glyphicon-ok"></span>@else() <span class="glyphicon glyphicon glyphicon-remove"></span> @endif</li>
      </ul>
    </div>
</div>



@endforeach
<div class="text-center">
  {{ $posts->links() }}

</div>
@endsection
