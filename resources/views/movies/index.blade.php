<x-app-layout>
    <x-slot name="header">
        <div class="text-center">

            @if(auth()->user()->is_admin)
            <a href="{{ route('movies.create') }}" class="text-blue-600 hover:text-blue-800 font-semibold">
                Adicionar Filme Novo
            </a>
            @else
            <h2 class="text-2xl font-semibold text-gray-800">Comente e avalie os seus filmes favoritos!</h2>
            @endif
        </div>
    </x-slot>

    @if($movies->isEmpty())
    <p class="text-center mt-8 text-gray-600">Não há filmes cadastrados ainda.</p>
    @else
    <div class="space-y-12 mt-6">
        @foreach ($movies as $movie)
        <div class="max-w-4xl mx-auto bg-white shadow-sm rounded-lg overflow-hidden">
            <div class="p-6 text-gray-900">

                <!-- Título -->
                <h2 class="text-3xl font-bold mb-4 text-center">{{ $movie->title }}</h2>

                <!-- Imagem centralizada -->
                <div class="flex justify-center mb-6">
                    <img
                        src="{{ asset('storage/' . $movie->image_path) }}"
                        alt="Pôster do filme {{ $movie->title }}"
                        class="rounded-md max-h-96 object-contain">
                </div>

                <!-- Descrição -->
                <p class="mb-6 text-gray-700">{{ $movie->description }}</p>

                <!-- Categorias -->
                <h3 class="text-xl font-semibold mb-2">Categorias:</h3>
                @if($movie->categories->isEmpty())
                <p class="mb-4 text-gray-500">Nenhuma categoria associada.</p>
                @else
                <ul class="list-disc list-inside mb-6 text-gray-700">
                    @foreach ($movie->categories as $category)
                    <li>{{ $category->name }}</li>
                    @endforeach
                </ul>
                @endif

                <!-- Comentários -->
                <h3 class="text-xl font-semibold mb-2">Comentários:</h3>
                @if($movie->comments->isEmpty())
                <p class="mb-4 text-gray-500">Nenhum comentário ainda.</p>
                @else
                <ul class="mb-6 space-y-2 text-gray-700">
                    @foreach ($movie->comments as $comment)
                    <li>
                        {{ $comment->content }} - (por usuário {{ $comment->user->name }})

                        @if(auth()->user()->is_admin)
                        <form action="{{ route('movies.comments.destroy', ['id'=>$movie->id , 'commentId'=>$comment->id] ) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: red; background: none; border: none; cursor: pointer;">
                                Excluir
                            </button>
                        </form>
                        @endif
                    </li>
                    @endforeach

                </ul>
                @endif

                <!-- Avaliações -->
                <h3 class="text-xl font-semibold mb-2">Avaliações:</h3>
                @if($movie->ratings->isEmpty())
                <p class="mb-6 text-gray-500">Nenhuma avaliação ainda.</p>
                @else
                <p class="mb-6 text-gray-700 font-medium">Média: {{ $movie->averageRating() }}</p>
                @endif

                <hr class="mb-6">

                <!-- Formulário de comentário -->
                <form action="{{ route('movies.comment', ['id'=>$movie->id]) }}" method="POST" class="mb-6">
                    @csrf
                    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                    <div class="mb-2">
                        <label for="content" class="block font-semibold mb-1">Adicionar Comentário:</label>
                        <textarea name="content" id="content" required class="w-full border border-gray-300 rounded-md p-2 focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
                    </div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                        Comentar
                    </button>
                </form>

                <!-- Formulário de avaliação -->
                @php
                $jaAvaliou = $movie->ratings->contains('user_id', auth()->id());
                @endphp

                @if (!$jaAvaliou)
                <form action="{{ route('movies.rating', ['id'=>$movie->id]) }}" method="POST" class="mt-4">
                    @csrf
                    <input type="hidden" name="movie_id" value="{{ $movie->id }}">
                    <div class="mb-2">
                        <label for="rating" class="block font-semibold">Adicionar Avaliação:</label>
                        <input type="number" name="rating" id="rating" min="0" max="5" required class="border border-gray-300 rounded px-3 py-2">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Avaliar</button>
                </form>
                @else
                <p class="text-green-600 font-semibold mt-4">Você já avaliou este filme.</p>
                @endif

                @if(auth()->user()->is_admin)
                <div class="flex space-x-4">
                    <form action="{{ route('movies.destroy', ['id'=>$movie->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                            DELETAR
                        </button>
                    </form>
                    <a href="{{ route('movies.edit', ['id' => $movie->id]) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 transition">
                        EDITAR
                    </a>
                </div>
                @endif

            </div>
        </div>
        @endforeach
    </div>
    @endif
</x-app-layout>