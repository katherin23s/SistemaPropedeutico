@extends('layouts.Alumnos.app', ['page' => 'Documentos', 'pageSlug' => 'documentos'])
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">  
                    <div class="card-header card-header-primary">
                        <h4 class="card-title ">Carga de documentos</h4>
                    </div>
                
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="tabla-documentos">
                                <thead>
                                    <th scope="col">Documento</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Ubicación</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Comentarios</th>
                                    <th scope="col"></th>
                                </thead>
                                <tbody>
                                    @foreach ($alumno->documentos as $documento)
                                        <tr id="fila{{ $documento->id }}" class="{{ $documento->clase() }}">
                                            <td>{{ $documento->nombre }}</td>
                                            <td id="fecha{{ $documento->id }}">{{ $documento->fecha->format('d-m-Y')}}</td>
                                            <td ><a id="enlace{{ $documento->id }}" href="{{ $documento->ubicacion }}"><span id="ubicacion{{ $documento->id }}">{{ $documento->ubicacion }}</span></a></td>
                                            <td id="estado{{ $documento->id }}">{{ $documento->estado() }}</td>
                                            <td >{{ $documento->comentarios }}</td>
                                            <td class="td-actions text-right">
                                                <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="obtenerDatos({{ $documento->id }})">
                                                        <i class="fas fa-pencil-alt fa-2 "></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>  
                                                                             
                    </div>
                    <div class="card-footer py-4">
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  align="center" class="modal-title" id="exampleModalLabel">Documento</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <input type="hidden" id="actualizar-documento_id">
            <div class="col-md-5">
                <label id="actualizar-nombre"></label>
            </div>
            <div class="col-md-4">
                <label id="actualizar-estado"></label>
            </div>
            <div class="col-md-3">
                <label id="actualizar-fecha"></label>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-12">
                <label for="ubicacion">Enlace (Google Drive)</label>
                <input name="ubicacion" type="text" class="form-control" id="actualizar-ubicacion">
            </div>
          </div>

          <div class="form-row">
            <div class="col-lg-12">
                <label id="actualizar-comentarios"></label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
            <div class="form-row">
                <div class="col-md-6">
                    <button onclick="actualizarDocumento()" class="btn btn-success btn-block">Guardar</button>
                </div>
              </div>
        </div>
      </div>
    </div>
</div>
@push('js')
<script>
    function obtenerDatos(documento_id){
        $.ajax({
            url: "{{route('documento.encontrar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "documento_id" : documento_id
            },
        success: function (response) {          
              mostrarDatosEnModal(response.data.id, response.data.nombre, response.data.ubicacion,
              response.data.estado, response.data.comentarios, response.data.fecha);            
            }
        });
        return false;         
    }

    function mostrarDatosEnModal(documento_id, nombre, ubicacion, estado, 
        comentarios, fecha){
        document.getElementById("actualizar-documento_id").value = documento_id;
        document.getElementById("actualizar-nombre").innerHTML = nombre;
        document.getElementById("actualizar-ubicacion").value = ubicacion;
        document.getElementById("actualizar-estado").innerHTML = estado;
        document.getElementById("actualizar-comentarios").innerHTML = comentarios;
        document.getElementById("actualizar-fecha").innerHTML = fecha;
        $('#ModalEditar').modal('show')
    }

    function actualizarDocumento(){
        $.ajax({
            url: "{{route('documento.cargar')}}",
            dataType: 'json',
            type:"patch",
            data: {
                "_token": "{{ csrf_token() }}",
                "id" : document.getElementById("actualizar-documento_id").value,
                "ubicacion": document.getElementById("actualizar-ubicacion").value
            },
        success: function (response) {          
              actualizarFila(response.data.id, response.data.estado, response.data.estado_n, 
                response.data.ubicacion, response.data.fecha);    
              $('#ModalEditar').modal('hide')        
            }
        });
        return false;    
    }

    function actualizarFila(documento_id, estado, estado_n, ubicacion, fecha){
        var fila = document.getElementById("fila"+documento_id);
        var tdEstado = document.getElementById("estado"+documento_id);
        var tdUbicacion = document.getElementById("ubicacion"+documento_id);
        var tdFecha = document.getElementById("fecha"+documento_id);
        var aEnlace = document.getElementById("enlace"+documento_id);


        fila.className = "bg-warning";
        tdEstado.innerHTML = estado;
        tdFecha.innerHTML = fecha;
        aEnlace.href = ubicacion;
        tdUbicacion.innerHTML = ubicacion;
    }
 

</script>

@endpush
@endsection