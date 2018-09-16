@extends('layouts/HomeApp')

@section('style')
<link rel="stylesheet" href="{{ asset('plugins/select2/select2.min.css') }}">
<link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">

<link href="{{asset('Avilon/lib/magnific-popup/magnific-popup.css')}}" rel="stylesheet">
<!-- Main Stylesheet File -->
<link href="{{asset('Avilon/css/style.css')}}" rel="stylesheet">
<style media="screen">
  #gallery-Box
  {
      margin-top:5px;
  }
</style>
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

          <li style="color:red;list-style:square;" class="alert alert-danger"><div class="input-group"><a class="btn btn-primary" id="myCopyButton-{{$uploadphoto->id}}" data-dismiss="modal">Copy</a><input type="text" class="form-control" id="myCopyInput-{{$uploadphoto->id}}" value="{{$_ENV['APP_URL']}}/storage/{{Auth::user()->created_at->toDateString().Auth::user()->id}}/origin{{$uploadphoto->name}}"></div></li>
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
              <h4 class=" text-center"><b><i class="fas fa-newspaper"></i> Create Post</b></h4>
            </div>

            <div class="box-body">
              <!--Start whatabout content  တင္ျခင္း -->
              <form role="form" action="{{route('addpost')}}" method="post">
                {{csrf_field()}}
                <!-- Start Choose title photo -->
                <a  id="choose-title-photo-bottom" class="btn btn-info" style="text-decoration:none;" ><i class="fas fa-images"></i> Choose Title Photo</a>

                <div class="form-group row " id="choose-title-photo-box">

                    @foreach($user->uploadphoto as $uploadphoto)
                    <div class="col-xs-6 col-md-2 "  >
                      <input type="checkbox" name="titlephoto"   value="{{$_ENV['APP_URL']}}/storage/{{Auth::user()->created_at->toDateString()}}{{Auth::user()->id}}/{{$uploadphoto->name}}" style="margin-left:3.5em;">
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
                  <label for="whatabout"><i class="fas fa-pen-nib"></i> Title </label>
                  <textarea name="whatabout"  class="form-control">Just Two Lines</textarea>
                </div>

              <a class="btn btn-primary" id="show-gallery-buttom">Show Gallery Box</a>

              <div class="form-group row " id="gallery-box">
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


              <label for="content"><i class="fas fa-edit"></i> Edit and <i class="fas fa-pencil-alt"></i> Write Article </label>
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
<!-- <script src="{{  asset('ckeditor/ckeditor.js') }}"></script> -->
<script src="{{asset('Avilon/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('Avilon/lib/superfish/superfish.min.js')}}"></script>
<script src="{{asset('Avilon/lib/magnific-popup/magnific-popup.min.js')}}"></script>
<script src="{{asset('Avilon/js/main.js')}}"></script>
<script src="https://cdn.ckeditor.com/4.8.0/standard-all/ckeditor.js"></script>
<script>
	CKEDITOR.replace( 'editor1', {
		// Define the toolbar: http://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_toolbar
		// The standard preset from CDN which we used as a base provides more features than we need.
		// Also by default it comes with a 2-line toolbar. Here we put all buttons in a single row.
		toolbar: [
			{ name: 'clipboard', items: [ 'Undo', 'Redo' ] },
			{ name: 'styles', items: [ 'Styles', 'Format' ] },
			{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Strike', '-', 'RemoveFormat' ] },
			{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote' ] },
			{ name: 'links', items: [ 'Link', 'Unlink' ] },
			{ name: 'insert', items: [ 'Image', 'EmbedSemantic', 'Table' ] },
			{ name: 'tools', items: [ 'Maximize' ] },
			{ name: 'editing', items: [ 'Scayt' ] }
		],

		// Since we define all configuration options here, let's instruct CKEditor to not load config.js which it does by default.
		// One HTTP request less will result in a faster startup time.
		// For more information check http://docs.ckeditor.com/ckeditor4/docs/#!/api/CKEDITOR.config-cfg-customConfig
		customConfig: '',

		// Enabling extra plugins, available in the standard-all preset: http://ckeditor.com/presets-all
		extraPlugins: 'autoembed,embedsemantic,image2,uploadimage,uploadfile',

		/*********************** File management support ***********************/
		// In order to turn on support for file uploads, CKEditor has to be configured to use some server side
		// solution with file upload/management capabilities, like for example CKFinder.
		// For more information see http://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_ckfinder_integration

		// Uncomment and correct these lines after you setup your local CKFinder instance.
		// filebrowserBrowseUrl: 'http://example.com/ckfinder/ckfinder.html',
		// filebrowserUploadUrl: 'http://example.com/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
		/*********************** File management support ***********************/

		// Remove the default image plugin because image2, which offers captions for images, was enabled above.
		removePlugins: 'image',

		// Make the editing area bigger than default.
		height: 600,

		// An array of stylesheets to style the WYSIWYG area.
		// Note: it is recommended to keep your own styles in a separate file in order to make future updates painless.
		contentsCss: [ 'https://cdn.ckeditor.com/4.8.0/standard-all/contents.css', 'mystyles.css' ],

		// This is optional, but will let us define multiple different styles for multiple editors using the same CSS file.
		bodyClass: 'article-editor',

		// Reduce the list of block elements listed in the Format dropdown to the most commonly used.
		format_tags: 'p;h1;h2;h3;pre',

		// Simplify the Image and Link dialog windows. The "Advanced" tab is not needed in most cases.
		removeDialogTabs: 'image:advanced;link:advanced',

		// Define the list of styles which should be available in the Styles dropdown list.
		// If the "class" attribute is used to style an element, make sure to define the style for the class in "mystyles.css"
		// (and on your website so that it rendered in the same way).
		// Note: by default CKEditor looks for styles.js file. Defining stylesSet inline (as below) stops CKEditor from loading
		// that file, which means one HTTP request less (and a faster startup).
		// For more information see http://docs.ckeditor.com/ckeditor4/docs/#!/guide/dev_styles
		stylesSet: [
			/* Inline Styles */
			{ name: 'Marker',			element: 'span', attributes: { 'class': 'marker' } },
			{ name: 'Cited Work',		element: 'cite' },
			{ name: 'Inline Quotation',	element: 'q' },

			/* Object Styles */
			{
				name: 'Special Container',
				element: 'div',
				styles: {
					padding: '5px 10px',
					background: '#eee',
					border: '1px solid #ccc'
				}
			},
			{
				name: 'Compact table',
				element: 'table',
				attributes: {
					cellpadding: '5',
					cellspacing: '0',
					border: '1',
					bordercolor: '#ccc'
				},
				styles: {
					'border-collapse': 'collapse'
				}
			},
			{ name: 'Borderless Table',		element: 'table',	styles: { 'border-style': 'hidden', 'background-color': '#E6E6FA' } },
			{ name: 'Square Bulleted List',	element: 'ul',		styles: { 'list-style-type': 'square' } },

			/* Widget Styles */
			// We use this one to style the brownie picture.
			{ name: 'Illustration', type: 'widget', widget: 'image', attributes: { 'class': 'image-illustration' } },
			// Media embed
			{ name: '240p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-240p' } },
			{ name: '360p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-360p' } },
			{ name: '480p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-480p' } },
			{ name: '720p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-720p' } },
			{ name: '1080p', type: 'widget', widget: 'embedSemantic', attributes: { 'class': 'embed-1080p' } }
		]
	} );
</script>
<script>
  $(document).ready(function() {
    $(".select2").select2();

    // $(function () {
    //   // Replace the <textarea id="editor1"> with a CKEditor
    //   // instance, using default configuration.
    //   CKEDITOR.replace('editor1');
    // });

    $(function(){
      $('#choose-title-photo-box').hide();
      $('#gallery-box').hide();
    });

    $('#choose-title-photo-bottom').click(function(){
      $('#choose-title-photo-box').slideToggle('slow');
    });

    $('#show-gallery-buttom').click(function(){
      $('#gallery-box').slideToggle('slow');
    });

    $(document).on('click', 'input[name="titlephoto"]', function() {
      $('input[name="titlephoto"]').not(this).prop('checked', false);
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
