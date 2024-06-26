<x-layout>
</x-layout>

<body>
    <div class="header_section header_bg"></div>

    <!-- Blog section start -->
    <div class="blog_section layout_padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="about_taital">Pretparken</h1>
                    <div class="bulit_icon">
                        <img src="images/bulit-icon.png">
                    </div>
                </div>
            </div>
            <div class="blog_section_2">
                <div class="grid-container">
                    @foreach ($pretparkdagje as $pretparkdag)
                        <div class="grid-item">
                            <div class="blog_box">
                                <img src="{{ $pretparkdag->url ? Storage::url($pretparkdag->url) : asset('images/blog-img1.png') }}" alt="Afbeelding van {{ $pretparkdag->titel }}">
                                <h4 class="date_text">{{ \Carbon\Carbon::parse($pretparkdag->datum)->format('d-m-Y') }}</h4>
                                <h4 class="prep_text">{{$pretparkdag->titel}}</h4>
                                <p class="lorem_text">{{$pretparkdag->beschrijving}}</p>
                            </div>
                            <div class="read_bt">
                                <a href="{{ route('pretpark.show', ['id' => $pretparkdag->id]) }}">lees meer</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

<x-footer>
</x-footer>
