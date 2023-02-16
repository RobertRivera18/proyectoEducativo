<x-app-layout>
    <div class="px-4 py-16 mx-auto sm:max-w-xl md:max-w-full lg:max-w-screen-xl md:px-24 lg:px-8 lg:py-20">
        <div class="flex flex-col items-center justify-between w-full mb-10 lg:flex-row">
            <div class="mb-2 lg:mb-0 lg:max-w-lg lg:pr-5">
                <div class="max-w-xl mb-3">
                    <div>
                        <p class="inline-block px-3 py-px mb-2 text-xs font-semibold tracking-wider text-teal-900 uppercase rounded-full bg-yellow-400">
                            Apps Digitales
                        </p>
                    </div>
                    <h2 class="max-w-lg mb-3 font-sans text-3xl font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-none">
                        Apps que favorecen los procesos de Enseñanza-Aprendizaje.
                        <span class="inline-block text-deep-purple-accent-400">is real</span>
                    </h2>
                    <p class="mt-2 text-sm text-gray-500 dark:text-gray-400 lg:text-base">Por medio de estas herramientas digitales fomentarás la gamificacion un proceso de enseñanza vanguardista.</p>

                    @livewire('search')
                </div>
                <div class="flex items-center">
                    <a href="/" class="w-32 transition duration-300 hover:shadow-lg">
                        <img src="https://kitwind.io/assets/kometa/app-store.png" class="object-cover object-top w-full h-auto mx-auto" alt="" />
                    </a>
                    <a href="/" class="w-32 transition duration-300 hover:shadow-lg">
                        <img src="https://kitwind.io/assets/kometa/google-play.png" class="object-cover object-top w-full h-auto mx-auto" alt="" />
                    </a>
                </div>
            </div>
            <div class="flex items-center justify-center lg:w-1/2">
                <div class="w-3/5">
                    <img class="object-cover" src="{{asset('img/home/tecnologia.png')}}" alt="" />
                </div>
                
            </div>
        </div>
    </div>
    @livewire('app-index')
    <x-footer />

</x-app-layout>
