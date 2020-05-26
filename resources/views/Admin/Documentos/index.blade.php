@extends('layouts.app', ['page' => __('Documentos'), 'pageSlug' => 'documentos'])

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">  
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Documentos</h4>
                            <div class="row">    
                                <div class="col-md-10">
                                    <!-- Search form -->
                                    <form method="get" action="{{ route('departamentos.index') }}" >                                
                                        <div class="form-row">
                                            <div class="col-md-2">
                                                <select name="cantidad"> 
                                                    <option value='10' {{ $cantidad == 10 ? 'selected' : '' }} >10</option>
                                                    <option value='15' {{ $cantidad == 15 ? 'selected' : '' }}>15</option>
                                                    <option value='20' {{ $cantidad == 20 ? 'selected' : '' }}>20</option>
                                                    <option value='50' {{ $cantidad == 50 ? 'selected' : '' }}>50</option>
                                                    <option value='100' {{ $cantidad == 100 ? 'selected' : '' }}>100</option>
                                                    <option value='5000' {{ $cantidad == 5000 ? 'selected' : '' }}>Todos</option>
                                                </select>
                                            </div>
                                            <div class="col-md-2">
                                                <select name="estado" id="estado">
                                                    <option value='10' {{ $estado == 10 ? 'selected' : '' }}>Todos</option>
                                                    <option value='0' {{ $estado == 0 ? 'selected' : '' }}>Pendiente de revisión</option>
                                                    <option value='1' {{ $estado == 1 ? 'selected' : '' }}>Aprobado</option>
                                                    <option value='2' {{ $estado == 2 ? 'selected' : '' }}>Rechazado</option>
                                                    <option value='3' {{ $estado == 3 ? 'selected' : '' }}>Pendiente de enviar</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 col-auto">
                                                <input name="busqueda" class="form-control" type="text" value="{{ $busqueda }}" placeholder="Buscar" aria-label="Search"> 
                                            </div>   
                                            <div class="col-md-2">
                                                <button class="btn btn-primary btn-fab btn-icon">
                                                    <i class="fas fa-search"></i>
                                                </button>
                                            </div>                
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            @include('alerts.success')             
                            @include('Admin.Documentos.tabla')          
                        </div>            
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('Admin.Documentos.editarModal')
@endsection

@push('js')
<script>
    function obtenerDatos(documento_id){
        $.ajax({
            url: "{{route('documentos.encontrar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "documento_id" : documento_id
            },
        success: function (response) {          
              mostrarDatosEnModal(response.data.id, response.data.nombre, 
              response.data.fecha, response.data.ubicacion,
              response.data.estado, response.data.comentarios);            
            }
        });
        return false;         
    }

    function mostrarDatosEnModal(documento_id, nombre, fecha, ubicacion, estado, comentarios){
        document.getElementById("actualizar-documento_id").value = documento_id;
        document.getElementById("actualizar-nombre").innerHTML = nombre;
        document.getElementById("actualizar-fecha").innerHTML = fecha;
        document.getElementById("actualizar-ubicacion").innerHTML = ubicacion;
        document.getElementById("actualizar-estado").innerHTML = estado;
        document.getElementById("actualizar-comentarios").value = comentarios;
        $('#ModalEditar').modal('show')
    }

    function actualizarDocumento(estado){
        $.ajax({
            url: "{{route('documentos.revisar')}}",
            dataType: 'json',
            type:"post",
            data: {
                "_token": "{{ csrf_token() }}",
                "documento_id" : documento_id,
                "estado" : estado,
                "comentarios": comentarios
            },
        success: function (response) {          
              actualizarFila(response.data.id, response.data.estado, response.data.comentarios);    
              $('#ModalEditar').modal('hide')        
            }
        });
        return false;    
    }

    function actualizarFila(documento_id, estado, comentarios){
        var fila = document.getElementById("fila"+documento_id);
        var tdEstado = document.getElementById("estado"+documento_id);
        var tdComentarios = document.getElementById("comentarios"+documento_id);

        var clase = "bg-success";
        if(estado === 2){
            clase = "bg-danger"
        }

        fila.className = clase;
        tdEstado.innerHTML = estado;
        tdComentarios.innerHTML = comentarios;
    }
 

</script>

@endpush
