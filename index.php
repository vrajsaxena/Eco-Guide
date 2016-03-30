<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
var map;
function initMap() {
	map = new google.maps.Map(document.getElementById('page-wrapper'), {
		center: {lat: 40.76487, lng: -102.41948},
		zoom: 4
	});



	$(function () {
		$.ajax({
			url: 'load_data.php',
			data: "",
			dataType: 'json',
			success: function(data) {
				var parks = data.parks;
				var markers = [];
				var infoWindowContent = [];
				for (var i = 0; i < parks.length; i++) {
					var row = parks[i];
					
					infoWindowContent[i] = ['<div id="park_content">'+
	'<h2><p>'+row.name+'</p></h2></div>'+
	'<img src="'+row.image+'"</img>'+
	'<p><b>Country:</b> '+row.country+'</p>'+
	'<p><b>Park Area:</b> '+row.area+' square kilometers</p>'+
	'<p><b>User Rating:</b> '+row.rating+'</p>'+
	'<p><b>Ecoregion:</b> '+row.ecoregion+'</p>'+
	'<p><b>Habitat:</b> '+row.habitat_type+'</p>'+
	'<p><b>Conservation Status:</b> '+row.conservation_status+'</p>'+
	'<p><b>About the Area:</b> '+row.about_the_area+'</p>'+
	'<p><b>Local Species:</b> '+row.local_species+'</p>'+
	'<p><b>Featured Species:</b> '+row.featured_species+'</p>'+
	'<p><b>Threats to the Region:</b> '+row.threats+'</p>'+
	'<p><b>Date Established:</b> '+row.date_established+'</p>'+
	'<p><a href="'+row.url+'">learn more</a></p>'
	];
					markers[i] = [parseFloat(row.latitude), parseFloat(row.longitude), row.name];
					
				}
				var marker;
				var i;
				var infoWindow = new google.maps.InfoWindow();
				for (i = 0; i < markers.length; i++) {
					var position = new google.maps.LatLng(markers[i][0], markers[i][1]);
					marker = new google.maps.Marker({
	    					position: position,
	    					map: map,
	    					title: markers[i][2]
	  				});
					google.maps.event.addListener(marker, 'click', (function(marker, i) {
					    return function() {
						infoWindow.setContent(infoWindowContent[i][0]);
						infoWindow.open(map, marker);
					    }
					})(marker, i));

				}
			}
		});
	});


}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfWyBajE9V4FUB-sYJvWdNrF9U-viQ4hA&callback=initMap"
        async defer></script>
		
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600,700,900" rel="stylesheet" />
<link href="default.css" rel="stylesheet" type="text/css" media="all" />
<link href="fonts.css" rel="stylesheet" type="text/css" media="all" />

<!--[if IE 6]><link href="default_ie6.css" rel="stylesheet" type="text/css" /><![endif]-->

</head>
<body>


	<div id="page-wrapper">
	

</div>

</body>
</html>
