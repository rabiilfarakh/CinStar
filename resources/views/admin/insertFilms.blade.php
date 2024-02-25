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
    @if (session()->has('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

</head>

<body class="bg-[#111111]">
    <div class="flex justify-between">
    <div>
        @include('layouts.sideBarAdmin')
    </div>

      
           
    <div class="md:w-[80%]">
        <form action="{{ route('film.store') }}" method="POST" enctype="multipart/form-data"
            class="bg-black text-white shadow-lg rounded px-8 pt-6 mt-10 pb-8 md:mx-8 mb-4">
            @csrf
            <div class="grid md:grid-cols-2 grid-cols-1 gap-4">
                <div class="mb-4">
                    <label for="title" class="block text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" required
                        class="bg-gray-800 appearance-none rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="genre" class="block text-sm font-bold mb-2">Genre:</label>
                    <input type="text" id="genre" name="genre" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="acteur" class="block text-sm font-bold mb-2">Acteur:</label>
                    <input type="text" id="acteur" name="acteur" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-sm font-bold mb-2">Date:</label>
                    <input type="date" id="date" name="date" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="salle_id" class="block text-sm font-bold mb-2">Salle Name:</label>
                    <select name="salle_id" id="salle_id" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                        @foreach ($salles as $salle)
                            <option value="{{ $salle->id }}">{{ $salle->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="images" class="block text-sm font-bold mb-2">Images:</label>
                    <input type="file" id="images" name="images[]" accept="image/*" multiple required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="rating" class="block text-sm font-bold mb-2">Rating:</label>
                    <input type="number" id="rating" name="rating" min="0" max="5"
                        step="0.1" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="length" class="block text-sm font-bold mb-2">Length:</label>
                    <input type="text" id="length" name="length" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="presentation_time"
                        class="block text-sm font-bold mb-2">Presentation Time:</label>
                    <select name="presentation_time" id="presentation_time" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                        <option value="20h">20h</option>
                        <option value="23h">23h</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="description"
                        class="block text-sm font-bold mb-2">Description:</label>
                    <textarea id="description" name="description"
                        class="bg-gray-800 appearance-none  rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
            </div>
            <div class="flex  ">
                <button type="submit"
                    class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add
                    Film</button>
            </div>
        </form>
    </div>
    
    </div>
</body>

</html>
