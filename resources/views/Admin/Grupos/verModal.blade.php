    <!--MODAL VER DEPARTAMENTOS DE LAS CARRERAS -->
      <div class="modal fade" id="ModalDepartamentos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5  align="center" class="modal-title" id="exampleModalLabel">PLANTEL</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body" style="padding-bottom: 60px; padding-top: 30px;">
              <form>
                <div class="row form-group col-auto col-12" style="height: 25px;">
                  <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">Unidad: Otay</label>
                </div>
                <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                    <thead class=" text-primary" style="border: Gray 2px solid; background: #28CA00; ">
                        <th scope="col">{{ __('ID') }}</th>
                        <th scope="col">{{ __('Departamento') }}</th>
                    </thead>
                    <tbody style="background: whitesmoke; border: Gray 2px solid;">
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>
                                    <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                </td>           
                            </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-primary " style="left: 355px;" >Guardar</button>
            </div>
          </div>
        </div>
      </div>

@push('js')
<script>
    function obtenerDepartamentos(id){
        $.ajax({
            url: "{{route('planteles.departamentos')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "plantel_id" : id
            },
        success: function (data) {          
                mostrarDepartamentos(data);           
            }
        });
            return false;
    }
    function mostrarModalDepartamentos(id, nombre_plantel){
        obtenerDepartamentos(id);
        $('#VerModal').modal('show');
    }
    function mostrarDepartamentos(data){
        var departamentos = data;
        var output = "";
        for(var i = 0; i < departamentos.length; i++){
            output += "<tr value="+departamentos[i].id+">"
                + "<td>" + departamentos[i].nombre + "</td>"
                +  "</td></tr>";
        }
        $('#tabla-departamentos tbody').html(output);
    }
</script>
@endpush