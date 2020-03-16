      <!--MODAL actualizar -->
      <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 align="center" class="modal-title">Editar Materia</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="actualizar-materia_id">
                {{-- nombre --}}
            <div class="form-group {{ $errors->has('nombre') ? ' has-danger' : '' }}">               
                <label for="actualizar-nombre">Nombre</label>
                <input type="text" name="nombre" id="actualizar-nombre" class="form-control {{ $errors->has('nombre') ? ' is-invalid' : '' }}" 
                value="{{ old('nombre') }}" required>
                @if ($errors->has('nombre'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('nombre') }}</strong>
                    </span>
                @endif
            </div>
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
            {{--  creditos  --}}
            <div class="form-group {{ $errors->has('creditos') ? ' has-danger' : '' }}">
                <label for="actualizar-creditos">Creditos</label>
                <input type="number" min="1" max="8" name="creditos" id="actualizar-creditos" class="form-control {{ $errors->has('creditos') ? ' is-invalid' : '' }}" 
                value="{{ old('creditos') }}" required>
                @if ($errors->has('creditos'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('creditos') }}</strong>
                    </span>
                @endif
            </div>
            {{--  unidades  --}}
            <div class="form-group {{ $errors->has('unidades') ? ' has-danger' : '' }}">
                <label for="actualizar-unidades">Unidades</label>
                <input type="number" min="1" max="8" name="unidades" id="actualizar-unidades" class="form-control {{ $errors->has('unidades') ? ' is-invalid' : '' }}" 
                value="{{ old('unidades') }}" required>
                @if ($errors->has('unidades'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('unidades') }}</strong>
                    </span>
                @endif
            </div>
            </div>
            <div class="modal-footer">
              <button id="actualizar-materia" type="button" class="btn btn-primary ">Guardar</button>
            </div>
          </div>
        </div>
      </div>
@push('js')

<script>
    function mostrarModalEditar(id){
        obtenerMateria(id); 
        $('#ModalEditar').modal('show')
    }
    function actualizarMateria(id, nombre, clave, creditos, unidades){
        $.ajax({
            url: "{{route('materias.update')}}",
            dataType: 'json',
            type:"patch",
            data: {
                "_token": "{{ csrf_token() }}",
                'materia_id': id,
                "nombre": nombre,
                "clave": clave,
                "creditos": creditos,
                "unidades": unidades
            },
        success: function (response) {   
            mostrarMaterias(response.data);                      
            $('#ModalEditar').modal('hide')
            }
        });
            return false;
    }
    function mostrarDatosEnModal(materia_id, nombre, clave, creditos, unidades){
      document.getElementById("actualizar-materia_id").value = materia_id;
      document.getElementById("actualizar-nombre").value = nombre;   
      document.getElementById("actualizar-clave").value = clave;
      document.getElementById("actualizar-creditos").value = creditos;   
      document.getElementById("actualizar-unidades").value = unidades;
            
    }
    function obtenerMateria(id){
        $.ajax({
            url: "{{route('materias.encontrar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "materia_id" : id
            },
        success: function (response) {       
                mostrarDatosEnModal(response.data.id, response.data.nombre,
                    response.data.clave, response.data.creditos, response.data.unidades);            
            }
        });
        return false;
    }
    $(document).ready(function(){
        $("#actualizar-materia").click(function(){
          //obtener valores de los inputs
            var materia_id = document.getElementById("actualizar-materia_id").value;
            var nombre = document.getElementById("actualizar-nombre").value;
            var clave= document.getElementById("actualizar-clave").value;
            var creditos = document.getElementById("actualizar-creditos").value;
            var unidades= document.getElementById("actualizar-unidades").value;
            actualizarMateria(materia_id, nombre, clave, creditos, unidades);
            
        }); 
    });
</script>
    
@endpush