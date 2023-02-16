<div class="card shadow p-3 mb-5 bg-white rounded">

    <div class="card-header">
        <input wire:model="search" class="form-control rounded-pill" placeholder="Ingrese el nombre del Post">
    </div>
    @if($apps->count())

    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($apps as $app)
                <tr>
                    <td>{{$app->id}}</td>
                    <td>{{$app->name}}</td>
                    <td width="10px">
                        <a class="btn btn-primary btn-sm" href="{{route('admin.apps.edit',$app)}}">Editar</a>
                    </td>
                    <td width="10px">
                        <form action="{{route('admin.apps.destroy',$app)}}" method="post" class="formularioEliminar">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$apps->links()}}
    </div>
    @else
    <strong>No hay ningún registro</strong>
    @endif
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
@endsection