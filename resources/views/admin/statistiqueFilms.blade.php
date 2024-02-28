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

    <div class="flex">
        <div class="md:w-[20%]  mr-auto">
            @include('layouts.sideBarAdmin')
        </div>

        <div
            class="md:w-[85%] ml-auto overflow-x-auto overflow-y-scroll min-h-full w-full my-14 md bg-white p-4 shadow rounded-lg">
            <div class="my-1"></div>
            <div class="bg-gradient-to-r from-red-300 to-red-500 h-px mb-6"></div>
            <table class="w-full table-auto text-center text-sm">
                <thead>
                    <tr class="text-sm  bg-gradient-to-r from-red-500 to-red-700  rounded leading-normal">
                        <th class="py-2 px-4 font-bold uppercase text-sm text-white border-b border-gray-700">
                            Image</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Title</th>
                        <th class="py-2 px-4 font-bold uppercase text-sm text-white border-b border-gray-700">
                            Gender</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Actors</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Type</th>
                        <th class="py-2 px-4font-bold uppercase text-sm text-white border-b border-gray-700">
                            Runtime</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Released</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Awards</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Year</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $film)
                        <tr class="hover:bg-gray-200">
                            <td class="py-2 px-4 border-b border-gray-700">
                                <img src="{{ $film->Poster }}" alt="Film Image" class="rounded-[3px] h-20 w-20">

                            </td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->title }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->genre }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->acteur }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->type }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->runtime }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->released }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->Awards }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->year }}</td>
                            <td class="py-2 px-4 border-b border-gray-700 relative">
                                <div class="dropdown inline-block  relative">
                                    <button
                                        class="  text-gray-800 font-semibold py-2 px-4 rounded inline-flex items-center"
                                        onclick="toggleModal('modalActions{{ $film->id }}')">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu  absolute hidden text-gray-700 z-50 pt-1"
                                        id="modalActions{{ $film->id }}">
                                        <li>

                                            <form action="/editData" method="post"
                                                class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">
                                               @csrf
                                                <input type="hidden" name="film_id" value="{{ $film->id }}">
                                                <button type="submit">Edit</button>
                                            </form>

                                        </li>
                                        <li>
                                            <form action="{{ route('film.delete', ['id' => $film->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Are you sure you want to delete {{ $film->title }}?')"
                                                    class="bg-gray-400 hover:bg-gray-600 py-2 px-4 block whitespace-no-wrap">Delete</button>
                                            </form>


                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>

    <div class="container mx-auto hidden fixed bg-white/45 left-0 right-0 top-0 bottom-0  p-4" id="FormModal">
        <form action="/update" method="POST" enctype="multipart/form-data"
            class="max-w-[80%]  md:ml-40 md:mb-20 mx-auto  bg-black text-white shadow-lg rounded px-8 pt-6 mt-5 pb-8 md:mx-8 ">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div class="mb-4">
                    @csrf
                    <input type="hidden" name="film_id" value="{{ $filmEdit ? $filmEdit->id : '' }}">
                    <label for="title" class="block text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" required value="{{ $filmEdit ? $filmEdit->title : '' }}"
                        class="bg-gray-800 appearance-none rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="genre" class="block text-sm font-bold mb-2">Genre:</label>
                    <input type="text" id="genre" name="genre" required value="{{ $filmEdit ? $filmEdit->genre : '' }}"
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="type" class="block text-sm font-bold mb-2">Type:</label>
                    <input type="text" id="type" name="type" required value="{{ $filmEdit ? $filmEdit->type : '' }}"
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="year" class="block text-sm font-bold mb-2">Year:</label>
                    <input type="text" id="year" name="year" required value="{{ $filmEdit ? $filmEdit->year : '' }}"
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="Awards" class="block text-sm font-bold mb-2">Awards:</label>
                    <input type="text" id="Awards" name="Awards" required value="{{ $filmEdit ? $filmEdit->Awards : '' }}"
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="acteur" class="block text-sm font-bold mb-2">Actor:</label>
                    <input type="text" id="acteur" name="acteur" required value="{{ $filmEdit ? $filmEdit->acteur : '' }}"
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>


                <div class="mb-4">
                    <label for="released" class="block text-sm font-bold mb-2">Released:</label>
                    <input type="text" id="released" name="released" required value="{{ $filmEdit ? $filmEdit->released : '' }}"
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="Poster" class="block text-sm font-bold mb-2">Poster:</label>
                    <input type="text" id="Poster" name="Poster" required value="{{ $filmEdit ? $filmEdit->Poster : '' }}"
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="runtime" class="block text-sm font-bold mb-2">Movie duration:</label>
                    <input type="text" id="runtime" name="runtime" required value="{{ $filmEdit ? $filmEdit->runtime : '' }}"
                        class="bg-gray-800 appearance-none  rounded w-full py-4 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="description" class="block text-sm font-bold mb-2">Description:</label>
                    <textarea id="description" name="description"
                        class="bg-gray-800 appearance-none  rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">{{ $filmEdit ? $filmEdit->description : '' }}</textarea>
                </div>


            </div>
            <div class="flex items-center gap-x-4">
                <button type="submit"
                    class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Confirm</button>
        </form>
        <form action="/statistiqueFilms">
            <button type="submit"
                class="bg-white hover:bg-red-800 text-black  font-bold py-2 px-6 rounded focus:outline-none focus:shadow-outline">close</button>
        </form>

    </div>
    </div>
    @if ($filmEdit !== null)
        <script>
            document.getElementById('FormModal').classList.remove('hidden');
        </script>
    @endif
    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>
</body>

</html>
