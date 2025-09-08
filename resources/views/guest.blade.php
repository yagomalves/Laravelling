<x-guest-layout>



<h1 class="text-4xl font-bold text-gray-800 text-center mt-10 tracking-wide">
    Seja bem-vindo ao Movies Reviews
</h1>


<div class="flex justify-center mt-10">
<a
    href="{{ route('login') }}"
    class="inline-block mr-10 px-5 py-2 bg-black text-white rounded-md text-sm font-medium hover:bg-gray-800 transition duration-200"
>
    Log in
</a>
<a
    href="{{ route('register') }}"
    class="inline-block ml-20 px-5 py-2 bg-black text-white rounded-md text-sm font-medium hover:bg-gray-800 transition duration-200"
>
    Register
</a>
</div>

</x-guest-layout>