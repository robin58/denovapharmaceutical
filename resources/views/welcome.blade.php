<x-app-layout>
    <div class="container py-8">
        @foreach ($categories as $category)

            <section class="mb-6">
{{--                <div class="flex items-center mb-2">--}}
                    <h1 class="text-lg uppercase font-semibold text-gray-700">
                    {{-- TEST {{$categories->first()->name}}--}}
                        {{$category->name}}
                    </h1>

{{--                    <a href="{{route('categories.show', $category)}}" class="text-orange-500 hover:text-orange-400 hover:underline ml-2 font-semibold">Ver más</a>--}}

{{--                </div>--}}

                @livewire('category-products', ['category' => $category])
            </section>

        @endforeach
    </div>


    @push('script')

        <script>
            Livewire.on('glider', function(id) {
                new Glider(document.querySelector('.glider-'+ id), {
                    slidesToShow: 5.5,
                    slidesToScroll: 5,
                    draggable: true,
                    dots: '.glider-' + id + '~ .dots',
                    arrows: {
                        prev: '.glider-' + id + '~ .glider-prev',
                        next: '.glider-' + id + '~ .glider-next'
                    },
                });
            });

        </script>

    @endpush
</x-app-layout>
