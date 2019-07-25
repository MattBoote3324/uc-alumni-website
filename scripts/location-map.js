function initMap() {
    var mapCenter = { lat: -43.523214, lng: 172.580646 };

    var map = new google.maps.Map(document.getElementById('map'), {
        center: mapCenter,
        zoom: 14,
        scrollwheel: false
    });

    var marker = new google.maps.Marker({
        position: mapCenter,
        map: map,
        title: "Okeover House"
    });
};
