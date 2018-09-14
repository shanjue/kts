@extends('layouts/HomeApp')



@section('content')




@foreach($posts as $post)

<div class="row">
  <div class="col-lg-4 col-sm-6 portfolio-item">
    <div class="card h-100">
      <a href="#"><img class="card-img-top" src="{{asset('image/homepage/700X400.jpg')}}" alt=""></a>
      <div class="card-body">
        <h4 class="card-title">
          <a href="#">{!! Str::words($post->whatabout, 6,'...')  !!}</a>
        </h4>
        <p class="card-text">{!! Str::words($post->content, 20,'... ')  !!}<a href="{{asset('viewpost/'.$post->id)}}">Read more</a></p>
        <ul class="list-group">
          <li class="list-group-item">Posted By:<b> {{$post->user->name}}</b></li>
          <li class="list-group-item">Category:<b> @foreach($post->category as $categories) -{{$categories->name}}- @endforeach </b></li>
          <li class="list-group-item">Publish: @if($post->publish == 1)<span class="glyphicon glyphicon glyphicon-ok"></span>@else() <span class="glyphicon glyphicon glyphicon-remove"></span> @endif</li>
        </ul>
      </div>
    </div>
  </div>

    <!-- <div class="panel panel-primary">
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
    </div> -->

</div>



@endforeach
<div class="text-center">
  {{ $posts->links() }}
</div>
@endsection
