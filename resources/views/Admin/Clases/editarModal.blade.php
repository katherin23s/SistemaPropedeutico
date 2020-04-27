 <!--MODAL EDITAR -->
      <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5  align="center" class="modal-title" id="exampleModalLabel">Editar Clase</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <input type="hidden" id="actualizar-clase_id">
              {{--  clave  --}}
              <div class="form-group {{ $errors->has('clave') ? ' has-danger' : '' }}">
                <label for="actualizar-clave">Clave</label>
                <input type="text" name="clave" id="actualizar-clave" class="form-control {{ $errors->has('clave') ? ' is-invalid' : '' }}" 
                value="{{ old('clave') }}" required>
                  @if ($errors->has('clave'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('clave') }}</strong>
                      </span>
                  @endif
              </div>
              {{-- Hora inicio --}}
              <div class="form-group row">
                <label for="actualizar-hora_inicio" class="col-4 col-form-label">Hora de inicio</label>
                <div class="col-6">
                  <input class="form-control" type="time" min="06:00" max="23:00" value="07:00:00" id="actualizar-hora_inicio" required>
                </div>
              </div>  
              {{-- Hora final --}}
              <div class="form-group row">
                <label for="actualizar-hora_final" class="col-4 col-form-label">Hora final</label>
                <div class="col-6">
                  <input class="form-control" type="time" min="06:00" max="23:00" value="13:00:00" id="actualizar-hora_final" required>
                </div>
              </div> 
              {{--  salon  --}}
              <div class="form-group {{ $errors->has('salon') ? ' has-danger' : '' }}">
                <label for="actualizar-salon">Salon</label>
                <input type="text" name="salon" id="actualizar-salon" class="form-control {{ $errors->has('salon') ? ' is-invalid' : '' }}" 
                value="{{ old('salon') }}" required>
                @if ($errors->has('salon'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('salon') }}</strong>
                    </span>
                @endif
              </div>
              {{--  dias  --}}
              <div class="form-group {{ $errors->has('dias') ? ' has-danger' : '' }}">
                <label for="actualizar-dias">Dias</label>
                <input type="text" name="dias" id="actualizar-dias" class="form-control {{ $errors->has('dias') ? ' is-invalid' : '' }}" 
                value="{{ old('dias') }}" required>
                @if ($errors->has('dias'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('dias') }}</strong>
                    </span>
                @endif
              </div>  
              {{--  capacidad  --}}
              <div class="form-group {{ $errors->has('capacidad') ? ' has-danger' : '' }}">
                <label for="actualizar-capacidad">capacidad</label>
                <input type="numeric"  name="capacidad" id="actualizar-capacidad" class="form-control {{ $errors->has('capacidad') ? ' is-invalid' : '' }}" 
                value="{{ old('capacidad') }}" required>
                @if ($errors->has('capacidad'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('capacidad') }}</strong>
                    </span>
                @endif
              </div>  
            </div>
            <div class="modal-footer">
              <button id="actualizar-clase" type="button" class="btn btn-primary ">Guardar</button>
            </div>
          </div>
        </div>
      </div>

@push('js')

<script>
    function mostrarModalEditar(id){
        obtenerClase(id); 
        $('#ModalEditar').modal('show')
    }
    function actualizarClase(id, clave, hora_inicio_fecha, hora_final_fecha, salon, dias, capacidad){
        $.ajax({
            url: "{{route('clases.update')}}",
            dataType: 'json',
            type:"patch",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "clave": clave,
                "hora_inicio": hora_inicio_fecha,
                "hora_final": hora_final_fecha,
                "salon": salon,
                "dias": dias,
                "capacidad": capacidad,
            },
        success: function (response) {   
          mostrarclases(response.data);                     
            $('#ModalEditar').modal('hide')
            }
        });
            return false;
    }
    function mostrarDatosEnModal(clase_id, clave, hora_inicio_fecha, hora_final_fecha, salon, dias, capacidad){
            document.getElementById("actualizar-clase_id").value = clase_id;
            document.getElementById("actualizar-clave").value = clave;
            document.getElementById("actualizar-hora_inicio").value = hora_inicio_fecha;
            document.getElementById("actualizar-hora_final").value = hora_final_fecha;
            document.getElementById("actualizar-salon").value = salon;
            document.getElementById("actualizar-dias").value = dias;
            document.getElementById("actualizar-capacidad").value = capacidad;
            
    }
    function obtenerClase(id){
        $.ajax({
            url: "{{route('clases.encontrar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "clase_id" : id
            },
        success: function (response) {          
              mostrarDatosEnModal(response.data.id, response.data.clave, 
              response.data.hora_inicio, response.data.hora_final, response.data.salon,
              response.data.dias, response.data.capacidad);            
            }
        });
        return false;
    }
    $(document).ready(function(){
        $("#actualizar-clase").click(function(){
          //obtener valores de los inputs
          var hora_inicio = document.getElementById("actualizar-hora_inicio").value;
          var hora_final= document.getElementById("actualizar-hora_final").value;

          var hora_inicio_fecha = tiempoAFecha(hora_inicio);
          var hora_final_fecha = tiempoAFecha(hora_final);
          if(hora_final_fecha.getTime() > hora_inicio_fecha.getTime()){

              var clase_id = document.getElementById("actualizar-clase_id").value;
              var clave = document.getElementById("actualizar-clave").value;
              hora_inicio_fecha = hora_inicio_fecha.toISOString().split('T')[0]+' '+hora_inicio_fecha.toTimeString().split(' ')[0];
              hora_final_fecha = hora_final_fecha.toISOString().split('T')[0]+' '+hora_final_fecha.toTimeString().split(' ')[0];

              var salon = document.getElementById("actualizar-salon").value;
              var dias = document.getElementById("actualizar-dias").value;
              var capacidad = document.getElementById("actualizar-capacidad").value;

              actualizarClase(clase_id, clave, hora_inicio_fecha, hora_inicio_fecha, salon, dias, capacidad);
          }
          else {
            alert("Horario invalido.");
          }
            
        }); 
    });
</script>
    
@endpush