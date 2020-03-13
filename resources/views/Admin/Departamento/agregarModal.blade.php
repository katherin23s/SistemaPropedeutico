<!-- MODAL AGREGAR PLANTEL -->
<div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5  align="center" class="modal-title" id="exampleModalLabel">DEPARTAMENTO</h5>
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
            <div class="form-group col-md-6 col-auto">
                <label for="plantel_id" class="col-auto col-form-label">{{ __('Plantel') }}</label>
                <select class="custom-select form-control name="plantel_id" id="add-plantel_id">
                @foreach($planteles as $plantel)
                    <option value="{{ $plantel->id }}">{{ $plantel->nombre }}</option>
                @endforeach
                </select>                  
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="agregar-departamento" class="btn btn-primary " style="left: 355px;" >Guardar</button>
        </div>
        </div>
    </div>
</div>
@push('js')

<script>
    function agregarDepartamento(nombre,  plantel_id){
        $.ajax({
            url: "{{route('departamentos.store')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                'plantel_id': plantel_id,
                "nombre": nombre,
            },
        success: function () {                       
            $('#AgregarModal').modal('hide')
            }
        });
            return false;
    }


    $(document).ready(function(){

        $("#agregar-departamento").click(function(){
          //obtener valores de los inputs
            var nombre = document.getElementById("add-nombre").value;


            var plantel_id = document.getElementById("add-plantel_id").value;

            agregarDepartamento(nombre, plantel_id);
            
        }); 
    });
</script>
    
@endpush