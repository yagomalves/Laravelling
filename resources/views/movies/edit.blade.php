<x-app-layout>

    <div class="align-center mt-6 justify-center text-center">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight text-center">Edição de conteúdo</h2>
    </div>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-[#3b0a4b] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-400 mt-3">

                    <form action="{{ route('movies.update', ['id'=>$movie->id]) }}" method="POST" style="display:inline;" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="title">Título:</label>
                            <input type="text" name="title" value="{{ $movie->title }}" id="title" required>
                        </div>

                        <div>
                            <label for="description">Descrição:</label>

                            <textarea name="description" id="description" required>{{ $movie->description }}</textarea>
                        </div>

                        <div>
                            <label for="release_date">Data de Lançamento:</label>
                            <input type="date" name="release_date" value="{{ $movie->release_date }}" id="release_date" required>
                        </div>

                        <div>
                            <label for="categories">Categorias</label><br>
                            @foreach ($categories as $category)
                            <label>
                                <input
                                    type="checkbox"
                                    name="categories[]"
                                    value="{{ $category->id }}"
                                    {{ $movie->categories->contains($category->id) ? 'checked' : '' }}>
                                {{ $category->name }}
                            </label><br>
                            @endforeach
                        </div>

                        <div>
                            <label for="image">Imagem:</label>
                            <input type="file" name="image" id="image" accept="image/*">
                        </div>

                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $movie->image_path) }}" alt="Capa do Filme">

                        </div>
                        <br>

                        <HR>


                        <br>
                        <button class="inline-block bg-[#702e90] hover:bg-[#947cba] text-white font-semibold px-6 py-3 rounded shadow" type="submit">Alterar</button>
                    </form>


                </div>
            </div>
        </div>
    </div>

    <nav>
        <a href="{{ route('movies.index') }}">Voltar para a lista</a>
    </nav>

</x-app-layout>