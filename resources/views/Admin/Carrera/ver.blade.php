@extends('layouts.app', ['page' => __('Carreras'), 'pageSlug' => 'carreras'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Carrera {{ $carrera->nombre }}</h4>
                        <div class="row">
                            <div class="col-md-3">
                                 <h6> Departamento {{ $carrera->departamento->nombre }} </h6>
                            </div>  
                        </div>
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-materias-tab" data-toggle="tab" href="#tab-materias" 
                                        role="tab" aria-controls="tab-materias" aria-selected="true"><i class="fas fa-chalkboard"></i>Materias
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-grupos-tab" data-toggle="tab" href="#tab-grupos"
                                        role="tab" aria-controls="tab-grupos" aria-selected="false"><i class="fas fa-users mr-2"></i>Grupos
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="card-body">
                        @include('alerts.success')
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-materias" role="tabpanel" aria-labelledby="tab-materias-tab">
                                <div class="table-responsive">
                                    <table class="table" id="tabla-materias" >
                                        <thead class="text-primary" >
                                            <th scope="col">Clave</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Creditos</th>
                                            <th scope="col">Unidades</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($carrera->materias as $materia)
                                                <tr>
                                                    <td>
                                                        <a href=" {{ route('materias.ver', $materia) }} ">
                                                            {{ $materia->clave }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $materia->nombre}}</td>
                                                    <td>{{ $materia->creditos}}</td>
                                                    <td>{{ $materia->unidades}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer py-4">
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-grupos" role="tabpanel" aria-labelledby="tab-grupos-tab">
                                <div class="table-responsive">
                                    <table class="table" id="tabla-grupos" >
                                        <thead class=" text-primary" >
                                            <th scope="col">Número</th>
                                            <th scope="col">Horario</th>
                                            <th scope="col">Semestre</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($carrera->grupos as $grupo)
                                                <tr>
                                                    <td>
                                                        <a href=" {{ route('grupos.ver', $grupo) }} ">
                                                            {{ $grupo->numero }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $grupo->horarioCompleto()}}</td>
                                                    <td>{{ $grupo->semestre->numero}}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer py-4">
                                    
                                </div>
                                
                            </div>
                        </div>                                                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
