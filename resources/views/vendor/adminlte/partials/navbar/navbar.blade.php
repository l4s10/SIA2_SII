<?php
    // Obtener los roles del usuario actual
    $roles = auth()->user()->getRoleNames();

    // Definir los colores por defecto para cada tipo de usuario
    $colors = [
        'ADMINISTRADOR' => 'navbar-primary',
        'FUNCIONARIO' => 'navbar-warning',
        'SERVICIOS' => 'navbar-success', // Nuevo rol "SERVICIOS" con color verde
        'INFORMATICA' => 'navbar-danger', // Nuevo rol "INFORMATICA" con color rojo
        'JURIDICO' => 'navbar-danger', // Nuevo rol "JURIDICO" con color rojo
    ];
    // Establecer el color en función de los roles del usuario actual
    $color = null;
    foreach ($roles as $role) {
        if (isset($colors[$role])) {
            $color = $colors[$role];
            break;
        }
    };
?>
<nav class="main-header navbar
    {{ config('adminlte.classes_topnav_nav', 'navbar-expand') }}
    @role('ADMINISTRADOR')
    navbar-primary
    @elseif(request()->user()->hasRole('SERVICIOS'))
    navbar-success
    @elseif(request()->user()->hasAnyRole(['INFORMATICA', 'JURIDICO']))
    navbar-danger
    @else
    navbar-warning
    @endrole
    {{ config('adminlte.classes_topnav', 'navbar-white navbar-light') }}">

    {{-- Navbar left links --}}
    <ul class="navbar-nav">
        {{-- Left sidebar toggler link --}}
        @include('adminlte::partials.navbar.menu-item-left-sidebar-toggler')

        {{-- Configured left links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-left'), 'item')

        {{-- Custom left links --}}
        @yield('content_top_nav_left')
    </ul>

    {{-- Navbar right links --}}
    <ul class="navbar-nav ml-auto">
        {{-- Custom right links --}}
        @yield('content_top_nav_right')

        {{-- Configured right links --}}
        @each('adminlte::partials.navbar.menu-item', $adminlte->menu('navbar-right'), 'item')
        <!-- {{-- Notification bell icon --}}
    <li class="nav-item dropdown">
    @role('INFORMATICA')
    <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-regular fa-bell"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
            1+
        </span>
    </a>
    @else
    <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-regular fa-bell"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            1+
        </span>
    </a>
    @endrole
    <div div class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
        
        <a class="dropdown-item" href="{{ route('solicitud.salas.create') }}">Solicitar Sala</a>
        <a class="dropdown-item" href="{{ route('solicitud.bodegas.create') }}">Solicitar visita a bodega</a>
        <a class="dropdown-item" href="{{ route('solicitud.vehiculos.create') }}">Solicitud de Reservas de Vehículos</a>
        <a class="dropdown-item" href="{{ route('solmaterial.index') }}">Solicitar Materiales</a>
        <a class="dropdown-item" href="{{ route('solequipos.create') }}">Solicitud de Reserva de Equipos</a>
        <a class="dropdown-item" href="{{ route('formulariosSol.create') }}">Solicitud de Formulario</a>
    </div>
</li>
        {{-- Notification Flag icon --}}
        @role('ADMINISTRADOR')
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="flagDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa-regular fa-flag"></i>
        <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
            99+
        </span>
    </a>
    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="flagDropdown">
        
        <a class="dropdown-item" href="{{ route('solicitud.salas.index') }}">Solicitudes de Salas</a>
        <a class="dropdown-item" href="{{ route('solicitud.bodegas.index') }}">Solicitudes de Bodegas</a>
        <a class="dropdown-item" href="{{ route('solicitud.vehiculos.index') }}">Solicitudes de vehiculos</a>
        <a class="dropdown-item" href="{{ route('solmaterial.index') }}">Solicitudes de Materiales</a>
        <a class="dropdown-item" href="{{ route('solequipos.index') }}">Listado solicitudes equipos</a>
        <a class="dropdown-item" href="{{ route('formulariosSol.index') }}">Listado solicitudes formulario</a>
    </div>
</li>
@endrole -->

        {{-- User menu link --}}
        @if(Auth::user())
            @if(config('adminlte.usermenu_enabled'))
                @include('adminlte::partials.navbar.menu-item-dropdown-user-menu')
            @else
                @include('adminlte::partials.navbar.menu-item-logout-link')
            @endif
        @endif

        {{-- Right sidebar toggler link --}}
        @if(config('adminlte.right_sidebar'))
            @include('adminlte::partials.navbar.menu-item-right-sidebar-toggler')
        @endif
    </ul>
    <style>
        /*Color administrador */
        .navbar-primary {
            background-color: #0064A0; /* Cambia el color a azul */
        }
        /*Color Servicios */
        .navbar-success {
            background-color: #00B050;
        }
        /*Color Informatica/juridico */
        .navbar-danger {
            background-color: #E22C2C;
        }
        /*Color Funcionario */
        .navbar-warning {
            background-color: #E6500A; /* Cambia el color a naranja */
        }
    </style>
</nav>
