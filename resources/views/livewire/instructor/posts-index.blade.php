<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <x-table-responsive>
        <div class="px-6 py-4 flex">
            <input wire:keydown="limpiar_page" wire:model="search"
                class=" text-sm form-input flex-1 shadow-sm rounded-full" placeholder="Ingrese el nombre de un curso">
            <a class="bg-red-600 px-2 py-2 ml-2 text-white rounded-lg text-sm"
                href="{{route('instructor.posts.create')}}">Crear nuevo Post</a>
        </div>

        @if($posts->count()>0)

        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        Nombres</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        Calificación</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                        Status</th>
                    <th scope="col" class=" relative px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>

                    <th scope="col" class=" relative px-6 py-3">
                        <span class="sr-only">Eliminar</span>
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($posts as $post)
                <tr>
                    <td class="py-4 px-6 whitespace-nowrap">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                @isset($post->image)
                                <img class="h-10 w-10 rounded-full object-cover object-center"
                                    src="{{Storage::url($post->image->url)}}" alt="">
                                @else
                                <img class="h-10 w-10 rounded-full object-cover object-center"
                                    src="{{asset('img/home/imagenDefault.jpeg')}}" alt="">
                                @endisset

                            </div>
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    {{$post->name}}
                                </div>
                                <div class="text-sm text-gray-500">
                                    {{$post->category->name}}
                                </div>
                            </div>
                        </div>
                    </td>


                    <td class="py-4 px-6 whitespace-nowrap">
                        <div class="text-sm text-gray-900 flex items-center">{{$post->rating}}
                            <ul class="flex text-sm mb-2 ml-2">
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
                            </ul>

                        </div>
                        <div class="text-sm text-gray-500">Valoración del Curso</div>
                    </td>



                    <td class="py-4 px-6 whitespace-nowrap">
                        @switch($post->status)
                        @case(1)
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Borrador</span>
                        @break
                        @case(2)
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">Revisión</span>
                        @break
                        @case(3)
                        <span
                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Publicado</span>
                        @break
                        @default

                        @endswitch

                    </td>
                    <td class="py-4 px-6 whitespace-nowrap text-sm text-right font-medium">
                        <a href="{{route('instructor.posts.edit',$post)}}"
                            class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>

                    <td>
                        <form action="{{route('instructor.posts.destroy',$post)}}" method="post"
                            class="formularioEliminar py-4 px-6 whitespace-nowrap text-sm text-right font-medium">
                            @csrf
                            @method('delete')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>

        <div class="px-6 py-4">
            {{$posts->links()}}
        </div>
        @else
        <div class="px-6 py-4">
            No hay nigun registro que coincida con la busqueda
        </div>
        @endif
    </x-table-responsive>
</div>

@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('eliminar')=='ok')
<script>
    Swal.fire(
                    'Eliminado!'
                    , 'El post se eliminó con exito.'
                    , 'success'
                )
</script>



@endif
<script>
    $('.formularioEliminar').submit(function(e) {
        e.preventDefault();
        Swal.fire({
            title: 'Estás seguro?'
            , text: "Este post sera eliminado de forma definitiva"
            , icon: 'warning'
            , showCancelButton: true
            , confirmButtonColor: '#3085d6'
            , cancelButtonColor: '#d33'
            , confirmButtonText: '¡Si, Eliminar!'
            , cancelButtonText: '¡Cancelar!'
        }).then((result) => {
            if (result.isConfirmed) {
               
                this.submit();
            }
        })
    })

</script>