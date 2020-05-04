      <!--MODAL actualizar -->
      <div class="modal fade" id="ModalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 align="center" class="modal-title">Editar Carrera</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
                <input type="hidden" id="actualizar-carrera_id">
                {{--  nombre  --}}
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
                {{--  numero-serie  --}}
                <div class="form-group {{ $errors->has('numero-serie') ? ' has-danger' : '' }}">
                    <label for="actualizar-numero_serie">Número de serie</label>
                    <input type="text" name="numero-serie" id="actualizar-numero_serie" class="form-control {{ $errors->has('numero-serie') ? ' is-invalid' : '' }}" 
                    value="{{ old('numero-serie') }}" required>
                    @if ($errors->has('numero-serie'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('numero-serie') }}</strong>
                        </span>
                    @endif
                </div>
                {{-- <div class="col-auto">
                    <select id='actualizar-departamento_id' class="custom-select form-control{{ $errors->has('departamento_id') ? ' is-invalid' : '' }}" name="departamento_id"> 
                        <option value='0'>{{ __('Seleccionar departamento') }}</option>
                    </select>
                </div> --}}
            </div>
            <div class="modal-footer">
              <button id="actualizar-carrera" type="button" class="btn btn-primary " style="left: 355px;" >Guardar</button>
            </div>
          </div>
        </div>
      </div>
@push('js')

<script>
    function mostrarModalEditar(id){
        obtenerCarrera(id); 
        $('#ModalEditar').modal('show')
    }
    function actualizarCarrera(id, nombre, numero_serie){
        $.ajax({
            url: "{{route('carreras.update')}}",
            dataType: 'json',
            type:"patch",
            data: {
                "_token": "{{ csrf_token() }}",
                'carrera_id': id,
                "nombre": nombre,
                "numero_serie": numero_serie
            },
        success: function (response) {   
            mostrarCarreras(response.data);                      
            $('#ModalEditar').modal('hide')
            }
        });
            return false;
    }
    function mostrarDatosEnModal(carrera_id, nombre, numero_serie, departamento_id){
      document.getElementById("actualizar-carrera_id").value = carrera_id;
      document.getElementById("actualizar-nombre").value = nombre;   
      document.getElementById("actualizar-numero_serie").value = numero_serie;
            
    }
    function obtenerCarrera(id){
        $.ajax({
            url: "{{route('carreras.encontrar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "carrera_id" : id
            },
        success: function (response) {       
                mostrarDatosEnModal(response.data.id, response.data.nombre,response.data.numero_serie, response.data.departamento_id);            
            }
        });
            return false;
    }
    $(document).ready(function(){
        $("#actualizar-carrera").click(function(){
          //obtener valores de los inputs
            var carrera_id = document.getElementById("actualizar-carrera_id").value;
            var nombre = document.getElementById("actualizar-nombre").value;
            var numero_serie= document.getElementById("actualizar-numero_serie").value;
            actualizarCarrera(carrera_id, nombre, numero_serie);
            
        }); 
    });
</script>
    
@endpush