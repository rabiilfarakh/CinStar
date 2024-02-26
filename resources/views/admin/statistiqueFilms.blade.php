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

        <div
        
            class="md:w-[80%] overflow-x-auto overflow-y-scroll min-h-full w-full my-14 md bg-white p-4 shadow rounded-lg">
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
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Movie duration</th>
                        <th class="py-2 px-4font-bold uppercase text-sm text-white border-b border-gray-700">
                            Salle Name</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            Rating</th>
                        <th class="py-2 px-4  font-bold uppercase text-sm text-white border-b border-gray-700">
                            show time</th>
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
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->length }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->salle->name }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->rating }}</td>
                            <td class="py-2 px-4 border-b border-gray-700">{{ $film->presentation_time }}</td>
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
                                        <li>

                                            <form action="/editData"
                                                class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">
                                                <input type="hidden" name="film_id" value="{{ $film->id }}">
                                                <button type="submit">Edit</button>
                                            </form>

                                        </li>
                                        <li>
                                            <form action="{{ route('film.delete', ['id' => $film->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('PUT')
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
                    <input type="text" id="title" name="title" required
                        value="{{ $filmEdit ? $filmEdit->title : '' }}"
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="genre" class="block text-sm font-bold mb-2">Type:</label>
                    <input type="text" id="genre" name="genre" required
                        value="{{ $filmEdit ? $filmEdit->genre : '' }}"
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="acteur" class="block text-sm font-bold mb-2">Actor:</label>
                    <input type="text" id="acteur" name="acteur" required
                        value="{{ $filmEdit ? $filmEdit->acteur : '' }}"
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="date" class="block text-sm font-bold mb-2">Date:</label>
                    <input type="date" id="date" name="date" required
                        value="{{ $filmEdit ? $filmEdit->date : '' }}"
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>

                <div class="mb-4">
                    <label for="salle_id" class="block text-sm font-bold mb-2">Salle Name:</label>
                    <select name="salle_id" id="salle_id" required
                    class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                    @foreach ($salles as $salle)
                            <option value="{{ $salle->id }}">{{ $salle->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="images" class="block text-sm font-bold mb-2">Images:</label>
                    <input type="file" id="images" name="images[]" accept="image/*" multiple required
                        value="{{ $filmEdit ? $film->images->first()->image : '' }}"
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="rating" class="block text-sm font-bold mb-2">Rating:</label>
                    <input type="number" id="rating" name="rating" min="0" max="5"
                        value="{{ $filmEdit ? $filmEdit->rating : '' }}" step="0.1" required
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="length" class="block text-sm font-bold mb-2">Movie duration:</label>
                    <input type="text" id="length" name="length" required
                        value="{{ $filmEdit ? $filmEdit->length : '' }}"
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="presentation_time" class="block text-sm font-bold mb-2">Show
                        Time:</label>
                        <select name="presentation_time" id="presentation_time" required
                        class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                        <option value="20h">20h</option>
                        <option value="23h">23h</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-sm font-bold mb-2">Description:</label>
                    <textarea id="description" name="description" value=""
                    class="bg-gray-800 appearance-none rounded w-full py-2 px-3 text-white leading-tight focus:outline-none focus:shadow-outline">
                    {{ $filmEdit ? $filmEdit->description : '' }}</textarea>
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
