<!DOCTYPE html>
<html>
<head>
    <script src="https://maps.google.com/maps/api/js?key={{ env('GOOGLE_API_KEY') }}"
            type="text/javascript"></script>
</head>
<body>
@extends('layouts.app')
@include('partials.nav')

<div id="full-size-map"></div>


<script type="text/javascript">

    var photos = {!! json_encode($photos) !!};

    var locations = [];

    for(i=0; i< photos.length; i++){
        var name = photos[i].location;
        var lat = photos[i].lat;
        var long = photos[i].long;
        var link = photos[i].slug;
        locations.push([name, lat, long, i, link]);
    }

    console.log(locations);

    var map = new google.maps.Map(document.getElementById('full-size-map'), {
        zoom: 2,
        center: new google.maps.LatLng(0,0),
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i][1], locations[i][2]),
            map: map,
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow.setContent(locations[i][0]);
                infowindow.open(map, marker);
                window.open(
                    '/places/' + locations[i][4],
                    '_blank'
                );
            }
        })(marker, i));
    }
</script>
</body>
</html>
