<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel - Edit</title>
</head>
<body>




 <h1>Edição de conteúdo</h1>
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
    <label for="categories">Categorias</label><br>
    @foreach ($categories as $category)
    <label>
        <input 
            type="checkbox" 
            name="categories[]" 
            value="{{ $category->id }}"
            {{ $movie->categories->contains($category->id) ? 'checked' : '' }}
        >
        {{ $category->name }}
    </label><br>
@endforeach
    </div>

    <div>
        <label for="image">Imagem:</label>
        <input type="file" name="image" id="image" accept="image/*">
    </div>

    <div>
        <img src="{{ asset('storage/' . $movie->image_path) }}" alt="Capa do Filme">
        <label for="release_date">Data de Lançamento:</label>
        <input type="date" name="release_date" value="{{ $movie->release_date }}" id="release_date" required>
    </div>
        <HR>
         
        <button type="submit">Alterar</button>
    </form>






        <h2 class="">
            {{ $movie->title }}
        </h2>



                    
                    <nav>
                        <a href="{{ route('movies.index') }}">Voltar para a lista</a>
                    </nav>

                    


</body>
</html>