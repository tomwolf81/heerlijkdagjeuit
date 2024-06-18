<x-layout>
</x-layout>

<div class="image-section">
    <div class="blog_box">
        <h4 class="title-text">{{ $pretparkdagje->titel }}</h4>
        <div class="blog_img">
            <img src="{{ $pretparkdagje->url ? Storage::url($pretparkdagje->url) : asset('images/blog-img1.png') }}" alt="Afbeelding van {{ $pretparkdagje->titel }}">
        </div>
        
        <p class="description-text">{{ $pretparkdagje->beschrijving }}</p>
    </div>
</div>

 

        @php
        $address = urlencode($pretparkdagje->adres . ', ' . $pretparkdagje->postcode . ' ' . $pretparkdagje->plaats);
        echo "<script>console.log('Address: $address');</script>";
    @endphp
        
    <style>
        #map {
            height: 400px;
            width: 100%;
        }
    </style>
</head>
<body>
    <div id="map"></div>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer></script>
<script>
    function initMap() {
        var geocoder = new google.maps.Geocoder();
        var address = "{{ $address }}"; 

        geocoder.geocode({ 'address': address }, function(results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                var map = new google.maps.Map(document.getElementById('map'), {
                    center: results[0].geometry.location,
                    zoom: 15 
                });

                var marker = new google.maps.marker.AdvancedMarkerElement({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>

<x-footer>
</x-footer>