<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="{{ asset('assets/css/pagefilm/style.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <title>Document</title>
</head>
<body>


@php
$random = rand(0,count($movie->images)-1);
@endphp
<div class="page1" style="
    background-image: linear-gradient(to left, rgba(139, 0, 0, 0.32), rgba(0, 0, 0, 1)), url({{$movie->images[$random]->image}});
"
>





<div class="content active">

<h1>{{$movie->title}}</h1>


<div class="info">
  @php
 $mins = (int)$movie->runtime;

$hours = floor($mins / 60);
$remainingMinutes = $mins % 60;

$genres = $movie->genre;
$genresArray = explode(',', $genres);
  @endphp


<div class="genres mb-2 flex gap-4">
    @foreach($genresArray as $genres)

    <h4 class="genre">{{$genres}}</h4>

    @endforeach
  </div>

  

    <div class="times flex gap-2 items-center">
      <h4>{{$movie->type}} +</h4>
      <h4> {{$movie->released}} +</h4>
      <h4>{{$hours.'h'}} {{$remainingMinutes.'m'}}</h4>
    </div>



    <p>{{$movie->description}}</p>


 <div class="flex justify-between w-full items-center">


 @if($movie->statut == 2)
 <a href="{{ route('film.reservation', ['slug' => $movie->slug]) }}"><button class="buy">Buy A Ticket</button></a>
 
 @else
<button class="buy">Not available for Now</button>
 @endif

 <div class="navigation flex gap-3">
  <span class="left"><i class='bx bx-left-arrow'></i></span>
  <span class="right"><i class='bx bx-right-arrow'></i></span>
 </div>


 </div>
  </div>



  

  <div class="images flex items-center justify-center gap-4">


  @foreach($movie->images as $index => $image)
  <div class="movieimage{{ $loop->first ? ' active' : '' }}" style="background-image: url('{{ $image->image }}')">
  </div>
@endforeach

  </div>

 

</div>



</div>


</div>






<script>

  var items = document.querySelectorAll('.movieimage');
  var next = document.querySelector('.right');
  var prev = document.querySelector('.left');

  let countItem = items.length;
  let itemActive = 0;

  next.onclick = function () {
    itemActive = itemActive + 1;
    if(itemActive >= countItem){
      itemActive = 0;
    }

    showSlider();

  }


  prev.onclick = function () {
    itemActive = itemActive - 1;
    if(itemActive < 0){
      itemActive = countItem - 1;
    }
    showSlider();
  }


  function showSlider() {
    items.forEach(function(thumbnail) {
      thumbnail.classList.remove('active'); 
      
    });

   items[itemActive].classList.add('active');

    var style = items[itemActive].getAttribute('style');
    var url = style.split('url(')[1].split(')')[0];
    url = url.substring(1, url.length - 1);

   document.querySelector('.page1').style.backgroundImage = 'linear-gradient(to left, rgba(139, 0, 0, 0.32), rgba(0, 0, 0, 1)), url(' + url + ')';
  }



</script>


</body>
</html>