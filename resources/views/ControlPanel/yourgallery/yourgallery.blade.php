<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Avilon Bootstrap Template</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">


  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!-- Bootstrap CSS File -->
  <link href="{{asset('Avilon/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('Avilon/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('Avilon/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('Avilon/lib/magnific-popup/magnific-popup.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('Avilon/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: Avilon
    Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

@include('include/homenav')

  <main id="main">

    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Gallery Of {{$user->name}}</h3>
          <span class="section-divider"></span>
          <p class="section-description">{{$user->note}}</p>
        </div>
        @include('include/error')
        <div class="row">
          <div class="col-md-7 alert alert-warning wow fadeInLeft offset-1">
            <form method="post" enctype="multipart/form-data">
              {{csrf_field() }}
              <input type="file" name="image" class="float-left">
              <input type="submit" value="Upload Image " class="btn btn-outline-success float-left">
            </form>
            <a href="{{url('/editgallery/'.$user->id)}}" class="btn btn-outline-danger" style="margin-left:5px;">Edit or Delete</a>
            <a href="{{url()->previous()}}" class="btn btn-outline-primary">Back</a><br>
            <div class="row">
              <div class="col-md-4">
                <div class="gallery-item wow fadeInUp">
                  <a href="{{asset('storage/userprofile/'.$user->profile)}}" class="gallery-popup">
                    <img src="{{asset('storage/userprofile/'.$user->profile)}}" alt="" class="img-thumbnail rounded float-left" style="width:200px;">
                  </a>
                </div>

              </div>
              <div class="col-md-4 wow fadeInUp " style="padding:20px;">
                <div><i class="fas fa-user"></i> - {{$user->name}}</div>
                <div><i class="fas fa-envelope"></i> - {{$user->email}}</div>
                <div><i class="fas fa-phone"></i> - {{$user->phone}}</div>
                <div><i class="fas fa-graduation-cap"></i> - {{$user->education}}</div>

                </div>
              </div>
            </div>

          </div>

        </div>



        <div class="row no-gutters alert-secondary alert">

          @foreach($user->uploadphoto as $photo)
          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="{{asset('storage/' . $user->created_at->toDateString() . $user->id . '/origin' . $photo->name)}}" class="gallery-popup">
                <img src="{{asset('storage/'. $user->created_at->toDateString() . $user->id . '/' . $photo->name )}}" alt="">
              </a>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section><!-- #gallery -->


  </main>


  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{asset('Avilon/lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('Avilon/lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('Avilon/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('Avilon/lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('Avilon/lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('Avilon/lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('Avilon/lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('Avilon/lib/magnific-popup/magnific-popup.min.js')}}"></script>


  <!-- Template Main Javascript File -->
  <script src="{{asset('Avilon/js/main.js')}}"></script>

</body>
</html>
