@extends('layouts.app')
@section('style')
<link rel="stylesheet" href="{{asset('css/test/croppie.css')}}">
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="col-md-5 col-md-offset-4">
                    <div id="upload-demo" style=""></div>
                </div>
                <div class="col-md-5 col-md-offset-4" style="padding:10px;">
                  <label for="name">Choose Profile Image</label>
                  <input type="file" id="upload" >

                </div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" id="form-register" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                <input type="hidden" name="profile" id="profile">

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        </form>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button class="btn btn-sm btn-success upload-result" >Register</button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{asset('js/jquery.form.js')}}"></script>
<script src="{{asset('js/test/croppie.js')}}"></script>
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

              width: 150,

              height: 150,

              type: 'circle'

          },

          boundary: {

              width: 200,

              height: 200

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

      			url: 'https://localhost/kts/public/user/imagecropuser',

      			type: "POST",

      			data: {"image":resp,'_token':$('input[name=_token]').val() },

      			success: function (data) {

              $('#profile').val(data['success']);
              $('#form-register').submit();

      			}

      		});


      	});

      });

</script>
@endsection
