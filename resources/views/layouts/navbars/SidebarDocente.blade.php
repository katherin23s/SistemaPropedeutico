<div class="sidebar">
    <div class="sidebar-wrapper" style="background: #28CA00;">
              <!-- MENU SIDEBAR -->
        <ul class="nav">
            <li @if ($pageSlug ?? '' == 'dashboard') class="active " @endif>
                <a href="{{ route('home') }}">
                    <i class="tim-icons icon-chart-pie-36"></i>
                    <p>{{ _('Dashboard') }}</p>
                </a>
            </li>
                <!-- TODO: GESTION DE OFERTA EDUCATIVA -->
                <li>            
                    <div class="collapse show" id="laravel-examples">
                        <ul class="nav pl-4">
                            <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                                <a href="{{ route('InformacionPerfilDocente')  }}">
                                    <i class="tim-icons icon-single-02"></i>                                
                                    <p>{{ _('Informacion Perfil') }}</p>
                                </a>
                            </li>          
                        </ul>
                    </div>
                </li>
             <!-- TODO: DOCUMENTOS -->
             <li>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                            <a href="{{ route('DocumentosDocentes')  }}">
                                <i class="tim-icons icon-single-copy-04"></i>
                                <p>{{ _('Documentos ') }}</p>
                            </a>
                        </li>          
                    </ul>
                </div>
        
            </li>
            <!-- -->
            <!-- TODO: HORARIO-->
            <li>
           
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                            <a href="{{ route('HorarioDocente')  }}">
                                   <i class="tim-icons icon-time-alarm"></i>    
                                <p>{{ _('Horario') }}</p>
                            </a>
                        </li>          
                    </ul>
                </div>       
            </li>
         
   <!-- TODO: CONFIGURACION -->
   <li>
    <div class="collapse show" id="laravel-examples">
        <ul class="nav pl-4">
            <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                <a href="{{ route('GruposDocente')  }}">
                    <i class="tim-icons icon-components"></i>
                    <p>{{ _('Grupos') }}</p>
                </a>
            </li>          
        </ul>
    </div>               
</li> 
           
             <!-- TODO: CONFIGURACION -->
             <li>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                            <a href="{{ route('ConfiguracionDocente')  }}">
                                <i class="tim-icons icon-settings-gear-63"></i>
                                <p>{{ _('Configuracion') }}</p>
                            </a>
                        </li>          
                    </ul>
                </div>               
            </li> 
        </ul>
    </div>
</div>