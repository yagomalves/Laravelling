<nav x-data="{ open: false }" class="bg-[#3b0a4b] text-white shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">

            <!-- LOGO -->
            <div class="flex items-center">
                <a href="{{ route('dashboard') }}" class="text-3xl font-bold text-white">
                    Yago<span class="text-[#eb067b]">Alves</span>
                </a>
            </div>
            @auth
            <!-- LINKS -->
            <div class="hidden md:flex space-x-8 items-center">
                <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-pink-400">
                    Início
                </x-nav-link>
                <x-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" class="text-white hover:text-pink-400">
                    Perfil
                </x-nav-link>
                <x-nav-link :href="route('movies.index')" :active="request()->routeIs('movies.index')" class="text-white hover:text-pink-400">
                    Filmes
                </x-nav-link>

                @if(auth()->user()->is_admin)
                <x-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')" class="text-white hover:text-pink-400">
                    Categorias
                </x-nav-link>
                @endif
                <!-- LOGOUT BUTTON -->

                <form method="POST" action="{{ route('logout') }}" style="display:inline; margin-left: 10px;">
                    @csrf
                    <button class="inline-block bg-[#702e90] hover:bg-[#947cba] text-white font-semibold px-6 py-3 rounded shadow" type="submit">Logout</button>
                </form>
            </div>





            <!-- HAMBURGER -->
            <div class="md:hidden flex items-center">
                <button @click="open = !open" class="text-white focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- RESPONSIVE MENU -->
    <div :class="{ 'block': open, 'hidden': !open }" class="md:hidden bg-[#2a003f]">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="text-white hover:text-pink-400">Início</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')" class="text-white hover:text-pink-400">Perfil</x-responsive-nav-link>
            <x-responsive-nav-link :href="route('movies.index')" :active="request()->routeIs('movies.index')" class="text-white hover:text-pink-400">Filmes</x-responsive-nav-link>

            @if(auth()->user()->is_admin)
            <x-responsive-nav-link :href="route('categories.index')" :active="request()->routeIs('categories.index')" class="text-white hover:text-pink-400">Categorias</x-responsive-nav-link>
            @endif
            <form method="POST" action="{{ route('logout') }}" style="display:inline; margin-left: 10px;">
                    @csrf
                    <button class="text-white hover:text-pink-400" type="submit">Logout</button>
                </form>
            @endauth
            @guest
            <div >
                <a href="{{ route('login') }}" class="mx-6">Log in</a>
                <a href="{{ route('register') }}" class="mx-6">Registre-se</a>
            </div>
            @endguest

        </div>
    </div>

</nav>