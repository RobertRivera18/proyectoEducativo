<x-app-layout>
    <div class="max-w-5xl mx-auto px-2 sm:px-6 lg:px-8 py-8 ">
        <h1 class="font-bold uppercase text-center text-xl">Categoria:{{$category->name}}</h1>
        @foreach ($posts as $post)
        <x-card-post :post="$post"/>

            @endforeach
            <div class="max-w-5xl mx-auto mt-4">
                {{$posts->links()}}
            </div>

    </div>
    <x-footer/>
</x-app-layout>