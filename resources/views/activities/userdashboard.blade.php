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
                      <li><a href="{{ route('activity.userdashboard') }}" class="active">Dashboard</a></li>
                        <li><a href="{{ route('activity.userindex') }}" >Venture</a></li>
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
            <h4>Approved and Pending Request of Venture in UTM</h4>
            <h2>User Dashboard</h2>
        </div>
      </div>
    </div>
  </div>

  
  @extends('activities.layout')
                            @section('content')
  <div class="reservation-form d-flex align-items-center h-100">
    <div class="container">
      <div class="row justify-content-center" >
      @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
        <div class="col-lg-12 " >
          <div class="shadow-2-strong" id="admindashboard">
            <div class="card-body text-center">
                <h4 class="pd-5">Pending Requests</h4>
              <div class="table-responsive">
                <table class="table">
                    <thead >
                        <tr class="text-center" >
                            <th>Title</th>
                            <th>Date</th>
                            <th>Location</th>
                            <th>Type</th>
                            <th>Form Link</th>
                            <th>Due Form</th>
                            <!--<th>Approval</th>-->
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($pendingRequests as $activity)
                        <tr style="vertical-align:middle">
                            <td>{{$activity->title}}</td>
                            <td>{{$activity->actdate}}</td>
                            <td>{{$activity->location}}</td>
                            <td>{{$activity->type}}</td>
                            <td>{{$activity->link}}</td>
                            <td>{{$activity->duedate}}</td>
                            <!--<td class="text-center">
                                <form method="post" action="{{ route('activity.approve', ['activity' => $activity]) }}">
                                @csrf
                                @method('PATCH')
                                    <button type="submit" class="btn btn-success btn-sm px-3  mg-3 approve-btn" data-activity-id="{{ $activity->id }}">
                                        <i class="fa-solid fa-check"></i>
                                    </button>
                                </form>
                                <form method="post" action="{{ route('activity.deny', ['activity' => $activity]) }}">
                                @csrf
                                @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm px-3  mg-3 reject-btn" data-activity-id="{{ $activity->id }}">
                                        <i class="fa-solid fa-xmark"></i>
                                    </button>
                                </form>
                            </td>-->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
            <div class="shadow-2-strong br-23" id="admindashboard">
                <div class="card-body text-center">
                    <h4 class="pd-5">Approved Requests</h4>
                  <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr class="text-center">
                                <th>Title</th>
                                <th>Date</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Poster</th>
                                <th>Due Form</th>
                                <th>Form Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        @foreach($approvedRequests as $activity)
                            <tr style="vertical-align:middle">
                                <td>{{$activity->title}}</td>
                                <td>{{$activity->actdate}}</td>
                                <td>{{$activity->location}}</td>
                                <td>{{$activity->type}}</td>
                                <td><img src="/photo/{{ $activity->photo }}" width="100px"></td>
                                <td>{{$activity->duedate}}</td>
                                <td>{{$activity->link}}</td>
                                <td class="text-center">
                                    <form method="post" action="{{ route('activity.delete',$activity->id) }}">
                                        
                                        
                                        <button type="button" class="btn btn-secondary btn-sm px-3  mg-3" onclick="redirectTo({{ $activity->id }})">
                                          <i class="fa-solid fa-eye"></i>
                                        </button>

                                        @csrf
                                        @method('DELETE')
                                        
                                        <a class="btn btn-danger btn-sm px-3  mg-3 " href="{{url('delete_activity',$activity->id)}}"><i class="fa-solid fa-delete-left"></i></a>

                                        
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </div>
  </div>

  <!--<footer>
    <div class="container">
      <div class="col-lg-12">
        <p>Copyright © 2036 Scholar Organization. All rights reserved. &nbsp;&nbsp;&nbsp; Design: <a href="https://templatemo.com" rel="nofollow" target="_blank">TemplateMo</a></p>
      </div>
    </div>
  </footer>-->

  
@endsection
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>

  <script src="{{ asset('assets/js/isotope.min.js') }}"></script>
  <script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
  <!--<script src="{{ asset('assets/js/wow.js') }}"></script>-->
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

<!-- <script>
  // JavaScript function to redirect to a specific URL
  function redirectTo(activityId) {
    // Use Laravel's URL helper to generate the URL
    var targetUrl = "{{ url('activity/show') }}/" + activityId;

    // Redirect to the generated URL
    window.location.href = targetUrl;
  }
</script> -->


  </body>
 
</html>
