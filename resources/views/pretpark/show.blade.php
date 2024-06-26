<x-layout>
</x-layout>

<div class="image-section">
    <div class="blog_box">
        <h4 class="title-text">{{ $pretparkdagje->titel }}</h4>
        <div class="blog_img">
            <img src="{{ $pretparkdagje->url ? Storage::url($pretparkdagje->url) : asset('images/blog-img1.png') }}" alt="Afbeelding van {{ $pretparkdagje->titel }}">
        </div>
        
        <p class="description-text">{{ $pretparkdagje->beschrijving }}</p>
        
            <p class="description-text">
                Buiten: {{ $pretparkdagje->buiten ? 'Aanwezig' : 'Niet aanwezig' }}
            </p>  
            <p class="description-text">
                Minder validen: {{ $pretparkdagje->minder_validen ? 'Aanwezig' : 'Niet aanwezig' }}
            </p>
            <p class="description-text">
                Restaurant aanwezig: {{ $pretparkdagje->restaurant_aanwezig ? 'Aanwezig' : 'Niet aanwezig' }}
            </p>
        </div>
    </div>
</div>




        @php
        $address = urlencode($pretparkdagje->adres . ', ' . $pretparkdagje->postcode . ' ' . $pretparkdagje->plaats);
        echo "<script>console.log('Address: $address');</script>";
    @endphp
        
    <style>
        #map {
            height: 300px;
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

                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }
</script>
<div class="blog_box">

</div>

<x-footer>
</x-footer>