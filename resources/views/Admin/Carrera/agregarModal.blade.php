<!-- MODAL AGREGAR PLANTEL -->
<div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5  align="center" class="modal-title" id="exampleModalLabel">CARRERA</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
             {{--  nombre  --}}
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
              {{--  numero-serie  --}}
            <div class="form-group {{ $errors->has('numero-serie') ? ' has-danger' : '' }}">
                <label for="input-numero_serie">Número de serie</label>
                <input type="text" name="numero-serie" id="input-numero_serie" class="form-control {{ $errors->has('numero-serie') ? ' is-invalid' : '' }}" 
                value="{{ old('numero-serie') }}" required>
                @if ($errors->has('numero-serie'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('numero-serie') }}</strong>
                    </span>
                @endif
            </div>
            <div class="col-auto">
                <select id='departamento_id' class="custom-select form-control{{ $errors->has('departamento_id') ? ' is-invalid' : '' }}" name="departamento_id"> 
                    <option value='0'>{{ __('Seleccionar departamento') }}</option>
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
    function agregarCarrera(nombre, numero_serie, departamento_id){
        $.ajax({
            url: "{{route('carreras.store')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                'departamento_id': departamento_id,
                "nombre": nombre,
                "numero_serie": numero_serie
            },
        success: function (response) {  
            mostrarCarreras(response.data);                       
            $('#AgregarModal').modal('hide')
            }
        });
            return false;
    }


    $(document).ready(function(){

        $("#agregar_carrera").click(function(){
          //obtener valores de los inputs
            var nombre = document.getElementById("input-nombre").value;
            var numero_serie = document.getElementById("input-numero_serie").value;
            var departamento_id = document.getElementById("departamento_id").value;

            agregarCarrera(nombre, numero_serie, departamento_id);
            
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