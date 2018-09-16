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
<style >
  .total
  {
      background: lightgray;
      border-radius: 60px;
      padding-top: 40px;
  }
  .total:hover
  {
    background: gray;
    border-radius: 50px;

  }
</style>
  <!-- =======================================================
    Theme Name: Avilon
    Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

@include('include/homenav')
<br>
  <main id="main">

    <!--==========================
      Gallery Section
    ============================-->
    @foreach($users as $user)
    @if(count($user->uploadphoto) > 0)<!--ပံု မတင္ထားေသာ user မ်ားကို ေဖ်ာက္ထားသည္-->
    <section id="gallery">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Gallery Of <em>{{$user->name}}</em> @auth @if(Auth::user()->id == $user->id)<small><a href="{{url('editgallery/'.$user->id)}}" data-toggle="tooltip" title="Edit Your Gallery"><i class="fas fa-edit"></i></a></small> @endif @endauth</h3>

          <span class="section-divider"></span>
          <p class="section-description">{{$user->note}}</p>
        </div>

        <div class="row no-gutters">
          <!-- photo မ်ားကို count လုပ္ထားသည္ -->
          <?php $total = $user->uploadphoto->count(); ?>
          <?php $total -= 5 ; ?>
          <?php $count = 0; ?>

          @foreach($user->uploadphoto as $photo)
          <?php $count++; ?>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item wow fadeInUp">
              <a href="{{asset('storage/'.$user->created_at->toDateString().$user->id.'/origin'.$photo->name)}}" class="gallery-popup">
                <img src="{{asset('storage/'.$user->created_at->toDateString().$user->id.'/'.$photo->name)}}" alt="">
              </a>
            </div>
          </div>
          <?php if($count == 5) break; ?>

          @endforeach
          <!-- ေနာက္ဆံုးလုိခ်င္ေသာ count number အကြက္ကို foreach အျပင္မွာထားရသည္။ -->
          @if($count == 5)
          <div class="col-lg-4 col-md-6 gallery-item wow fadeInUp total">
              <a href="{{url('/moregallery/'.$user->id)}}"  style="font-size:200px;">
                +{{$total}}
              </a>
              <h5>More</h5>
          </div>
          @endif

        </div>

      </div>
    </section><!-- #gallery -->
    @endif
    @endforeach
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
  <script>
  $(function () {
  $('[data-toggle="tooltip"]').tooltip();
  });
  </script>
</body>
</html>
