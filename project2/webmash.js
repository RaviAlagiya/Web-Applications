/*

    Student Name: Alagiya, Ravi
    Project Name : Project 2
    Due Date: Wednesday, October 26, 2016 11:59 PM

    AIzaSyAStyWOZ1JL8rN0iOR1ssRplzIjCAwGFBQ - Google API Key 

*/

var username = "thessilverwolff"; // id for GeoName API 
var request = new XMLHttpRequest();

//setting globle variable so all function can use it easly
var marker;
var map;
var geocoder ;
var infowindow ;
var mailingAddress;


//initMap() which initiates map to the given location
function initMap() {

    
        //initialize map
         geocoder = new google.maps.Geocoder;
         infowindow = new google.maps.InfoWindow({maxWidth: 150});
         myLatLng = {lat: 32.75, lng: -97.13};
          map = new google.maps.Map(document.getElementById('map'), {
          zoom: 17,
          center: myLatLng
        });

         marker = new google.maps.Marker({
          position: myLatLng,
          map: map
          
        });
           

	         
      map.addListener('click', function(e) {
          
            // getting new latLan object by click event
            var latLng = e.latLng;

            //calling reversegeocode function for getting address using lat and lng
            reversegeocode(latLng);
         
        });
	
 
}



// Reserse Geocoding 
function reversegeocode(latLng) {
  var lat=latLng.lat();
  var lng=latLng.lng();


 geocoder.geocode({'location': latLng}, function(results, status) {

          if (status === 'OK') {

            if (results[0]) {
              //re-positioning marker to the user click
                infowindow.setContent("");

                 
                 if (marker == null) {
                        marker = new google.maps.Marker({
                      position: latLng,
                      map: map
                    });
                 }
                 marker.setPosition(latLng); 
                 marker.setMap(map);

              //call geoname api asynchronously with latitude and longitude 
              sendRequest(latLng);
            mailingAddress=results[0].formatted_address
             
            } else {
              window.alert('No results found');
            }
          } else {
            window.alert('Geocoder failed due to: ' + status);
          }
        });

  
  
}



function displayResult () {
  
  //here if we receive weather information from API then we update the marker and history log else we dont update
    if (request.readyState == 4) {

        //document.getElementById("output").innerHTML=request.responseText;
       
        var xml = request.responseXML.documentElement;
        var temperature = xml.getElementsByTagName("temperature")[0].childNodes[0].nodeValue;
        var clouds = xml.getElementsByTagName("clouds")[0].childNodes[0].nodeValue;
        var windSpeed = xml.getElementsByTagName("windSpeed")[0].childNodes[0].nodeValue;

       
        
        var currentWeather=" Temp:  " + temperature + "°C"+" Clouds : "+clouds + " WindSpeed : "+ windSpeed  ;
         
         //adding weather to the home address
         infowindow.setContent(mailingAddress + "<br>" + currentWeather);

         //retriving history log
        var address=document.getElementById("address").innerHTML;
        var weather=document.getElementById("weather").innerHTML;

        //update history logs
        document.getElementById("address").innerHTML =  mailingAddress +  "<br>" + address;
        document.getElementById("weather").innerHTML =  currentWeather + "<br>" + weather;

        
        //setting widnow with address and weather details 
        infowindow.open(map, marker);



    }
}

function sendRequest (latLng) {
 
   request.onreadystatechange = displayResult;
    var lat = latLng.lat();
    var lng = latLng.lng();
    //calling GeoNames API for the weather details at the user clicked lat and lng
    request.open("GET"," http://api.geonames.org/findNearByWeatherXML?lat="+lat+"&lng="+lng+"&username="+username);

    request.send(null);
}



function clearScreen(){

  //clearing all the objects
  marker=null;
  map=null;
  geocoder=null ;
  infowindow =null;
  mailingAddress=null;

 //clearing address and weather from the history log
  document.getElementById("address").innerHTML =  "";
  document.getElementById("weather").innerHTML =  "";
  initMap();

 //removing default marker which was set at  {lat: 32.75, lng: -97.13};
 marker.setMap(null);



}
