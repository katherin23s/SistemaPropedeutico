<!-- MODAL AGREGAR MATERIA -->
<div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5  align="center" class="modal-title" id="exampleModalLabel">MATERIA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
            {{-- nombre --}}
            <div class="form-group {{ $errors->has('nombre') ? ' has-danger' : '' }}">               
                <label for="input-nombre">Nombre</label>
                <input type="text" name="nombre" id="input-nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" 
                value="{{ old('nombre') }}" required>
                @if ($errors->has('nombre'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
            </div>
            {{--  clave  --}}
            <div class="form-group {{ $errors->has('clave') ? ' has-danger' : '' }}">
                <label for="input-clave">Clave</label>
                <input type="text" name="clave" id="input-clave" class="form-control {{ $errors->has('clave') ? ' is-invalid' : '' }}" 
                value="{{ old('clave') }}" required>
                @if ($errors->has('clave'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('clave') }}</strong>
                    </span>
                @endif
            </div>
            {{--  creditos  --}}
            <div class="form-group {{ $errors->has('creditos') ? ' has-danger' : '' }}">
                <label for="input-creditos">Creditos</label>
                <input type="number" min="1" max="8" name="creditos" id="input-creditos" class="form-control {{ $errors->has('creditos') ? ' is-invalid' : '' }}" 
                value="{{ old('creditos') }}" required>
                @if ($errors->has('creditos'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('creditos') }}</strong>
                    </span>
                @endif
            </div>
            {{--  unidades  --}}
            <div class="form-group {{ $errors->has('unidades') ? ' has-danger' : '' }}">
                <label for="input-unidades">Unidades</label>
                <input type="number" min="1" max="8" name="unidades" id="input-unidades" class="form-control {{ $errors->has('unidades') ? ' is-invalid' : '' }}" 
                value="{{ old('unidades') }}" required>
                @if ($errors->has('unidades'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('unidades') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="carrera_id">Carrera</label>
                <select style="width: 100%" id='carrera_id' class="custom-select form-control{{ $errors->has('carrera_id') ? ' is-invalid' : '' }}" name="carrera_id"> 
                    <option value='0'>{{ __('Seleccionar carrera') }}</option>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" id="agregar_carrera" class="btn btn-primary " style="left: 355px;" >Guardar</button>
        </div>
        </div>
    </div>
</div>

@push('js')

<script>
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    function agregarMateria(nombre, clave, carrera_id, creditos, unidades){
        $.ajax({
            url: "{{route('materias.store')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                'carrera_id': carrera_id,
                "nombre": nombre,
                "clave": clave,
                "creditos": creditos,
                "unidades": unidades
            },
        success: function (response) {  
            mostrarMaterias(response.data);                       
            $('#AgregarModal').modal('hide')
            }
        });
            return false;
    }


    $(document).ready(function(){

        $("#agregar_carrera").click(function(){
          //obtener valores de los inputs
            var nombre = document.getElementById("input-nombre").value;
            var clave = document.getElementById("input-clave").value;
            var carrera_id = document.getElementById("carrera_id").value;
            var creditos = document.getElementById("input-creditos").value;
            var unidades = document.getElementById("input-unidades").value;

            agregarMateria(nombre, clave, carrera_id, creditos, unidades);
            
        }); 
        $("#carrera_id").select2({
            minimumInputLength: 3,
            ajax: { 
            url: "{{route('carreras.busqueda')}}",
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
        $("#carrera").select2({
            minimumInputLength: 3,
            ajax: { 
            url: "{{route('carreras.busqueda')}}",
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