

<!DOCTYPE html>
<html>
   <head>
      <!-- basic -->
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

<link rel="stylesheet" href="{{ asset('css/style.css') }}">

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
<script src="https://code.jquery.com/jquery.min.js"></script>

<script src="{{ asset('dist/bundle.js') }}" defer></script> 


      <!-- font css -->
      <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;800&display=swap" rel="stylesheet">
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- site metas -->
      <title>Een heerlijk dagje uit</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
   </head>
   <body>
      <div class="header_section">
         <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
               <a class="navbar-brand" href="index.html"><img src="#" alt="Logo"></a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav mr-auto">
                     <li class="nav-item active">
                        <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('pretpark') }}">Pretpark</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('dierentuin') }}">Dierentuin</a>
                     </li>
                  </ul>
               </div>
            </nav>

    <!-- banner section start --> 
    <div class="banner_section layout_padding">
       <div class="container">
          <div id="banner_slider" class="carousel slide" data-ride="carousel">
             <div class="carousel-inner">
                <div class="carousel-item active">
                   <div class="row">
                      <div class="col-md-6">
                     </div>
                    
                      <div class="col-md-6">
                         <div class="banner_taital_main">
                            <h1 class="banner_taital"></h1>
                            <h5 class="tasty_text">Kijk naar onze uitjes!</h5>
                            <p class="banner_text"></p>
                            <div class="btn_main">
                           </div>
                        </div>
                     </div>
                     </div>
                  </div>
               </div>
             </div>
         </div>
      </div>
   </div>
   
 </div>       
                           

 <!-- header section end -->

 <div class="coffee_section layout_padding">
    <div class="container">
       <div class="row">
          <h1 class="coffee_taital">Een kleine selectie</h1>
          <div class="bulit_icon"><img src="images/"></div>
       </div>
    </div>
     </div>
    </div>

    

   
    <div class="coffee_section_2">
      <div id="main_slider" class="carousel slide" data-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <div class="container-fluid">
                  <div class="row">
                     @if ($dagjesuit->isEmpty())
                        <p>Geen items beschikbaar.</p>
                     @else
                        @foreach ($dagjesuit as $item)
                           <div class="col-lg-3 col-md-6">
                              <div class="coffee_img">
                                 <img src="{{ $item->url ? Storage::url($item->url) : asset('images/blog-img1.png') }}" alt="Afbeelding van {{ $item->titel }}">
                              </div>
                              <h3 class="types_text">{{ $item->titel }}</h3>
                              <p class="looking_text">{{ $item->beschrijving }}</p>
                              <div class="read_bt"><a href="{{ route('pretpark.show', ['id' => $item->id]) }}">Lees meer</a></div>
                           </div>
                        @endforeach
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   
   

   

             <div class="coffee_section_2">
               <div id="main_slider" class="carousel slide" data-ride="carousel">
                  <div class="carousel-inner">
                     <div class="carousel-item active">
                        <div class="container-fluid">
                           <div class="row">
                              <div class="col-lg-3 col-md-6">
                                 <div class="coffee_img"><img src="images/leeuw met welp.jpg"></div>
                                 <h3 class="types_text"></h3>
                                 <p class="looking_text">Dit moet ik vervangen</p>
                                 <div class="read_bt"><a href="#">Lees meer</a></div>
                              </div>
        
                              <div class="col-lg-3 col-md-6">
                                 <div class="coffee_img"><img src="images/img-2.png"></div>
                                 <h3 class="types_text">BEAN VARIETIES</h3>
                                 <p class="looking_text">looking at its layout. The point of</p>
                                 <div class="read_bt"><a href="#">Read More</a></div>
                              </div>
                              <div class="col-lg-3 col-md-6">
                                 <div class="coffee_img"><img src="images/img-3.png"></div>
                                 <h3 class="types_text">COFFEE & PASTRY</h3>
                                 <p class="looking_text">looking at its layout. The point of</p>
                                 <div class="read_bt"><a href="#">Read More</a></div>
                              </div>
                              <div class="col-lg-3 col-md-6">
                                 <div class="coffee_img"><img src="images/img-4.png"></div>
                                 <h3 class="types_text">COFFEE TO GO</h3>
                                 <p class="looking_text">looking at its layout. The point of</p>
                                 <div class="read_bt"><a href="#">Read More</a></div>
                              </div>
                           </div>
                        </div>
                     </div>
                   </div>
                           </div>
                        </div>
                     </div>     
 
 <x-footer>
   
 </x-footer>