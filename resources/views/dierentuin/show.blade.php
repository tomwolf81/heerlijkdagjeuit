<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/script.js') }}"></script>
<img src="{{ asset('images/logo.png') }}" alt="Logo">


<x-layout>

</x-layout>


<body>
   <div class="about_section layout_padding">
       <div class="container">
        <div class="blog_box">
            <img src="{{ $dierentuindagje->url ? Storage::url($dierentuindagje->url) : asset('images/blog-img1.png') }}" alt="Afbeelding van {{ $dierentuindagje->titel }}">
            <h4 class="date_text">{{ \Carbon\Carbon::parse($dierentuindagje->datum)->format('d-m-Y') }}</h4>
            <h4 class="prep_text">{{$dierentuindagje->titel}}</h4>
            <p class="lorem_text">{{$dierentuindagje->beschrijving}}</p>
        </div>
    </div>    
<x-footer>
</x-footer>

                    