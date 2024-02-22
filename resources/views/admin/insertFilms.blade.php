<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Film</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#111111]">
    <div class="flex flex-col h-screen ">

        @include('layouts.sideBarAdmin')
    
    
            <div class="flex-1 p-4 w-full ">


        <div class="container mx-auto p-4">
            <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data" class="max-w-full  mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
                    <input type="text" id="genre" name="genre" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="acteur" class="block text-gray-700 text-sm font-bold mb-2">Acteur:</label>
                    <input type="text" id="acteur" name="acteur" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                    <input type="date" id="date" name="date" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="salle_id" class="block text-gray-700 text-sm font-bold mb-2">Salle Name:</label>
                    <select name="salle_id" id="salle_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach($salles as $salle)
                            <option value="{{ $salle->id }}">{{ $salle->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="images" class="block text-gray-700 text-sm font-bold mb-2">Images:</label>
                    <input type="file" id="images" name="images[]" accept="image/*" multiple required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="rating" class="block text-gray-700 text-sm font-bold mb-2">Rating:</label>
                    <input type="number" id="rating" name="rating" min="0" max="5" step="0.1" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                
                
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Film</button>
            </div>
            </form>
        </div>
            </div>
        </div>
    </div>
    </body>
    
    </html>
    
    
