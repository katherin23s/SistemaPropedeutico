@extends('layouts.app', ['page' => __('User Management'), 'pageSlug' => 'docentes'])

@section('content')
<div class="row">
  <div class="row">
      <div class="col-8">
          <h4 class="card-title">{{ __('docentes') }}</h4>
      </div>
  </div>
  <div class="card">  
      <div class="card-body">
          <div class="row">
              <div class="col-lg-4 " style="padding-left: 0px;">   
                  <button type="button" class="btn btn-primary " data-toggle="modal" data-target="#AgregarModal" data-whatever="@mdo" style="background: #28CA00;">Agregar</button>   
              </div>  
              <div class="col-lg-8">
                  <!-- Search form -->
                  <input class="form-control" type="text" placeholder="Search" aria-label="Search">   
              </div>
          </div>
          @include('alerts.success')               
          <div class="row">    
              <div class="col-lg-12">
                  <table class="table" id="tabla-docentes">
                      <thead class=" text-primary" >
                        <th scope="col">{{ __('No. Empleado') }}</th>
                        <th scope="col">{{ __('Nombre') }}</th>
                        <th scope="col">{{ __('Dirección') }}</th>
                        <th scope="col">{{ __('Teléfono') }}</th>
                        <th scope="col">{{ __('Correo') }}</th>
                        <th scope="col">{{ __('Departamento') }}</th>
                        <th scope="col">{{ __('Acciones') }}</th>
                      </thead>
                      <tbody>
                          @foreach ($docentes as $docente)
                              <tr>
                                  <td>{{ $docente->numero_empleado }}</td>
                                  <td>{{ $docente->nombre }}</td>
                                  <td>{{ $docente->direccion }}</td>
                                  <td>{{ $docente->telefono }}</td>
                                  <td>
                                    <a href="mailto:{{ $docente->correo }}">{{ $plantel->correo }}</a>
                                  </td>
                                  <td>{{ $docente->departamento->nombre }}</td>
                                  <td class="td-actions text-right">
                                      <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $docente->id }})">
                                              <i class="fas fa-pencil-alt fa-2 "></i>
                                      </button>
                                      <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModaldocentes({{ $docente->id }}, '{{ $docente->nombre }}')">
                                              <i class="fa fa-eye "></i>
                                      </button>
                                      <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $docente->id }})">
                                              <i class="fa fa-trash"></i>
                                      </button>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                  <div class="card-footer py-4">
                      <nav class="d-flex justify-content-end" aria-label="...">
                          {{ $docentes->links() }}
                      </nav>
                  </div>
              </div>     
          </div>             
      </div>    
  </div>
</div>
@endsection
@include('Admin.Docentes.agregarModal')
