@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
<div class="row col-12 center-block" style="left: 430px;">
<a class="navbar-brand " href="#"  style="color: #28CA00;">GRUPO</a>
</div>
    <div class="row">
            <div class="row" style="
            margin-left: 0px;">
                <div class="col-8">
                    <h4 class="card-title">{{ __('Grupo') }}</h4>
                </div>
            </div>
            <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 250px;">  
                <div class="card-body">
                    <div class="row col-12  ">
                    <div class="col-4 " style="padding-left: 0px;">   
                      <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo" style="background: #28CA00;">Agregar</button>   
                    </div>  
                          <div class="col-4" style="left: 320px;">
                          <!-- Search form -->
                          <input class="form-control" type="text" placeholder="Search" aria-label="Search">   
                          </div>
                        </div>

                    @include('alerts.success')
                   
                    <div style=" position: absolute; top: 85px; left: 15px; width: 970px;   height:auto;">    
                        
                        <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                            <thead class=" text-primary" >
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Semestre') }}</th>
                                <th scope="col">{{ __('Carrera') }}</th>
                                <th scope="col">{{ __('Numero') }}</th>
                                <th scope="col">{{ __('Hora inicio') }}</th>
                                <th scope="col">{{ __('Hora final') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($grupos as $grupo)
                                    <tr>
                                        <td>{{ $grupo->id }}</td>
                                        <td>{{ $grupo->semestre->numero }}</td>
                                        <td>{{ $grupo->carrera->nombre }}</td>
                                        <td>{{ $grupo->numero }}</td>
                                        <td>{{ $grupo->hora_inicio->format('H:m')}}</td>
                                        <td>{{ $grupo->hora_final->format('H:m') }}</td>
                                        <td class="td-actions text-right">
                                        <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $grupo->id }})">
                                                <i class="fas fa-pencil-alt fa-2 "></i>
                                        </button>
                                        <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalGruposs({{ $grupo->id }}, '{{ $grupo->nombre }}')">
                                                <i class="fa fa-eye "></i>
                                        </button>
                                        <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="mostrarModalEditar({{ $grupo->id }})">
                                                <i class="fas fa-edit"></i>
                                        </button>
                                        </td>
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
{{-- @include('Admin.Grupos.agregarModal')
@include('Admin.Grupos.editarModal')
@include('Admin.Grupos.verModal') --}}
@endsection