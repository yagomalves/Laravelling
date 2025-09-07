

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel - Add</title>
</head>
<body>
          <header class="w-full lg:max-w-4xl max-w-[335px] text-sm mb-6 not-has-[nav]:hidden">
             @if(auth()->user()->is_admin)        
            <a href="{{ route('movies.create')}}">Adicionar Filme Novo</a>
            <br>
            <a href="{{ route('categories.create')}}">Categorias</a>
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
    <h1>Adicione uma categoria</h1>
<form action="{{ route('categories.store') }}" method="POST" style="display:inline;" enctype="multipart/form-data">
    @csrf

    <div>
        <label for="name">Nome:</label>
        <input type="text" name="name" id="name" required>
    </div>

        <HR>
        @csrf
        <button type="submit">CRIAR</button>
    </form>
    
</form>