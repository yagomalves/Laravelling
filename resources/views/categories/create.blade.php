<x-app-layout>

<div class="align-center mt-6 justify-center text-center">
        <h2 class="font-semibold text-xl text-gray-400 leading-tight text-center">
            Adicione uma categoria
        </h2>
</div>


    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8 text-center">
            <div class="bg-[#3b0a4b] overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-400 mt-3">

                    <form action="{{ route('categories.store') }}" method="POST" style="display:inline;" enctype="multipart/form-data">
                        @csrf

                        <div class="">
                            <label for="name">Nome:</label>
                            <br>
                            <x-text-input id="name" type="text" name="name" required />
                        </div>

                    <br>
                    <hr>
                    <br>
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