@extends('adminlte::auth.auth-page', ['auth_type' => 'register'])

@php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
@php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )

@if (config('adminlte.use_route_url', false))
    @php( $login_url = $login_url ? route($login_url) : '' )
    @php( $register_url = $register_url ? route($register_url) : '' )
@else
    @php( $login_url = $login_url ? url($login_url) : '' )
    @php( $register_url = $register_url ? url($register_url) : '' )
@endif

@section('auth_header', __('adminlte::adminlte.register_message'))

@section('auth_body')
    <form action="{{ $register_url }}" method="post">
        @csrf

        {{-- *CAMPO NOMBRES* --}}
        <div class="input-group mb-3">
            <input type="text" name="NOMBRES" class="form-control @error('NOMBRES') is-invalid @enderror"
                value="{{ old('NOMBRES') }}" placeholder="{{ __('adminlte::adminlte.full_name') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('NOMBRES')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        {{-- *CAMPO APELLIDOS* --}}
        <div class="input-group mb-3">
            <input type="text" name="APELLIDOS" class="form-control @error('APELLIDOS') is-invalid @enderror"
                value="{{ old('APELLIDOS') }}" placeholder="{{ __('adminlte::adminlte.last_name') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('APELLIDOS')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        {{-- *CAMPO EMAIL* --}}
        <div class="input-group mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                   value="{{ old('email') }}" placeholder="{{ __('adminlte::adminlte.email') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Confirm password field --}}
        <div class="input-group mb-3">
            <input type="password" name="password_confirmation"
                   class="form-control @error('password_confirmation') is-invalid @enderror"
                   placeholder="{{ __('adminlte::adminlte.retype_password') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-lock {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('password_confirmation')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- *CAMPO RUT* --}}
        <div class="input-group mb-3">
            <input type="text" name="RUT" class="form-control @error('RUT') is-invalid @enderror"
                value="{{ old('RUT') }}" placeholder="{{ __('adminlte::adminlte.rut') }}">

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-id-card {{ config('adminlte.classes_auth_icon', '') }}"></span>
                </div>
            </div>

            @error('RUT')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        {{-- Depto field --}}
        <div class="input-group mb-3">
            <input type="text" name="depto" class="form-control @error('depto') is-invalid @enderror"
                value="{{ old('depto') }}" placeholder="{{ __('Depto') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-building"></span>
                </div>
            </div>

            @error('depto')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Region field --}}
        <div class="input-group mb-3">
            <input type="text" name="region" class="form-control @error('region') is-invalid @enderror"
                value="{{ old('region') }}" placeholder="{{ __('Region') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-map-marker-alt"></span>
                </div>
            </div>

            @error('region')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Ubicacion field --}}
        <div class="input-group mb-3">
            <input type="text" name="ubicacion" class="form-control @error('ubicacion') is-invalid @enderror"
                value="{{ old('ubicacion') }}" placeholder="{{ __('Ubicacion') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-map-marked-alt"></span>
                </div>
            </div>

            @error('ubicacion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Grupo field --}}
        <div class="input-group mb-3">
            <input type="text" name="grupo" class="form-control @error('grupo') is-invalid @enderror"
                value="{{ old('grupo') }}" placeholder="{{ __('Grupo') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-users"></span>
                </div>
            </div>

            @error('grupo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Escalafon field --}}
        <div class="input-group mb-3">
            <input type="text" name="escalafon" class="form-control @error('escalafon') is-invalid @enderror"
                value="{{ old('escalafon') }}" placeholder="{{ __('Escalafon') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-chart-bar"></span>
                </div>
            </div>

            @error('escalafon')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Grado field --}}
        <div class="input-group mb-3">
            <input type="text" name="grado" class="form-control @error('grado') is-invalid @enderror"
                value="{{ old('grado') }}" placeholder="{{ __('Grado') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-graduation-cap"></span>
                </div>
            </div>

            @error('grado')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Fecha de nacimiento field --}}
        <div class="input-group mb-3">
            <input type="date" name="fecha_nacimiento" class="form-control @error('fecha_nacimiento') is-invalid @enderror"
                value="{{ old('fecha_nacimiento') }}" placeholder="{{ __('Fecha de Nacimiento') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-calendar-alt"></span>
                </div>
            </div>

            @error('fecha_nacimiento')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Fecha de ingreso a la empresa field --}}
        <div class="input-group mb-3">
            <input type="date" name="fecha_ingreso" class="form-control @error('fecha_ingreso') is-invalid @enderror"
                value="{{ old('fecha_ingreso') }}" placeholder="{{ __('Fecha de Ingreso a la Empresa') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-calendar-alt"></span>
                </div>
            </div>

            @error('fecha_ingreso')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Fecha de asimilación a planta field --}}
        <div class="input-group mb-3">
            <input type="date" name="fecha_asim_planta" class="form-control @error('fecha_asim_planta') is-invalid @enderror"
                value="{{ old('fecha_asim_planta') }}" placeholder="{{ __('Fecha de Asimilación a Planta') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-calendar-alt"></span>
                </div>
            </div>

            @error('fecha_asim_planta')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Funcion field --}}
        <div class="input-group mb-3">
            <input type="text" name="funcion" class="form-control @error('funcion') is-invalid @enderror"
                value="{{ old('funcion') }}" placeholder="{{ __('Funcion') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-tasks"></span>
                </div>
            </div>

            @error('funcion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Profesion field --}}
        <div class="input-group mb-3">
            <input type="text" name="profesion" class="form-control @error('profesion') is-invalid @enderror"
                value="{{ old('profesion') }}" placeholder="{{ __('Profesion') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-user-graduate"></span>
                </div>
            </div>

            @error('profesion')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Area field --}}
        <div class="input-group mb-3">
            <input type="text" name="area" class="form-control @error('area') is-invalid @enderror"
                value="{{ old('area') }}" placeholder="{{ __('Area') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-warehouse"></span>
                </div>
            </div>

            @error('area')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Fono field --}}
        <div class="input-group mb-3">
            <input type="text" name="fono" class="form-control @error('fono') is-invalid @enderror"
                value="{{ old('fono') }}" placeholder="{{ __('Fono') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone"></span>
                </div>
            </div>

            @error('fono')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Anexo field --}}
        <div class="input-group mb-3">
            <input type="text" name="anexo" class="form-control @error('anexo') is-invalid @enderror"
                value="{{ old('anexo') }}" placeholder="{{ __('Anexo') }}" autofocus>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-phone-square"></span>
                </div>
            </div>

            @error('anexo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        {{-- Sexo field --}}
        <div class="input-group mb-3">
            <select name="sexo" class="form-control @error('sexo') is-invalid @enderror">
                <option value="" disabled {{ old('sexo') ? '' : 'selected' }}>{{ __('Sexo') }}</option>
                <option value="M" {{ old('sexo') == 'M' ? 'selected' : '' }}>{{ __('Masculino') }}</option>
                <option value="F" {{ old('sexo') == 'F' ? 'selected' : '' }}>{{ __('Femenino') }}</option>
            </select>

            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-venus-mars"></span>
                </div>
            </div>

            @error('sexo')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        {{-- Register button --}}
        <button type="submit" class="btn btn-block {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
            <span class="fas fa-user-plus"></span>
            {{ __('adminlte::adminlte.register') }}
        </button>

    </form>
@stop

@section('auth_footer')
    <p class="my-0">
        <a href="{{ $login_url }}">
            {{ __('adminlte::adminlte.i_already_have_a_membership') }}
        </a>
    </p>
@stop
