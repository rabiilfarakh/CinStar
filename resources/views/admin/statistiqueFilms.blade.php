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
    <div class="flex justify-between">
        <div>
            @include('layouts.sideBarAdmin')
        </div>

        <div class="md:w-[80%] overflow-x-auto overflow-y-scroll min-h-full w-full my-14 md bg-white p-4 shadow rounded-lg">
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
                            Type</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Actor</th>
                        <th class="py-2 px-4font-bold uppercase text-sm text-white border-b border-gray-700">
                            Salle Name</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Rating</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Date</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($films as $film)
                        <tr class="hover:bg-gray-200">
                            <td class="py-2 px-4 border-b flex justify-center border-gray-700">
                                @if ($film->images->isNotEmpty())
                                    <img src="/storage/{{ $film->images->first()->image }}" alt="Film Image"
                                        class="rounded-[3px] h-16 w-16">
                                @else
                                    <img src="https://via.placeholder.com/150" alt="No Image"
                                        class="rounded-[3px] h-16 w-16">
                                @endif
                            </td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->title }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->genre }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->acteur }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->salle->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->rating }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->date }}</td>
                            <td class="py-2 px-4 border-b border-gray-700 relative">
                                <div class="dropdown inline-block  relative">
                                    <button
                                        class="  text-gray-800 font-semibold py-2 px-4 rounded inline-flex items-center"
                                        onclick="toggleModal('modalActions{{ $film->id }}')">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                    <ul class="dropdown-menu  absolute hidden text-gray-700 z-50 pt-1"
                                        id="modalActions{{ $film->id }}">
                                        <li><a
                                                class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap"
                                                onclick="toggleModal('FormModal')" href="#">Edit</a></li>
                                        <li>
                                            <form
                                                action="{{ route('film.delete', ['id' => $film->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
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
    <div class="container mx-auto hidden fixed bg-white/45 left-0 right-0 top-0 bottom-0 p-4" id="FormModal"
        onclick="toggleModal('FormModal')">
        <form action="#" method="POST" enctype="multipart/form-data"
            class="max-w-[50%]   mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <div class="grid grid-cols-2 gap-4">
                <div class="mb-4">
                    <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
                    <input type="text" id="title" name="title" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="genre" class="block text-gray-700 text-sm font-bold mb-2">Genre:</label>
                    <input type="text" id="genre" name="genre" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="acteur" class="block text-gray-700 text-sm font-bold mb-2">Acteur:</label>
                    <input type="text" id="acteur" name="acteur" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-gray-700 text-sm font-bold mb-2">Date:</label>
                    <input type="date" id="date" name="date" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="salle_id" class="block text-gray-700 text-sm font-bold mb-2">Salle Name:</label>
                    <select name="" id="salle_id" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        <option value=""></option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="images" class="block text-gray-700 text-sm font-bold mb-2">Images:</label>
                    <input type="file" id="images" name="images[]" accept="image/*" multiple required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="rating" class="block text-gray-700 text-sm font-bold mb-2">Rating:</label>
                    <input type="number" id="rating" name="rating" min="0" max="5"
                        step="0.1" required
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                


            </div>
            <div class="flex items-center justify-between">
                <button type="submit"
                    class="bg-red-700 hover:bg-red-800 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Confirm</button>
            </div>
        </form>
    </div>

    <script>
        function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
    </script>
</body>

</html>
