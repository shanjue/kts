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
  border:2px solid lightblue;
  border-radius: 10px;
}
.card-Footer:hover
{
      background: lightblue;
}
.orange
{
  color:orange;
}
.like-item
{
  width:250px;
  padding-left:30px;
  margin-left:20px;
}
</style>
{{csrf_field()}}
@endsection

@section('content')
<div class="modal fade bd-example-modal-sm" id="likemodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">

    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          Likes
        </div>
      </div>
      <div class="modal-body like-body row">

        <!-- <div class="alert alert-info row" style="width:250px;padding-left:30px;margin-left:20px;" >
          <div>
            <img src="{{asset("storage/userprofile/juejue.jpg")}}" alt="" class="rounded-circle " width="60px" height="60px" >
          </div>
          <div style="margin-left:20px;">
            juejue <br> 10 mins ago
          </div>
        </div> -->

      </div>

    </div>
  </div>
</div>

<div class="modal fade " id="commentmodal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
  <div class="modal-dialog ">

    <div class="modal-content">
      <div class="modal-header">
        <div class="modal-title">
          Comments
        </div>
      </div>
      <div class="modal-body comment-body ">

        <!-- <div class="alert alert-info row" style="width:250px;padding-left:30px;margin-left:20px;" >
          <div>
            <img src="{{asset("storage/userprofile/juejue.jpg")}}" alt="" class="rounded-circle " width="60px" height="60px" >
          </div>
          <div style="margin-left:20px;">
            juejue <br> 10 mins ago
          </div>
        </div> -->

      </div>

    </div>
  </div>
</div>

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

        <div class="col-lg-4 col-sm-6 portfolio-item" data-toggle="tooltip" data-html="true" title="<i class='fas fa-user-tie'></i> {{ $post->user->name }}  <br> <i class='fas fa-clock'></i> {{$post->created_at}}<br>
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

            <!-- Start like ေရတြက္ျခင္း အကြက္ျဖစ္သည္ -->
            <div class="">
              <small>
                <!--Start like ကို count လုပ္ထားသည္။ -->
                <a href="#likemodal" id="like-{{$post->id}}" data-toggle="modal" >
                  <?php $likecount = 0; ?>
                  @foreach($user_posts as $user_post)

                    @if($user_post->post_id == $post->id)
                    <?php $likecount ++; ?>
                    @endif
                  @endforeach



                  @if($likecount == 1)
                  <?php echo($likecount); ?>like
                  @endif

                  @if($likecount > 1)
                  <?php echo($likecount); ?>likes
                  @endif

                </a>
                <!--End like ကို count လုပ္ထားသည္။ -->

                <!--Start comment ကို count လုပ္ထားသည္။ -->
                <a href="#commentmodal" id="comment-{{$post->id}}" data-toggle="modal" >
                  <?php $commentcount = 0; ?>
                  @foreach($commentofposts as $commentofpost)
                  @if($commentofpost->post_id == $post->id)
                  <?php $commentcount ++; ?>
                  @endif
                  @endforeach



                  @if($commentcount == 1)
                  <?php echo($commentcount); ?>comment
                  @endif

                  @if($commentcount > 1)
                  <?php echo($commentcount); ?>comments
                  @endif

                </a>
                <!--End comment ကို count လုပ္ထားသည္။ -->
                  </small>
            </div>
            <!-- End like ေရတြက္ျခင္း အကြက္ျဖစ္သည္ -->

              <div class="text-center card-footer " style="height: 60px;">
                <div class="row">
                  <div class="">
                    @auth
                    <form style="display:none;" action="{{url('/postlike/'.$post->id)}}" id="form-like-{{$post->id}}" method="post">
                      {{csrf_field()}}
                      <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                      <input type="hidden" name="post_id" value="{{$post->id}}">
                    </form>

                    <a href="" onClick="event.preventDefault();document.getElementById('form-like-{{$post->id}}').submit();"><i class="fas fa-thumbs-up @auth @foreach($user_posts as $user_post) @if($user_post->post_id == $post->id && $user_post->user_id == Auth::user()->id) orange @endif @endforeach @endauth" style="font-size:2em;"></i>like</a>
                    @else
                    <a href="{{('/login')}}"><i class="fas fa-thumbs-up " style="font-size:2em;"></i>like</a>
                    @endauth



                  </div>

                  <div class="">
                    @Auth
                    <form action="{{ url('/commentofpost') }}" method="post">
                      {{csrf_field()}}
                      <div class="input-group">
                        <input type="hidden" name="post_id" value="{{$post->id}}">
                        <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                        <input name="comment" placeholder="Type Message ..." class="form-control" type="text">
                            <span class="input-group-btn">
                              <button type="submit" class="btn btn-danger btn-flat">Send</button>
                            </span>
                      </div>
                    </form>
                    @else
                    <div class="input-group">
                      <input type="text" class="form-control" >
                      <span class="input-group-btn">
                        <a  href="{{url('/login')}}" class="btn btn-danger btn-flat">Send</a>
                      </span>
                    </div>
                    @endauth
                  </div>


              </div>

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

@foreach($posts as $post)
<script>


  $('#like-{{$post->id}}').click(function(){
    // id ကို click function အျပင္ဘက္ မထားရပါ။
    var id = {{ $post->id }};
    $.post('/ajaxgetlikeofpost', { 'id' : id , '_token':$('input[name=_token]').val() }, function(data){
        console.log(data);


        $('.like-body').empty();
        for(var i = 0; i < data[0].length; i++){

          for (var b = 0; b < data[1].length; b++) {
            if (data[0][i]['id'] == data[1][b]['user_id'] && data[1][b]['post_id'] == data[2]['id']) {
              var cdate = data[1][b]['created_at'];

            }
          }

          $('.like-body').append(
            '<div class="alert alert-info row" style="width:250px;padding-left:30px;margin-left:20px;" >'
            +  '<div>'
            +    '<img src="{{asset("storage/userprofile")}} '
            +     '/'
            +     data[0][i]['profile']
            +    '" alt="" class="rounded-circle " width="60px" height="60px" >'
            +  '</div>'
            +  '<div style="margin-left:20px;">'
            +  data[0][i]['name']
            + '<br/>'
            +  cdate
            +  '</div>'
            +'</div>'
          );
        }



    });

  });
</script>
@endforeach

@foreach($posts as $post)
<script>

  $('#comment-{{$post->id}}').click(function(){
    // id ကို click function အျပင္ဘက္ မထားရပါ။
    var id = {{ $post->id }};
    $.post('/ajaxgetcommentofpost', { 'id' : id , '_token':$('input[name=_token]').val() }, function(data){
        console.log(data);


        $('.comment-body').empty();
        for(var i = 0; i < data[0].length; i++){



          for (var b = 0; b < data[1].length; b++) {
            if (data[0][i]['user_id'] == data[1][b]['id']) {
              var user = data[1][b]['name'];
              var profile = data[1][b]['profile'];
            }
          }

          $('.comment-body').append(
            '<div class="alert alert-info " style="padding-left:30px;margin-left:20px;" >'
            + '<div>'
            +  user
            + '-'
            + data[0][i]['created_at']
            +'</div>'
            + '<div class="row">'
            +  '<div class="col-md-2">'
            +    '<img src="{{asset("storage/userprofile")}}/'
            +     profile
            +    '" alt="" class="rounded-circle " width="60px" height="60px" ><br>'


            +  '</div>'
            +  '<div class="col-md-6 alert alert-danger" style="margin-left:10px;">'
            +   data[0][i]['comment']
            + '<br/>'

            +  '</div>'
            + '</div>'
            +'</div>'
          );
        }



    });

  });
</script>
@endforeach

@endsection
