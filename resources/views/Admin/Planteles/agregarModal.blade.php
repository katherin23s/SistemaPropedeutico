<!-- MODAL AGREGAR PLANTEL -->
<div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5  align="center" class="modal-title" id="exampleModalLabel">PLANTEL</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
            <div class="row form-group col-auto col-12" style="height: 25px;">
                <label for="plantel-nombre" class="col-form-label col-12" style="padding-left: 25px">Nombre</label>
            </div>
            <div class="row form-group col-auto col-12">
                <input type="text" class="col-12 form-control" name="plantel-nombre" id="add-nombre" style="left: 25px;">
            </div>
            <div class="row form-group col-auto col-12">
                <label for="plantel-direccion" class="col-form-label "style="padding-left: 0px ">Direccion</label>
            </div>
            <div class="row form-group col-auto col-12">
                <input type="text" class="form-control" name="plantel-direccion" id="add-direccion">
            </div>

            <div class="row form-group col-auto col-12" style="height: 25px;">
                <label for="plantel-telefono" class="col-form-label col-6 "style="padding-left: 0px ">Telefono</label>
                <label for="plantel-correo" class="col-form-label col-6" style="padding-left: 25px">Correo</label>
            </div>
            <div class="row form-group col-auto col-12">
                <input type="text" class=" col-6 form-control" name="plantel-telefono" id="add-telefono">
                <input type="text" class="col-6 form-control" name="plantel-correo" id="add-correo" style="left: 25px;">
            </div>

            {{-- <div class="row col-12" style="top: 30px;">
                <select class="custom-select" id="inputGroupSelect04" style="color:#525f7f; top: 30px;">
                <option selected>Plantel</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                </select>
            </div> --}}
        </div>
        <div class="modal-footer">
            <button type="button" id="agregar-plantel" class="btn btn-primary " style="left: 355px;" >Guardar</button>
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