/*

Name: Alagiya, Ravi 
Project : project 1
Due Date : October 19 
UTA ID: 1001452485
API access Key = "f6d8f825891f760d71dca16873c133da";

*/


var api_key = "f6d8f825891f760d71dca16873c133da";

function sendRequest () {

    var xhr = new XMLHttpRequest();
    var city = encodeURI(document.getElementById("form-input-search").value);
    if (city == null || city == "") {
        alert("Please enter city !");
    return;}
    xhr.open("GET", "proxy.php?q="+city+"&appid="+api_key+"&format=json"+"&units=metric", true); //display values in metric formate
    xhr.setRequestHeader("Accept","application/json");
    xhr.onreadystatechange = function () {
        if (this.readyState == 4) {
          
            var json = JSON.parse(this.responseText);
           
            // if user enters text other then city name
            if (json.cod == 502) { 
                alert("Oops . .. City Not Found !");
                return;}

            var sunsetTime = new Date(  json.sys.sunset*1000);  // convert unix time to local time
            var sunriseTime = new Date(json.sys.sunrise * 1000); // convert unix time to local time

            document.getElementById("cityName").innerHTML=json.name;
            document.getElementById("tempLabel").innerHTML="Temp";
            document.getElementById("latlon").innerHTML="Lat: " + json.coord.lat+ " | "+"Lon: " + json.coord.lon;
            document.getElementById("currentTemp").innerHTML=json.main.temp+"°C";
            document.getElementById("minT").innerHTML="min : " + json.main.temp_min+"°C";
            document.getElementById("maxT").innerHTML="max : " + json.main.temp_max+"°C";
            document.getElementById("humidity").innerHTML="Humidity : " + json.main.humidity+" %";
            document.getElementById("pressure").innerHTML="Pressure : " +json.main.pressure + " hPa";
            document.getElementById("weather").innerHTML="Weather : " + json.weather[0].description + "<br>" ;
            document.getElementById("sunRise").innerHTML="Sunrise " + sunriseTime.toLocaleTimeString() + "<br>" ;
            document.getElementById("sunSet").innerHTML= "Sunset  " + sunsetTime.toLocaleTimeString() + "<br>" ;
             document.getElementById("clouds").innerHTML= "Clouds :" + json.clouds.all +  " %";

            var advice="noadvise";
            var visibility="Good";

            // WeatherID is returned by the API which describes about various weather condition.
            var weatherID=json.weather[0].id;  
             
             //Used binary search to findout advice based on ID

            if(weatherID >= 700)//700-999
            {
                if (weatherID < 900 ) {//700-899

                    if (weatherID < 800) {//700-799
                        visibility="bad";
                            switch (weatherID) {
                                    case 701: advice="There is mist in the city";
                                        break;
                                    case 711: advice="There is smoke outside";
                                        break;
                                   case 721: advice="Outside atmosphere is hazy";
                                        break;
                                   case 731: advice="There is sand dust outside";
                                        break;
                                   case 741: advice="There is fog outside";
                                        break;
                                   case 751: advice="There is sand outside";
                                        break;
                                   case 761: advice="There is dust outside";
                                        break;
                                    case 762: advice="There is volcanic ash outside, please avoid going out";
                                        break;
                                    case 771: advice=" There is squalls outside, please avoid going out";
                                        break;

                                    case 781: advice=" There is chances of tornado, please avoid going out";
                                        break;
                                    }

                    }
                    else if (weatherID > 800) //801-899
                    {
                        visibility="Moderate";
                        
                    }
                    else if(weatherID == 800) // 800
                    {
                        
                        visibility="Excellent";
                        imgPath="01d.png";
                        advice="It's clear sky today, enjoy your day !";
                    }
                    else 
                    {
                        //wrong code retun from openweather webservice
                        advice="noadvise";
                    }

                }
                else //>=900
                {
                        visibility="Moderate";
                    
                    switch (weatherID) {

                 
                        case 900: advice="Chances of Tornado, Avoid going out";
                                visibility="bad";
                            break;
                       case 901: advice="Chances of Tropical storm, Avoid going out";
                                visibility="bad";
                            break;
                       case 902: advice="Chances of Hurricane,  Avoid going out";
                                visibility="bad";
                            break;
                       case 903: 
                                advice="You may want to use coat, It's freeaing outside";
                            break;
                       case 904: advice="It's hot outside";
                            break;
                       case 905: advice="It's windy outside";
                            break;
                       case 906: advice="Please bring an umbrella";
                                visibility="bad";
                            break;
                        case 952: advice="Light breeze outside, enjoy your day !";
                            break;
                        case 953: advice="Gentle breeze outside, enjoy your day !";
                            break;
                        
                        case 954: advice="Moderate breeze outside, enjoy your day !";
                            break;

                        case 955: advice="Fresh breeze outside, enjoy your day !";
                            break;

                        case 956: advice="Strong breeze outside, enjoy your day !";
                            break;

                        case 957: advice="High wind in the city. Avoid going out";
                            break;

                        case 958: advice="High wind in the city. Avoid going out";
                            break;

                        case 959: advice="High wind in the city, Avoid going out";
                            break;


                        case 960: advice="It's storm in the city,  Avoid going out";
                                visibility="bad";
                            break;

                        case 961: advice="It's violent storm in the city,  Avoid going out";
                                    visibility="bad";

                            break;

                        case 962: advice="It's hurricane in the area,  Avoid going out";
                                visibility="bad";
                            break;
                
   
                    }   
                   

                }   

            }
            else //000-699
            {
                if (weatherID < 400) // 000 to 399
                {
                    if (weatherID <200) //000-199
                    {
                        advice="noadvise";
                    }
                    else if (weatherID < 300) // 200-299
                    {
                        advice="Please bring an umbrella with you";
                        visibility="bad";
                    
                    }
                    else //300-399
                    {
                        visibility="bad";
                       
                        advice="Please bring an umbrella with you.";
                    }

                } 
                else// 400 - 699
                {
                    if(weatherID <600)//400-599
                    {
                        if (weatherID <500) //400-499
                        {
                                advice="no advice 400-499";
                        }
                        else //500-599
                        {
                            advice="Please bring an umbrella with you.";
                            visibility="bad";
                            if (weatherID < 505) 
                            {
                                imgPath="10d.png";
                            }
                            else
                            {
                                imgPath="09d.png";
                                
                            }
                        }

                    }
                    else//600-699
                    {
                        imgPath="13d.png";
                            advice="You may want to use coat, It's freezing outside.";
                    }

                }

            }
            //
            //Advice based on current temprature
            //

            if (advice == "noadvise") {
                advice="";
            }
            var currentTemp=json.main.temp;
            if (currentTemp < 20) {
                //For weather condition where temp is low
                advice=  "It's cold outside, wear a coat !"+ "<br>" +advice; 
            }         
               else if (currentTemp >30) 
               {
                //For weather condition where temp is high
                advice="It's high temprature in the city, wear a cap or use an umbrella !" + "<br>" +advice;
               }
            
            // If there is no advise for the user then simply say "Have A Good Day !"
            if (advice == "noadvise" || advice == "") {
                advice="Have A Good Day !";
            }


               
            imgPath="img/" +json.weather[0].icon+".png";
            document.getElementById("visiblity").innerHTML="Visiblity : " + visibility;
            document.getElementById("imgID").src=imgPath;
            document.getElementById("advice").innerHTML="Advice : " + advice;

           
        }
    };
    xhr.send(null);
}






