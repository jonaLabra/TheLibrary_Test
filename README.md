<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Instalacion Proyecto
1.- instalar el repositorio desde github, abrir una terminal y poner el siguiente comando.
$~ git clone https://github.com/jonaLabra/TheLibrary_Test.git
2.- Abrir el archivo descargado desde un editor de texto que se desee (visual studio,sublimeText,etc..),
    abrir el archivo .env y configurar las variables siguientes agregando las credenciales de su base de datos:
    *DB_DATABASE=-Nombre de la base de datos-
    *DB_USERNAME=-Nombre del usuario de la base de datos-
    *DB_PASSWORD=-Contraseña del usuario para la base de datos-
3.- Desde su editor de texto abrir una terminal y ejecutar el siguiente comando.
$~ composer install
4.- Por ultimo, una vez que se tengan configuradas las credenciales de su base de datos en el archivo .env correctamente, se migraran las tablas hacia la base de     datos con el comando.
$~ php artisan migrate

## El proyecto cuenta con un correo y contraseña predefinido en el archivo (app/database/seeders/TodosSeeders.php) que fungira como administrador del sistema
*email: admin@gmail.com
*pass: admin
   Con este usuario podra entrar al panel de administracion para poder utilizar el CRUD de libros,asi como ver los prestamos de libros que cada usuario ah            reservado.
   Todos los usuarios que se registren despues seran automaticamente usuarios y podran ver y reservar los libros que esten disponibles.


