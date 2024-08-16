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
                        <li><a href="visitorguidance.html">Visitor Guidance</a></li>
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
          <h4>Need any help with promoting your activity or event? Register Now!</h4>
          <h2>Advertise Venture </h2>
        </div>
      </div>
    </div>
  </div>


  @extends('activities.layout')
  @section('content')
  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
            <div>
                @if ($errors->any())
                      <div class="alert alert-danger">
                          <strong>Whoops!</strong> There were some problems with your input.<br><br>
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  @endif
            </div>
            <form id="reservation-form" class="borderadd" name="gs" method="POST" role="search" action="{{ url('update_data', ['Activity' => $Activity]) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
              <div class="col-lg-12">
                <h4>Registration <em>Form</em> </h4>
              </div>
              <div class="col-lg-12">
                  <fieldset>
                      <label for="title" class="form-label">Title</label>
                      <input type="text" name="title" id="title" value="{{ $activity->title }} " class="Name" placeholder="Ex. Color Run" autocomplete="on" required>
                  </fieldset>
              </div>
              <div class="col-lg-3">
                <fieldset>
                    <label for="actdate" class="form-label">Date of Event</label>
                    <input type="date" name="actdate"  value="{{ $activity->actdate }}  id="actdate" class="date" required>
                </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="location" class="form-label">Location</label>
                    <input type="text" name="location"  value="{{ $activity->location }}  id="location" class="Name" placeholder="Ex. Masjid Sultan Ismail" autocomplete="on" required>
                </fieldset>
              </div>
              <div class="col-lg-3">
                  <fieldset>
                      <label for="type" class="form-label">Type of Request</label>
                      <select name="type" class="form-select" aria-label="Default select example"  value="{{ $activity->type }}  id="type" onChange="handleTypeChange(this)">
                          <option selected>Select your request</option>
                          <option name="activity" value="activity">Activity</option>
                          <option name="event" value="event">Event</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-12">
                <fieldset>
                    <label for="description" class="form-label">Description</label>
                    <textarea name="description"  value="{{ $activity->description }}  id="description" class="Name" placeholder="All details about your activity" autocomplete="on" required></textarea>
                    <!--<input type="text" name="description" id="description" class="Name" placeholder="All details about your activity" autocomplete="on" required>-->
                </fieldset>
              </div>
              <div class="col-lg-3">
                <fieldset>
                    <label for="photo" class="form-label">Upload Poster</label>
                    <div class="file-input-container">
                        <input type="file" name="photo"  value="{{ $activity->photo }}  id="photo" placeholder="photo"  required>
                        <div class="file-input-button">Choose File</div>
                    </div>
                </fieldset>
              </div>
              <div class="col-lg-5">
                <fieldset>
                    <label for="link" class="form-label">Google Form Link</label>
                    <input type="text" name="link"  value="{{ $activity->link }}  id="link" class="Name" placeholder="Ex. https://forms.gle/gformcode" autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-4">
                <fieldset>
                    <label for="duedate" class="form-label">Due Date</label>
                    <input type="date" name="duedate"  value="{{ $activity->duedate }}   class="date" required>
                </fieldset>
              </div>
              
              <div class="col-lg-12">                        
                  <fieldset>
                      <button type="submit" value="Save" class="main-button">Save Form</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  @endsection

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

  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

<script>
    function handleTypeChange(select) {
        var linkInput = document.getElementById("link");

        // Check if the selected type is "event"
        if (select.value === "event") {
            // If "event" is selected, hide the link input
            linkInput.style.display = "none";
        } else {
            // If "activity" is selected, show the link input
            linkInput.style.display = "block";
        }
    }
</script>

  </body>

</html>
