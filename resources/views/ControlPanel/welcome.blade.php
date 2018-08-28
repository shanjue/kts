@extends('layouts/ControlpanelApp')

@section('content-header')
<section class="content-header">
  <h1>
    Welcome Page
    <small>Home page</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="{{url('/cpanel')}}"><i class="fa fa-dashboard"></i> Welcome Page</a></li>
  </ol>
</section>
@endsection
@section('content')

  <!-- Default box -->
  <div class="box">
    <div class="box-header with-border">
      <h3 class="text-center">Welcome Control Panel</h3>


    </div>
    <div class="box-body">
      <h4 class="text-center">You can manage, edit and update yours. Appreciate To all visitors.</h4>
      @if(Auth::guest())
      <h4 class="text-center alert alert-warning">But You didn't login. You can't control your post.</h4>
      <div class="text-center">
        <a href="{{url('/login')}}"  class="btn btn-primary" >Login</a>
        <a href="{{url('/register')}}"  class="btn btn-primary" >register</a>
      </div>

      @endif
    </div>
    <!-- /.box-body -->
    <div class="box-footer">
      <h5 class="text-center">Created By Shanjue Family</h5>
    </div>
    <!-- /.box-footer-->
  </div>
  <!-- /.box -->

@endsection
