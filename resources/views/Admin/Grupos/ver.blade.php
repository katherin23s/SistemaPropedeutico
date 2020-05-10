@extends('layouts.app', ['page' => __('Grupos'), 'pageSlug' => 'grupos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Grupo {{ $grupo->numero }}</h4>
                        <div class="row">
                            <div class="col-md-3">   
                                 <h6> Semestre {{ $grupo->semestre->periodo() }} </h6>
                            </div>  
                            <div class="col-md-3">                   
                                <h6> Carrera {{ $grupo->carrera->nombre }} </h6>
                            </div>
            
                            <div class="col-md-6">
                                <h6> Horario {{ $grupo->horarioCompleto() }} </h6>
                            </div>
                        </div>
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-clases-tab" data-toggle="tab" href="#tab-clases" role="tab" aria-controls="tab-clases" aria-selected="true"><i class="fas fa-chalkboard"></i>Clases</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-alumnos-tab" data-toggle="tab" href="#tab-alumnos" role="tab" aria-controls="tab-clases" aria-selected="false"><i class="fas fa-users mr-2"></i>Alumnos</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="card-body">
                        @include('alerts.success')
                        

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-clases" role="tabpanel" aria-labelledby="tab-clases-tab">
                                @include('components.tablaClases', ['clases' => $clases])
                            </div>
                            <div class="tab-pane fade" id="tab-alumnos" role="tabpanel" aria-labelledby="tab-alumnos-tab">
                                <div class="table-responsive">
                                    <table class="table" id="tabla-alumnos" >
                                        <thead class=" text-primary" >
                                            <th scope="col">Número</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col"></th>
                                        </thead>
                                        <tbody>
                                            @foreach ($grupo->alumnos as $alumno)
                                                <tr>
                                                    <td> 
                                                        <a href="{{ route('alumnos.ver', $alumno) }}">
                                                            {{  $alumno->numero_alumno  }}
                                                        </a>
                                                    </td>
                                                    <td>{{ $alumno->nombre}}</td>
                                                    <td>
                                                        <a href="mailto:{{ $alumno->email }}">{{ $alumno->email }}</a>
                                                    </td>
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
@push('js')
<script>

</script>
@endpush