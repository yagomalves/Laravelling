<x-app-layout>
<div class="h-screen overflow-hidden bg-gradient-to-b from-[#1c0526] to-[#3b0a4b]">
    <!-- Seção de destaque -->
    <section class="bg-gradient-to-b from-[#1c0526] to-[#3b0a4b]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col-reverse md:flex-row items-center justify-between">

            <!-- Texto à esquerda -->
            <div class="text-white md:w-1/2 mt-10 md:mt-0 text-center md:text-left">
                <h1 class="text-4xl font-extrabold leading-tight mb-4">
                    Comente e avalie o seu filme favorito.
                </h1>
                <p class="text-lg mb-6">
                    Explore todos os filmes disponíveis e compartilhe sua opinião com a comunidade.
                </p>
                <a href="{{ route('movies.index') }}"
                    class="inline-block bg-[#702e90] hover:bg-[#947cba] text-white font-semibold px-6 py-3 rounded shadow">
                    Ver todos os filmes
                </a>
            </div>

            <!-- Imagem à direita -->
            <div class="w-1/2 mt-12 flex justify-center">
                <img src="{{ asset('images/movie_time.jpg') }}" alt="Cinema" class="w-full max-w-md rounded shadow-lg">
            </div>

        </div>
    </section>

    <section
        x-data="carouselData({{ Js::from($movies->take(15)) }})"
        x-init="startAutoplay()"
        class="bg-[#3b0a4b] overflow-hidden">

                <div
                    class="flex transition-all duration-1000 ease-in-out"
                    :style="`transform: translateX(-${currentIndex * (100 / visible)}%)`"
                    x-ref="slider"
                    @transitionend="handleTransitionEnd">
                    <!-- Renderizar os filmes + cópia dos primeiros no final -->
                    <template x-for="(movie, index) in duplicatedMovies" :key="index">
                        <div class="min-w-[250px] max-w-[250px] mx-2 rounded shadow p-4 text-center">
                            <img :src="`/storage/${movie.image_path}`" alt=""
                                class="w-full h-36 object-cover rounded mb-2">
                            <h3 class="text-base font-semibold text-gray-100" x-text="movie.title"></h3>
                            <p class="text-sm text-gray-500">Média: <span x-text="Number(movie.average_rating).toFixed(1)"></span></p>
                        </div>
                    </template>
                </div>
            
    </section>
</div>

    <script>
        function carouselData(movies) {
            return {
                originalMovies: movies,
                duplicatedMovies: [],
                currentIndex: 0,
                visible: 3,
                interval: null,
                isTransitioning: true,

                init() {
                    // Duplicar os primeiros 'visible' filmes no final da lista para efeito de loop
                    this.duplicatedMovies = [...this.originalMovies, ...this.originalMovies.slice(0, this.visible)];
                },

                startAutoplay() {
                    this.init();

                    // Responsividade
                    if (window.innerWidth < 640) {
                        this.visible = 1;
                    } else if (window.innerWidth < 1024) {
                        this.visible = 2;
                    }

                    this.interval = setInterval(() => {
                        this.next();
                    }, 3500);
                },

                next() {
                    this.isTransitioning = true;
                    this.currentIndex++;

                    // Se chegamos no "clone", após o último original
                    if (this.currentIndex === this.originalMovies.length) {
                        // Aguardar a transição terminar
                        setTimeout(() => {
                            this.isTransitioning = false;
                            this.currentIndex = 0;
                            this.$refs.slider.style.transition = "none";
                            this.$refs.slider.style.transform = `translateX(-0%)`;

                            // Reaplicar a transição suavemente depois
                            requestAnimationFrame(() => {
                                requestAnimationFrame(() => {
                                    this.$refs.slider.style.transition = "transform 1s ease-in-out";
                                });
                            });
                        }, 1000);
                    }
                },

                handleTransitionEnd() {
                    // Reinicia o loop aqui se necessário
                    if (!this.isTransitioning && this.currentIndex === 0) {
                        this.$refs.slider.style.transition = "transform 1s ease-in-out";
                    }
                }
            }
        }
    </script>


</x-app-layout>