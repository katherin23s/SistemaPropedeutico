<div class="modal fade" id="verMateriales" tabindex="-1" role="dialog" aria-labelledby="verMateriales" aria-hidden="true" >
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5  align="center" class="modal-title" >Materiales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <table class="table" id="tabla-materiales">
              <thead class="text-primary">
                <th scope="col">Material</th>
                <th scope="col">Fecha</th>
                <th scope="col">Ubicación</th>
                <th scope="col">Estado</th>
                <th scope="col">Comentarios</th>
                <th scope="col"></th>
              </thead>
              <tbody>
                  
              </tbody>
          </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary " style="left: 355px;" >Cerrar</button>
      </div>
    </div>
  </div>
</div>
@include('Admin.Materiales.editarModal')
@push('js')
<script>
    function obtenerMateriales(id){
        $.ajax({
            url: "{{route('clase.materiales')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "clase_id" : id
            },
        success: function (data) {          
                mostrarMateriales(data.data);           
            }
        });
            return false;
    }
    function mostrarModalMateriales(id){
        obtenerMateriales(id);
        $('#verMateriales').modal('show');
    }
    function mostrarMateriales(data){
        var materiales = data;
        console.log(materiales);
        var output = "";
        for(var i = 0; i < materiales.length; i++){
            output += "<tr id=fila"+materiales[i].id+" class="+materiales[i].class+">"
                + "<td>" + materiales[i].nombre + "</td>" 
                + "<td>" + materiales[i].fecha + "</td>"
                + "<td><a href=" + materiales[i].ubicacion + ">"+ materiales[i].ubicacion +"</a></td>" 
                + "<td id=estado"+materiales[i].id+">" + materiales[i].estado + "</td>"
                + "<td id=comentarios"+materiales[i].id+">" + materiales[i].comentarios + "</td>"
                +'<td class="td-actions text-right"><button class="btn btn-info btn-sm btn-icon"  type="button" rel="tooltip" onClick="obtenerDatos(\'' + materiales[i].id + '\')"><span class="btn-inner--icon"><i class="fas fa-pencil-alt fa-2"></i></span></button>'              
                +  "</tr>";
        }
        $('#tabla-materiales tbody').html(output);
    }
</script>
@endpush