<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>WoOx Travel Reservation Page</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <!--C:\xampp\htdocs\UTMV\public\assets-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-woox-travel.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/activity.css') }}">
    <!--

TemplateMo 580 Woox Travel

https://templatemo.com/tm-580-woox-travel

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
    <div class="container" style="height: 70px;">
        <div class="row" style="margin: 5px;">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <!--<img src="assets/images/logo.png" alt="">-->
                        <h1 style="padding: 5px;">UTMVENTURE</h1>
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('activity.userdashboard') }}" >Dashboard</a></li>
                        <li><a href="{{ route('activity.userindex') }}" class="active">Venture</a></li>
                        <li><a href="{{ url('map') }}">Visitor Guidance</a></li>
                        <li><div class="dropdown">
                          <button class="dropbtn">{{ Auth::user()->name }}</button>
                          <div class="dropdown-content">
                            <a href="{{ route('profile.edit') }}">User Profile</a>
                            <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                Log Out
                                </a>
                            </form>
                            <!--<a href="#">Link 3</a>-->
                          </div>
                        </div></li>
                    </ul>   
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Don't miss your chance! Join and Register Now!</h4>
          <h2>Detail of Activity/Event in UTM</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row" >
        <div class="col-lg-12" >
            <div id="poster">
                <div class="image">
                    <img src="{{ asset('photo/' . $activity->photo) }}"  alt="" style="width: 100%; height: auto; ">
                </div>
            </div>
        </div>
        <div class="col-lg-12">
          <div id="reservation-form" >
            <div class="row">
              <div class="col-lg-12">
                <h4>{{$activity->title}}</h4>
              </div>
              <div class="col-lg-4 dateloca">
                <i class="fa-regular fa-calendar-xmark"></i>
                <span class="list">{{$activity->duedate}}</span>
              </div>
              <div class="col-lg-4 dateloca">
                <i class="fa-solid fa-location-dot"></i>
                <span class="list">{{$activity->location}}</span>
              </div>
              <div class="col-lg-4 dateloca">
                <i class="fa-solid fa-tag"></i>
                <span class="list">{{$activity->type}}</span>
              </div>
              <div class="col-lg-12" style="margin-top: 30px; text-align: left">
                <pre>
                {!! $activity->description !!}
                </pre>
              </div>
              
              
              <div class="col-lg-12">                        
                  <fieldset>
                    @if ($activity->type === 'activity')
                      <button class="main-button" onclick="redirectToLink3('{{ $activity->link }}')">Register Now!</button>
                    @endif
                    </fieldset>
              </div>
            </div>
        </div>
        </div>
      </div>
    </div>
  </div>

  <!--<footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer>-->


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <script src="{{ asset('assets/js/assets/js/wow.js') }}"></script>
  <script src="{{ asset('assets/js/tabs.js') }}"></script>
  <script src="{{ asset('assets/js/popup.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/js/dashboard.js') }}"></script>

  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

  <script>
    function redirectToLink3(link) {
      window.location.href = link;
     }
  </script>

  </body>

</html>
