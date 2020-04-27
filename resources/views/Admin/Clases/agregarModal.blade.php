<!-- MODAL AGREGAR Clase -->
<div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5  align="center" class="modal-title" id="exampleModalLabel">Clase</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
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
          {{-- grupo --}}
          <div class="form-group">
            <label for="grupo-id">Grupo</label>
            <select id='grupo_id' class="custom-select form-control{{ $errors->has('grupo_id') ? ' is-invalid' : '' }}" name="grupo_id"> 
                <option value='0'>Seleccionar grupo</option>
            </select>
          </div>
          {{-- materia --}}
          <div class="form-group">
            <label for="materia_id">Materia</label>
            <select id='materia_id' class="custom-select form-control{{ $errors->has('materia_id') ? ' is-invalid' : '' }}" name="materia_id"> 
                <option value='0'>Seleccionar materia</option>
            </select>
          </div>
          {{-- docente --}}
          <div class="form-group">
            <label for="docente_id">Docente</label>
            <select id='docente_id' class="custom-select form-control{{ $errors->has('docente_id') ? ' is-invalid' : '' }}" name="docente_id"> 
                <option value='0'>Seleccionar docente</option>
            </select>
          </div>
          {{-- Hora inicio --}}
          <div class="form-group row">
            <label for="input-hora_inicio" class="col-3 col-form-label">Hora de inicio</label>
            <div class="col-3">
              <input class="form-control" type="time" min="06:00" max="23:00" value="07:00:00" id="input-hora_inicio" required>
            </div>
          </div>  
          {{-- Hora final --}}
          <div class="form-group row">
            <label for="input-hora_final" class="col-3 col-form-label">Hora final</label>
            <div class="col-3">
              <input class="form-control" type="time" min="06:00" max="23:00" value="13:00:00" id="input-hora_final" required>
            </div>
          </div>   
          {{--  salon  --}}
          <div class="form-group {{ $errors->has('salon') ? ' has-danger' : '' }}">
            <label for="input-salon">Salon</label>
            <input type="text" name="salon" id="input-salon" class="form-control {{ $errors->has('salon') ? ' is-invalid' : '' }}" 
            value="{{ old('salon') }}" required>
            @if ($errors->has('salon'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('salon') }}</strong>
                </span>
            @endif
          </div>
          {{--  dias  --}}
          <div class="form-group {{ $errors->has('dias') ? ' has-danger' : '' }}">
            <label for="input-dias">Dias</label>
            <input type="text" name="dias" id="input-dias" class="form-control {{ $errors->has('dias') ? ' is-invalid' : '' }}" 
            value="{{ old('dias') }}" required>
            @if ($errors->has('dias'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('dias') }}</strong>
                </span>
            @endif
          </div>  
          {{--  capacidad  --}}
          <div class="form-group {{ $errors->has('capacidad') ? ' has-danger' : '' }}">
            <label for="input-capacidad">capacidad</label>
            <input type="numeric"  name="capacidad" id="input-capacidad" class="form-control {{ $errors->has('capacidad') ? ' is-invalid' : '' }}" 
            value="{{ old('capacidad') }}" required>
            @if ($errors->has('capacidad'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('capacidad') }}</strong>
                </span>
            @endif
          </div>         
        </div>
        <div class="modal-footer">
            <button type="button" id="agregar_Clase" class="btn btn-primary ">Guardar</button>
        </div>
        </div>
    </div>
</div>

@push('js')

<script>
    // CSRF Token
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    function agregarClase(clave, hora_inicio_fecha, hora_final_fecha, 
    materia_id, grupo_id, docente_id, salon, dias, capacidad){
        $.ajax({
            url: "{{route('clases.store')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                'materia_id': materia_id,
                'grupo_id': grupo_id,
                'docente_id': docente_id,
                "clave": clave,
                "hora_inicio": hora_inicio_fecha,
                "hora_final": hora_final_fecha,
                "salon": salon,
                "dias": dias,
                "capacidad": capacidad,

            },
        success: function (response) {  
            mostrarClases(response.data);                       
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

        $("#agregar_Clase").click(function(){
          //obtener valores de los inputs
          var hora_inicio = document.getElementById("input-hora_inicio").value;
          var hora_final= document.getElementById("input-hora_final").value;

          var hora_inicio_fecha = tiempoAFecha(hora_inicio);
          var hora_final_fecha = tiempoAFecha(hora_final);

          if(hora_final_fecha.getTime() > hora_inicio_fecha.getTime()){
            hora_inicio_fecha = hora_inicio_fecha.toISOString().split('T')[0]+' '+hora_inicio_fecha.toTimeString().split(' ')[0];
            hora_final_fecha = hora_final_fecha.toISOString().split('T')[0]+' '+hora_final_fecha.toTimeString().split(' ')[0];
            var clave = document.getElementById("input-clave").value;
            var materia_id = document.getElementById("materia_id").value;
            var grupo_id = document.getElementById("grupo_id").value;
            var docente_id = document.getElementById("docente_id").value;
            var salon = document.getElementById("input-salon").value;
            var dias = document.getElementById("input-dias").value;
            var capacidad = document.getElementById("input-capacidad").value;

            agregarClase(clave, hora_inicio_fecha, hora_final_fecha, 
              materia_id, grupo_id, docente_id, salon, dias, capacidad);
          }
          else {
            alert("Horario invalido.");
          }

          
            
        }); 
        $("#grupo").select2({
          minimumInputLength: 1,
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
            minimumInputLength: 1,
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
        $("#materia_id").select2({
          minimumInputLength: 3,
          ajax: { 
          url: "{{route('materias.busqueda')}}",
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
        $("#materia").select2({
          minimumInputLength: 3,
          ajax: { 
          url: "{{route('materias.busqueda')}}",
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
        $("#docente_id").select2({
          minimumInputLength: 3,
          ajax: { 
          url: "{{route('docentes.busqueda')}}",
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