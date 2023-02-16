@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<div class="section-body">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body rounded-pill">
                    <div class="row">
                        <div class="col-md-3 col-xl-3">
                            <div class="card bg-success bg-gradient order-card p-2 shadow-lg rounded-xl">

                                <h5 class="text-md">Usuarios</h5>
                                @php
                                use App\Models\User;
                                $cant_users=User::count();
                                @endphp
                                <h2 class="text-right"><i class="fa fa-users f-left"></i> <span>{{$cant_users}}</span>
                                </h2>

                            </div>
                        </div>

                        <div class="col-md-3 col-xl-3">
                            <div class="card bg-info bg-gradient order-card p-2">
                                <h5 class="text-md">Post Recursos Educativos</h5>
                                @php
                                use App\Models\Post;
                                $cant_posts=Post::where('tipo_recurso_id', 1)->count();
                                @endphp
                                <h2 class="text-right"><i class="fa fa-sticky-note f-left"></i>
                                    <span>{{$cant_posts}}</span>
                                </h2>
                            </div>

                        </div>

                        <div class="col-md-3 col-xl-3">
                            <div class="card bg-warning bg-gradient order-card p-2 shadow-lg">

                                <h5 class="text-md">Roles</h5>
                                @php
                                use Spatie\Permission\Models\Role;
                                $cant_roles=Role::count();
                                @endphp
                                <h2 class="text-right"><i class="fa fa-users-cog f-left"></i> <span>{{$cant_roles}}</span>
                                </h2>

                            </div>
                        </div>


                    </div>

                </div>
            </div>



        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!'); 
</script>
@stop