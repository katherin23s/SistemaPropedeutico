 <!--MODAL EDITAR -->
      <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5  align="center" class="modal-title" id="exampleModalLabel">EDITAR GRUPO</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <input type="hidden" id="actualizar-grupo_id">
              {{--  numero  --}}
              <div class="form-group {{ $errors->has('numero') ? ' has-danger' : '' }}">
                <label for="input-numero">Número de serie</label>
                <input type="text" name="numero" id="actualizar-numero" class="form-control {{ $errors->has('numero') ? ' is-invalid' : '' }}" 
                value="{{ old('numero') }}" required>
                @if ($errors->has('numero'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('numero') }}</strong>
                    </span>
                @endif
              </div>  
              {{-- Hora inicio --}}
              <div class="form-group row">
                <label for="actualizar-hora_inicio" class="col-3 col-form-label">Hora de inicio</label>
                <div class="col-3">
                  <input class="form-control" type="time" min="06:00" max="23:00" value="07:00:00" id="actualizar-hora_inicio" required>
                </div>
              </div>  
              {{-- Hora final --}}
              <div class="form-group row">
                <label for="actualizar-hora_final" class="col-3 col-form-label">Hora final</label>
                <div class="col-3">
                  <input class="form-control" type="time" min="06:00" max="23:00" value="13:00:00" id="actualizar-hora_final" required>
                </div>
              </div> 
            </div>
            <div class="modal-footer">
              <button id="actualizar-grupo" type="button" class="btn btn-primary ">Guardar</button>
            </div>
          </div>
        </div>
      </div>

@push('js')

<script>
    function mostrarModalEditar(id){
        obtenerGrupo(id); 
        $('#ModalEditar').modal('show')
    }
    function actualizarGrupo(id, numero, hora_inicio_fecha, hora_final_fecha){
        $.ajax({
            url: "{{route('grupos.update')}}",
            dataType: 'json',
            type:"patch",
            data: {
                "_token": "{{ csrf_token() }}",
                "id": id,
                "numero": numero,
                "hora_inicio": hora_inicio_fecha,
                "hora_final": hora_final_fecha
            },
        success: function (response) {   
          mostrarGrupos(response.data);                     
            $('#ModalEditar').modal('hide')
            }
        });
            return false;
    }
    function mostrarDatosEnModal(grupo_id, numero, hora_inicio_fecha, hora_final_fecha){
            document.getElementById("actualizar-grupo_id").value = grupo_id;
            document.getElementById("actualizar-numero").value = numero;
            document.getElementById("actualizar-hora_inicio").value = hora_inicio_fecha;
            document.getElementById("actualizar-hora_final").value = hora_final_fecha;
            
    }
    function obtenerGrupo(id){
        $.ajax({
            url: "{{route('grupos.encontrar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "grupo_id" : id
            },
        success: function (response) {          
              mostrarDatosEnModal(response.data.id, response.data.numero, 
              response.data.hora_inicio_fecha, response.data.hora_final_fecha);            
            }
        });
        return false;
    }
    $(document).ready(function(){
        $("#actualizar-grupo").click(function(){
          //obtener valores de los inputs
          var hora_inicio = document.getElementById("input-hora_inicio").value;
          var hora_final= document.getElementById("input-hora_final").value;

          var hora_inicio_fecha = tiempoAFecha(hora_inicio);
          var hora_final_fecha = tiempoAFecha(hora_final);
          if(hora_final_fecha.getTime() > hora_inicio_fecha.getTime()){

              var grupo_id = document.getElementById("actualizar-grupo_id").value;
              var numero = document.getElementById("actualizar-numero").value;
              hora_inicio_fecha = hora_inicio_fecha.toISOString().split('T')[0]+' '+hora_inicio_fecha.toTimeString().split(' ')[0];
              hora_final_fecha = hora_final_fecha.toISOString().split('T')[0]+' '+hora_final_fecha.toTimeString().split(' ')[0];

              actualizarGrupo(grupo_id, numero, hora_inicio_fecha, hora_inicio_fecha);
          }
          else {
            alert("Horario invalido.");
          }
            
        }); 
    });
</script>
    
@endpush