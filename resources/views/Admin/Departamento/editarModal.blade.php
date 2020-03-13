      <!--MODAL EDITAR -->
      <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5  align="center" class="modal-title" id="exampleModalLabel">EDITAR DEPARTAMENTO</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <form>
                <div class="row form-group col-auto col-12" style="height: 25px;">
                  <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">No.Departamento</label>
                  <label for="recipient-name" class="col-form-label col-6" style="padding-left: 25px">Nombre</label>
                </div>
                <div class="row col-12">
                  <input type="text" class=" col-6 form-control" id="update-departamento-id" readonly>
                  <input type="text" class="col-6 form-control" id="update-nombre" style="left: 25px;">
                </div>
              </form>
            </div>
            <div class="modal-footer">
              <button id="actualizar-departamento" type="button" class="btn btn-primary " style="left: 355px;" >Guardar</button>
            </div>
          </div>
        </div>
      </div>
@push('js')

<script>
    function mostrarModalEditar(id){
        obtenerDepartamento(id); 
        $('#ModalEditar').modal('show')
    }
    function actualizarDepartamento(id, nombre){
        $.ajax({
            url: "{{route('planteles.update')}}",
            dataType: 'json',
            type:"patch",
            data: {
                "_token": "{{ csrf_token() }}",
                'departamento_id': id,
                "nombre": nombre
            },
        success: function (response) {                       
            $('#ModalEditar').modal('hide')
            }
        });
            return false;
    }
    function mostrarDatosEnModal(plantel_id, nombre){
           document.getElementById("update-departamento-id").value = plantel_id;
           
            document.getElementById("update-nombre").value = nombre;
            
    }
    function obtenerDepartamento(id){
        $.ajax({
            url: "{{route('departamento.encontrar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "departamento_id" : id
            },
        success: function (data) {          
                mostrarDatosEnModal(data.id, data.nombre);            
            }
        });
            return false;
    }
    $(document).ready(function(){
        $("#actualizar-departamento").click(function(){
          //obtener valores de los inputs
            var departamento_id = document.getElementById("update-departamento-id").value;
            var nombre = document.getElementById("update-nombre").value;
            var plantel_id = 1; //por ahora que asi quede jeje
            actualizarDepartamento(departamento_id, nombre);
            
        }); 
    });
</script>
    
@endpush