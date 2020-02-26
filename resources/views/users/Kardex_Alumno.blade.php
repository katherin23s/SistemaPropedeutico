@extends('layouts.app', ['page' => __('PORTAL DEL ALUMNO'), 'pageSlug' => 'users'])

@section('content')

<h1 align="center"> KARDEX DE CALIFICACIONES </h1>
 
                    <div class="row form-group col-auto col-12" style="height: 25px;">
                      <label for="recipient-name" class="col-form-label col-6 "style="padding-left: 0px ">Calificaciones:</label>           
                    </div>
                    <table class="table tablesorter col-lg-12 col-md-9 col-sm-8 col-xs-6" id="" >
                        <thead class=" text-primary" style="border: Gray 2px solid; background: deepskyblue; ">
                            <th scope="col">{{ __('Materia') }}</th>
                            <th scope="col">{{ __('Unidad I') }}</th>
                            <th scope="col">{{ __('Unidad II') }}</th>
                            <th scope="col">{{ __('Unidad III') }}</th>
                            <th scope="col">{{ __('Unidad VI') }}</th>
                            <th scope="col">{{ __('Unidad V') }}</th>
                        </thead>
                        <tbody style="background: whitesmoke; border: Gray 2px solid;">
                            @foreach ($users as $user)
                                <tr>                                
                                    <td>
                                        <a href="mailto:{{ $user->email }}">{{ $user->email }}</a>
                                    </td>           
                                </tr>
                                
                            @endforeach
                        </tbody>
                    </table>
          @endsection
