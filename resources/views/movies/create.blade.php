<x-app-layout>
    
    <h1>Adicione um filme bacana!</h1>
<form action="{{ route('movies.store') }}" method="POST" style="display:inline;" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div>
        <label for="description">Descrição:</label>
        <textarea name="description" id="description" required></textarea>
    </div>

    <div>
        <label for="image">Imagem:</label>
        <input type="file" name="image" id="image" accept="image/*">
    </div>

    <div>
            <label for="release_date">Data de Lançamento:</label>
        <input type="date" name="release_date" id="release_date" required>
    </div>

    <div>
    <label for="categories">Categorias</label><br>
    @foreach ($categories as $category)
        <label>
            <input type="checkbox" name="categories[]" value="{{ $category->id }}">
            {{ $category->name }}
        </label><br>
    @endforeach
</div>

        <HR>
        @csrf
        <button type="submit">CRIAR</button>
    </form>
    
</form>
</x-app-layout>