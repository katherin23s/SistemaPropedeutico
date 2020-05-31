@extends('layouts.app', ['page' => 'alumnos', 'pageSlug' => 'alumnos'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="nav-wrapper">
                <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-clases-tab" data-toggle="tab" href="#tab-clases" role="tab" aria-controls="tab-clases" aria-selected="true"><i class="fas fa-chalkboard"></i>Clases</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-documentos-tab" data-toggle="tab" href="#tab-documentos" role="tab" aria-controls="tab-documentos" aria-selected="false"><i class="far fa-file-alt"></i>Documentos</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="tabContent">
                <div class="tab-pane fade show active" id="tab-clases" role="tabpanel" aria-labelledby="tab-clases-tab">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Detalles</h5>
                        </div>
                        
                        <div class="card-body">
                            @include('alerts.success')
                            @include('components.tablaCalificacionesAlumno', ['calificaciones' => $alumno->calificaciones])
                            
                                
                        </div>
                        <div class="card-footer">
                           
                        </div>
                    </div>
        
                    <div class="card">
                        <div class="card-header">
                            <h5 class="title">Clases</h5>
                        </div>
                        <div class="card-body">
                            @include('components.tablaClases', ['clases' => $alumno->grupo->clases])
                        </div>
                        <div class="card-footer">
                            
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="tab-documentos" role="tabpanel" aria-labelledby="tab-documentos-tab">
                    @include('Admin.Documentos.tabla', ['documentos'=>$alumno->documentos])  
                </div>
            </div>
            
        </div>
        <div class="col-md-4">
            <div class="card card-user">
                <div class="card-body">
                    <p class="card-text">
                        <div class="author">
                            <div class="block block-one"></div>
                            <div class="block block-two"></div>
                            <div class="block block-three"></div>
                            <div class="block block-four"></div>
                            <a href="#">
                                <img class="avatar" src="{{ asset('white') }}/img/emilyz.jpg" alt="">
                                <h5 class="title">{{ $alumno->nombre }}</h5>
                            </a>
                            <p class="description">
                                {{ $alumno->numero_alumno }}
                            </p>
                        </div>
                    </p>
                    <div class="card-description">
                        <p>{{ $alumno->direccion }}</p>
                        <p class="card-text">
                            {{ $alumno->telefono }}
                        </p>
                        <p class="card-text">
                            {{ $alumno->escuela_procedencia }}
                        </p>
                        <p class="card-text">
                            <a href="{{ route('grupos.ver', $alumno->grupo) }}">
                                {{ $alumno->grupo->numero }}
                            </a>
                        </p>
                        <p class="card-text">
                            <a href="{{ route('semestres.ver', $alumno->grupo->semestre) }}">
                                {{ $alumno->grupo->semestre->numero . ' ' . $alumno->grupo->semestre->periodo() }}
                            </a>
                        </p>
                        <p class="card-text">
                            <a href="{{ route('carreras.ver', $alumno->grupo->carrera) }}">
                                {{ $alumno->grupo->carrera->nombre . ' ' . $alumno->grupo->carrera->numero_serie }}
                            </a>
                        </p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a class="btn btn-info btn-round btn-icon" rel="tooltip"  type="button" href="{{ route('alumnos.actualizar', $alumno) }} ">
                            <i class="fas fa-pencil-alt fa-2 "></i>
                        </a>
                        <a rel="tooltip" class="btn btn-danger btn-round btn-icon"  type="button" style="color: white;">
                            <i class="fa fa-trash"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
