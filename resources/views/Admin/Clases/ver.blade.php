@extends('layouts.app', ['page' => 'Clases', 'pageSlug' => 'clases'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h6 class="card-title ">Clase {{ $clase->materia->nombre . ' - '.$clase->clave }}</h6>
                        <div class="row">
                            <div class="col-md-3">   
                                 <h6> Grupo {{ $clase->grupo->numero }} </h6>
                            </div>  
                            <div class="col-md-3">                   
                                <h6> Docente {{ $clase->docente->nombre }} </h6>
                            </div>
                            <div class="col-md-3">   
                                <h6> Semestre {{ $clase->grupo->semestre->periodo() }} </h6>
                           </div>
                            <div class="col-md-3">
                                <h6> Horario {{ $clase->horarioCompleto() }} </h6>
                            </div>
                        </div>
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-detalles-tab" data-toggle="tab" 
                                        href="#tab-detalles" role="tab" aria-controls="tab-detalles" aria-selected="true">
                                        <i class="fas fa-chalkboard"></i>Detalles</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-alumnos-tab" data-toggle="tab" 
                                        href="#tab-alumnos" role="tab" aria-controls="tab-detalles" aria-selected="false">
                                        <i class="fas fa-users mr-2"></i>Alumnos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="card-body">
                        @include('alerts.success')
                        

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-detalles" role="tabpanel" aria-labelledby="tab-detalles-tab">
                                <div class="card">
                                    <h1>Detalles xd</h1>
                                    <div class="card-body">
                                        <div class="card-description">
                                            <div class="row">
                                                <div class="col-md-2">
                                                    <h6>Dias: </h6>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="card-text">
                                                        {{ $clase->dias }}
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <h6>Salon: </h6>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="card-text">
                                                        {{ $clase->salon }}
                                                    </p>
                                                </div>
                                                <div class="col-md-2">
                                                    <h6>Capacidad: </h6>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="card-text">
                                                        {{ $clase->capacidad }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <h6>Unidades: </h6>
                                                </div>
                                                <div class="col-md-2">
                                                    {{ $clase->unidades }}
                                                </div>
                                                <div class="col-md-4">
                                                    <h6>Creditos: </h6>
                                                </div>
                                                <div class="col-md-2">
                                                    <p class="card-text">
                                                        {{ $clase->creditos }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-alumnos" role="tabpanel" aria-labelledby="tab-alumnos-tab">
                                <div class="table-responsive">
                                    <table class="table" id="tabla-alumnos" >
                                        <thead class="text-primary" >
                                            <th scope="col">Número</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Promedio</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($clase->calificaciones as $calificacion)
                                                <tr>
                                                    <td>{{ $calificacion->alumno->numero_alumno }}</td>
                                                    <td>{{ $calificacion->alumno->nombre}}</td>
                                                    <td>
                                                        <a href="mailto:{{ $calificacion->alumno->email }}">{{ $calificacion->alumno->email }}</a>
                                                    </td>
                                                    <td class="{{ $calificacion->promedio < 70 ? 'bg-danger' : 'bg-success' }}">{{ $calificacion->promedio() }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                                                                                   
                    </div>
                    <div class="card-footer py-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection