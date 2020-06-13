<div class="table-responsive">
    <table class="table" id="tabla-materiales">
        <thead>
            <th scope="col">Material</th>
            <th scope="col">Clase</th>
            <th scope="col">Fecha</th>
            <th scope="col">Ubicación</th>
            <th scope="col">Estado</th>
            <th scope="col">Comentarios</th>
            <th scope="col"></th>
        </thead>
        <tbody>
            @foreach ($materiales as $material)
                <tr id="fila{{ $material->id }}" class="{{ $material->class() }}">
                    <td>{{ $material->nombre }}</td>
                    <td><a href="{{ route('docente.clase.ver', [$docente,$material->clase]) }}">{{ $material->clase->clave }}</a></td>
                    <td id="fecha{{ $material->id }}">{{ $material->fecha->format('d-m-Y')}}</td>
                    <td ><a id="enlace{{ $material->id }}" href="{{ $material->ubicacion }}"><span id="ubicacion{{ $material->id }}">{{ $material->ubicacion }}</span></a></td>
                    <td id="estado{{ $material->id }}">{{ $material->estado() }}</td>
                    <td >{{ $material->comentarios }}</td>
                    <td class="td-actions text-right">
                        <button class="btn btn-info btn-sm btn-icon" rel="tooltip"  type="button" onClick="obtenerDatos({{ $material->id }})">
                                <i class="fas fa-pencil-alt fa-2 "></i>
                        </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
            <input type="hidden" id="actualizar-material_id">
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
                    <button onclick="actualizarMaterial()" class="btn btn-success btn-block">Guardar</button>
                </div>
              </div>
        </div>
      </div>
    </div>
</div>
@push('js')
<script>
    function obtenerDatos(material_id){
        $.ajax({
            url: "{{route('material.encontrar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "material_id" : material_id
            },
        success: function (response) {          
              mostrarDatosEnModal(response.data.id, response.data.nombre, response.data.ubicacion,
              response.data.estado, response.data.comentarios, response.data.fecha);            
            }
        });
        return false;         
    }

    function mostrarDatosEnModal(material_id, nombre, ubicacion, estado, 
        comentarios, fecha){
        document.getElementById("actualizar-material_id").value = material_id;
        document.getElementById("actualizar-nombre").innerHTML = nombre;
        document.getElementById("actualizar-ubicacion").value = ubicacion;
        document.getElementById("actualizar-estado").innerHTML = estado;
        document.getElementById("actualizar-comentarios").innerHTML = comentarios;
        document.getElementById("actualizar-fecha").innerHTML = fecha;
        $('#ModalEditar').modal('show')
    }

    function actualizarMaterial(){
        $.ajax({
            url: "{{route('material.cargar')}}",
            dataType: 'json',
            type:"patch",
            data: {
                "_token": "{{ csrf_token() }}",
                "id" : document.getElementById("actualizar-material_id").value,
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

    function actualizarFila(material_id, estado, estado_n, ubicacion, fecha){
        var fila = document.getElementById("fila"+material_id);
        var tdEstado = document.getElementById("estado"+material_id);
        var tdUbicacion = document.getElementById("ubicacion"+material_id);
        var tdFecha = document.getElementById("fecha"+material_id);
        var aEnlace = document.getElementById("enlace"+material_id);


        fila.className = "bg-warning";
        tdEstado.innerHTML = estado;
        tdFecha.innerHTML = fecha;
        aEnlace.href = ubicacion;
        tdUbicacion.innerHTML = ubicacion;
    }
 

</script>
@endpush