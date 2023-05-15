<?php
    // Obtener los roles del usuario actual
    $roles = auth()->user()->getRoleNames();

    // Definir los colores por defecto para cada tipo de usuario
    $colors = [
        'ADMINISTRADOR' => 'navbar-primary',
        'FUNCIONARIO' => 'navbar-warning',
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
        .navbar-primary {
            background-color: #007bff; /* Cambia el color a azul */
            color: #fff; /* Cambia el color del texto a blanco */
        }
        .navbar-warning {
        background-color: #E6500A; /* Cambia el color a naranja */
        color: #fff; /* Cambia el color del texto a negro */
        }
    </style>
</nav>
