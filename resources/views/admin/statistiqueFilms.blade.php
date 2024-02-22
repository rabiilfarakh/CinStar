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
<body>
<div class="flex flex-col h-screen bg-gray-100">

    @include('layouts.sideBarAdmin')

    <div class="mt-8 absolute right-8 w-[75%] bg-white p-4 shadow rounded-lg">
        <div class="my-1"></div>
        <div class="bg-gradient-to-r from-cyan-300 to-cyan-500 h-px mb-6"></div> 
        <table class="w-full table-auto text-center text-sm">
            <thead>
                <tr class="text-sm leading-normal">
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Image</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Title</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Type</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Actor</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Salle Name</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Rating</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Date</th>
                    <th class="py-2 px-4 bg-grey-lightest font-bold uppercase text-sm text-grey-light border-b border-grey-light">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($films as $film)
                <tr class="hover:bg-grey-lighter">
                    <td class="py-2 px-4 border-b flex justify-center border-grey-light">
                        @if($film->images->isNotEmpty())
                        <img src="/storage/{{ $film->images->first()->image }}" alt="Film Image" class="rounded-[3px] h-16 w-16">
                        @else
                        <img src="https://via.placeholder.com/150" alt="No Image" class="rounded-[3px] h-16 w-16">
                        @endif
                    </td>
                    <td class="py-2 px-4 border-b border-grey-light">{{ $film->title }}</td>
                    <td class="py-2 px-4 border-b border-grey-light">{{ $film->genre }}</td>
                    <td class="py-2 px-4 border-b border-grey-light">{{ $film->acteur }}</td>
                    <td class="py-2 px-4 border-b border-grey-light">{{ $film->salle->name }}</td>
                    <td class="py-2 px-4 border-b border-grey-light">{{ $film->rating }}</td>
                    <td class="py-2 px-4 border-b border-grey-light">{{ $film->date }}</td>
                    <td class="py-2 px-4 border-b border-grey-light relative">
                        <div class="dropdown inline-block relative">
                            <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center" onclick="toggleModal('modalActions{{ $film->id }}')">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            <ul class="dropdown-menu absolute hidden text-gray-700 z-50 pt-1" id="modalActions{{ $film->id }}">
                                <li><a class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap" href="#">Edit</a></li>
                                <li><form action="{{ route('film.delete', ['id' => $film->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">Delete</button>
                                </form></li>
                            </ul>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            
        </table>
    </div>
</div>

<script>
  function toggleModal(modalId){
    const modal = document.getElementById(modalId);
    modal.classList.toggle('hidden');
  }
</script>
</body>
</html>
