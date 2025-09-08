<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Movies Reviews
        </h2>
    </x-slot>


    <div
        x-data="carouselData({{ Js::from($movies) }})"
        x-init="startAutoplay()"
        class="relative w-full max-w-xl mx-auto bg-white rounded shadow p-6 mt-10">
        <template x-if="movies.length > 0">
            <div class="text-center">
                <img
                    :src="movies[current].image"
                    alt="Capa do filme"
                    class="mx-auto mb-4 w-full max-h-80 object-contain rounded">

                <h2 class="text-2xl font-bold mb-2" x-text="movies[current].title"></h2>

                <p class="text-gray-600 text-lg">
                    Média de avaliação:
                    <span x-text="movies[current].average_rating"></span> estrelas
                </p>
            </div>
        </template>

        <!-- Controles -->
        <div class="flex justify-between mt-6">
            <button
                @click="prevSlide()"
                class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                ‹
            </button>
            <button
                @click="nextSlide()"
                class="bg-gray-300 hover:bg-gray-400 px-4 py-2 rounded">
                ›
            </button>
        </div>
    </div>


    @if(auth()->user()->is_admin)
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="{{ route('movies.create')}}">Adicionar Filme Novo</a>
                    <br>

                    <a href="{{ route('categories.create') }}">Criar nova categoria de filmes</a>

                    <br>
                </div>
            </div>
        </div>
    </div>
    @else
    @endif


    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">


                    <a href="{{ route('movies.index') }}">Ver todos os filmes</a>

                    <br>
                </div>
            </div>
        </div>
    </div>


    <script>
        function carouselData(movies) {
            return {
                movies,
                current: 0,
                interval: null,

                startAutoplay() {
                    this.interval = setInterval(() => {
                        this.nextSlide();
                    }, 5000); // troca a cada 5 segundos
                },

                nextSlide() {
                    this.current = (this.current + 1) % this.movies.length;
                },

                prevSlide() {
                    this.current = (this.current - 1 + this.movies.length) % this.movies.length;
                }
            }
        }
    </script>


</x-app-layout>