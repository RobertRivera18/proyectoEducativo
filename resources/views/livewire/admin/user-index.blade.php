<div>

    <div class="card shadow p-3 mb-5 bg-white rounded">
        <div class="card-header">
            <input wire:model="busqueda" class="form-control rounded-pill"
                placeholder="Ingrese el nombre o correo de un usuario">
        </div>
        @if($users->count())

        <div class="card-body">
            <table class="table table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombres</th>
                        <th>Email</th>
                        <th>Rol</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            @if($user->getRoleNames())
                            @foreach($user->getRoleNames() as $rolName)
                            {{$rolName}}
                            @endforeach

                            @endif


                        </td>
                        <td with="10px">
                            <a class="btn btn-success btn-sm rounded-pill"
                                href="{{route('admin.users.edit',$user)}}">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$users->links()}}
        </div>
        @else

        <div class="card-body">
            <strong>No hay registros</strong>
        </div>
        @endif
    </div>
</div>