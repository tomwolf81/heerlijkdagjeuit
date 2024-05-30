<x-layout>

</x-layout>
   <body>
      <div class="header_section header_bg">
         @include('components.navbar')

         </div>
      </div>
      <!-- header section end -->
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
                     @foreach ($dagjeuit as $dagje)
                     @if ($dagje->categorie === 'culinair')   
                     <div class="col-md-6">
                         <div class="blog_box">
                             <div class="blog_img"><img src="images/blog-img1.png"></div>
                             <h4 class="date_text">{{$dagje->datum}}</h4>
                             <h4 class="prep_text">{{$dagje->titel}}</h4>
                             <p class="lorem_text">{{$dagje->omschrijving}}</p>
                         </div>
                         <div class="read_bt"><a href="#">lees meer</a></div>
                     </div>
                     @endif
                     @endforeach
                 </div>
             </div>
         </div>
     </div>
     
           
     <x-footer>
     </x-footer>
