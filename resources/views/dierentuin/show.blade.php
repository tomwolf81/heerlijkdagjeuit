<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<script src="{{ asset('js/script.js') }}"></script>
<img src="{{ asset('images/logo.png') }}" alt="Logo">


<x-layout>

</x-layout>
   <body>
      <div class="header_section header_bg">
             <div class="col-md-6">
                    <div class="blog_box">
                        <div class="blog_img"><img src="images/blog-img1.png"></div>
                        <h4 class="date_text">{{$dierentuindagje->created_at}}</h4>
                        <h4 class="prep_text">{{$dierentuindagje->titel}}</h4>
                        <p class="lorem_text">{{$dierentuindagje->beschrijving}}</p>
                    </div>                  
                </div>                               
            </div>
        </div>
    </div>
</div>

<x-footer>
</x-footer>

                    