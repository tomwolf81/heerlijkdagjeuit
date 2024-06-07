

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

<div class="map_main">
    <div class="map-responsive">
        @php
             $apiKey = env('GOOGLE_MAPS_API_KEY'); // Zorg ervoor dat je API-sleutel in je .env-bestand staat
        @endphp
        <iframe src="https://www.google.com/maps/embed/v1/place?key={{ $apiKey }}&q={{ urlencode($pretparkdagje->adres . ', ' . $pretparkdagje->postcode . ' ' . $pretparkdagje->plaats) }}" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    </div>
</div>
<x-footer></x-footer>

</body>
</html>




