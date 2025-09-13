@props(['href' => '#', 'id'])

<a
    href="{{ $href }}"
    {{ $attributes->merge([
        'class' => 'inline-block px-5 py-2 text-white rounded-md text-sm font-medium bg-[#702e90] hover:bg-[#947cba] transition duration-200',
    ]) }}
    x-data="{ loading: false }"
    x-show="!$root.clicked || $root.clicked === '{{ $id }}'"
    :class="$root.clicked === '{{ $id }}' ? 'mx-auto' : ''"
    x-on:click.prevent="
        loading = true;
        $root.clicked = '{{ $id }}';
        document.querySelector('[data-preaload]')?.classList.remove('loaded');
        document.body.classList.remove('loaded');
        setTimeout(() => {
            window.location.href = $el.href;
        }, 200);
    "
>
    <template x-if="!loading">
        <span>{{ $slot }}</span>
    </template>
    <template x-if="loading">
        <span class="flex items-center justify-center">
            <svg class="animate-spin h-4 w-4 mr-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" />
                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8z" />
            </svg>
            Aguarde...
        </span>
    </template>
</a>
