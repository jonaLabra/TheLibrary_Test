<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## Instalacion Proyecto
<h5>1.- instalar el repositorio desde github, abrir una terminal y poner el siguiente comando.</h5>
<p>$~ git clone https://github.com/jonaLabra/TheLibrary_Test.git</p>
<h5>2.- Abrir el archivo descargado desde un editor de texto que se desee (visual studio,sublimeText,etc..),
    abrir el archivo .env y configurar las variables siguientes agregando las credenciales de su base de datos:</h5>
    <p>*DB_DATABASE=-Nombre de la base de datos-</p>
    <p>*DB_USERNAME=-Nombre del usuario de la base de datos-</p>
    <p>*DB_PASSWORD=-Contraseña del usuario para la base de datos-</p>
<h5>3.- Desde su editor de texto abrir una terminal y ejecutar el siguiente comando.</h5>
<p>$~ composer install</p>
<h5>4.- Por ultimo, una vez que se tengan configuradas las credenciales de su base de datos en el archivo .env correctamente, se migraran las tablas hacia la base de     datos con el comando.</h5>
<p>$~ php artisan migrate</p>

## El proyecto cuenta con un correo y contraseña predefinido en el archivo (app/database/seeders/TodosSeeders.php) que fungira como administrador del sistema
<p>*email: admin@gmail.com</p>
<p>*pass: admin</p>
  <p> Con este usuario podra entrar al panel de administracion para poder utilizar el CRUD de libros,asi como ver los prestamos de libros que cada usuario ah            reservado.
   Todos los usuarios que se registren despues seran automaticamente usuarios y podran ver y reservar los libros que esten disponibles.</p>


