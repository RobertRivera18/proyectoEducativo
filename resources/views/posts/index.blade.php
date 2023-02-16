<x-app-layout>
    {{-- <div class="px-4 py-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="flex flex-col items-center justify-between w-full mb-10 lg:flex-row">
            <div class="mb-8 lg:mb-0 lg:max-w-lg lg:pr-5">
                <div class="max-w-xl mb-2">
                    <div>
                        <p class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-yellow-400">
                            Recursos Educativos Digitales
                        </p>
                    </div>
                    <h2 class="max-w-lg mb-2 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                        Tecnologías y recursos educativos orientados a la
                        <span class="inline-block text-blue-400">Educación Virtual</span>
                    </h2>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 lg:text-base"> Aquí encontraras todo tipo de
                        recursos para hacer de tus clases virtuales más dinámicas e interactivas.</p>

                    @livewire('search')
                </div>
            </div>
            <div class="flex items-center justify-center lg:w-1/2">
                <div class="w-3/5">
                    <img class="object-cover" src="{{asset('img/home/virtualEducation.png')}}" alt="" />
                </div>

            </div>
        </div>
    </div>
    <section class="mt-2">
        <h1 class="text-gray-600 text-center text-3xl mb-6">CONTENIDO</h1>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/metodologia.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-gray-700">
                        Recursos Educativos para Docentes
                    </h1>
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero aliquid libero praesentium
                        pariatur.
                    </p>
                </header>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/virtual.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-gray-700">
                        Metodologías de Educacioón Virtual
                    </h1>
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero aliquid libero praesentium
                        pariatur.
                    </p>
                </header>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/recursos.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-gray-700">
                        Estrategias Educativas Virtuales
                    </h1>
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero aliquid libero praesentium
                        pariatur.
                    </p>
                </header>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/apps.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-gray-700">
                        Herramientas y Apps Educativas
                    </h1>
                    <p class="text-sm text-gray-500">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Vero aliquid libero praesentium
                        pariatur.
                    </p>
                </header>
            </article>
        </div>
    </section>
    <section class="bg-gray-100 dark:bg-gray-900 lg:py-12 lg:flex lg:justify-center mt-7">
        <div class="bg-white dark:bg-gray-800 lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg">
            <div class="lg:w-1/2">
                <div class="h-64 bg-cover lg:rounded-lg lg:h-full" style="background-image:url('https://images.unsplash.com/photo-1593642532400-2682810df593?ixlib=rb-1.2.1&ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=750&q=80')">
                </div>
            </div>

            <div class="max-w-xl px-6 py-12 lg:max-w-5xl lg:w-1/2">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl">Build Your New <span class="text-blue-600 dark:text-blue-400">Idea</span></h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">Lorem, ipsum dolor sit amet consectetur adipisicing
                    elit. Quidem modi reprehenderit vitae exercitationem aliquid dolores ullam temporibus enim expedita
                    aperiam mollitia iure consectetur dicta tenetur, porro consequuntur saepe accusantium consequatur.
                </p>

                <div class="mt-8">
                    <a href="{{route('apps.index')}}" class="px-5 py-2 font-semibold text-gray-100 transition-colors duration-300 transform bg-gray-900 rounded-md hover:bg-gray-700">Herramientas
                        Digitales</a>
                </div>
            </div>
        </div>
    </section>


    <section class="mt-20 bg-gray-700 py-12">
        <h1 class="text-center text-white text-3xl">¿No sabes como hacer tus clases más interactivas?</h1>
        <p class="text-center text-white">Dirigete a los posts y encontraras todo tipo de recursos educativos pesnsados
            en ti.</p>
        <div class="flex justify-center mt-4">
            <a href="#" class="bg-red-700 hover:bg-red-900 text-white font-bold py-2 px-4 rounded-lg">Catálogo de
                Recursos Educativos</a>
        </div>
    </section>

    <section class="mt-20">
        <h1 class="text-center text-gar-600 text-3xl">Últimos Post Educativos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Aqui encontrar todo recurso educativo que mejore el proceso
            enseñanza-aprendizaje.</p>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4  gap-6">
            @foreach($ultimosposts as $post )
            <article class="bg-white shadow-lg rounded-lg overflow-hidden">
                @if ($post->image)
                <img class="bg-sky-900 h-36 w-full object-cover" src="{{Storage::url($post->image->url)}}" alt="">
                @else
                <img class="bg-sky-900 h-36 w-full object-cover" src="https://pixabay.com/es/photos/gato-gatito-felino-bigotes-mascota-6735840/" alt="">
                @endif
                <div class="px-6 py-4">
                    <h1 class="text-lg text-gray-700 mb-2 leading-6">
                        <a href="{{route('posts.show', $post)}}">
                            {{Str::limit($post->name ,25)}}
                        </a>

                    </h1>
                    <p class="text-sm mb-2">
                        @foreach($post->tags as $tag )
                        <a href="{{route('posts.tag',$tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-400 text-black rounded-full">{{$tag->name}}</a>
                        @endforeach
                    </p>

                    <ul class="flex text-sm mb-3">
                        <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=1 ? 'yellow':'gray'}}-400"></i>
                        </li>
                        <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=2 ? 'yellow':'gray'}}-400"></i>
                        </li>
                        <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=3 ? 'yellow':'gray'}}-400"></i>
                        </li>
                        <li class="mr-1"><i class="fas fa-star text-{{$post->rating>=4 ? 'yellow':'gray'}}-400"></i>
                        </li>
                        <li class="mr-1"><i class="fas fa-star text-{{$post->rating ==5 ? 'yellow':'gray'}}-400"></i>
                        </li>

                    </ul>

                    <a href="{{route('posts.show', $post)}}" class=" block text-center text-sm w-full mt-4 bg-gray-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-lg">Más
                        información</a>
                </div>
            </article>
            @endforeach
        </div>
    </section>

    @livewire('resource-index')

    <section class="mb-8">
        <div class="grid md:grid-cols-2 bg-gray-500">
            <div class="bg-cover bg-center aspect-w-4 aspect-h-3 lg:aspect-none" style="background-image: url('https://codersfree.com/img/home/resumen.jpeg')">
            </div>

            <div class="text-white px-12 py-16 lg:py-28">
                <h1 class="text-center text-2xl font-semibold tracking-wide uppercase">Resumen de la web</h1>
                <p class="text-center mb-3">La formación online es el presente</p>
                <div class="flex justify-center mb-8">
                    <div class="h-0.5 w-36 bg-red-400"></div>
                </div>

                <div class="grid lg:grid-cols-2 gap-6">
                    <div class="flex flex-col items-center border border-white rounded py-4">
                        <span class="text-3xl font-semibold">22</span>
                        <span>Cursos</span>
                    </div>
                    <div class="flex flex-col items-center border border-white rounded py-4">
                        <span class="text-3xl font-semibold">18</span>
                        <span>Artículos</span>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    @livewire('busqueda-filtros')
    <x-footer />
</x-app-layout>




