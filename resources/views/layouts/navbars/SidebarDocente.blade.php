<div class="sidebar">
    <div class="sidebar-wrapper">
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
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="false">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Gestion de oferta Educativa') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile' ?? '' ) class="active " @endif>
                            <a href="{{ route('planteles.index')  }}">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('Informacion Perfil') }}</p>
                            </a>
                        </li>          
                    </ul>
                </div>
            </li>
             <!-- TODO: DOCUMENTOS -->
             <li>
                <a data-toggle="collapse" href="#laravel-examples3" aria-expanded="false">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Carga Documentos') }}</span>
                    <b class="caret mt-1"></b>
                </a>
        
            </li>
            <!-- -->
            <!-- TODO: HORARIO-->
            <li>
                <a data-toggle="collapse" href="#laravel-examples5" aria-expanded="false">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Horario') }}</span>
                    <b class="caret mt-1"></b>
                </a>           
            </li>
            <!-- -->
             <!-- TODO: GRUPO -->
             <li>
                <a data-toggle="collapse" href="#laravel-examples6" aria-expanded="false">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Grupo') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                
            </li>      
            
             <!-- TODO: KARDEX -->
             <li>
                <a data-toggle="collapse" href="#laravel-examples6" aria-expanded="false">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Kardex') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                
            </li> 

             <!-- TODO: CONFIGURACION -->
             <li>
                <a data-toggle="collapse" href="#laravel-examples6" aria-expanded="false">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Configuracion') }}</span>
                    <b class="caret mt-1"></b>
                </a>
                
            </li> 

        </ul>
    </div>
</div>