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
        Product Advanced Featuress Section
      ============================-->
      <section id="advanced-features">



        <div class="features-row alert alert-warning">
          @include('include.error')
          <div class="container alert alert-primary">
            <div class="row">
              <div class="col-md-5">
                <a href="{{url('/yourgallery/'.$user->id) }}" class="btn btn-primary btn-sm" style="float:left;">Back </a>
                <form  method="post" enctype="multipart/form-data">
                  {{csrf_field() }}
                  <input type="file" name="image" class="float-left btn-sm">
                  <input type="submit" value="Upload Image " class="btn btn-success btn-sm float-left">
                </form>
              </div>
              <div class="col-md-6">
                <h2 >Hi <em>{{$user->name}}</em> Your  Gallery</h2>
              </div>
            </div><br>

            <div class="row">
              @foreach($user->uploadphoto as $photo)
              <div class="col-12 alert alert-danger">
                <img class="advanced-feature-img-left " src="{{asset('storage/'.$user->id.'/'.$photo->name)}}" alt="" width="400px">
                <div class="wow fadeInRight">
                  <form method="post">
                  {{csrf_field() }}
                  <input type="hidden" name="photoid" value="{{$photo->id}}">
                  <i class="ion-ios-navigate-outline wow fadeInRight" class="wow fadeInRight" data-wow-duration="0.5s"></i>
                  <input type="text" name="place" style="width:400px;height:50px;" placeholder="Place" value="{{$photo->place}}"><br><br>
                  <i class="ion-ios-paper-outline " data-wow-delay="0.2s" data-wow-duration="0.5s"></i>
                  <textarea name="note" rows="8" cols="50" placeholder="Some note" >{{$photo->note}}</textarea><br>
                  <i class="ion-ios-barcode-outline wow fadeInRight" data-wow-delay="0.4" data-wow-duration="0.5s"></i><br>
                  <input type="submit" value="Update" class="btn btn-primary btn-sm"> or <a href="{{url('/delgallery/'.$photo->id)}}" class="btn btn-outline-danger btn-sm">Delete</a>
                  </form>
                </div>
              </div>


              @endforeach
            </div>
          </div>
        </div>


      </section><!-- #advanced-features -->

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
