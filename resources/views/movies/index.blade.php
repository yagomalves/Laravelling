<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Filmes</title>
</head>
<body>

        <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
             @if(auth()->user()->is_admin)        
            <a href="{{ route('movies.create')}}">Adicionar Filme Novo</a>
            <br>
            <a href="{{ route('categories.index')}}">Categorias</a>
            @else      
            @endif



            @if (Route::has('login'))
                <nav class="flex items-center justify-end gap-4">
                    @auth
                    <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-nav-link>
                        </form>
                    </div>


                    
                    
                        <a
                            href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal"
                        >
                            Painel de Controle
                        </a>
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal"
                        >
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                >
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </header>

        
    <h1>Lista de Filmes</h1>

    @if($movies->isEmpty())
        <p>Não há filmes cadastrados ainda.</p>
    @else

        <ul>
            @foreach ($movies as $movie)
                        <h2>{{ $movie->title }}</h2> 
                        <img src="{{ asset('storage/' . $movie->image_path) }}" alt="Pôster do filme {{ $movie->title }}">
        <p>Descrição: {{ $movie->description }}</p>


        <h3>Categorias:</h3>
        @if($movie->categories->isEmpty())
            <p>Nenhuma categoria associada.</p>
        @else
            <ul>
                @foreach ($movie->categories as $category)
                    <li>{{ $category->name }}</li>
                @endforeach
            </ul>
        @endif



        <h3>Comentários:</h3>
        @if($movie->comments->isEmpty())
            <p>Nenhum comentário ainda.</p>
        @else
            <ul>
                @foreach ($movie->comments as $comment)
                    <li>{{ $comment->content }} - (por usuário {{ $comment->user->name }})

                          Formulário de exclusão 
                    <form action="{{ route('movies.comments.destroy', ['id'=>$movie->id , 'commentId'=>$comment->id] ) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="color: red; background: none; border: none; cursor: pointer;">
                            Excluir
                        </button>
                    </form>

                    </li>
                @endforeach
            </ul>
        @endif


        

        <h3>Avaliações:</h3>
        @if($movie->ratings->isEmpty())
            <p>Nenhuma avaliação ainda.</p>
        @else
            <ul>
                @foreach ($movie->ratings as $rating)
                    <li>{{ $rating->rating }} estrelas - {{ $rating->user->name }}</li>
                @endforeach
            </ul>
        @endif

        <hr>
        
            <form action="{{ route('movies.comment', ['id'=>$movie->id]) }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
            <div>
                <label for="content">Adicionar Comentário:</label>
                <textarea name="content" id="content" required></textarea>
            </div>
            <button type="submit">Comentar</button>

        </form>

        <form action="{{ route('movies.rating', ['id'=>$movie->id]) }}" method="POST" style="display:inline;">
            @csrf
            <input type="hidden" name="movie_id" value="{{ $movie->id }}">
            <div>
                <label for="content">Adicionar Avaliação:</label>
                <input type="number" name="rating" id="rating" min="0" max="5" required>
            </div>
            <button type="submit">Avaliar</button>

        </form>
@if(auth()->user()->is_admin)
    <form action="{{ route('movies.destroy', ['id'=>$movie->id]) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">DELETAR</button>
        <a href="{{ route('movies.edit', ['id' => $movie->id]) }}">EDITAR</a>
    </form>
@else
    
@endif

        <hr>
        <hr>
        <hr>
            @endforeach
        </ul>
    @endif
</body>
</html>
