<div>
    <div class="bg-gray-200 py-4 mb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex">
            <button class=" focus-outline-none bg-white shadow h-11 px-4 rounded-lg text-gray-700 mr-4"
                wire:click="resetFilters">Todos los Post
                <i class="fas fa-archway text-xs mr-2"></i>
            </button>
            <div class="relative mr-4" x-data="{open:false}">
                <button
                    class="px-4 block text-gray-700 h-11 rounded-lg overflow-hidden focus:outline-none bg-white shadow"
                    x-on:click="open = true">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Categoria
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!--Dropdown Categorias-->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white text-black border-rounded shadow-xl" x-show="open"
                    x-on:click.away="open = false">
                    @foreach($categories as $category)
                    <a class=" cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-black hover:bg-blue-600 hover:text-white"
                        wire:click="$set('category_id', {{$category->id}})"
                        x-on:click="open = false">{{$category->name}}</a>
                    @endforeach
                </div>
            </div>

            <div class="relative" x-data="{open:false}">
                <button
                    class="px-4 block text-gray-700 h-11 rounded-lg overflow-hidden focus:outline-none bg-white shadow"
                    x-on:click="open = true">
                    <i class="fas fa-tags text-sm mr-2"></i>
                    Niveles
                    <i class="fas fa-angle-down text-sm ml-2"></i>
                </button>
                <!--Dropdown Categorias-->
                <div class="absolute right-0 w-40 mt-2 py-2 bg-white text-black border-rounded shadow-xl" x-show="open"
                    x-on:click.away="open = false">
                    @foreach($levels as $level)
                    <a class=" cursor-pointer transition-colors duration-200 block px-4 py-2 text-normal text-black hover:bg-blue-600 hover:text-white"
                        wire:click="$set('level_id', {{$level->id}})" x-on:click="open = false">{{$level->name}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  gap-6">
        @foreach($examples as $example )
        <article class="bg-white shadow-lg rounded-lg overflow-hidden">
            @if($example->image)
            <img class="bg-sky-900 h-36 w-full object-cover" src="{{Storage::url($example->image->url)}}" alt="">
            @else
            <img class="bg-sky-900 h-36 w-full object-cover" src="{{asset('img/home/imagenDefault.jpeg')}}" alt="">
            @endif


            <div class="px-6 py-4">
                <h1 class="text-lg mb-1 leading-6">
                    <a href="{{route('posts.show', $example)}}">
                        {{Str::limit($example->name ,30)}}
                    </a>

                </h1>
                <p class="text-sm mb-2">
                    @foreach($example->tags as $tag )
                    <a href="{{route('posts.tag',$tag)}}"
                        class="bg-yellow-100 hover:bg-yellow-200 text-yellow-800 text-sm font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-blue-400 border border-yellow-400">{{$tag->name}}</a>
                    @endforeach
                </p>
                <p class="text-gray-500 text-sm mb-1 mt-auto">Prof:{{$example->user->name}}</p>

                <ul class="flex text-sm mb-3">
                    <li class="mr-1"><i class="fas fa-star text-{{$example->rating>=1 ? 'yellow': 'gray'}}-400"></i>
                    </li>
                    <li class="mr-1"><i class="fas fa-star text-{{$example->rating>=2 ? 'yellow': 'gray'}}-400"></i>
                    </li>
                    <li class="mr-1"><i class="fas fa-star text-{{$example->rating>=3 ? 'yellow': 'gray'}}-400"></i>
                    </li>
                    <li class="mr-1"><i class="fas fa-star text-{{$example->rating>=4 ? 'yellow': 'gray'}}-400"></i>
                    </li>
                    <li class="mr-1"><i class="fas fa-star text-{{$example->rating==5 ? 'yellow': 'gray'}}-400"></i>
                    </li>

                </ul>

                <a href="{{route('posts.show', $example)}}"
                    class=" text-sm block text-center w-full mt-4 bg-gray-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-lg">Más
                    información</a>
            </div>
        </article>
        @endforeach
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$examples->links()}}
    </div>
</div>