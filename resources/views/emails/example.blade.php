@component('mail::message')
# Hola

Esto es un correo de ejemplo.

@component('mail::button', ['url' => route('login')])
Haz clic aquí
@endcomponent


Gracias,<br>
{{ config('app.name') }}
@endcomponent
