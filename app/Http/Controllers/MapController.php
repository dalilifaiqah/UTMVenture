<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MapController extends Controller
{
    
  
  
         
  
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
}
