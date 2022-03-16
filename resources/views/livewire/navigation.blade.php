<style>
    #navigation-menu{
        height: calc(100vh - 4rem);
    }

    .navigation-link:hover .navigation-submenu{
        display: block !important;
    }
</style>


<header class="bg-slate-500 sticky top-0"  x-data="{open:false}">
    <div class="container flex items-center h-16">
        <a
            x-on:click="open = !open"
            class="flex flex-col items-center justify-center px-4 bg-white bg-opacity-25 text-white cursor-pointer font-semibold h-full">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <span>Categorias</span>
        </a>
        <a href="/" class="mx-6">
            <x-jet-application-mark class="block h-9 w-auto" />
        </a>

        @livewire('search')

        <div class="mx-6 relative">
            @auth()
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                            <img class="h-8 w-8 rounded-full object-cover" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Manage Account') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Profile') }}
                        </x-jet-dropdown-link>

                        {{--@if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                        @endif--}}

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}"
                                                 onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-jet-dropdown-link>
                        </form>
                    </x-slot>
                </x-jet-dropdown>
            @else
                <x-jet-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <i class="fas fa-user-circle text-white text-3xl cursor-pointer"></i>
                    </x-slot>

                    <x-slot name="content">
                        <x-jet-dropdown-link href="{{ route('login') }}">
                            {{ __('Login') }}
                        </x-jet-dropdown-link>

                        <x-jet-dropdown-link href="{{ route('register') }}">
                            {{ __('Register') }}
                        </x-jet-dropdown-link>
                    </x-slot>
                </x-jet-dropdown>
            @endauth
        </div>

        {{-- Llamada al componente dropdown-cart--}}
        @livewire('dropdown-cart')

    </div>

    <nav id="navigation-menu"
{{--        :class="{'block': open, 'hidden': !open }"--}}
        x-show="open"
        :class="{'block': open, 'hidden': !open}"
        class="bg-neutral-700 bg-opacity-25 w-full absolute hidden">
        <div class="container h-full">
            <div
                x-on:click.away="open = false"
                class="grid grid-cols-4 h-full relative">
                <ul class="bg-white">
                    {{-- Recorremos el array para mostrar las categorias principales --}}
                    @foreach($categories as $category)
                        <li class="navigation-link text-neutral-500 hover:bg-orange-500 hover:text-white">
                            {{-- Start icon --}}
                            <a href="" class="py-2 px-4 text-sm flex items-center" >

                                <span class="flex justify-center w-9">
                                    {!!$category->icon!!}
                                </span>
                                {{$category->name}}
                            </a>
                            {{-- End icon --}}
                            <div class="navigation-submenu bg-neutral-200 absolute w-3/4 h-full top-0 right-0 hidden">
                                <x-navigation-subcategories :category="$category" />
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="col-span-3 bg-neutral-200">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>
            </div>

        </div>
    </nav>

</header>
