<!-- MODAL AGREGAR SEMESTRE -->
<div class="modal fade" id="AgregarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5  align="center" class="modal-title" id="exampleModalLabel">SEMESTRE</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
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
              {{--  fecha_inicio  --}}
            <div class="form-group {{ $errors->has('fecha_inicio') ? ' has-danger' : '' }}">
                <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                    </div>
                    <input type="date" name="fecha_inicio" id="input-fecha_inicio" class="form-control {{ $errors->has('fecha_inicio') ? ' is-invalid' : '' }}" 
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
                    <input type="date" name="fecha_final" id="input-fecha_final" class="form-control {{ $errors->has('fecha_final') ? ' is-invalid' : '' }}" 
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
            <button type="button" id="agregar-semestre" class="btn btn-primary " style="left: 355px;" >Guardar</button>
        </div>
        </div>
    </div>
</div>
@push('js')

<script>
    function agregarSemestre(numero, fecha_inicio, 
    fecha_final){
        $.ajax({
            url: "{{route('semestres.store')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "numero": numero,
                "fecha_inicio": fecha_inicio,
                "fecha_final": fecha_final
            },
        success: function (response) {   
            mostrarSemestres(response.data);                     
            $('#AgregarModal').modal('hide')
            }
        });
            return false;
    }


    $(document).ready(function(){

        $("#agregar-semestre").click(function(){
          //obtener valores de los inputs
            var numero = document.getElementById("input-numero").value;
            var fecha_inicio = document.getElementById("input-fecha_inicio").value;
            var fecha_final = document.getElementById("input-fecha_final").value;

            agregarSemestre(numero, fecha_inicio, fecha_final);
            
        }); 
    });
</script>
    
@endpush