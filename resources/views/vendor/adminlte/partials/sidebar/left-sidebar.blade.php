<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">
    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>

                {{-- Configured sidebar links --}}
                @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item')

                 <!-- Header Administrador -->
                 @hasanyrole('ADMINISTRADOR|INFORMATICA|JURIDICO|SERVICIOS')
                 <li class="nav-header">Módulos Administrador</li>
                 @endhasanyrole

                @hasanyrole('ADMINISTRADOR|INFORMATICA|JURIDICO')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-user-tie nav-icon"></i>
                        <p>Directivos <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-folder-minus"></i>
                                <p>Búsqueda Resoluciones<i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('busquedafuncionario') }}" class="nav-link">
                                        <i class="fas fa-fw fa-eye nav-icon"></i>
                                        <p>Por funcionario</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('busquedaavanzada') }}" class="nav-link">
                                        <i class="fas fa-fw fa-eye nav-icon"></i>
                                        <p>Avanzada</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="fa-solid fa-folder-minus"></i>
                                <p>Repositorio <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="{{ url('resolucion') }}" class="nav-link">
                                        <i class="fas fa-fw fa-eye nav-icon"></i>
                                        <p>Resoluciones</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('polizas') }}" class="nav-link">
                                        <i class="fas fa-fw fa-eye nav-icon"></i>
                                        <p>Pólizas</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('facultades') }}" class="nav-link">
                                        <i class="fas fa-fw fa-eye nav-icon"></i>
                                        <p>Facultades</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ url('cargos') }}" class="nav-link">
                                        <i class="fas fa-fw fa-eye nav-icon"></i>
                                        <p>Cargos</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                @endhasanyrole
                

                @hasanyrole('ADMINISTRADOR|INFORMATICA|SERVICIOS')
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="fa-solid fa-gears nav-icon"></i>
                        <p>Panel de control <i class="right fas fa-angle-left"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/funcionarios" class="nav-link">
                                <i class="fas fa-fw fa-users nav-icon"></i>
                                <p>Administrar Usuarios</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/vehiculos" class="nav-link">
                                <i class="fas fa-fw fa-car nav-icon"></i>
                                <p>Administrar Vehiculos</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/region" class="nav-link">
                                <i class="fas fa-fw fa-earth-americas nav-icon"></i>
                                <p>Administrar Regiones</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/comuna" class="nav-link">
                                <i class="fas fa-fw fa-street-view nav-icon"></i>
                                <p>Administrar Comunas</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/direccionregional" class="nav-link">
                                <i class="fa-solid fa-location-arrow nav-icon"></i>
                                <p>Administrar Direcciones Regionales</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/ubicacion" class="nav-link">
                                <i class="fa-solid fa-user-group nav-icon"></i>
                                <p>Administrar Ubicaciones y Departamentos</p>
                            </a>
                        </li>
                    </ul>
                </li>
                @endhasanyrole

            </ul>
        </nav>
    </div>
</aside>
