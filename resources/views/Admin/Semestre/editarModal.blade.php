<!--MODAL EDITAR -->
      <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5  align="center" class="modal-title" id="exampleModalLabel">Editar Semestre</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <input type="hidden" id="actualizar-semestre_id">
                {{--  numero  --}}
              <div class="form-group {{ $errors->has('numero') ? ' has-danger' : '' }}">
                  <div class="input-group input-group-alternative">
                      <label for="actualizar-numero">Número</label>
                      <input type="text" name="numero" id="actualizar-numero" class="form-control {{ $errors->has('numero') ? ' is-invalid' : '' }}" 
                      value="{{ old('numero') }}" required>
                      @if ($errors->has('numero'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('numero') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>
                {{--  fecha_inicio  --}}
              <div class="form-group {{ $errors->has('fecha_inicio') ? ' has-danger' : '' }}">
                  <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      </div>
                      <input type="date" name="fecha_inicio" id="actualizar-fecha_inicio" class="form-control {{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" 
                      value="{{ old('fecha_inicio') }}" required>
                      @if ($errors->has('fecha_inicio'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('fecha_inicio') }}</strong>
                          </span>
                      @endif
                  </div>
              </div> 
              {{--  fecha_final  --}}
              <div class="form-group {{ $errors->has('fecha_final') ? ' has-danger' : '' }}">
                  <div class="input-group input-group-alternative">
                      <div class="input-group-prepend">
                          <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                      </div>
                      <input type="date" name="fecha_final" id="actualizar-fecha_final" class="form-control {{ $errors->has('fecha_final') ? ' is-invalid' : '' }}" 
                      value="{{ old('fecha_final') }}" required>
                      @if ($errors->has('fecha_final'))
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $errors->first('fecha_final') }}</strong>
                          </span>
                      @endif
                  </div>
              </div>  
            </div>
            <div class="modal-footer">
              <button id="actualizar-semestre" type="button" class="btn btn-primary " style="left: 355px;" >Guardar</button>
            </div>
          </div>
        </div>
      </div>
@push('js')

<script>
    function mostrarModalEditar(id){
        obtenerSemestre(id); 
        $('#ModalEditar').modal('show')
    }
    function actualizarSemestre(id, numero, fecha_inicio, fecha_final){
        $.ajax({
            url: "{{route('semestres.update')}}",
            dataType: 'json',
            type:"patch",
            data: {
                "_token": "{{ csrf_token() }}",
                "semestre_id": id,
                "numero": numero,
                "fecha_inicio": fecha_inicio,
                "fecha_final": fecha_final,
            },
        success: function (response) {   
          mostrarSemestres(response.data);                     
            $('#ModalEditar').modal('hide')
            }
        });
            return false;
    }
    function mostrarDatosEnModal(semestre_id, numero, fecha_inicio, fecha_final){
            document.getElementById("actualizar-semestre_id").value = semestre_id;
            document.getElementById("actualizar-numero").value = numero;
            document.getElementById("actualizar-fecha_inicio").value = fecha_inicio;
            document.getElementById("actualizar-fecha_final").value = fecha_final;
            
    }
    function obtenerSemestre(id){
        $.ajax({
            url: "{{route('semestres.encontrar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "semestre_id" : id
            },
        success: function (response) {          
                mostrarDatosEnModal(response.data.id, response.data.numero, 
                response.data.fecha_inicio, response.data.fecha_final);            
            }
        });
            return false;
    }
    $(document).ready(function(){
        $("#actualizar-semestre").click(function(){
          //obtener valores de los inputs
            var semestre_id = document.getElementById("actualizar-semestre_id").value;
            var numero = document.getElementById("actualizar-numero").value;
            var fecha_inicio = document.getElementById("actualizar-fecha_inicio").value;
            var fecha_final = document.getElementById("actualizar-fecha_final").value;

            actualizarSemestre(semestre_id, numero, fecha_inicio, fecha_final);
            
        }); 
    });
</script>
    
@endpush