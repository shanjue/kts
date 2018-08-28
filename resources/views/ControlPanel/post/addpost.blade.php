@extends('layouts/ControlPanelApp')

@section('style')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{asset('css/test/croppie.css')}}">
<style >
  .headbox
  {
    margin:20px;
    padding:5px;
    height:200px;
    background:lightgray;
  }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('content')


          <div class="box box-primary">
            <div class="box-header with-border">
              <h4 class=" text-center"><b>Write a Post</b></h4>
            </div>
            <div class="row">
              <!--Start Photo Upload တင္ျခင္း -->
              <div class="col-md-4 col-sm-6 col-xs-10">
                <div class="box box-primary headbox" >

                </div>
              </div>
              <!--End Photo Upload တင္ျခင္း -->
              <div class="col-md-7 col-sm-12 col-xs-10 ">
                <div class="box box-primary headbox" >

                </div>
              </div>

            </div>



          </div>
            <!-- /.box-header -->

            <div class="box box-success">
              <div class="box-body">
                <!--Start whatabout content  တင္ျခင္း -->
                <form role="form" action="{{route('addpost')}}" method="post">
                  {{csrf_field()}}
                  <div class="form-group">
                    <label for="whatabout">What about?</label>
                    <textarea name="whatabout"  class="form-control">Just Two Lines</textarea>
                  </div>
              </div>
            </div>



                <div class="box box-success">
                  <div class="box-header with-border">
                    <h3 class="box-title">Gallery Box</h3>&nbsp;&nbsp;<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target=".bs-imagecrop-modal-lg">Upload and Crop Image </button>
                    <!--Start Image Crop modal -->
                    <div class="modal fade bs-imagecrop-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                      <div class="modal-dialog " style="width:1200px;"  role="document">
                        <div class="modal-content">
                          <div style="padding:5px;margin-left:100px;">
                            <strong class="pull-left">Select Image: &nbsp; &nbsp; &nbsp; &nbsp;</strong><input type="file" class=" pull-left"  id="upload"><button class="btn btn-sm btn-success upload-result"  data-dismiss="modal">Upload Image</button>&nbsp;&nbsp;&nbsp;<button class="btn btn-sm btn-danger"  data-dismiss="modal">Close</button>
                          </div>
                          <div class="modal-body" style="padding:0px;">

                              <div class="row">
                        				<div id="upload-demo" style=""></div>

                        	  	</div>


                          </div>
                        </div>
                      </div>
                    </div>
                  <!--End Image Crop modal -->
                    <div class="box-tools pull-right">
                      <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i></button>
                      <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fa fa-times"></i></button>
                    </div>
                  </div>
                  <div class="box-body" style="display: block;">
                    <div class="form-group">

                      <div id="refreshofimage" class="row ">
                        @foreach($user->uploadphoto as $uploadphoto)

                        <div id="choosephoto-{{$uploadphoto->id}}" class="col-xs-6 col-md-2" data-toggle="tooltip" title="Click on photo">
                          <a href="{{url('imagecroppostdel/'.$uploadphoto->id)}}" class="pull-right"><i class="fa fa-times"></i></a>
                          <input type="hidden" id="image_id" value="{{$uploadphoto->id}}">
                          <a href="#myModal-{{$uploadphoto->id}}" data-toggle="modal" class="thumbnail" >
                            <img src='{{asset("storage/".Auth::user()->name."/$uploadphoto->name")}}' alt=""  width="130px" height="100px" style="border-radius:5px;">
                          </a>
                        </div>
                        <!--Start howto Modal -->
                        <div class="modal fade" id="myModal-{{$uploadphoto->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" style="color:red;">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">To Add Photo</h4>
                              </div>
                              <div class="modal-body">
                                <ul>

                                  <li style="color:red;list-style:square;"><div class="input-group"><span class="input-group-addon">Copy</span><input type="text" class="form-control" value="https://localhost/kts/public/storage/{{Auth::user()->name}}/{{$uploadphoto->name}}"></div></li>
                                  <br>

                                  <li style="color:red;list-style:square;"><img src="{{url('storage/howto/capture1.jpg')}}" ></li>
                                  <br>

                                  <li style="color:red;list-style:square;"><img src="{{url('storage/howto/capture2.jpg')}}" ></li>

                                  <li style="color:blue;">Not Ok? <strong style="color:red;">DoubleClick</strong> on the photo and Edit. </li>

                                  <li style="color:blue;">Another way? Click <strong style="color:red;">Source</strong> and Delete all.</li>

                                </ul>

                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                              </div>
                            </div>
                          </div>
                        </div>
                        <!--End howto Model-->
                        @endforeach
                      </div>
                    </div>

                  </div>
                  <!-- /.box-body -->

                </div>

                <div class="box-body pad box box-primary">
                  <label for="content">Content</label>
                  <textarea name="content" style="width: 100%; height: 500px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" id="editor1"></textarea>
                </div>

                <div class="form-group" style="margin-top:18px;">
                  <label>Select Category</label>
                  <select name="categories[]" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Select a State" style="width: 100%;" tabindex="-1" aria-hidden="true" >
                  @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
                  </select>
                </div>

                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="publish" value="1"> Ready To Publish(Status)
                  </label>
                </div>


              <div class="box-footer">
                <button type="submit" class="btn btn-primary upload-result">Submit</button>
              </div>
            </form>
            <!--End whatabout content  တင္ျခင္း -->
          </div>
          <!-- /.box -->



@endsection

@section('script')


<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
<script src="{{  asset('ckeditor/ckeditor.js') }}"></script>
<script src="{{asset('js/test/croppie.js')}}"></script>

<script>
  $(document).ready(function() {
    $(".select2").select2();

    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('editor1');
    });
  });
</script>

<!--Start image croppie အစ-->
<script>
      $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
      });

      $uploadCrop = $('#upload-demo').croppie({

          enableExif: true,

          viewport: {

              width: 900,

              height: 500,

              type: 'square'

          },

          boundary: {

              width: 1000,

              height: 600

          }

      });
      $('#upload').on('change', function () {

      	var reader = new FileReader();

          reader.onload = function (e) {

          	$uploadCrop.croppie('bind', {

          		url: e.target.result

          	}).then(function(){

          		console.log('jQuery bind complete');

          	});

          }

          reader.readAsDataURL(this.files[0]);

      });


      $('.upload-result').on('click', function (ev) {

      	$uploadCrop.croppie('result', {

      		type: 'canvas',

      		size: '100px'

      	}).then(function (resp) {

      		$.ajax({

      			url: 'imagecroppost',

      			type: "POST",

      			data: {"image":resp},

      			success: function (data) {

      				$('#refreshofimage').load(location.href + ' #refreshofimage');

      			}

      		});


      	});

      });

</script>
@endsection
