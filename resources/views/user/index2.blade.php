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
$random = rand(1,15);
$randomIndex = rand(0, count($films[$random]->images) - 1)
@endphp





<div id="sidebar" class="">


<div class="left">
<i class='bx bx-search' data-modal-target="default-modal" data-modal-toggle="default-modal"></i>
<i class='bx bx-home active' ></i>
<i class='bx bx-camera-movie' ></i>

<i class='bx bx-bell'></i>

<div>
        
    
        <button id="dropdownUserAvatarButton" data-dropdown-toggle="dropdownAvatar" class="flex text-sm bg-gray-800 rounded-full md:me-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" type="button">
        <span class="sr-only">Open user menu</span>
        <img class="w-8 h-8 rounded-full" src="/docs/images/people/profile-picture-3.jpg" alt="user photo">
        </button>
        
        <!-- Dropdown menu -->
       
        
            </div>

</div>


<div class="right flex flex-col gap-5">
  <div class="form">

  <ion-icon class="arrow" name="arrow-back-outline"></ion-icon>
    <input type="text" id="searchinput" name="search">
    <ion-icon class="iconsearch" name="search-outline"></ion-icon>
  </div>


  <div class="field  gap-2">


  </div>
</div>



<div class="notification">


    <div class="field2">
      @if(count($notifications) < 0)

      <h1>NO Notifications</h1>

      @else


      @foreach($notifications as $notification)

      <div>
        <p>{{$notification->message}}</p>
        <p>{{$notification->created_at}}</p>
      </div>
    
      @endforeach



      @endif

    </div>


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

@foreach($films as $film)

@if($film->statut == 2)
<a href="{{ route('film.show' , ['slug' => $film->slug])}}"><div class="movie" style="background-image:url('{{$film->Poster}}')"></div></a>

@endif

@endforeach
</div>

    
</div>


<div class="available text-white flex flex-col gap-2">

<h2>Series</h2>


<div class="flex flex-wrap gap-4">

@foreach($series as $serie)
<a href="{{ route('film.show', ['slug' => $serie->slug]) }}">
  <div class="movie" style="background-image:url('{{$serie->Poster}}')"></div>
</a>


@endforeach

</div>

    
</div>




<div class="available text-white flex flex-col gap-2">

<h2 id="mov">Movies</h2>


<div class="flex flex-wrap gap-4">

@foreach($movies as $movie)

<a href="{{ route('film.show', ['slug' => $movie->slug]) }}">
  <div class="movie" style="background-image:url('{{$movie->Poster}}')"></div>
</a>


@endforeach

</div>

    
</div>

</section>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<script>
var filmRoute = "{{ route('film.show', ['slug' => ':slug']) }}";



document.querySelector('.form input').addEventListener('input', function() {
    let inputValue = this.value;

    let xml = new XMLHttpRequest();
    var container = document.querySelector('.field');

    xml.onload = function() {
        if (this.readyState == 4 && this.status == 200) {
            let movies = JSON.parse(this.responseText);

            if (inputValue == '') {
                container.innerHTML = '';
            } else {
                container.innerHTML = ''; // Clear the container before appending new movies
                movies.forEach(function(movie) {
                  let a = document.createElement('a');
                  a.setAttribute('href', filmRoute.replace(':id', movie['id'])); 
                    let div = document.createElement('div');
                    div.style.backgroundImage = 'url(' + movie['Poster'] + ')';
                    div.classList.add('movie');
                    a.appendChild(div);
                    container.appendChild(a);
                });
            }
        }
    };

    let url = '/search?search=' + inputValue;
    xml.open('GET', url);
    xml.send();
});





            document.querySelector('.bx-search').addEventListener('click', function() {
    var rightSidebar = document.querySelector('#sidebar .right');
    if (rightSidebar.style.display === "flex" && rightSidebar.style.width === "93vw") {

      document.querySelector('#sidebar .right .form').classList.remove('active');
        rightSidebar.style.width = '0';
        document.querySelector('#sidebar').style.zIndex = '0';
        setTimeout(function() {
          
            rightSidebar.style.display = "none";
            

        }, 700); 
    } else {
      document.querySelector('#sidebar').style.zIndex = '3000';
        rightSidebar.style.display = "flex";
        rightSidebar.classList.add('active');
        setTimeout(function() {
            rightSidebar.style.width = '93vw';

        }, 100); 


        setTimeout(function() {
            document.querySelector('#sidebar .right .form').classList.add('active');
        },1000)
    }
});




document.querySelector('.bx-bell').addEventListener('click' , function() {
  var notificationpage = document.querySelector('#sidebar .notification');


  if (notificationpage.style.display === "flex" && notificationpage.style.width === "93vw") {
    notificationpage.style.width = '0';
      document.querySelector('#sidebar').style.zIndex = '0';
  setTimeout(function() {
     notificationpage.style.display = "none";
  }, 700); 
} 

else {
  document.querySelector('#sidebar').style.zIndex = '3000';
  notificationpage.style.display = "flex";
  notificationpage.classList.add('active');

  setTimeout(function() {
            notificationpage.style.width = '93vw';

        }, 100); 


}




})










document.querySelector('.bx-camera-movie').addEventListener('click', function() {
  document.querySelector('.available #mov').scrollIntoView({ behavior: 'smooth' });
});




</script>




<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>