<div class="md:hidden" onclick="toggleModal('sideBar')"><i class="fas fa-bars text-white pl-4 pt-4"></i></div>
<div id="sideBar" class="hidden md:flex min-h-screen  fixed flex-wrap">
    <div class="p-2 bg-[#000000] min-h-screen w-full md:w-60 flex flex-col md:flex" id="sideNav">
        <nav class="text-sm font-semibold">
            <div onclick="toggleModal('sideBar')" class="block md:hidden text-white py-2.5 px-4 mt-2 rounded transition duration-200 hover:bg-red-700 hover:text-black"
                >
                <i class="fas fa-times  text-white"></i>

        </div>
            <a class="block text-white py-2.5 px-4 mt-2 rounded transition duration-200 hover:bg-red-700 hover:text-black"
                href="/dashboard">
                <i class="fas fa-door-closed mr-2"></i>Room Statistics
            </a>
            <a class="block text-white py-2.5 px-4 mt-2 rounded transition duration-200 hover:bg-red-700 hover:text-black"
                href="/statistiqueFilms">
                <i class="fas fa-film mr-2"></i>Movie Statistics
            </a>
            <a class="block text-white py-2.5 px-4 mt-2 rounded transition duration-200 hover:bg-red-700 hover:text-black"
                href="/insertFilms">
                <i class="fas fa-plus mr-2"></i>Adding Films
            </a>
            <a class="block text-white py-2.5 px-4 mt-2 rounded transition duration-200 hover:bg-red-700 hover:text-black"
                href="/manageResev">
                <i class="far fa-calendar-alt mr-2"></i>Reservation Management
            </a>
            <a onclick="showSubMenu()" onclick="hideSubMenu()"
                class="cursor-pointer block text-white py-2.5 px-4 mt-2 rounded transition duration-200 hover:bg-red-700 hover:text-black">
                <i class="fas fa-exchange-alt mr-2"></i>Schema Management
            </a>
            <div id="subMenu" class="absolute hidden ml-4 text-gray-700 rounded shadow-md">
                @foreach ($salles as $salle)
                    <form method="get" action="{{ route('manage', ['id' => $salle->id]) }}">
                        @csrf
                        <button
                            class="block text-white h-[30%]  text-xs py-2 px-4  rounded transition duration-200 hover:bg-red-700 hover:text-black"><i
                                class="fas fa-arrow-right"></i>
                            {{ $salle->name }}
                        </button>
                    </form>
                @endforeach
            </div>
            <form method="POST" action="{{ route('logout') }}" class="absolute bottom-14">
                @csrf
                <button type="submit"
                    class="block text-white py-2.5 px-4  rounded transition duration-200 hover:bg-red-700 hover:text-black">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </button>
            </form>
        </nav>

        <div class="absolute bottom-0 ">
            <div class="bg-gradient-to-r from-red-300 to-red-500 h-px mt-2"></div>
            <p class="mb-1 px-5 py-3 text-left text-xs text-red-500">Copyright CineStar@2024</p>
        </div>

    </div>
</div>
<script>
    function showSubMenu() {
        document.getElementById('subMenu').classList.remove('hidden');
    }

    function hideSubMenu() {
        document.getElementById('subMenu').classList.add('hidden');
    }
    function toggleModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.toggle('hidden');
        }
</script>
