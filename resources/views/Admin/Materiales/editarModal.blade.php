<div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5  align="center" class="modal-title" id="exampleModalLabel">Editar Material</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="form-row">
            <input type="hidden" id="actualizar-material_id">
            <div class="col-md-6">
                <label id="actualizar-nombre"></label>
            </div>
            <div class="col-md-6">
                <label id="actualizar-estado"></label>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6">
              <a id="enlace" href=""><span id="actualizar-ubicacion"></span></a>
            </div>
            <div class="col-md-6">
                <label id="actualizar-fecha"></label>
            </div>
          </div>

          <div class="form-row">
            <div class="col-lg-12">
              <textarea type="text" style="width: 100%" rows="3" name="comments" id="actualizar-comentarios"
                placeholder="Comentarios"></textarea>
            </div>
              
          </div>
          
    
        </div>
        <div class="modal-footer">
            <div class="form-row">
                <div class="col-md-6">
                    <button onclick="actualizarMaterial(2)" class="btn btn-danger btn-block">Rechazar</button>
                </div>
                <div class="col-md-6">
                    <button onclick="actualizarMaterial(1)" class="btn btn-success btn-block">Aprobar</button>
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
            url: "{{route('materiales.encontrar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "material_id" : material_id
            },
        success: function (response) {          
              mostrarDatosEnModal(response.data.id, response.data.nombre, 
              response.data.fecha, response.data.ubicacion,
              response.data.estado, response.data.comentarios);            
            }
        });
        return false;         
    }

    function mostrarDatosEnModal(material_id, nombre, fecha, ubicacion, estado, comentarios){
        document.getElementById("actualizar-material_id").value = material_id;
        document.getElementById("actualizar-nombre").innerHTML = nombre;
        document.getElementById("actualizar-fecha").innerHTML = fecha;

        document.getElementById("enlace").href = ubicacion;
        document.getElementById("actualizar-ubicacion").innerHTML = ubicacion;
        document.getElementById("actualizar-estado").innerHTML = estado;
        document.getElementById("actualizar-comentarios").value = comentarios;
        $('#ModalEditar').modal('show')
    }

    function actualizarMaterial(estado){
        $.ajax({
            url: "{{route('materiales.revisar')}}",
            dataType: 'json',
            type:"patch",
            data: {
                "_token": "{{ csrf_token() }}",
                "material_id" : document.getElementById("actualizar-material_id").value,
                "estado" : estado,
                "comentarios": document.getElementById("actualizar-comentarios").value
            },
        success: function (response) {          
              actualizarFila(response.data.id, response.data.estado, response.data.estado_n, response.data.comentarios);    
              $('#ModalEditar').modal('hide')        
            }
        });
        return false;    
    }

    function actualizarFila(material_id, estado, estado_n, comentarios){
        var fila = document.getElementById("fila"+material_id);
        var tdEstado = document.getElementById("estado"+material_id);
        var tdComentarios = document.getElementById("comentarios"+material_id);

        var clase = "";
        if(estado_n == 2){
            clase = "bg-danger"
        }
        else{
            clase = "bg-success";
        }

        fila.className = clase;
        tdEstado.innerHTML = estado;
        tdComentarios.innerHTML = comentarios;
    }
 

</script>

@endpush