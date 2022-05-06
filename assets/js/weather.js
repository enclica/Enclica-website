//get city name and country from user longitude and latitude with open street maps

var weather;

function getCityName(lat, lon) {
    var latlon = lat + "," + lon;
    var url = "//nominatim.openstreetmap.org/reverse?format=json&lat=" + lat + "&lon=" + lon + "&zoom=18&addressdetails=1";
    var city = "";
    var country = "";
    $.ajax({
        url: url,
        dataType: "json",
        async: false,
        success: function(data) {
            city = data.address.city;
            country = data.address.country;
        },
        error: function(data) {
            console.log("error");
        }
    });
    return city + ", " + country;
}



function getWeatherData(location) {


    var url = "//weatherdbi.herokuapp.com/data/weather/" + location;
    var weatherData = "";
    $.ajax({
        url: url,
        type: 'GET',
        headers: {
            "accept": "application/json",
            "Access-Control-Allow-Origin": "*"
        },
        dataType: 'json',
        async: false,
        success: function(data) {
            console.log(data);
            weatherData = data;


        }
    });
    return weatherData;
}

function bgchange(bg) {

    $('#weatherbg').animate({ opacity: 0 }, 0).css("background-image", "url(" + bg + ")").animate({ opacity: 1 }, 1000);
}

function weather_bg_marker(currentconditions) {
    switch (currentconditions) {
        case "Mostly cloudy":
            bgchange("https://i.picsum.photos/id/1056/3988/2720.jpg?hmac=qX6hO_75zxeYI7C-1TOspJ0_bRDbYInBwYeoy_z_h08");
            break;
        case "Sunny" || "Clear":
            bgchange("https://i.picsum.photos/id/165/2000/1333.jpg?hmac=KK4nT-Drh_vgMxg3hb7rOd6peHRIYmxMg0IEyxlTVFg");
            break;
        case "Showers":
            bgchange("https://i.picsum.photos/id/171/2048/1536.jpg?hmac=16eVtfmqTAEcr8VwTREQX4kV8dzZKcGWI5ouMlhRBuk");

        default:
            bgchange("https://i.picsum.photos/id/1056/3988/2720.jpg?hmac=qX6hO_75zxeYI7C-1TOspJ0_bRDbYInBwYeoy_z_h08");
            break;
    }
}



$(document).ready(function() {
    $('#weather-data').hide();

    //get lon lat from browser location
    var lat;

    var lon;
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
            lat = position.coords.latitude;
            lon = position.coords.longitude;
            var location = getCityName(lat, lon);
            $("#location").html(location);
            var weatherData = getWeatherData(location);
            weather = weatherData;
            $("#temp").html(weather.currentConditions.temp.c + "&deg;C");
            $("#weatherbg").css("background-size", "auto");
            $("#weatherbg").css("background-repeat", "no-repeat");

            weather_bg_marker(weather.currentConditions.currentConditions);
            $("#currentconditions").html(weather.currentConditions.comment);
            $("#icon").attr("src", weather.currentConditions.iconURL);
            $('#status').hide();
            $('#weather-data').show();

            //load temperature into temperature h1 tag, set location into location h2 tag




        });

    }
});