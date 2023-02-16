<div>
    <!--Menu de aplicaciones Digitales-->
    <div class="bg-gray-200 py-4 mb-14">
        <div class=" mt-2 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <nav x-data="{ isOpen: false }" class="relative shadow dark:bg-gray-800">
                <div class="container px-4 py-2 mx-auto md:flex">
                    <div class="flex items-center ">
                        <div>
                            <button class="text-lg font-bold  transition-colors duration-300 transform dark:text-white lg:text-2xl hover:text-gray-700 dark:hover:text-gray-300">App Educativas</button>
                        </div>

                        <!-- Mobile menu button -->
                        <div class="flex lg:hidden">
                            <button x-cloak @click="isOpen = !isOpen" type="button"
                                class="text-gray-500 dark:text-gray-200 hover:text-gray-600 dark:hover:text-gray-400 focus:outline-none focus:text-gray-600 dark:focus:text-gray-400"
                                aria-label="toggle menu">
                                <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                                </svg>

                                <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
                    <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                        class="absolute inset-x-0 z-20 w-full px-6 py-4 transition-all duration-300 ease-in-out  dark:bg-gray-800 md:mt-0 md:p-0 md:top-0 md:relative md:opacity-100 md:translate-x-0 md:flex md:items-center md:justify-between">
                        <div class="flex flex-col px-2 -mx-4 md:flex-row md:mx-10 md:py-0">

                            <button wire:click="resetFilters"
                                class="px-2.5 py-1 text-gray-700 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 md:mx-2">Todas las aplicaciones</button> 
                            @foreach($categories as $category)
                            <button wire:click="$set('category_id', {{$category->id}})" 
                                class="px-2.5 py-1 text-gray-700 transition-colors duration-300 transform rounded-lg dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 md:mx-2">{{$category->name}}</button>
                            @endforeach
                        </div>

                      
                    </div>
                </div>
            </nav>
        </div>
    </div>

    {{-- <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  gap-6">
        @foreach($apps as $app )
        <article class="bg-white shadow-lg rounded-lg overflow-hidden">
            <img class="bg-sky-900 h-36 w-full object-cover" src="{{Storage::url($app->image->url)}}" alt="">

            <div class="px-6 py-4">
                <h1 class="text-lg text-gray-700 mb-2 leading-6">
                    <a href="{{route('apps.show', $app)}}">
                        {{Str::limit($app->name ,25)}}
                    </a>

                </h1>
                <p class="text-sm mb-2">
                    @foreach($app->tags as $tag )
                    <a href="{{route('posts.tag',$tag)}}"
                        class="inline-block px-3 h-6 bg-{{$tag->color}}-400 text-black rounded-full">{{$tag->name}}</a>
                    @endforeach
                </p>

                <ul class="flex text-sm mb-3">
                    <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
                    <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
                    <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
                    <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
                    <li class="mr-1"><i class="fas fa-star text-{{$app->rating==5 ? 'yellow': 'gray'}}-400"></i></li>

                </ul>

                <a href="{{route('apps.show', $app)}}"
                    class=" text-sm block text-center w-full mt-4 bg-gray-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-lg">Más
                    información Aplicaci</a>
            </div>
        </article>
        @endforeach
    </div> --}}
    <div class=" max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 gap-6">
        @foreach($apps as $app)

        <div class="flex max-w-md overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <div class="w-1/3 bg-cover bg-blue-900" style="background-image: url('{{Storage::url($app->image->url)}}')">
            </div>

            <div class="w-2/3 p-4 md:p-4">
                <h1 class="text-lg font-bold text-gray-800 dark:text-white">{{$app->name}}</h1>

                <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">{{Str::limit($app->extract,120)}}</p>

                <ul class="flex text-sm mb-3">
                    <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=1 ? 'yellow': 'gray'}}-400"></i></li>
                    <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=2 ? 'yellow': 'gray'}}-400"></i></li>
                    <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=3 ? 'yellow': 'gray'}}-400"></i></li>
                    <li class="mr-1"><i class="fas fa-star text-{{$app->rating>=4 ? 'yellow': 'gray'}}-400"></i></li>
                    <li class="mr-1"><i class="fas fa-star text-{{$app->rating==5 ? 'yellow': 'gray'}}-400"></i></li>

                </ul>
                <p class="text-sm mb-2">
                    @foreach($app->tags as $tag )
                    <a href="{{route('posts.tag',$tag)}}"
                        class="sm:bt-2 inline-block px-3 h-6 bg-{{$tag->color}}-400 text-black rounded-full">{{$tag->name}}</a>
                    @endforeach
                </p>

                <div class="flex justify-between mt-3 item-center">
                    <a href="{{route('apps.show', $app)}}"
                        class="px-2 py-1 text-xs font-bold text-white uppercase transition-colors duration-300 transform bg-gray-800 rounded dark:bg-gray-700 hover:bg-gray-700 dark:hover:bg-gray-600 focus:outline-none focus:bg-gray-700 dark:focus:bg-gray-600">Leer
                        Más</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-4 mb-8">
        {{$apps->links()}}
    </div>




 