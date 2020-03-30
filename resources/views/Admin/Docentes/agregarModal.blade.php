<!-- MODAL AGREGAR DOCENTE -->
<div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5  align="center" class="modal-title" id="exampleModalLabel">DOCENTE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @include('components.registrarUsuario')
              {{--  numero_empleado  --}}
            <div class="form-group {{ $errors->has('numero_empleado') ? ' has-danger' : '' }}">
                <label for="input-numero_empleado">Número de empleado</label>
                <input type="text" name="numero_empleado" id="input-numero_empleado" class="form-control {{ $errors->has('numero_empleado') ? ' is-invalid' : '' }}" 
                value="{{ old('numero_empleado') }}" required>
                @if ($errors->has('numero_empleado'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('numero_empleado') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-row">
                <div class="col-md-12">
                    <select id='departamento_id' class="custom-select" style="width: 100%" name="departamento_id"> 
                        <option value='0'>{{ __('Seleccionar departamento') }}</option>
                    </select>
                </div>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" id="agregar_docente" class="btn btn-primary " style="left: 355px;" >Guardar</button>
        </div>
        </div>
    </div>
</div>

@push('js')

<script>
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    function agregarDocente(nombre, direccion, telefono, email, password, numero_empleado, departamento_id){
        $.ajax({
            url: "{{route('registrar.docente')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",                
                "nombre": nombre,
                "direccion": direccion,
                "telefono": telefono,
                "email": email,
                "password": password,
                "numero_empleado": numero_empleado,
                'departamento_id': departamento_id
            },
        success: function (response) {  
            mostrarDocentes(response.data);                       
            $('#AgregarModal').modal('hide')
            }
        });
            return false;
    }


    $(document).ready(function(){

        $("#agregar_docente").click(function(){
          //obtener valores de los inputs
            var nombre = document.getElementById("input-nombre").value;
            var direccion = document.getElementById("input-direccion").value;
            var telefono = document.getElementById("input-telefono").value;
            var email = document.getElementById("input-email").value;
            var password = document.getElementById("input-password").value;
            var numero_empleado = document.getElementById("input-numero_empleado").value;
            var departamento_id = document.getElementById("departamento_id").value;

            agregarDocente(nombre, direccion, telefono, email, password, numero_empleado, departamento_id);
            
        }); 
        $("#departamento").select2({
            minimumInputLength: 3,
            ajax: { 
            url: "{{route('departamentos.busqueda')}}",
            type:'post',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                _token: CSRF_TOKEN,
                search: params.term // search term
                };
            },
            processResults: function (response) {
                return {
                results: response
                };
            },
            cache: true
            }
        });
        $("#departamento_id").select2({
            minimumInputLength: 3,
            ajax: { 
            url: "{{route('departamentos.busqueda')}}",
            type:'post',
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                _token: CSRF_TOKEN,
                search: params.term // search term
                };
            },
            processResults: function (response) {
                return {
                results: response
                };
            },
            cache: true
            }
        });
    });
</script>
    
@endpush
@push('headjs')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@endpush