@extends('layouts.app', ['page' => __('carrera Management'), 'pageSlug' => 'carreras'])
@section('content')
<div class="row col-12 center-block" style="left: 430px;">
<a class="navbar-brand " href="#" style="color: #28CA00;">Carrera</a>
</div>
    <div class="row">
            <div class="row" style="
            margin-left: 0px;
        ">
                <div class="col-8">
                    <h4 class="card-title">{{ __('Carrera') }}</h4>
                </div>

            </div>
   
            <div class="card col-lg-12 col-md-12 col-sm-12 col-xs-12" style="height: 250px;">  
                <div class="card-body">
                    <div class="row col-12  ">
                    <div class="col-4 " style="padding-left: 0px;">   
                        <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo" style="background: #28CA00;">Agregar</button>   
                    </div>  
                        <div class="dropdown col-4">                   
                        <select class="btn btn mdb-select md-form " style="background:#28CA00 background-color: #28CA00;width: 188.4832px;background: #28CA00;padding-top: 9px;padding-bottom: 6px;margin-left: 0px;padding-left: 20px;padding-right: 30px;margin-top: ‒10;left: 20px; background-image: none;
                          background-image: linear-gradient(to bottom left, #28CA00, #28CA00, #28CA00) !important; left: 70px;">
                            <option value="" disabled selected style="background:#28CA00 ">carrera</option>
                            <option value="1" style="background:#28CA00 ">Option 1</option>
                            <option value="2" style="background:#28CA00 ">Option 2</option>
                            <option value="3" style="background:#28CA00 ">Option 3</option>
                          </select>
                          </div>

                          <div class="col-4">
                          <!-- Search form -->
                          <input class="form-control" type="text" placeholder="Search" aria-label="Search">   
                          </div>
                        </div>

                    @include('alerts.success')
                   
                    <div style=" position: absolute; top: 85px; left: 15px; width: 970px;   height:auto;">    
                        
                        <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                            <thead class=" text-primary" >
                                <th scope="col">{{ __('ID') }}</th>
                                <th scope="col">{{ __('Nombre') }}</th>
                                <th scope="col">{{ __('Serie') }}</th>
                                <th scope="col">{{ __('Departamento') }}</th>
                                <th scope="col">{{ __('Acciones') }}</th>
                            </thead>
                            <tbody>
                                @foreach ($carreras as $carrera)
                                    <tr>
                                        <td>{{ $carrera->id }}</td>
                                        <td>{{ $carrera->nombre }}</td>
                                       <td>{{ $carrera->numero_serie }}</td>
                                        <td>{{ $carrera->departamento->nombre }}</td>
                                        {{-- <td style="background: whitesmoke; border: Gray 2px solid;">
                                          <div style="text-align: center;">
                                            <i class="fas fa-pencil-alt fa-2 " style="font-size: 20px; color:orange"  data-placement="top" title="Editar" data-toggle="modal" data-target="#ModalEditar" data-whatever="@mdo"></i></i>
                                            <i class="fa fa-eye " aria-hidden="true" style="font-size: 20px; width: 30px; color:#048ab7" data-placement="top" title="Ver" data-toggle="modal" data-target="#Modalcarreras" data-whatever="@mdo"></i>
                                            <i class="fa fa-trash" aria-hidden="true" data-placement="top" title="Eliminar" style="font-size: 20px; color:red "></i>
                                          </div>
                                        </td> --}}
                                        <td class="td-actions text-right">
                                          <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $carrera->id }})">
                                                  <i class="fas fa-pencil-alt fa-2 "></i>
                                          </button>
                                          <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalcarreras({{ $carrera->id }}, '{{ $carrera->nombre }}')">
                                                  <i class="fa fa-eye "></i>
                                          </button>
                                          <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="mostrarModalEditar({{ $carrera->id }})">
                                                  <i class="fas fa-edit"></i>
                                          </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer py-4">
                          <nav class="d-flex justify-content-end" aria-label="...">
                              {{ $carreras->links() }}
                          </nav>
                        </div>
                </div>
                    
                </div>
                
            </div>

    </div>
@include('Admin.Carrera.agregarModal')
{{-- @include('Admin.Carrera.editarModal')
@include('Admin.Carrera.verModal') --}}
@endsection
