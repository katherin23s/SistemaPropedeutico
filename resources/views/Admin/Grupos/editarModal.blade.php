 <!--MODAL EDITAR -->
      <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5  align="center" class="modal-title" id="exampleModalLabel">EDITAR GRUPO</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <form>
                <div class="row form-group col-auto col-12" style="height: 25px;">
                    <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">ID</label>
                    <label for="recipient-name" class="col-form-label col-6" style="padding-left: 25px">Grupo</label>
                  </div>
                  <div class="row col-12">
                    <input type="text" class=" col-6 form-control" id="recipient-name">
                    <input type="text" class="col-6 form-control" id="recipient-name" style="left: 25px;">
                  </div>
              
  
                  <div class="row col-12">
                    <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f; top: 30px; ">
                      <option selected>Unidad</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                    <select class="col-6 custom-select" id="inputGroupSelect04" style="color:#525f7f; top: 30px; left: 25px;">
                      <option selected>Departamento</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
  
  
                  <div class="row col-12" style="top: 30px;">
                      <select class="col-12 custom-select" id="inputGroupSelect04" style="color:#525f7f; top: 30px;">
                        <option selected>Carrera</option>
                        <option value="1">One</option>
                        <option value="2">Two</option>
                        <option value="3">Three</option>
                      </select>
                      
                    </div>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary " style="left: 355px; top: 10px;" >Guardar</button>
            </div>
          </div>
        </div>
      </div>

@push('js')

<script>
    function mostrarModalEditar(id){
        obtenerPlantel(id); 
        $('#ModalEditar').modal('show')
    }
    function actualizarPlantel(id, nombre, direccion, correo, 
    telefono){
        $.ajax({
            url: "{{route('planteles.update')}}",
            dataType: 'json',
            type:"patch",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "nombre": nombre,
                "direccion": direccion,
                "correo": correo,
                "telefono": telefono,
            },
        success: function (response) {                       
            $('#ModalEditar').modal('hide')
            }
        });
            return false;
    }
    function mostrarDatosEnModal(plantel_id, nombre, direccion, correo, 
        telefono){
            document.getElementById("update-plantel_id").value = plantel_id;
            document.getElementById("update-nombre").value = nombre;
            document.getElementById("update-direccion").value = direccion;
            document.getElementById("update-correo").value = correo;
            document.getElementById("update-telefono").value = telefono;
            
    }
    function obtenerPlantel(id){
        $.ajax({
            url: "{{route('planteles.encontrar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "plantel_id" : id
            },
        success: function (data) {          
                mostrarDatosEnModal(data.id, data.nombre, 
                data.direccion, data.correo, data.telefono);            
            }
        });
            return false;
    }
    $(document).ready(function(){
        $("#actualizar-plantel").click(function(){
          //obtener valores de los inputs
            var plantel_id = document.getElementById("update-plantel_id").value;
            var nombre = document.getElementById("update-nombre").value;
            var direccion = document.getElementById("update-direccion").value;
            var correo = document.getElementById("update-correo").value;
            var telefono = document.getElementById("update-telefono").value;

            actualizarPlantel(plantel_id, nombre, direccion, correo, telefono);
            
        }); 
    });
</script>
    
@endpush