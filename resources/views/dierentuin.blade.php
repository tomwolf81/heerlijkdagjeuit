<x-layout>

</x-layout>
   <body>
      <div class="header_section header_bg">
      

         </div>
      </div>
      <!-- header section end -->
      <!-- blog section start -->
      
      <!-- blog section start -->
 <div class="blog_section layout_padding">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="about_taital">Onze suggesties</h1>
                <div class="bulit_icon"><img src="images/bulit-icon.png"></div>
            </div>
        </div>
        <div class="blog_section_2">
            <div class="row">
                
                @foreach ($dierentuindagje as $dierentuindag)
                
                 <div class="col-md-6">
                    <div class="blog_box">
                        <img src="{{ $dierentuindag->url ? Storage::url($dierentuindag->url) : asset('images/blog-img1.png') }}" alt="Afbeelding van {{ $dierentuindag->titel }}">
                        <h4 class="date_text">{{ \Carbon\Carbon::parse($dierentuindag->datum)->format('d-m-Y') }}</h4>
                        <h4 class="prep_text">{{$dierentuindag->titel}}</h4>
                        <p class="lorem_text">{{$dierentuindag->beschrijving}}</p>
                    </div>
                    <div class="read_bt"><a href="{{ route('dierentuin.show', ['id' => $dierentuindag->id]) }}">lees meer</a></div>
                </div>
                
                @endforeach
            </div>
        </div>
    </div>
</div>

<x-footer>
</x-footer>
