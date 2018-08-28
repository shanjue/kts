@extends('layouts/ControlPanelApp')
@section('style')
@endsection

@section('content')
<section class="content-header">
  <h1>
    User Profile
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">User profile</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">
    <div class="col-md-3">
      <!-- Profile Image -->
      <div class="box box-primary">
        <div class="box-body box-profile">
          <img class="profile-user-img img-responsive img-circle" src="{{asset('dist/img/user4-128x128.jpg')}}" alt="User profile picture">

          <h3 class="profile-username text-center">Nina Mcintire</h3>

          <p class="text-muted text-center">Software Engineer</p>

          <a href="#" class="btn btn-primary btn-block"><b>Like</b></a>
        </div>
        
        <div class="box-header with-border">
          <h3 class="box-title">About Me</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

          <p class="text-muted">
            B.S. in Computer Science from the University of Tennessee at Knoxville
          </p>

          <hr>

          <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

          <p class="text-muted">Malibu, California</p>

          <hr>

          <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

          <p>
            <span class="label label-danger">UI Design</span>
            <span class="label label-success">Coding</span>
            <span class="label label-info">Javascript</span>
            <span class="label label-warning">PHP</span>
            <span class="label label-primary">Node.js</span>
          </p>

          <hr>

          <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
        </div>
        <!-- /.box-body -->

      </div>


    </div>

    <!-- /.col -->
  </div>
  <!-- /.row -->

</section>

@endsection

@section('script')
@endsection
