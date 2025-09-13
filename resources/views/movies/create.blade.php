<x-app-layout>

<div class="align-center mt-6 justify-center text-center">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight text-center">
            Adicione um filme bacana!
        </h2>
</div>
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-[#3b0a4b] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-200 mt-3">

                    <form action="{{ route('movies.store') }}" method="POST" style="display:inline;" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <label for="title">Título:</label>
                            <br>
                            <x-text-input id="title" type="text" name="title" required />
                        </div>
                        <br>
                        <div>
                            <label for="description">Descrição:</label>
                            <br>
                            <x-text-input id="description" type="text" name="description" required />
                        </div>
                        <br>
                        <div>
                            <label for="image">Imagem:</label>
                            <br>
                            <input type="file" name="image" id="image" accept="image/*">
                        </div>
                        <br>
                        <div>
                            <label for="release_date">Data de Lançamento:</label>
                            <br>
                            <input type="date" name="release_date" id="release_date" required>
                        </div>
                        <br>
                        <div>
                            <label for="categories">Categorias</label><br>
                            @foreach ($categories as $category)
                            <label>
                                <input type="checkbox" name="categories[]" value="{{ $category->id }}">
                                {{ $category->name }}
                            </label>
                            @endforeach
                        </div>
                        <br>
                        <HR>
                        <br>
                        @csrf
                        <button class="inline-block bg-[#702e90] hover:bg-[#947cba] text-white font-semibold px-6 py-3 rounded shadow" type="submit">CRIAR</button>
                    </form>
                    <br>
                </div>
            </div>
        </div>

        </form>
</x-app-layout>