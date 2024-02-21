<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@^2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <!-- component -->
    @foreach($images as $image)
        <div class="min-h-screen bg-black py-6 flex flex-col justify-center sm:py-12">
            <div class="py-3 sm:max-w-xl sm:mx-auto">
                <div class="bg-white shadow-lg border-gray-100 max-h-80 border sm:rounded-3xl p-8 flex space-x-8">
                    <div class="h-48 overflow-visible w-1/2">
                        <!-- Utilisez l'URL de l'image actuelle dans la boucle -->
                        <img class="rounded-3xl shadow-lg" src="{{ asset('img/' . $image->image . '.jpg') }}" alt="{{ $film->title }}">
                    </div>
                    
                    <div class="flex flex-col w-1/2 space-y-4">
                        <div class="flex justify-between items-start">
                            <h2 class="text-3xl font-bold">{{ $film->title }}</h2>
                            <div class="bg-yellow-400 font-bold rounded-xl p-2 bg-red-500">{{ $film->rating }}.0</div>
                        </div>
                        <div>
                            <div class="text-sm text-gray-400">Film</div>
                            <div class="text-lg text-gray-800">{{ $film->genre }}</div>
                        </div>
                        <p class=" text-gray-400 max-h-40 overflow-y-hidden">{{ $film->acteur }}</p>
                         <button class="bg-red-500 text-white py-2 px-4 rounded-full">Réserver</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</body>
</html>
