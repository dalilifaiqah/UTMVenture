
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Visitor Guide</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-woox-travel.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="{{ asset('assets/css/activity.css') }}">

    <!-- Add Leaflet CSS -->
   <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
   <style>
       /* Set the map container size */
       #map {
           height: 400px;
           margin-left: 100px;
           margin-right: 100px;
           z-index: 1;
       }
   </style>
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
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="index.html" class="logo">
                        <!-- <img src="images/utmventure.png" alt="" style="width: 200px; height: 75px;"> -->
                        <h1 style="padding: 5px;">UTMVENTURE</h1>
                      </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                    <li><a href="{{ route('activity.userdashboard') }}" >Dashboard</a></li>
                        <li><a href="{{ route('activity.userindex') }}" >Venture</a></li>
                        <li><a href="{{ url('map') }}" class="active">Visitor Guidance</a></li>
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

  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Visitor Guide</h4>
          <h2>Search your way</h2>
          <p>Awak search terus keluar!!
          </p>          
          <div class="main-button"><a href="#fix">Start</a></div>
        </div>
      </div>
    </div>
  </div>
  <!-- Map container -->
  <div class="col-lg-12">
   <div id="fix"><div id="map"></div></div></div>
  <!-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3988.307236140596!2d103.6344821!3d1.5602489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31da76ace6262e9f%3A0x37ca18f97d68f83c!2sFABU%20Bus%20Stop%20(UTM%20Center%20Point)!5e0!3m2!1sen!2sth!4v1642873227839!5m2!1sen!2sth" width="100%" height="450px" frameborder="0" style="border:0; border-top-left-radius: 23px; border-top-right-radius: 23px;" allowfullscreen=""></iframe> -->

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <!-- <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Make a Phone Call</h4>
            <a href="#">+123 456 789 (0)</a>
          </div>
        </div> -->
        <!-- <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contact Us via Email</h4>
            <a href="#">company@email.com</a>
          </div>
        </div> -->
        <!-- <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <h4>Visit Our Offices</h4>
            <a href="#">24th Street North Avenue London, UK</a>
          </div>
        </div> -->
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <!-- <div id="map">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="450px" frameborder="0" style="border:0; border-top-left-radius: 23px; border-top-right-radius: 23px;" allowfullscreen=""></iframe>
          </div> -->
        </div>
        <div class="col-lg-12">
          <div id="reservation-form">
            <div class="row">
              <div class="col-lg-12">
                <h4>Ke Mana<em> Awak Berada</em> Di Situ <em>Ada Saya</em></h4>
              </div>
              <div class="col-lg-6">
                  <fieldset>
                      <label for="Name" class="form-label">Where do you want to go?</label>
                      <form id="" name="gs" method="GET" role="search" action="{{ route('map.search') }}">
                      <input type="search" name="keyword" class="Name" placeholder="Ex. Balai Cerap UTM" autocomplete="on" required id="locationName">
                  </fieldset>
                  <div id="suggestions" style="margin-top: 10px;"></div>
              </div>

              <div class="col-lg-12">                        
              
                      <!-- <button class="main-button">Show Destination</button> -->
                      <a href="#fix"><button type ="submit" onclick="searchLocation()">Search Location</button></a>
                    </form>
                    </div>
                      <a href="#fix"><button onclick="getCurrentLocation()">Get Current Location</button></a>
                      
                      <button onclick="calculateDistance(destLat, destLng)"   id="calculateDisplacementButton" >Calculate the displacement</button>
                      
                  
                  <div class="row">
                    <div class="col-lg-12">
                  <h2 id="distance"></h2></div>
                  </div>
              </div>
            </div>
            <div class="slider-content">
              <div class="row">
                <div class="col-lg-12">
                  <h2 style="color: white;">UTM's <em>Popular Places</em></h2>
                </div>
                <div class="col-lg-12">
                  <div class="owl-cites-town owl-carousel">
                  {{-- @foreach($Location as $location) --}}
                    <div class="item">
                      <div class="thumb">
                        <a href="#fix"><img src="images/msi.jpeg" alt=""></a>
                        <h4 style="color: white;">Masjid Sultan Ismail</h4>
                      </div>
                    </div>
                     {{-- @endforeach --}}
                    <div class="item">
                      <div class="thumb">
                        <a href="#fix"><img src="images/opc.jpeg" alt=""></a>
                        <h4 style="color: white;">One Stop Parcel Center</h4>
                      </div>
                    </div>
                    <div class="item">
                      <div class="thumb">
                        <a href="#fix"><img src="images/scholarinn.jpg" alt=""></a>
                        <h4 style="color: white;">Scholar Inn</h4>
                      </div>
                    </div>
                    <div class="item">
                      <div class="thumb">
                        <a href="#fix"><img src="images/stadiumutm.jpg" alt=""></a>
                        <h4 style="color: white;">Stadium UTM</h4>
                      </div>
                    </div>
                    <div class="item">
                      <div class="thumb">
                        <a href="#fix"><img src="images/perpustakaanrajazarithsofiah.jpeg" alt=""></a>
                        <h4 style="color: white;">Perpustakaan Raja Zarith Sofiah</h4>
                      </div>
                    </div>
                    <div class="item">
                      <div class="thumb">
                        <a href="#fix"><img src="images/dsi.jpg" alt=""></a>
                        <h4 style="color: white;">Dewan Sultan Iskandar</h4>
                      </div>
                    </div>
                    <div class="item">
                      <div class="thumb">
                        <a href="#fix"><img src="images/padangutamautm.jpg" alt=""></a>
                        <h4 style="color: white;">Padang Utama UTM</h4>
                      </div>
                    </div>
                    <div class="item">
                      <div class="thumb">
                        <a href="#fix"><img src="images/busstopfabu.png" alt=""></a>
                        <h4 style="color: white;">CP Bus Stop FABU</h4>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          
        </div>
      </div>
    </div>
  </div>

  <!-- <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">WoOx Travel</a> Company. All rights reserved. 
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a></p>
        </div>
      </div>
    </div>
  </footer> -->

<!-- Add Leaflet JavaScript -->
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/wow.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });


       // Permanent marker coordinates
       var locations = {
           "Masjid Sultan Ismail": { lat: 1.5592652, lng: 103.6376 },
           "One Stop Parcel Center": { lat: 1.55790, lng: 103.632885 },
           "Scholar Inn": { lat: 1.557431, lng: 103.64829 },
           "Stadium UTM": { lat: 1.556605, lng: 103.6563254},
           "Perpustakaan Raja Zarith Sofiah":{ lat: 1.56338, lng: 103.65157 },
           "Padang Utama UTM":{ lat: 1.5567556, lng: 103.640233 },
           "CP Bus Stop FABU":{ lat: 1.5597264, lng: 103.6347461 },
           "Dewan Sultan Iskandar":{ lat: 1.55920, lng: 103.638764 },
           "Balai Cerap UTM":{ lat: 1.56985, lng: 103.644836},
           "Office KDOJ":{ lat: 1.576221, lng: 103.621094 },
           "Faculty of Computing N24":{ lat: 1.56416, lng: 103.63814 },
           "Arked Meranti":{ lat: 1.559662, lng: 103.63379},
           "Pejabat KTDI":{ lat: 1.56402, lng: 103.635115},
           "Padang Kawad UTM":{ lat: 1.5524764, lng: 103.643548},
           "Perpustakaan Sultanah Zanariah (PSZ)":{ lat: 1.55927, lng: 103.63703},
           // Add more locations if needed
       };

       // Initialize the map
       var mymap = L.map('map').setView([1.5597829, 103.6360231], 16);

       // Add a tile layer (OpenStreetMap)
       L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
           attribution: '&copy; OpenStreetMap contributors'
       }).addTo(mymap);

       // Add permanent markers
       for (var locationName in locations) {
           if (locations.hasOwnProperty(locationName)) {
               L.marker([locations[locationName].lat, locations[locationName].lng]).addTo(mymap)
                   .bindPopup("<b>" + locationName + "</b><br>Latitude: " + locations[locationName].lat + "<br>Longitude: " + locations[locationName].lng);
           }
       }

       // Function to handle search button click
       function searchLocation() {
           var searchLocationName = document.getElementById('searchLocation').value;

           // Check if entered value is a valid location name
           if (locations.hasOwnProperty(searchLocationName)) {
               // Get coordinates for the searched location
               var lat = locations[searchLocationName].lat;
               var lng = locations[searchLocationName].lng;

               // Set the map view to the searched location
               mymap.setView([lat, lng], 13);

               // Remove the existing dynamic marker
               if (typeof dynamicMarker !== 'undefined') {
                   mymap.removeLayer(dynamicMarker);
               }

               // Add a new dynamic marker at the searched location
               dynamicMarker = L.marker([lat, lng]).addTo(mymap);

               // Add a popup with the searched coordinates
               dynamicMarker.bindPopup("<b>Searched Location</b><br>Latitude: " + lat + "<br>Longitude: " + lng).openPopup();
           } else {
               showSuggestions(searchLocationName);
           }
       }

       // Function to show suggestions for partial matches
       function showSuggestions(searchText) {
           var suggestionsDiv = document.getElementById('suggestions');
           suggestionsDiv.innerHTML = '';

           for (var locationName in locations) {
               if (locations.hasOwnProperty(locationName) && locationName.toLowerCase().includes(searchText.toLowerCase())) {
                   var suggestionButton = document.createElement('button');
                   suggestionButton.innerHTML = locationName;
                   suggestionButton.onclick = function() {
                       document.getElementById('searchLocation').value = this.innerHTML;
                       suggestionsDiv.innerHTML = ''; // Clear suggestions
                       searchLocation();
                   };

                   suggestionsDiv.appendChild(suggestionButton);
               }
           }
       }

       // Function to get the user's current location
       function getCurrentLocation() {
           if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(
                   function(position) {
                       var lat = position.coords.latitude;
                       var lng = position.coords.longitude;

                       // Set the map view to the current location
                       mymap.setView([lat, lng], 13);

                       // Remove the existing dynamic marker
                       if (typeof dynamicMarker !== 'undefined') {
                           mymap.removeLayer(dynamicMarker);
                       }

                       // Add a new dynamic marker at the current location
                       dynamicMarker = L.marker([lat, lng]).addTo(mymap);

                       // Add a popup with the current coordinates
                       dynamicMarker.bindPopup("<b>You are HERE!</b><br>Latitude: " + lat + "<br>Longitude: " + lng).openPopup();
                   },
                   function(error) {
                       alert("Error getting current location: " + error.message);
                   }
               );
           } else {
               alert("Geolocation is not supported by your browser.");
           }
       }

       // Function to calculate the distance between two sets of coordinates using the Haversine formula
       function calculateDistance(destLat, destLng) {
           if (navigator.geolocation) {
               navigator.geolocation.getCurrentPosition(
                   function(position) {
                       var currentLat = position.coords.latitude;
                       var currentLng = position.coords.longitude;

                       // Haversine formula
                       var R = 6371; // Radius of the Earth in kilometers
                       var dLat = deg2rad(destLat - currentLat);
                       var dLng = deg2rad(destLng - currentLng);
                       var a =
                           Math.sin(dLat / 2) * Math.sin(dLat / 2) +
                           Math.cos(deg2rad(currentLat)) * Math.cos(deg2rad(destLat)) *
                           Math.sin(dLng / 2) * Math.sin(dLng / 2);
                       var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
                       var distance = R * c; // Distance in kilometers

                       // Display the distance
                       alert("Distance to destination: " + distance.toFixed(2) + " km");
                       document.getElementById('distance').innerText = "Distance to " + searchLocationName + ": " + distance.toFixed(2) + " km";
                   },
                   function(error) {
                       alert("Error calculating distance: " + error.message);
                   }
               );
           } else {
               alert("Geolocation is not supported by your browser.");
           }
       }

       // Function to handle image click and show the corresponding location
    function showLocationOnMap(locationName) {
        if (locations.hasOwnProperty(locationName)) {
            var lat = locations[locationName].lat;
            var lng = locations[locationName].lng;

            // Set the map view to the selected location
            mymap.setView([lat, lng], 16);

            // Remove the existing dynamic marker
            if (typeof dynamicMarker !== 'undefined') {
                mymap.removeLayer(dynamicMarker);
            }

            // Add a new dynamic marker at the selected location
            dynamicMarker = L.marker([lat, lng]).addTo(mymap);

            // Add a popup with the selected coordinates
            dynamicMarker.bindPopup("<b>" + locationName + "</b><br>Latitude: " + lat + "<br>Longitude: " + lng).openPopup();

            document.getElementById("calculateDisplacementButton").addEventListener("click", function()
              {calculateDistance(lat, lng);});
            
        }
    }

    // Function to handle button click and show the distance
    function showDistanceToCurrentLocation(locationName) {
        if (locations.hasOwnProperty(locationName)) {
            var destLat = locations[locationName].lat;
            var destLng = locations[locationName].lng;

            // Call the calculateDistance function
            calculateDistance(destLat, destLng);
        }
    }

    // Add a click event listener for the map
       mymap.on('click', function (e) {
           var clickedLat = e.latlng.lat;
           var clickedLng = e.latlng.lng;

           // Remove the existing dynamic marker
           if (typeof dynamicMarker !== 'undefined') {
               mymap.removeLayer(dynamicMarker);
           }

           // Add a new dynamic marker at the clicked location
           dynamicMarker = L.marker([clickedLat, clickedLng]).addTo(mymap);

           // Add a popup with the clicked coordinates
           dynamicMarker.bindPopup("<b>Clicked Location</b><br>Latitude: " + clickedLat + "<br>Longitude: " + clickedLng).openPopup();

           // Calculate and display the distance
           calculateDistance(clickedLat, clickedLng);
       });

       // Function to convert degrees to radians
       function deg2rad(deg) {
           return deg * (Math.PI / 180);
       }

       // Function to handle button click and show the distance
    function showDistanceToCurrentLocation(locationName) {
        if (locations.hasOwnProperty(locationName)) {
            var destLat = locations[locationName].lat;
            var destLng = locations[locationName].lng;

            // Call the calculateDistance function
            calculateDistance(destLat, destLng);
        }
    }

    // Add click event listeners to the images
    $(document).ready(function () {
        $('.owl-cites-town .item').click(function () {
            var locationName = $(this).find('h4').text();
            showLocationOnMap(locationName);
        });

        // Add click event listener to the "Calculate the displacement" button
        $('#calculateDisplacementButton').click(function () {
            var locationName = $('#searchLocation').val();
            showDistanceToCurrentLocation(locationName);
            calculateDistance(destLat, destLng);
        });
    });

      // Add click event listeners to the images
       $(document).ready(function() {
        $('.owl-cites-town .item').click(function() {
            var locationName = $(this).find('h4').text();
            showLocationOnMap(locationName);
        });
        // Add click event listener to the distance button
        $('#showDistanceButton').click(function() {
            var locationName = $('#searchLocation').val();
            showDistanceToCurrentLocation(locationName);
        });
    });
  </script>

  </body>

</html>
