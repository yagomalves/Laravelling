<x-app-layout>

    <div class="pt-8 text-center">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight text-center">
            Lista de Categorias
        </h2>
        @if(auth()->user()->is_admin)
        <a class="text-gray-200 hover:text-gray-500 mt-5 font-semibold inline-block" href="{{ route('categories.create')}}">Adicionar Categoria Nova</a>
        @else
        @endif
    </div>
    <br>
    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-[#3b0a4b] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-white">
                    @if($categories->isEmpty())
                    <p>Não há categorias cadastradas ainda.</p>
                    @else
                    @foreach ($categories as $category)
                    <h2>{{ $category->name }}
                        @if(auth()->user()->is_admin)
                        <form action="{{ route('categories.destroy', ['id' => $category->id]) }}" method="POST" style="display:inline;">
                            <button type="submit" style="color: red; background: none; border: none; cursor: pointer;">
                                Excluir
                            </button>
                            @csrf
                            @method('DELETE')
                        </form>

                        @else
                        @endif

                        @endforeach
                        @endif

                        <br>
                        <br>

                </div>
            </div>
        </div>
    </div>

</x-app-layout>