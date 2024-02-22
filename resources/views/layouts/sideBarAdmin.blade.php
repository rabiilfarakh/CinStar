<div class="bg-black text-white shadow w-full p-2 flex items-center justify-between">
    <div class="flex items-center">
        <div class="flex items-center"> 
            <img src="https://www.emprenderconactitud.com/img/POC%20WCS%20(1).png" alt="Logo" class="w-28 h-18 mr-2">
        </div>
        
    </div>

   
   
</div>

<div class="flex-1 flex flex-wrap">
    <div class="p-2 bg-black w-full md:w-64 flex flex-col md:flex hidden" id="sideNav">
        <nav>
            <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r hover:from-red-500 hover:to-red-800 hover:text-white" href="/dashboard">
                <i class="fas fa-home mr-2"></i>room statistics
 
            </a>
            <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r  hover:from-red-500 hover:to-red-800 hover:text-white" href="/statistiqueFilms">
                <i class="fas fa-file-alt mr-2"></i>movie statistics 
            </a>
            <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r  hover:from-red-500 hover:to-red-800 hover:text-white" href="/insertFilms">
                <i class="fas fa-users mr-2"></i>adding films
            </a>
            <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r  hover:from-red-500 hover:to-red-800 hover:text-white" href="/manageResev">
                <i class="fas fa-store mr-2"></i>reservation management
            </a>
            <a class="block text-gray-200 py-2.5 px-4 my-4 rounded transition duration-200 hover:bg-gradient-to-r  hover:from-red-700 hover:to-red-800 hover:text-white" href="/manageShemas">
                <i class="fas fa-exchange-alt mr-2"></i>shema management

            </a>
            
        </nav>

        <form method="POST" class="block text-gray-200 py-2.5 px-4 my-2 rounded transition duration-200 hover:bg-gradient-to-r  hover:from-red-700 hover:to-red-800 hover:text-white mt-auto" action="{{ route('logout') }}">
            @csrf
            <i class="fas fa-sign-out-alt mr-2"></i>
            <x-dropdown-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                {{ __('Log Out') }}
            </x-dropdown-link>
        </form>

        <div class="bg-gradient-to-r from-red-300 to-red-500 h-px mt-2"></div>

        <p class="mb-1 px-5 py-3 text-left text-xs text-red-500">Copyright WCSLAT@2023</p>

    </div>

   
    