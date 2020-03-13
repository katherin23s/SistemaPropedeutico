  <!-- MODAL AGREGAR CARRERA -->
    <div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5  align="center" class="modal-title" id="exampleModalLabel">GRUPO</h5>
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
              <button type="button" class="btn btn-primary " style="left: 355px;" >Guardar</button>
            </div>
          </div>
        </div>
      </div>
@push('js')
<script>
    function agregarPlantel(nombre, direccion, correo, 
    telefono){
        $.ajax({
            url: "{{route('planteles.store')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "nombre": nombre,
                "direccion": direccion,
                "correo": correo,
                "telefono": telefono,
            },
        success: function () {                       
            $('#AgregarModal').modal('hide')
            }
        });
            return false;
    }


    $(document).ready(function(){

        $("#agregar-plantel").click(function(){
          //obtener valores de los inputs
            var nombre = document.getElementById("add-nombre").value;
            var direccion = document.getElementById("add-direccion").value;
            var correo = document.getElementById("add-correo").value;
            var telefono = document.getElementById("add-telefono").value;

            agregarPlantel(nombre, direccion, correo, telefono);
            
        }); 
    });
</script>
    
@endpush