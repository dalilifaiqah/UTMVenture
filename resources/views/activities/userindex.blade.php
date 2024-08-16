<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>WoOx Travel - Special Deals</title>

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
                            <a href="{{ route('profile.edit') }}">Profile</a>
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
          <h4>Lets earn more merits!</h4>
          <h2>Activities and Events in UTM</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="search-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div id="search-form" >
            <div class="row">
              <div class="col-lg-7 searchactivity  pd-5">
                <form name="gs" method="GET"  role="search" action="{{ route('activity.search') }}">
                  <input type="search" class="form-control " id="searchInput" name="keyword" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
              </div>
              <div class="col-lg-2 searchactivity  pd-5">
                  <button type="submit">Search</button><!--baru tambah-->
                </form>
              </div>
              <div class="col-lg-3 pd-5">                        
                <fieldset>
                    <button id="advertiseEventButton" class="border-button" onclick="requestActivity()" >Advertise Event</button>
                </fieldset>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="amazing-deals">
    <div class="container" style="padding-top: 50px"> 
      <div class="row">
        @foreach($activities as $activity)
          <div class="col-lg-6 col-sm-6">
            <div class="item">
              <div class="row">
                <div class="col-lg-6 image-container">
                  
                  <div class="image width100">
                 
                      <img src="/photo/{{$activity->photo}}" alt="" style="height:auto;">
                  </div>
                  
                </div>
                <div class="col-lg-6 align-self-center">
                  <div class="content">
                    <!--<span class="info">*Limited Offer Today</span>-->
                    <h4>{{$activity->title}}</h4><!--title-->
                    <div class="row">
                      <div class="col-6">
                        <i class="fa-regular fa-calendar-xmark"></i>
                        <span class="list">{{$activity->duedate}}</span>
                      </div>
                      <div class="col-6">
                        <i class="fa-solid fa-location-dot"></i>
                        <span class="list">{{$activity->location}}</span>
                      </div>
                    </div>
                    <p class="shorten">{{$activity->description}}</p>
                    <div class="row">
                      <div class="col-7 main-button">
                        <a href="{{ route('activity.show', $activity) }}">More Details</a>
                      </div>
                      <div class="col-5 m-auto d-flex align-items-center justify-content-center" >
                        <div class="">
                          <i class="fa-solid fa-tag"></i>
                          <span class="list ">{{$activity->type}}</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        @endforeach
        
        
        
        



      </div>
    </div>
  </div>

  <!--<div style="background-color: #22b3c1; color: white; padding: 20px; text-align: center;">
    &copy; 2024 Your Website. All rights reserved.
  </div>-->
  <!--<footer class="mg-top-10">
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

  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

<script>
  function requestActivity() {
    var targetUrl = "{{ route('activity.create') }}";
    window.location.href = targetUrl;
  }

  document.addEventListener('DOMContentLoaded', function() {
    var advertiseEventButton = document.getElementById('advertiseEventButton');
    
    if (advertiseEventButton) {
      advertiseEventButton.addEventListener('click', function() {
        requestActivity();
      });
    }
  });
</script>

  </body>

</html>
