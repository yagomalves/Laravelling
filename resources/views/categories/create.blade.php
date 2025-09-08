<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            Adicione uma categoria
        </h2>
    </x-slot>


    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 mt-3">

                    <form action="{{ route('categories.store') }}" method="POST" style="display:inline;" enctype="multipart/form-data">
                        @csrf

                        <div class="">
                            <label for="name">Nome:</label>
                            <br>
                            <input type="text" name="name" id="name" required>
                        </div>

                    
                        @csrf
                        @if(auth()->user()->is_admin)
                        <x-primary-button class="mt-3" type="submit">CRIAR</x-primary-button>
                        @else
                        <p class="text-red-500 mt-3">Apenas administradores podem criar categorias.</p>
                        @endif
                    </form>

                    </form>

                    <br>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>