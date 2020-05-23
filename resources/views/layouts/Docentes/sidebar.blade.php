<div class="sidebar">
    <div class="sidebar-wrapper">
        <div class="logo">
            <a href="#" class="simple-text logo-mini">ITT</a>
            <a href="#" class="simple-text logo-normal">CURSOS</a>
        </div>
        <ul class="nav">
            <li @if ($pageSlug == 'inicio') class="active " @endif>
                <a href="{{ route('docente.home', $docente) }}">
                    <i class="fas fa-home"></i>
                    <p>Inicio</p>
                </a>
            </li>
            {{--  <li>
                <a data-toggle="collapse" href="#laravel-examples" aria-expanded="true">
                    <i class="fab fa-laravel" ></i>
                    <span class="nav-link-text" >{{ __('Laravel Examples') }}</span>
                    <b class="caret mt-1"></b>
                </a>

                <div class="collapse show" id="laravel-examples">
                    <ul class="nav pl-4">
                        <li @if ($pageSlug == 'profile') class="active" @endif>
                            <a href="">
                                <i class="tim-icons icon-single-02"></i>
                                <p>{{ _('User Profile') }}</p>
                            </a>
                        </li>
                        <li @if ($pageSlug == 'users') class="active" @endif>
                            <a href="">
                                <i class="tim-icons icon-bullet-list-67"></i>
                                <p>{{ _('User Management') }}</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>  --}}
            <li @if ($pageSlug == 'horario') class="active " @endif>
                <a href="{{ route('docente.horario', $docente) }}">
                    <i class="far fa-calendar-alt"></i>
                    <p>Horario</p>
                </a>
            </li>
            <li @if ($pageSlug == 'kardex') class="active " @endif>
                <a href="">
                    <i class="far fa-clipboard"></i>
                    <p>Kardex</p>
                </a>
            </li>
            <li @if ($pageSlug == 'documentos') class="active " @endif>
                <a href="">
                    <i class="far fa-file-alt"></i>
                    <p>Documentos</p>
                </a>
            </li>
        </ul>
    </div>
</div>
