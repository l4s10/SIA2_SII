Sistema Integrado de Información SIA2.O
Descripción
Este repositorio contiene la implementación del Sistema Integrado de Información SIA2.O desarrollado como tesis para la Universidad del Bío-Bío para el Servicio de Impuestos Internos (SII). SIA2.O es un sistema web construido utilizando el framework Laravel, que permite la integración de información de diferentes fuentes y ofrece funcionalidades avanzadas para gestionar y analizar datos.

Equipo de Desarrollo
Francisco Muñoz (Desarrollador)
Jorge Valdivia (Desarrollador)
Cristian Barriga (Desarrollador)
Ricardo Flores (Desarrollador)
Dependencias
El sistema SIA2.O utiliza las siguientes dependencias:

Dependencias principales
PHP 8.1
Laravel Framework 10.0
Laravel Jetstream 3.0
Laravel Sanctum 3.2
Laravel Tinker 2.8
Livewire 2.11
SweetAlert 7.0
Spatie Laravel Permission 5.10
Guzzle HTTP Client 7.2
Laravel AdminLTE 3.8
Dompdf 2.0 (librería para generar archivos PDF)
Barryvdh Laravel Dompdf 2.0 (integración de Dompdf en Laravel)
Dependencias de desarrollo
Faker PHP 1.9.1 (para generar datos de prueba)
Laravel Pint 1.0 (herramienta de pruebas)
Laravel Sail 1.18 (entorno de desarrollo Docker)
Mockery 1.4.4 (biblioteca de burla para pruebas)
NunoMaduro Collision 7.0 (reporte de errores en la consola)
PHPUnit 10.0 (marco de pruebas)
Spatie Laravel Ignition 2.0 (mostrar excepciones y errores de manera amigable)
Instalación
Clona este repositorio en tu máquina local utilizando el siguiente comando:
bash
Copy code
git clone https://github.com/tu_usuario/sia2.o.git
Navega al directorio del proyecto:
bash
Copy code
cd sia2.o
Instala las dependencias de Composer:
Copy code
composer install
Copia el archivo de entorno y configúralo con tu configuración:
bash
Copy code
cp .env.example .env
Genera una clave de aplicación:
vbnet
Copy code
php artisan key:generate
Configura la base de datos en el archivo .env con tus credenciales.

Ejecuta las migraciones para crear las tablas necesarias en la base de datos:

Copy code
php artisan migrate
Inicia el servidor de desarrollo:
Copy code
php artisan serve
El sistema SIA2.O estará disponible en http://localhost:8000.

Scripts de Composer
post-autoload-dump: Permite descubrir y cargar automáticamente los paquetes de Laravel después de la instalación o actualización de dependencias.
post-update-cmd: Publica los activos (assets) de Laravel AdminLTE después de una actualización de Composer.
post-root-package-install: Copia el archivo .env.example a .env después de la instalación del paquete raíz.
post-create-project-cmd: Genera una clave de aplicación después de la creación del proyecto.
Configuración
El archivo composer.json contiene varias configuraciones útiles, como la preferencia de instalación de paquetes, optimización del autoloader y más.

Notas
Este proyecto sigue la licencia MIT, lo que significa que puedes utilizarlo, modificarlo y distribuirlo libremente, siempre y cuando se incluya el aviso de derechos de autor.

¡Gracias por revisar nuestro proyecto!

Universidad del Bío-Bío
