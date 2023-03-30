
<x-app-layout>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4">
        <h1 class="font-bold uppercase text-center text-xl mt-8 mb-4">Categoria:{{$category->name}}</h1>
        <hr class="my-1">
            <section class="col-span-1 lg:col-span-3">
                <div class="space-y-8 mb-4">
                    @foreach ($posts as $post)
                    <x-card-post :post="$post" />

                    @endforeach
                </div>
            </section>


        

        <div class="max-w-5xl mx-auto mt-4">
            {{$posts->links()}}
        </div>
    </div>
    <x-footer />
</x-app-layout>