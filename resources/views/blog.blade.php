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

.h-100:hover
{
  border:4px solid lightblue;
  border-radius: 10px;
}
.card-Footer:hover
{
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

        <div class="col-lg-4 col-sm-6 portfolio-item" data-toggle="tooltip" data-html="true" title="<i class='fas fa-user-tie'></i> {{ $post->user->name }}  <br> <i class='fas fa-clock'></i> {{$post->created_at->diffForHumans()}}<br>
                        @foreach($post->category as $cat)({{ $cat->name  }})@endforeach">
          <div class="card h-100">
            <a href="{{url('viewpost/'.$post->id)}}">
              <img class="card-img-top" src="{{$post->titlephoto }}" height="210px" alt="">
            </a>
            <div class="card-body">
              <h4 class="card-title">
                <a href="{{url('viewpost/'.$post->id)}}">{{ $post->whatabout }}</a>
              </h4>
              <!-- <p class="card-text">{!! Str::words($post->content, 20) !!}<a href="{{url('viewpost/'.$post->id)}}">Read More</a></p> -->


            </div>

              <div class="text-center card-footer">
                <a href="{{url('/viewpost/'.$post->id)}}"><i class="fas fa-eye" style="font-size:2em;"></i>view</a>
                
              </div>

          </div>
      </div>

      @endforeach
    </div><!--end row-->




<hr>



@endsection
@section('script')
<script>
$(document).ready(function(){
  // paragraph ထဲက ပံုကို display none လုပ္ထားသည္
  $(function(){
    $('.card-body img').attr('style','display:none');
  });

  $(function () {
  $('[data-toggle="tooltip"]').tooltip();
  });

});
</script>
@endsection
