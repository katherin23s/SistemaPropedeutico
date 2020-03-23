@extends('layouts.app', ['page' => __('Alumnos'), 'pageSlug' => 'Alumnos'])

@section('content')
<div class="row">
  <div class="row">
      <div class="col-8">
          <h4 class="card-title">{{ __('Alumnos') }}</h4>
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
                  <table class="table" id="tabla-alumnos">
                      <thead class=" text-primary" >
                        <th scope="col">{{ __('No. Alumno') }}</th>
                        <th scope="col">{{ __('Nombre') }}</th>
                        <th scope="col">{{ __('Dirección') }}</th>
                        <th scope="col">{{ __('Teléfono') }}</th>
                        <th scope="col">{{ __('Correo') }}</th>
                        <th scope="col">{{ __('Grupo') }}</th>
                        <th scope="col">{{ __('Acciones') }}</th>
                      </thead>
                      <tbody>
                          @foreach ($alumnos as $alumno)
                              <tr>
                                  <td>{{ $alumno->numero_alumno }}</td>
                                  <td>{{ $alumno->nombre }}</td>
                                  <td>{{ $alumno->direccion }}</td>
                                  <td>{{ $alumno->telefono }}</td>
                                  <td>
                                    <a href="mailto:{{ $alumno->correo }}">{{ $alumno->correo }}</a>
                                  </td>
                                  <td>{{ $alumno->grupo->numero }}</td>
                                  <td class="td-actions text-right">
                                      <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="mostrarModalEditar({{ $alumno->id }})">
                                              <i class="fas fa-pencil-alt fa-2 "></i>
                                      </button>
                                      <button rel="tooltip" class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalalumnos({{ $alumno->id }}, '{{ $alumno->nombre }}')">
                                              <i class="fa fa-eye "></i>
                                      </button>
                                      <button rel="tooltip" class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar({{ $alumno->id }})">
                                              <i class="fa fa-trash"></i>
                                      </button>
                                  </td>
                              </tr>
                          @endforeach
                      </tbody>
                  </table>
                  <div class="card-footer py-4">
                      <nav class="d-flex justify-content-end" aria-label="...">
                          {{ $alumnos->links() }}
                      </nav>
                  </div>
              </div>     
          </div>             
      </div>    
  </div>
</div>
@endsection
@include('Admin.Alumnos.agregarModal')
@push('js')
<script>
    function mostrarAlumnos(data){
        var alumnos = data;
        var output = "";

        for(var i = 0; i < alumnos.length; i++){
            output += "<tr value="+alumnos[i].id+">"
                + "<td>" + alumnos[i].numero_alumno + "</td>" 
                + "<td>" + alumnos[i].nombre + "</td>" 
                + "<td>" + alumnos[i].direccion + "</td>"
                + "<td>" + alumnos[i].telefono + "</td>"
                + "<td>" + alumnos[i].correo + "</td>"
                + "<td>" + alumnos[i].grupo + "</td>" 
                +'<td class="text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" onClick="mostrarModalEditar(\'' + alumnos[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>' 
                +'<button class="btn btn-success btn-sm btn-icon"  type="button" onClick="mostrarModalalumnos(\'' + alumnos[i].id + '\',\'' + alumnos[i].nombre + '\')"><span class="btn-inner--icon"><i class="fa fa-eye"></i></span></button>' 
                +'<button class="btn btn-danger btn-sm btn-icon"  type="button" onClick="Eliminar(\'' + alumnos[i].id + '\')"><span class="btn-inner--icon"><i class="fa fa-trash"></i></span></button></td>' 
                +  "</tr>";
        }

        $('#tabla-alumnos tbody').html(output);
    }
    function Eliminar(id){
        var r = confirm("Confirme la eliminación:");
        if(r){
            $.ajax({
                url: "{{route('alumnos.eliminar')}}",
                dataType: 'json',
                type:"delete",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "alumno_id" : id
                },
            success: function (response) {   
                mostrarAlumnos(response.data);       
                              
                }
            });
            return false;
        }
        
    }
</script>
@endpush