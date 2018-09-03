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
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Gallery</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row no-gutters">
          @foreach($users as $user)
          @foreach($user->uploadphoto as $photo)
          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-1.jpg" class="gallery-popup">
                <img src="{{asset('storage/')}}" alt="">
                {{$photo->name}}
              </a>
            </div>
          </div>
          @endforeach
          @endforeach

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-2.jpg" class="gallery-popup">
                <img src="{{asset('Avilon/img/gallery/gallery-2.jpg')}}" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-3.jpg" class="gallery-popup">
                <img src="{{asset('Avilon/img/gallery/gallery-3.jpg')}}" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-4.jpg" class="gallery-popup">
                <img src="{{asset('Avilon/img/gallery/gallery-4.jpg')}}" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-5.jpg" class="gallery-popup">
                <img src="{{asset('Avilon/img/gallery/gallery-5.jpg')}}" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="img/gallery/gallery-6.jpg" class="gallery-popup">
                <img src="{{asset('Avilon/img/gallery/gallery-6.jpg')}}" alt="">
              </a>
            </div>
          </div>

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
