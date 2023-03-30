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
                                <h2 class="text-right"><i class="fa fa-users-cog f-left"></i>
                                    <span>{{$cant_roles}}</span>
                                </h2>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="conmtainer" style="width: 100%; height: 80vh">
            <canvas id="myChart"></canvas>
        </div>
    </div>
</div>
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@push('js')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'radar',
        data: {
            labels: {!! json_encode(array_keys($data)) !!},
            datasets: [{
                label: 'Posts Realizados',
                data: {!! json_encode(array_values($data)) !!},
                backgroundColor: [
      'rgba(255, 99, 132, 0.2)',
      'rgba(255, 159, 64, 0.2)',
      'rgba(255, 205, 86, 0.2)',
      'rgba(75, 192, 192, 0.2)',
      'rgba(54, 162, 235, 0.2)',
      'rgba(153, 102, 255, 0.2)',
      'rgba(201, 203, 207, 0.2)'
    ],
    borderColor: [
      'rgb(255, 99, 132)',
      'rgb(255, 159, 64)',
      'rgb(255, 205, 86)',
      'rgb(75, 192, 192)',
      'rgb(54, 162, 235)',
      'rgb(153, 102, 255)',
      'rgb(201, 203, 207)'
    ],
                borderWidth: 3
            }]
        },
        options: {
            responsive:true,
            maintainAspectRatio:false,
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>
@endpush