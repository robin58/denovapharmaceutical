<div class="flex-1 relative">
    <x-jet-input type="text" class="w-full" placeholder="¿Qué producto estas buscando?" />

    {{--Llamada al componente icon  search.blade.php--}}
    <button class="absolute top-0 right-0 w-12 h-full bg-sky-500 flex items-center justify-center rounded-r-md">
        <x-search  size="35" color="white" />
    </button>
</div>
