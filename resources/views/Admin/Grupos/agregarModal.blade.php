<!-- MODAL AGREGAR GRUPO -->
<div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5  align="center" class="modal-title" id="exampleModalLabel">GRUPO</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
          {{-- Semestre --}}
          <div class="form-group">
            <label for="semestre-id">Semestre</label>
            <select id='semestre_id' class="custom-select form-control{{ $errors->has('semestre_id') ? ' is-invalid' : '' }}" name="semestre_id"> 
                <option value='0'>{{ __('Seleccionar semestre') }}</option>
            </select>
          </div>
          {{-- carrera --}}
          <div class="form-group">
            <label for="carrera-id">Carrera</label>
            <select id='carrera_id' class="custom-select form-control{{ $errors->has('carrera_id') ? ' is-invalid' : '' }}" name="carrera_id"> 
                <option value='0'>{{ __('Seleccionar carrera') }}</option>
            </select>
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
          {{-- Hora inicio --}}
          <div class="form-group row">
            <label for="input-hora_inicio" class="col-3 col-form-label">Hora de inicio</label>
            <div class="col-3">
              <input class="form-control" type="time" value="07:00:00" id="input-hora_inicio">
            </div>
          </div>  
          {{-- Hora final --}}
          <div class="form-group row">
            <label for="input-hora_final" class="col-3 col-form-label">Hora final</label>
            <div class="col-3">
              <input class="form-control" type="time" value="13:00:00" id="input-hora_final">
            </div>
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
        $("#semestre_id").select2({
            minimumInputLength: 1,
            ajax: { 
            url: "{{route('semestres.busqueda')}}",
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
    });
</script>
    
@endpush
@push('headjs')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
@endpush