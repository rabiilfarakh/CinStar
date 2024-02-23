<div class="bg-[#000000] text-white shadow w-full p-2 flex items-center justify-between">
    <div class="flex items-center">
        <div class="flex items-center"> 
            <img src="img/logo.png" alt="Logo" class="w-28 h-18 ml-4">
        </div>
        
    </div>

   
   
</div>

<div class="flex-1 flex flex-wrap">
    <div class="p-2 bg-[#000000] w-full md:w-64 flex flex-col md:flex" id="sideNav">
        <nav>
            <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-500 hover:to-red-800 hover:text-white" href="/dashboard">
                <i class="fas fa-door-closed mr-2"></i>room statistics
 
            </a>
            <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r  hover:from-red-500 hover:to-red-800 hover:text-white" href="/statistiqueFilms">
                <i class="fas fa-film mr-2"></i>movie statistics 
            </a>
            <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r  hover:from-red-500 hover:to-red-800 hover:text-white" href="/insertFilms">
                <i class="fas fa-plus mr-2"></i>adding films
            </a>
            <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r  hover:from-red-500 hover:to-red-800 hover:text-white" href="/manageResev">
                <i class="far fa-calendar-alt mr-2"></i>reservation management
            </a>
            <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r  hover:from-red-700 hover:to-red-800 hover:text-white" href="/manageShemas">
                <i class="fas fa-project-diagram mr-2"></i>schema management

            </a>
            
        </nav>

        <form method="POST" class="flex justify-center text-gray-200  px-4 rounded transition duration-200 hover:bg-gradient-to-r  hover:from-red-700 hover:to-red-800 mt-auto" action="{{ route('logout') }}">
            @csrf
            <i class="fas fa-sign-out-alt mr-2"></i>
            <x-dropdown-link class="text-gray-200" :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>

        <div class="bg-gradient-to-r from-red-300 to-red-500 h-px mt-2"></div>

        <p class="mb-1 px-5 py-3 text-left text-xs text-red-500">Copyright WCSLAT@2023</p>

    </div>

   
    