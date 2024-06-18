var directionsService;
var directionsDisplay;
var googleAPILoaded = false;

function initMap() {
    directionsService = new google.maps.DirectionsService;
    directionsDisplay = new google.maps.DirectionsRenderer;
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 6,
        center: {lat: 52.0841037, lng: 4.9424092},
        mapTypeId: 'roadmap',
    });
    directionsDisplay.setMap(map);
    googleAPILoaded = true;
}

function displayRouteIntern(mapsHerkomst, mapsTussenstops, mapsBestemming, sidebarRouteSegments) {
    var wayPoints = [];
    for (var i = 0; i < mapsTussenstops.length; i++) {
        if (mapsTussenstops[i] != null && mapsTussenstops[i].trim() != '') {
            wayPoints.push({
                location: mapsTussenstops[i],
                stopover: true
            });
        }
    }
    var selectedMode = 'DRIVING';
    var routeParameters = {
        origin: mapsHerkomst,
        destination: mapsBestemming,
        waypoints: wayPoints,
        optimizeWaypoints: false,
        travelMode: google.maps.TravelMode[selectedMode],
        drivingOptions: {
            departureTime: new Date(Date.now()),  // for the time N milliseconds from now.
            trafficModel: 'pessimistic',
        }
    };

    directionsService.route(routeParameters, function (response, status) {

        if (status === 'OK') {
            directionsDisplay.setDirections(response);
            var route = response.routes[0];
            var summaryPanel = document.getElementById('navigatie-paneel');
            summaryPanel.innerHTML = '';
            routeDetailsTotaal(route, summaryPanel);
            routeDetailsSegments(sidebarRouteSegments, summaryPanel);
        } else {
            alert('Oeps, routebeschrijving is mislukt vanwege ' + status);
        }
    });
}

function displayRoute(herkomst, tussenstops, bestemming, sidebarRouteSegments) {
    setTimeout(displayRouteTimeout, 10, herkomst, tussenstops, bestemming, sidebarRouteSegments);
}

function displayRouteTimeout(herkomst, tussenstops, bestemming, sidebarRouteSegments) {
    if (googleAPILoaded) {
        displayRouteIntern(herkomst, tussenstops, bestemming, sidebarRouteSegments);
    } else {
        setTimeout(displayRouteTimeout, 10, herkomst, tussenstops, bestemming, sidebarRouteSegments);
    }
}


function computeTotalDistance(route) {
    var total = 0;
    for (var i = 0; i < route.legs.length; i++) {
        total += route.legs[i].distance.value;
    }
    total = total / 1000;
    return round(total, 1) + ' km';
}

function routeDetailsTotaal(route, summaryPanel) {
    summaryPanel.innerHTML +=
        '<h5>Afstand: ' + computeTotalDistance(route) + '</h5>';
}

function routeDetailsSegments(route, summaryPanel) {
    for (var i = 0; i < route.length; i++) {
        routeDetailsSegment(i, route[i], summaryPanel);
    }
}

function routeDetailsSegment(counter, adres, summaryPanel) {
    var routeSegment = String.fromCharCode(65 + counter);
    summaryPanel.innerHTML += '<p><strong> ' + routeSegment + ':</strong> ' + adres + '</p>';
}

function round(value, decimals) {
    return Number(Math.round(value + 'e' + decimals) + 'e-' + decimals);
}
