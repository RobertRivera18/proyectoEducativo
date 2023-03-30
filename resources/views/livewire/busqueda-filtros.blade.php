<main>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 px-4 mt-12" x-data="data">
        <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
            <aside class="hidden lg:block">
                <div class="mb-4">
                    <p class="text-lg font-semibold">Ordenar por</p>
                    <select class="form-control" x-model="sort">
                        <option value="published_at">Más recientes</option>
                        <option value="rating">Mejor calificado</option>
                    </select>
                </div>
                <div class="mb-4">
                    <p class="text-lg font-semibold">Categorías</p>
                    @foreach($categories as $category)
                    <ul>
                        <li>
                            <label>
                                <input wire:click="$set('category_id', {{$category->id}})" type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                {{$category->name}}
                            </label>
                        </li>
                    </ul>
                    @endforeach

                </div>
                <div class="mb-4">
                    <p class="text-lg font-semibold">Asigantura</p>
                    @foreach($subjects as $subject)
                    <ul>
                        <li>
                            <label>
                                <input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                {{$subject->name}}
                            </label>
                        </li>
                    </ul>
                    @endforeach

                </div>
                <div class="mb-4">
                    <p class="text-lg font-semibold">Niveles</p>
                    @foreach($levels as $level)
                    <ul>
                        <li>
                            <label>
                                <input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    wire:click="$set('level_id', {{$level->id}})">
                                {{$level->name}}
                            </label>
                        </li>
                        {{-- <li>
                            <label>
                                <input type="checkbox"
                                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    x-model="nivel" value="todos-los-niveles">
                                Todos los niveles
                            </label>
                        </li> --}}
                    </ul>
                    @endforeach
                </div>

                <div>
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition"
                        x-on:click="apply_filters">
                        Aplicar filtros
                    </button>
                </div>

            </aside>


            <div class="col-span-3">
                <form class="relative mx-auto text-gray-600" autocomplete="off">
                    <input
                        class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-full ui-autocomplete-input mb-5"
                        id="search" type="text" placeholder="Buscar Recurso Educativo" autocomplete="off"
                        wire:model="search">

                    @if($search)
                    <ul class="absolute left-0 w-full bg-white mt-1 rounded-lg overflow-hidden">
                        @forelse($this->results as $result)
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-blue-300">
                            <a href="{{route('posts.show',$result)}}">{{$result->name}}</a>
                        </li>
                        @empty
                        <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-blue-300">
                            No hay ninguna coincidencia :(
                        </li>
                        @endforelse

                    </ul>
                    @endif

                </form>
                <ul class="space-y-4">
                    @foreach($posts as $post)
                    <li>
                        <a href="{{route('posts.show', $post)}}" class="block sm:flex w-full">
                            <figure class="aspect-[16/9] sm:aspect-[4/3] md:aspect-[16/9] sm:w-36 md:w-64">
                                <img class=" w-full object-cover object-center"
                                    src="{{Storage::url($post->image->url)}}">
                            </figure>
                            <div class="lg:flex flex-1 mt-2 sm:mt-0 sm:ml-4 sm:mr-6">
                                <div class="flex-1">
                                    <h3 class="text-lg mb-1 leading-5">
                                        {{$post->name}}
                                    </h3>
                                    <p class="text-sm text-gray-600">{{$post->extract}}</p>
                                    <p class="text-gray-500 text-sm mb-1 font-bold">{{$post->user->name}}</p>
                                    <div class="flex items-center mb-1">
                                        <ul class="flex items-center space-x-1 text-xs">
                                            <li class="mr-1"><i
                                                    class="fas fa-star text-{{$post->rating>=1 ? 'yellow': 'gray'}}-400"></i>
                                            </li>
                                            <li class="mr-1"><i
                                                    class="fas fa-star text-{{$post->rating>=2 ? 'yellow': 'gray'}}-400"></i>
                                            </li>
                                            <li class="mr-1"><i
                                                    class="fas fa-star text-{{$post->rating>=3 ? 'yellow': 'gray'}}-400"></i>
                                            </li>
                                            <li class="mr-1"><i
                                                    class="fas fa-star text-{{$post->rating>=4 ? 'yellow': 'gray'}}-400"></i>
                                            </li>
                                            <li class="mr-1"><i
                                                    class="fas fa-star text-{{$post->rating==5 ? 'yellow': 'gray'}}-400"></i>
                                            </li>
                                            <p class="text-lg font-bold">{{$post->rating}}</p>
                                        </ul>


                                        <ul class="flex text-sm mb-3">

                                    </div>
                                </div>
                            </div>

                        </a>

                    </li>
                    @endforeach
                </ul>
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
                    {{$posts->links()}}
                </div>
            </div>
        </div>
    </div>
</main>