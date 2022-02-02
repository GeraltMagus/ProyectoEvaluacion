<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Proyecto Evaluación

Para ejecutar este proyecto, seguir las siguientes instrucciones:

1) Ejecutar php y MySql, recomendado el uso de XAMPP ya que fue la app utilizada durante el desarrollo, mas no es necesario, los puertos que se utilicen tampoco son muy relevantes
2) Mover el proyecto a la carpeta htdocs de XAMPP, en el caso de utilizar otro gestor de php, buscar la carpeta correspondiente donde se almacenan los proyectos
3) Crear una base de datos de MySql con el nombre db_proyecto, dejarla vacía
4) Renombrar el archivo ".env.example" a ".env"}
5) En el archivo .env, llenar los campos de "DB_USERNAME" y "DB_PASSWORD" con las credenciales correspondientes a su instalación de MySQL

6) Abrir una consola de comandos en la carpeta raiz de este proyecto
7) Ejecutar el comando "php artisan serve", esto iniciará el proyecto el localhost:8000, en caso de encontrarse en uso este puerto, utilizar "php artisan serve --port #puerto" donde #puerto es el puerto en que se abrirá el aplicativo
8) Ejecutar el comando "php artisan migrate", esto creará las tablas correspondientes en la base de datos
9) Acceder a localhost:8000/usuarios


--------------------------------------------
La creación y edición de usuarios quedó completada
De habilidades no
Se pueden insertar manualmente habilidades en la tabla "habilidads", y crear una relación en la tabla "usuario_habilidads" para validar que aparezcan al momento de crear y editar usuarios, así como que en la tabla de usuarios se genere el conteo de habilidades
No se crearon vistas en la tabla de datos, para utilizar funciones de laravel que realizaran lo mismo (como el conteo, el calculo de edad, etc)
La API de carga de estados/municipios tiene creditos limitados, por lo que no pude hacer mas pruebas de funcionamiento, deberían quedar suficientes creditos para validar el proyecto