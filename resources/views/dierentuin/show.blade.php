<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/script.js') }}"></script>
<img src="{{ asset('images/logo.png') }}" alt="Logo">

<x-layout>   
</x-layout>

<body>
    <div class="image-section">
        <div class="blog_box">
            <h4 class="title-text">{{ $dierentuindagje->titel }}</h4>
            <div class="blog_img">
                <img src="{{ $dierentuindagje->url ? Storage::url($dierentuindagje->url) : asset('images/blog-img1.png') }}" alt="Afbeelding van {{ $dierentuindagje->titel }}">
            </div>
            
            <p class="description-text">{{ $dierentuindagje->beschrijving }}</p>
        </div>
    </div>
    
    <div class="map_main">
        <div class="map-responsive">
           <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&amp;q=Eiffel+Tower+Paris+France" width="250" height="500" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
        </div>
     </div>
  </div>
</div>
</div>
</div>
<x-footer>
</x-footer>

                    