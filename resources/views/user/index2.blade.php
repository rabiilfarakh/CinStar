<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/pagehome/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>



@php
$random = rand(1,16);
$randomIndex = rand(0, count($films[$random]->images) - 1)
@endphp





<div id="sidebar" class="flex flex-col items-center justify-center gap-8 h-full w-full">
<i class='bx bx-search'></i>
<i class='bx bx-home active' ></i>
<i class='bx bx-camera-movie' ></i>



<div>
        
    
        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
        </button>
        
        <!-- Dropdown menu -->
       
        
            </div>

        
</div>







<section id="content" class="" style="background-image:
    linear-gradient(to bottom, rgba(0, 0, 0, 0.52), rgba(0, 0, 0,1)),
    url({{$films[$random]->images[$randomIndex]->image}});">



<main class="flex flex-col">

<h1>{{$films[$random]->title}}</h1>


<div class="flex gap-3">
    
<div class="poster" style="background-image : url('{{$films[$random]->Poster}}')">

</div>


  <div class="flex flex-col gap-1 movieinfos text-white">
    <div class="flex gap-1">
    <p>{{$films[$random]->year}}</p>

@php
 $input = $films[$random]->runtime;
 $mins = (int)$input;

 $hours = floor($mins / 60);
 $remainingMinutes = $mins % 60;
 @endphp

 <p>{{$hours.'h'}} {{$remainingMinutes.'m'}}</p>
    </div>


    @php
    $genres = $films[$random]->genre;
    $genresArray = explode(',', $genres);
    @endphp
    <div class="genre flex gap-3">
      @foreach($genresArray as $genre)
        <h4>{{$genre}}</h5>
      @endforeach
    </div>

    <h2 class="font-bold text-xl">{{$films[$random]->type}}</h2>


    <h5>{{$films[$random]->description}}</h5>
  </div>



</div> 




</main>






    
</section>



<section id="page2" class="flex gap-2 flex-col">

<div class="available text-white flex flex-col gap-2">

<h2>Available This Week</h2>


<div class="flex flex-wrap gap-4">









    
  </div>

    
</div>


<div class="available text-white flex flex-col gap-2">

<h2>Series</h2>


<div class="flex flex-wrap gap-4">

@foreach($series as $serie)

  <div class="movie" style="background-image:url('{{$serie->Poster}}')"></div>

@endforeach

</div>

    
</div>




<div class="available text-white flex flex-col gap-2">

<h2>Movies</h2>


<div class="flex flex-wrap gap-4">

@foreach($movies as $movie)

  <div class="movie" style="background-image:url('{{$movie->Poster}}')"></div>

@endforeach

</div>

    
</div>

</section>










<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>