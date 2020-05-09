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
            <select style="width: 100%" id='semestre_id' class="custom-select form-control{{ $errors->has('semestre_id') ? ' is-invalid' : '' }}" name="semestre_id"> 
                <option value='0'>{{ __('Seleccionar semestre') }}</option>
            </select>
          </div>
          {{-- carrera --}}
          <div class="form-group">
            <label for="carrera-id">Carrera</label>
            <select style="width: 100%" id='carrera_id' class="custom-select form-control{{ $errors->has('carrera_id') ? ' is-invalid' : '' }}" name="carrera_id"> 
                <option value='0'>{{ __('Seleccionar carrera') }}</option>
            </select>
          </div>
          {{--  numero  --}}
          <div class="form-group {{ $errors->has('numero') ? ' has-danger' : '' }}">
              <label for="input-numero">Número</label>
              <input type="text" name="numero" id="input-numero" class="form-control {{ $errors->has('numero') ? ' is-invalid' : '' }}" 
              value="{{ old('numero') }}" required>
              @if ($errors->has('numero'))
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $errors->first('numero') }}</strong>
                  </span>
              @endif
          </div>  
          {{-- Hora inicio --}}
          <div class="form-group">
            <label for="input-hora_inicio">Hora de inicio</label>
            <input class="form-control" type="time" min="06:00" max="23:00" value="07:00:00" id="input-hora_inicio" required>
          </div>  
          {{-- Hora final --}}
          <div class="form-group">
            <label for="input-hora_final">Hora final</label>
            <input class="form-control" type="time" min="06:00" max="23:00" value="13:00:00" id="input-hora_final" required>
          </div>       
        </div>
        <div class="modal-footer">
            <button type="button" id="agregar_grupo" class="btn btn-primary ">Guardar</button>
        </div>
        </div>
    </div>
</div>

@push('js')

<script>
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    function agregarGrupo(numero, hora_inicio_fecha, hora_final_fecha, 
    carrera_id, semestre_id){
        $.ajax({
            url: "{{route('grupos.store')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                'carrera_id': carrera_id,
                'semestre_id': semestre_id,
                "numero": numero,
                "hora_inicio": hora_inicio_fecha,
                "hora_final": hora_final_fecha
            },
        success: function (response) {  
            mostrarGrupos(response.data);                       
            $('#AgregarModal').modal('hide')
            }
        });
            return false;
    }

    const timeNow = new Date();

    function tiempoAFecha(time){
      var timeParts = time.split(":");
      var inputTime = new Date(timeNow.getYear() , timeNow.getMonth() , timeNow.getDate() , parseInt(timeParts[0]), parseInt(timeParts[1]), 0, 0);
      return inputTime;
    }


    $(document).ready(function(){

        $("#agregar_grupo").click(function(){
          //obtener valores de los inputs
          var hora_inicio = document.getElementById("input-hora_inicio").value;
          var hora_final= document.getElementById("input-hora_final").value;

          var hora_inicio_fecha = tiempoAFecha(hora_inicio);
          var hora_final_fecha = tiempoAFecha(hora_final);

          if(hora_final_fecha.getTime() > hora_inicio_fecha.getTime()){
            hora_inicio_fecha = hora_inicio_fecha.toISOString().split('T')[0]+' '+hora_inicio_fecha.toTimeString().split(' ')[0];
            hora_final_fecha = hora_final_fecha.toISOString().split('T')[0]+' '+hora_final_fecha.toTimeString().split(' ')[0];
            var numero = document.getElementById("input-numero").value;
            var carrera_id = document.getElementById("carrera_id").value;
            var semestre_id = document.getElementById("semestre_id").value;

            agregarGrupo(numero, hora_inicio_fecha, hora_final_fecha, 
              carrera_id, semestre_id);
          }
          else {
            alert("Horario invalido.");
          }

          
            
        }); 
        $("#semestre").select2({
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