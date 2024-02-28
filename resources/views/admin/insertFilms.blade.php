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
    @if (session('success'))
                    <div id="success-message"
                        class="bg-red-800  fixed right-20  top-50 z-50 text-white p-4 text-center animate-bounce mb-4">
                        {{ session('success') }}
                    </div>

                    <script>
                        setTimeout(function() {
                            document.getElementById('success-message').style.display = 'none';
                        }, 5000);
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
                    <label for="type" class="block text-sm font-bold mb-2">Type:</label>
                    <input type="text" id="type" name="type" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="year" class="block text-sm font-bold mb-2">Year:</label>
                    <input type="text" id="year" name="year" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="Awards" class="block text-sm font-bold mb-2">Awards:</label>
                    <input type="text" id="Awards" name="Awards" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="acteur" class="block text-sm font-bold mb-2">Actor:</label>
                    <input type="text" id="acteur" name="acteur" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                
              
                <div class="mb-4">
                    <label for="released" class="block text-sm font-bold mb-2">Released:</label>
                    <input type="text" id="released" name="released" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="Poster" class="block text-sm font-bold mb-2">Poster:</label>
                    <input type="text" id="Poster" name="Poster" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="runtime" class="block text-sm font-bold mb-2">Movie duration:</label>
                    <input type="text" id="runtime" name="runtime" required
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                
                <div class="mb-4">
                    <label for="description"
                        class="block text-sm font-bold mb-2">Description:</label>
                    <textarea id="description" name="description"
                        class="bg-gray-800 appearance-none  rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline"></textarea>
                </div>
                
            </div>
            
            <div id="image-container" class="mb-10 w-full">
                <div class="">
                    <label class="block text-sm font-bold mb-2" for="multiple_files">images</label>
                    <input type="text" name="images[]" required class="bg-gray-800 appearance-none rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline" />
                    <button class="" type="button" onclick="addImageInput()"><i class="fas fa-plus"></i></button>
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

    <script>
        function addImageInput() {
    var container = document.getElementById('image-container');
    var newInput = document.createElement('input');
    newInput.type = 'text';
    newInput.name = 'images[]'; 
    newInput.required = true;
    newInput.classList.add('block','bg-gray-800','my-6','appearance-none','rounded','w-full','py-4','px-3','text-white','leading-tight','focus:outline-none','focus:shadow-outline');
    container.appendChild(newInput);
}

    </script>
</body>

</html>
