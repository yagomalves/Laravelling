<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Lista de Categorias
        </h2>
    </x-slot>


    <br>



    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if($categories->isEmpty())
                    <p>Não há categorias cadastradas ainda.</p>
                    @else
                    @foreach ($categories as $category)
                    <h2>{{ $category->name }} @if(auth()->user()->is_admin)
                        @if(auth()->user()->is_admin)
                        <form action="{{ route('movies.comments.destroy', ['id' => $movie->id, 'commentId' => $comment->id]) }}" method="POST" style="display:inline;">
                           <button type="submit" style="color: red; background: none; border: none; cursor: pointer;">
                                Excluir
                            </button> 
                            @csrf
                            @method('DELETE')
                            
                        </form>
                        @endif
                        @else

                        @endif
                    </h2>
                    @endforeach
                    @endif
                    <br>
                    <br>
                    @if(auth()->user()->is_admin)
                    <a href="{{ route('categories.create')}}">Adicionar Categoria Nova</a>
                    @else
                    @endif

                    <br>
                </div>
            </div>
        </div>
    </div>


</x-app-layout>