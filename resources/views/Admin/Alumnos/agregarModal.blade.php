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
              {{--  numero_alumno  --}}
            <div class="form-group {{ $errors->has('numero_alumno') ? ' has-danger' : '' }}">
                <label for="input-numero_alumno">Número de alumno</label>
                <input type="text" name="numero_alumno" id="input-numero_alumno" class="form-control {{ $errors->has('numero_alumno') ? ' is-invalid' : '' }}" 
                value="{{ old('numero_alumno') }}" required>
                @if ($errors->has('numero_alumno'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('numero_alumno') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-auto">
                <select id='grupo_id' class="custom-select form-control{{ $errors->has('grupo_id') ? ' is-invalid' : '' }}" name="grupo_id"> 
                    <option value='0'>{{ __('Seleccionar grupo') }}</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="agregar_alumno" class="btn btn-primary " style="left: 355px;" >Guardar</button>
        </div>
        </div>
    </div>
</div>

@push('js')

<script>
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    function agregarAlumno(nombre, direccion, telefono, email, password, numero_alumno, grupo_id){
        $.ajax({
            url: "{{route('registrar.alumno')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",                
                "nombre": nombre,
                "direccion": direccion,
                "telefono": telefono,
                "email": email,
                "password": password,
                "numero_alumno": numero_alumno,
                'grupo_id': grupo_id
            },
        success: function (response) {  
            mostrarAlumnos(response.data);                       
            $('#AgregarModal').modal('hide')
            }
        });
            return false;
    }


    $(document).ready(function(){

        $("#agregar_alumno").click(function(){
          //obtener valores de los inputs
            var nombre = document.getElementById("input-nombre").value;
            var direccion = document.getElementById("input-direccion").value;
            var telefono = document.getElementById("input-telefono").value;
            var email = document.getElementById("input-email").value;
            var password = document.getElementById("input-password").value;
            var numero_alumno = document.getElementById("input-numero_alumno").value;
            var grupo_id = document.getElementById("grupo_id").value;

            agregarAlumno(nombre, direccion, telefono, email, password, numero_alumno, grupo_id);
            
        }); 
        $("#grupo").select2({
            minimumInputLength: 3,
            ajax: { 
            url: "{{route('grupos.busqueda')}}",
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
        $("#grupo_id").select2({
            minimumInputLength: 3,
            ajax: { 
            url: "{{route('grupos.busqueda')}}",
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