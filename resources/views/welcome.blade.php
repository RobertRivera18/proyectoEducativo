<x-app-layout>
    <div class="px-4 py-4 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="flex flex-col items-center justify-between w-full mb-10 lg:flex-row">
            <div class="mb-8 lg:mb-0 lg:max-w-lg lg:pr-5">
                <div class="max-w-xl mb-2">
                    <div>
                        <p
                            class="inline-block px-3 py-px mb-4 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-yellow-400">
                            Recursos Educativos Digitales
                        </p>
                    </div>
                    <h2
                        class="max-w-lg mb-2 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
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
        <div
            class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/metodologia.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-gray-700">
                        Recursos Educativos para Docentes
                    </h1>
                    <p class="text-sm text-gray-500 text-justify">
                        Aquí encontrarás una amplia variedad de materiales didácticos y recursos pedagógicos para hacer de tus clases una experiencia más enriquecedora y divertida. Desde actividades y juegos hasta lecciones completas, nuestro sitio web tiene todo lo que necesitas para motivar a tus alumnos y fomentar su aprendizaje de manera efectiva. ¡No esperes más y explora nuestra página ahora mismo para descubrir todo lo que tenemos para ofrecerte!.
                    </p>
                </header>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/virtual.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-gray-700">
                        Metodologías de Educación Virtual
                    </h1>
                    <p class="text-sm text-gray-500 text-justify">
                        ¡Bienvenidos al futuro de la educación! En la era digital, las metodologías de educación virtual son la clave para una formación accesible, flexible y de calidad. En nuestro programa de Metodologías de Educación Virtual, encontrarás todas las herramientas necesarias para llevar a cabo una enseñanza efectiva y atractiva, utilizando las últimas tecnologías y metodologías innovadoras..
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
                    <p class="text-sm text-gray-500 text-justify">
                        Descubre las mejores estrategias educativas virtuales para llevar tus clases al siguiente nivel. Aprende a utilizar las herramientas digitales y crea experiencias de aprendizaje únicas e innovadoras para tus estudiantes. ¡Registrate ahora y conviértete en un experto en educación virtual!.
                    </p>
                </header>
            </article>

            <article>
                <figure>
                    <img class="rounded-xl h-36 w-full object-cover" src="{{asset('img/home/apps.jpg')}}" alt="">
                </figure>
                <header class="mt-2">
                    <h1 class="text-center text-gray-700 ">
                        Herramientas y Apps Educativas
                    </h1>
                    <p class="text-sm text-gray-500 text-justify">
                        ¡Enriquece tus clases virtuales con las mejores herramientas y apps educativas! Optimiza el aprendizaje de tus estudiantes con recursos interactivos y dinámicos que harán que la educación sea más atractiva y efectiva. ¡Descubre nuestras opciones y lleva tus clases al siguiente nivel!
                    </p>
                </header>
            </article>
        </div>
    </section>
    <section class="bg-gray-100 dark:bg-gray-900 lg:py-12 lg:flex lg:justify-center mt-7">
        <div class="bg-white dark:bg-gray-800 lg:mx-8 lg:flex lg:max-w-5xl lg:shadow-lg lg:rounded-lg">
            <div class="lg:w-1/2">
                <div class="h-64 bg-cover lg:rounded-lg lg:h-full"
                    style="background-image:url('https://images.unsplash.com/photo-1593642532400-2682810df593?ixlib=rb-1.2.1&ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=750&q=80')">
                </div>
            </div>

            <div class="max-w-xl px-6 py-12 lg:max-w-5xl lg:w-1/2">
                <h2 class="text-2xl font-bold text-gray-800 dark:text-white md:text-3xl">Aplicaciones y <span
                        class="text-blue-600 dark:text-blue-400">Herramientas Digitales</span></h2>
                <p class="mt-4 text-gray-600 dark:text-gray-400">Si eres docente y buscas formas de mejorar la enseñanza
                    y el aprendizaje en tus clases, estás en el lugar correcto. En este apartado de aplicaciones web,
                    encontrarás una amplia variedad de apps gratuitas diseñados específicamente para ayudarte a
                    potenciar la enseñanza y el aprendizaje en tus clases.


                </p>

                <div class="mt-8">
                    <a href="{{route('apps.index')}}"
                        class="px-5 py-2 font-semibold text-gray-100 transition-colors duration-300 transform bg-gray-900 rounded-md hover:bg-gray-700">Herramientas
                        Digitales</a>
                </div>
            </div>
        </div>
    </section>


    <section class="w-full bg-gray-400 bg-center bg-cover bg-blend-multiply mb-24"
        style="background-image: url('https://codersfree.com/img/home/aprende-programar.jpg');">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex flex-col flex-wrap content-center justify-center p-20">
            <h1 class="text-center text-white text-3xl">¿No sabes como hacer tus clases más interactivas?</h1>
            <p class="text-center text-white">Dirigete a los posts y encontraras todo tipo de recursos educativos
                pensados en ti.</p>
            <div class="flex justify-center mt-4">
                <a href="{{route('posts.index')}}"
                    class="bg-red-700 hover:bg-red-900 text-white font-bold py-2 px-4 rounded-lg">Catálogo de
                    Recursos Educativos</a>
            </div>
    </section>

    <section class="mt-20">
        <h1 class="text-center text-gar-600 text-3xl">Últimos Post Educativos</h1>
        <p class="text-center text-gray-500 text-sm mb-6">Aqui encontrar todo recurso educativo que mejore el
            proceso
            enseñanza-aprendizaje.</p>

        <div wire:init="loadPost" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="glider-contain">
                <ul class="glider">
                    @foreach($ultimosposts as $example )
                    <article class=" mt-5 bg-white rounded-lg overflow-hidden mr-5">
                        @if($example->image)
                        <img class="bg-sky-900 h-36 w-full object-cover" src="{{Storage::url($example->image->url)}}"
                            alt="">
                        @else
                        <img class="bg-sky-900 h-36 w-full object-cover" src="{{asset('img/home/imagenDefault.jpeg')}}"
                            alt="">
                        @endif
                        <div class="px-6 py-4">
                            <h1 class="text-md mb-2 leading-6">
                                <a href="{{route('posts.show', $example)}}">
                                    {{Str::limit($example->name ,50)}}
                                </a>

                            </h1>
                            <div class="mb-2">
                                @foreach($example->tags as $tag )
                                <a href="{{route('posts.tag',$tag)}}">
                                    <span
                                        class="bg-indigo-100 text-indigo-800 text-sm font-semibold mr-2 px-2.5 py-0.5 rounded">
                                        {{$tag->name}}
                                    </span>
                                </a>
                                @endforeach
                            </div>
                            <p class="text-gray-500 text-sm mb-1 mt-auto">Prof:{{$example->user->name}}</p>

                            <ul class="flex text-sm mb-3">
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{$example->rating>=1 ? 'yellow': 'gray'}}-400"></i>
                                </li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{$example->rating>=2 ? 'yellow': 'gray'}}-400"></i>
                                </li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{$example->rating>=3 ? 'yellow': 'gray'}}-400"></i>
                                </li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{$example->rating>=4 ? 'yellow': 'gray'}}-400"></i>
                                </li>
                                <li class="mr-1"><i
                                        class="fas fa-star text-{{$example->rating==5 ? 'yellow': 'gray'}}-400"></i>
                                </li>

                            </ul>

                            <a href="{{route('posts.show', $example)}}"
                                class="text-sm block text-center w-full mt-4 bg-gray-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-lg">Más
                                información</a>
                        </div>
                    </article>
                    @endforeach
                </ul>

                <button aria-label="Previous" class="glider-prev">«</button>
                <button aria-label="Next" class="glider-next">»</button>
                <div role="tablist" class="dots"></div>
            </div>
        </div>
    </section>
    </section>

    @livewire('resource-index')

    <section class="mb-8">
        <div class="grid md:grid-cols-2 bg-gray-500">
            <div class="bg-cover bg-center aspect-w-4 aspect-h-3 lg:aspect-none"
                style="background-image: url('https://codersfree.com/img/home/resumen.jpeg')">
            </div>

            <div class="text-white px-12 py-16 lg:py-28">
                <h1 class="text-center text-2xl font-semibold tracking-wide uppercase">Resumen de la web</h1>
                <p class="text-center mb-3">La formación online es el presente</p>
                <div class="flex justify-center mb-8">
                    <div class="h-0.5 w-36 bg-red-400"></div>
                </div>

                <div class="grid lg:grid-cols-2 gap-6">
                    <div class="flex flex-col items-center border border-white rounded py-4">
                        <span class="text-3xl font-semibold">{{$example->where('status',3)->count()}}</span>
                        <span>Posts Publicados</span>
                    </div>
                    <div class="flex flex-col items-center border border-white rounded py-4">
                        <span class="text-3xl font-semibold">{{$example->user->count()}}</span>
                        <span>Usuarios</span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer />

    <script>
        new Glider(document.querySelector('.glider'), {
            slidesToShow: 1,
            slidesToScroll: 1,
            dots: '.dots',
            draggable: true,
            arrows: {
                prev: '.glider-prev',
                next: '.glider-next'
            },
            responsive: [{
                breakpoint: 640,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                }
            },

            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                }
            },

            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll:4,
                }
            },
            {
                breakpoint: 1268,
                settings: {
                    slidesToShow: 4,
                    slidesToScroll:4,
                }
            },

        ]
        });
    </script>
</x-app-layout>