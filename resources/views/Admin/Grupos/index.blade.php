@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'users'])
@section('content')
<div class="row col-12 center-block" style="left: 430px;">
<a class="navbar-brand " href="#"  style="color: #28CA00;">GRUPO</a>
</div>
    <div class="row">
            <div class="row" style="
            margin-left: 0px;
        ">
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
                            <thead class=" text-primary" style="border: Gray 2px solid; background: #28CA00; ">
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('semestre_id') }}</th>
                                <th scope="col">{{ __('carrera_id') }}</th>
                                <th scope="col">{{ __('numero') }}</th>
                                <th scope="col">{{ __('hora_inicio') }}</th>
                                <th scope="col">{{ __('hora_final') }}</th>
                            </thead>
                            <tbody style="background: whitesmoke; border: Gray 2px solid;">
                        @foreach ($grupos as $grupos)
                            <tr>
                                <td>{{ $grupos->id }}</td>
                                <td>{{ $grupos->semestre_id }}</td>
                                <td>{{ $grupos->carrera_id }}</td>
                                <td>{{ $grupos->numero }}</td>
                                <td>{{ $grupos->hora_inicio}}</td>
                                <td>{{ $grupos->hora_final }}</td>
                                <td>
                                    
                                </td>
                                {{-- <td style="background: whitesmoke; border: Gray 2px solid;">
                                  <div style="text-align: center;">
                                    <i class="fas fa-pencil-alt fa-2 " style="font-size: 20px; color:orange"  data-placement="top" title="Editar" data-toggle="modal" data-target="#ModalEditar" data-whatever="@mdo"></i></i>
                                    <i class="fa fa-eye " aria-hidden="true" style="font-size: 20px; width: 30px; color:#048ab7" data-placement="top" title="Ver" data-toggle="modal" data-target="#ModalDepartamentos" data-whatever="@mdo"></i>
                                    <i class="fa fa-trash" aria-hidden="true" data-placement="top" title="Eliminar" style="font-size: 20px; color:red "></i>
                                  </div>
                                </td> --}}
                                <td class="td-actions text-right">
                                  <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $grupos->id }})">
                                          <i class="fas fa-pencil-alt fa-2 "></i>
                                  </button>
                                  <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalDepartamentos({{ $grupos->id }}, '{{ $grupos->nombre }}')">
                                          <i class="fa fa-eye "></i>
                                  </button>
                                  <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="mostrarModalEditar({{ $grupos->id }})">
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
                  
                    </nav>
                </div>
            </div>

    </div>

@endsection