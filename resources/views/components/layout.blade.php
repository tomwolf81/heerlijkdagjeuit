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
         

      
      
      
 