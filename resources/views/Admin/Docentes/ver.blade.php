@extends('layouts.app', ['page' => 'docentes', 'pageSlug' => 'docentes'])

@section('content')
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="title">Detalles</h5>
                </div>
                
                <div class="card-body">
                    @include('alerts.success')
                    <p class="card-text">
                        {{ $docente->nombre }}
                    </p>
                    <p class="card-text">
                        {{ $docente->telefono }}
                    </p>
                    <p class="card-text">
                        <a href="{{ route('departamentos.ver', $docente->departamento) }}">
                            {{ $docente->departamento->nombre }}
                        </a>
                    </p>
                        
                </div>
                <div class="card-footer">
                   
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="title">Clases</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">                           
                        <table class="table" id="tabla-clases" >
                            <thead class=" text-primary" >
                                <th scope="col">Clave</th>
                                <th scope="col">Materia</th>
                                <th scope="col">Semestre</th>
                                <th scope="col">Horario</th>
                                <th scope="col">Materiales</th>
                            </thead>
                            <tbody>
                                @foreach ($docente->clases as $clase)
                                    <tr>
                                        <td><a href="{{ route('clases.ver', $clase ) }}">{{ $clase->clave}}</a> </td>
                                        <td>{{ $clase->materia->nombre }}</td>
                                        <td>{{ $clase->grupo->semestre->periodo() }}</td>
                                        <td>{{ $clase->horarioCompleto() }}</td>
                                        <td class="td-actions text-right">
                                            <button rel="tooltip" class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalMateriales({{ $clase->id }})">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div> 
                </div>
                <div class="card-footer">
                    
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
                                <h5 class="title">{{ $docente->nombre }}</h5>
                            </a>
                            <p class="description">
                                {{ $docente->numero_empleado }}
                            </p>
                        </div>
                    </p>
                    <div class="card-description">
                        <p>{{ $docente->direccion }}</p>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-center">
                        <a class="btn btn-info btn-round btn-icon" rel="tooltip"  type="button" href="{{ route('docentes.actualizar', $docente) }} ">
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
    @include('components.modalTablaMateriales')
@endsection
