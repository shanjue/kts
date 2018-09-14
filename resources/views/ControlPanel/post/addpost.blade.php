@extends('layouts/HomeApp')

@section('style')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">

<link href="{{asset('Avilon/lib/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
<!-- Main Stylesheet File -->
<link href="{{asset('Avilon/css/style.css')}}" rel="stylesheet">

@endsection

@section('content')

@foreach($user->uploadphoto as $uploadphoto)
<!--Start howto Modal -->
<div class="modal fade" id="myModal-{{$uploadphoto->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>


      <div class="modal-body">
        <ul>

          <li style="color:red;list-style:square;" class="alert alert-danger"><div class="input-group"><a class="btn btn-primary" id="myCopyButton-{{$uploadphoto->id}}" data-dismiss="modal">Copy</a><input type="text" class="form-control" id="myCopyInput-{{$uploadphoto->id}}" value="http://kutholshin-test.tech/storage/{{Auth::user()->created_at->toDateString().Auth::user()->id}}/origin{{$uploadphoto->name}}"></div></li>
          <br>

          <li style="color:red;list-style:square;" class="alert alert-danger"><img src="{{url('storage/howto/capture1.jpg')}}" ></li>
          <br>

          <li style="color:red;list-style:square;" ><img src="{{url('storage/howto/capture2.jpg')}}" ></li>

          <li style="color:blue;">Not Ok? <strong style="color:red;">DoubleClick</strong> on the photo and Edit. </li>

          <li style="color:blue;">Another way? Click <strong style="color:red;">Source</strong> and Delete all.</li>

        </ul>

      </div>

    </div>
  </div>
</div>
<!--End howto Model-->
@endforeach

          <br>
          <div class="box box-danger alert alert-success">
            <div class="box-header with-border">
              <h4 class=" text-center"><b>Create Post</b></h4>
            </div>

            <div class="box-body">
              <!--Start whatabout content  တင္ျခင္း -->
              <form role="form" action="{{route('addpost')}}" method="post">
                {{csrf_field()}}
                <!-- Start Choose title photo -->
                <a  id="choose-title-photo-bottom" class="btn btn-info" style="text-decoration:none;" ><i class="fas fa-images"></i> Choose Title Photo</a>

                <div class="form-group row " id="choose-title-photo-box">

                    @foreach($user->uploadphoto as $uploadphoto)
                    <div class="col-xs-6 col-md-2 " id="div-of-input" >
                      <input type="checkbox" name="title-photo"   value="{{$uploadphoto->name}}" style="margin-left:3.5em;">
                      <div class="gallery-item wow fadeInUp">
                        <a href='{{asset("storage/".Auth::user()->created_at->toDateString().Auth::user()->id."/origin"."$uploadphoto->name")}}' class="gallery-popup">
                          <img src='{{asset("storage/".Auth::user()->created_at->toDateString().Auth::user()->id."/$uploadphoto->name")}}' alt="" class="img-thumbnail rounded float-left" style="width:120px;">
                        </a>
                      </div>
                    </div>
                    @endforeach
                <!-- End Choose title photo -->
                </div>

                <div class="form-group">
                  <label for="whatabout">Title </label>
                  <textarea name="whatabout"  class="form-control">Just Two Lines</textarea>
                </div>

              <div class="form-group row">

                  @foreach($user->uploadphoto as $uploadphoto)

                  <div id="choosephoto-{{$uploadphoto->id}} " class="col-xs-6 col-md-2" data-toggle="tooltip" title="Click on photo">
                    <input type="hidden" id="image_id" value="{{$uploadphoto->id}}">
                    <a href="#myModal-{{$uploadphoto->id}}" data-toggle="modal">
                      <img src='{{asset("storage/".Auth::user()->created_at->toDateString().Auth::user()->id."/$uploadphoto->name")}}' alt=""  width="130px" height="130px" style="border-radius:5px;margin-bottom:5px;">
                    </a>
                  </div>


                  @endforeach

              </div>

            </div>


              <label for="content">Edit and Write Article </label>
              <textarea name="content" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>


            <div class="form-group" style="margin-top:18px;">
              <label>Select Category</label>
              <select name="categories[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" >
              @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
              </select>
            </div>

            <div class="checkbox" style="margin:0 5px;">
              <label>
                <input type="checkbox" name="publish" value="1"> Ready To Publish(Status)
              </label>
            </div>

              <button type="submit" class="btn btn-success upload-result"><i class="fas fa-check-circle" style="color:white;"></i> Create Now</button>

          </formwhite
        </div>



@endsection

@section('script')
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script src="{{  asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{asset('Avilon/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('Avilon/lib/superfish/superfish.min.js')}}"></script>
<script src="{{asset('Avilon/lib/magnific-popup/magnific-popup.min.js')}}"></script>
<script src="{{asset('Avilon/js/main.js')}}"></script>
<script>
  $(document).ready(function() {
    $(".select2").select2();

    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1');
    });

    $(function(){
      $('#choose-title-photo-box').hide();
    });

    $('#choose-title-photo-bottom').click(function(){
      $('#choose-title-photo-box').show('slow');
    });

    $(document).on('click', 'input[name="title-photo"]', function() {
      $('input[name="title-photo"]').not(this).prop('checked', false);
    });


  });


</script>

@foreach($user->uploadphoto as $uploadphoto)
<script>
$("#myCopyButton-{{$uploadphoto->id}}").click(function(){
  var copyText = $("#myCopyInput-{{$uploadphoto->id}}").select();
  document.execCommand("copy");
  alert('Ready To Put Photo in your Article');
});
</script>

@endforeach


@endsection
