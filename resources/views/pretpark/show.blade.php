<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $pretparkdagje->titel }} - Dagje Uit</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
</head>
<body>
    <img src="{{ asset('images/') }}" alt="Logo">

    <x-layout></x-layout>

    <div class="image-section">
        <div class="blog_box">
            <h4 class="title-text">{{ $pretparkdagje->titel }}</h4>
            <div class="blog_img">
                <img src="{{ $pretparkdagje->url ? Storage::url($pretparkdagje->url) : asset('images/blog-img1.png') }}" alt="Afbeelding van {{ $pretparkdagje->titel }}">
            </div>
            
            <p class="description-text">{{ $pretparkdagje->beschrijving }}</p>
        </div>
    </div>

    <x-footer></x-footer>
</body>
</html>
