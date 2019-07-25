// Load the map after page load
window.onload = initMap('Oceania');


function downloadUrl(url,callback) {
	var request = window.ActiveXObject ?
    new ActiveXObject('Microsoft.XMLHTTP') :
    new XMLHttpRequest;

	request.onreadystatechange = function() {
		if (request.readyState == 4) {
			callback(request, request.status);
		}
	};

	request.open('GET', url, true);
	request.send(null);
}


function placeMarker(country, count, map, html, infoWindow) {
	var query_string = "http://www.mapquestapi.com/geocoding/v1/address?key=TEBIvFKaF9J930pHfC8YgTMokelCXtVj&adminArea1=" + country;
    var xhr = new XMLHttpRequest();
    xhr.open("GET", query_string, true);
	xhr.onload = function (e) {
		var result = JSON.parse(xhr.responseText);
		var lat = result.results[0].locations[0].latLng.lat;
		var lng = result.results[0].locations[0].latLng.lng;
	
		var marker = new google.maps.Marker({
		   map: map,
		   position: {lat, lng}
		});
		bindInfoWindow(marker, map, infoWindow, html);
	}
	
	xhr.send();
}


function bindInfoWindow(marker, map, infoWindow, html) {
  google.maps.event.addListener(marker, 'click', function() {
    infoWindow.setContent(html);
    infoWindow.open(map, marker);
  });
}


function getRegionInfo(region) {
	var latitude;
	var longitude;
	var xmlScript;
	
	if (region == 'Asia') {
		// Center map on Asia
		latitude = 28.394857;
		longitude = 84.124008;
		var xmlScript = "generate-asia-xml.php";
	} else if (region == 'Oceania') {
		// Center map on Oceania
		latitude = -17.713371;
		longitude = 178.065032;
		var xmlScript = "generate-australasia-xml.php";
	} else if (region == 'Europe') {
		// Center map on Europe
		latitude = 51.165691;
		longitude = 10.451526;
		var xmlScript = "generate-europe-xml.php";
	} else if (region == 'Africa') {
		// Center map on Europe
		latitude = 6.611111;
		longitude = 20.939444;
		var xmlScript = "generate-africa-xml.php";
	} else if (region == 'North America') {
		// Center map on North America
		latitude = 37.090240;
		longitude = -95.712891;
		var xmlScript = "generate-nth-america-xml.php";
	} else if (region == 'South America') {
		// Center map on South America
		latitude = -23.442503;
		longitude = -58.443832;
		var xmlScript = "generate-sth-america-xml.php";
	} else {
		// Center map at 0,0
		latitude = 0;
		longitude = 0;
		var xmlScript = "";

	}
	
	return [{lat: latitude, lng: longitude}, xmlScript];
}


function initMap(region) {
	var regionInfo = getRegionInfo(region);
	
    var map = new google.maps.Map(document.getElementById('map'), {
        center: regionInfo[0],
        zoom: 4
    });
	
	var infoWindow = new google.maps.InfoWindow;
	
	downloadUrl("/uc-alumni-website/php/" + regionInfo[1], function(data) {
		var xml = data.responseXML;
		var markers = xml.documentElement.getElementsByTagName("marker");
		for (var i = 0; i < markers.length; i++) {
			var country = markers[i].getAttribute("country");
			var count = markers[i].getAttribute("count");
			var html = "<b>" + country + "</b> <br/>No. Of Alumni: " + count;
			placeMarker(country, count, map, html, infoWindow);
		}
	});
}