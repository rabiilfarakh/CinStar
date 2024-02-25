<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
    <style>

        .full-height {
            height: 100vh;
            object-fit: cover; 
            position: relative; 
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%; 
            background-color: rgba(10, 10, 10, 0.271); 
        }
    </style>
</head>
<body class="bg-black flex justify-between">

    <div class="w-1/4 relative">
        @foreach($images as $image)
            <img src="{{ asset('img/' . $image->image . '.jpg') }}" class="full-height">
            <div class="overlay"></div> 
        @endforeach
    </div>

    <div class="flex flex-col justify-center items-center w-3/4"> 
        <div class="text-white text-4xl mb-4">Sélectionnez vos places</div> 
        <div class="shadow-lg bg-white p-4 rounded-lg w-auto mt-5">
            <div class="">
                @for($i = 0; $i < $salle->taille; $i++)
                    @if($i % 10 == 0 && $i != 0)
                        </div><div class="mt-2">
                    @endif
                    @if($salle->chaises->contains('number', $i))
                        <i class="fas fa-couch text-gray-500 hover:text-green-500 text-2xl"></i>
                    @else
                        <i class="fas fa-couch text-gray-500 hover:text-red-500 text-2xl"></i>
                    @endif
                @endfor
            </div>
        </div>
    </div>
</body>
</html>
