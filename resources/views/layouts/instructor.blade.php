<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{asset('vendor/fontawesome-free/css/all.min.css')}}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <x-jet-banner />

    <div class="min-h-screen bg-gray-100">
        @livewire('navigation')
        <!-- Page Content -->
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-5 gap-6">
            <aside>

                <nav class="flex" aria-label="Breadcrumb">
                    <ol class="inline-flex items-center space-x-1 md:space-x-3">
                        <li class="inline-flex items-center">
                            <a href="{{route('instructor.posts.index')}}"
                                class="inline-flex items-center text-md font-medium text-gray-700 hover:text-blue-600">
                                 <i class="fa fa-undo mr-1"></i>
                                Volver
                            </a>
                        </li>
                    </ol>
                </nav>

                <h1 class="font-bold text-lg mb-4">Edicion del Curso</h1>
                <ul class="text-sm text-gray-600 mb-4">
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.posts.edit', $post)border-indigo-400 @else border-transparent @endif pl-2">
                        <a href="{{ route('instructor.posts.edit', $post) }}">Informacion del Post</a>
                    </li>

                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.posts.goals', $post)border-indigo-400 @else border-transparent @endif pl-2">
                        <a href="{{ route('instructor.posts.goals', $post) }}">Metas del Post</a>
                    </li>

                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.posts.resources', $post)border-indigo-400 @else border-transparent @endif pl-2">
                        <a href="{{ route('instructor.posts.resources', $post) }}">Recursos del Post</a>
                    </li>

                    @if($post->observation)
                    <li
                        class="leading-7 mb-1 border-l-4 @routeIs('instructor.posts.observation', $post)border-indigo-400 @else border-transparent @endif pl-2">
                        <a href="{{ route('instructor.posts.observation', $post) }}">Observaciones</a>
                    </li>
                    @endif
                </ul>


                @switch($post->status)
                @case(1)
                <form action="{{ route('instructor.posts.status', $post) }}" method="POST">
                    @csrf
                    <button type="submit" class="py-1 px-2 inline-flex font-bold text-white bg-red-500
                                    rounded-md">Solicitar
                        Revisión</button>
                </form>
                @break
                @case(2)
                <div class="flex p-4 mb-4 text-sm text-yellow-800 border border-yellow-300 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300 dark:border-yellow-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        Este post se encuentra en revisión.
                    </div>
                </div>
                @break

                @case(3)
                <div class="flex p-4 mb-4 text-sm text-green-800 border border-green-300 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 dark:border-green-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                      Este post se encuentra publicado.
                    </div>
                  </div>


                @break

                @default
                @endswitch




            </aside>
            <div class="col-span-4 card">
                <main class="card-body bg-white rounded-lg text-gray-600 px-5 py-6  shadow-md">
                    {{$slot}}
                </main>
            </div>
        </div>
    </div>

    @stack('modals')

    @livewireScripts
    @isset($js)
    {{$js}}
    @endisset
</body>

</html>