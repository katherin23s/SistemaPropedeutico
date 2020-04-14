@extends('layouts.app', ['page' => __('Departamentos'), 'pageSlug' => 'departamentos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Departamento {{ $departamento->nombre }}</h4>
                        <div class="row">
                            <div class="col-md-3">
                                 <h6> Plantel {{ $departamento->plantel->nombre }} </h6>
                            </div>  
                        </div>
                        <div class="nav-wrapper">
                            <ul class="nav nav-pills nav-fill flex-column flex-md-row" id="tabs-icons-text" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-carreras-tab" data-toggle="tab" href="#tab-carreras" role="tab" aria-controls="tab-carreras" aria-selected="true"><i class="fas fa-chalkboard"></i>Carreras</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link mb-sm-3 mb-md-0" id="tabs-docentes-tab" data-toggle="tab" href="#tab-docentes" role="tab" aria-controls="tab-docentes" aria-selected="false"><i class="fas fa-users mr-2"></i>Docentes</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                
                    <div class="card-body">
                        @include('alerts.success')
                        

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tab-carreras" role="tabpanel" aria-labelledby="tab-carreras-tab">
                                @include('components.tablaCarreras', ['carreras' => $departamento->carreras])
                            </div>
                            <div class="tab-pane fade" id="tab-docentes" role="tabpanel" aria-labelledby="tab-docentes-tab">
                                <div class="table-responsive">
                                    <table class="table" id="tabla-docentes" >
                                        <thead class=" text-primary" >
                                            <th scope="col">Número</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Correo</th>
                                            <th scope="col">Telefono</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($departamento->docentes as $docente)
                                                <tr>
                                                    <td>{{ $docente->numero_empleado }}</td>
                                                    <td>{{ $docente->nombre}}</td>
                                                    <td>
                                                        <a href="mailto:{{ $docente->email }}">{{ $docente->email }}</a>
                                                    </td>
                                                    <td>{{ $docente->telefono}}</td>
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
