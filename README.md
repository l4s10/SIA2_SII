# Sistema Integrado de Información SIA2.O

## Descripción

Este repositorio contiene la implementación del Sistema Integrado de Información SIA2.O desarrollado como tesis para la Universidad del Bío-Bío. SIA2.O es un sistema web construido utilizando el framework Laravel, que permite la integración de información de diferentes fuentes y ofrece funcionalidades avanzadas para gestionar y analizar datos.

## Equipo de Desarrollo

- Francisco Muñoz (Desarrollador)
- Jorge Valdivia (Desarrollador)
- Cristian Barriga (Desarrollador)
- Ricardo Flores (Desarrollador)

## Dependencias

El sistema SIA2.O utiliza las siguientes dependencias:

### Dependencias principales

- PHP 8.1
- Laravel Framework 10.0
- Laravel Jetstream 3.0
- Laravel Sanctum 3.2
- Laravel Tinker 2.8
- Livewire 2.11
- SweetAlert 7.0
- Spatie Laravel Permission 5.10
- Guzzle HTTP Client 7.2
- Laravel AdminLTE 3.8
- Dompdf 2.0 (librería para generar archivos PDF)
- Barryvdh Laravel Dompdf 2.0 (integración de Dompdf en Laravel)

### Dependencias de desarrollo

- Faker PHP 1.9.1 (para generar datos de prueba)
- Laravel Pint 1.0 (herramienta de pruebas)
- Laravel Sail 1.18 (entorno de desarrollo Docker)
- Mockery 1.4.4 (biblioteca de burla para pruebas)
- NunoMaduro Collision 7.0 (reporte de errores en la consola)
- PHPUnit 10.0 (marco de pruebas)
- Spatie Laravel Ignition 2.0 (mostrar excepciones y errores de manera amigable)

## Instalación

1. Clona este repositorio en tu máquina local utilizando el siguiente comando:
git clone https://github.com/l4s10/laravel10crud.git

2. Navega al directorio del proyecto:

3. Instala las dependencias de Composer:

composer install

4. Copia el archivo de entorno y configúralo con tu configuración:

cp .env.example .env

5. Genera una clave de aplicación:

php artisan key:generate

6. Configura la base de datos en el archivo `.env` con tus credenciales.

7. Ejecuta las migraciones para crear las tablas necesarias en la base de datos:

php artisan migrate

8. Inicia el servidor de desarrollo:



