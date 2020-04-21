@extends('layouts.app', ['page' => __('Semestres'), 'pageSlug' => 'semestres'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Semestre {{ $semestre->numero }}</h4>
                        <div class="row">
                            <div class="col-md-3">   
                                 <h6> Periodo {{ $semestre->periodo()}} </h6>
                            </div>  
                            <div class="col-md-3">                   
                                <h6> {{ count($grupos)}} Grupos </h6>
                            </div>
                        </div>
                    </div>
                     <div class="card-body">
                        @include('alerts.success')
                        <div class="table-responsive">                           
                            <table class="table" id="tabla-grupos" >
                                <thead class=" text-primary" >
                                    <th scope="col">ID</th>
                                    <th scope="col">Carrera</th>
                                    <th scope="col">Numero</th>
                                    <th scope="col">Hora inicio</th>
                                    <th scope="col">Hora final</th>
                                </thead>
                                <tbody>
                                    @foreach ($grupos as $grupo)
                                        <tr>
                                            <td>{{ $grupo->id }}</td>
                                            <td>{{ $grupo->carrera->nombre }}</td>
                                            <td>
                                                <a href=" {{ route('grupos.ver', $grupo) }} ">
                                                    {{ $grupo->numero }}
                                                </a>
                                            </td>
                                            <td>{{ $grupo->hora_inicio->toTimeString()}}</td>
                                            <td>{{ $grupo->hora_final->toTimeString() }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>  
                            
                    </div>
                    <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            {{ $grupos->links() }}
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
