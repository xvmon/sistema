# sistema
examen tecnico grupo castores
Implementar:
	IDE visual studio code
	Lenguaje de programacion PHP
		Framework codeigniter 3
Version requerida de paquetes para el funcionamiento del proyecto
	phpMyAdmin SQL Dump MySQL version 5.2.0
	Versión del servidor: 10.4.27-MariaDB
	Versión de PHP: 7.4.33

Configuracion del proyecto:
Base de datos c:\xampp\htdocs\sistema\application\config\database.php
cambiar las siguente lineas por los dato de acceso y nombre de la base de datos
$db['default'] = array(
		'dsn'	=> '',
		'hostname' => 'localhost',
		'username' => 'root',
		'password' => '',
		'database' => 'sistema',
		'dbdriver' => 'mysqli',
		'dbprefix' => '',

Ruta de acceso:
http://localhost/sistema
en caso de algun cambio en la ruta, configurar el archivo c:\xampp\htdocs\sistema\application\config\config.php
cambiar las siguientes lineas
$config['base_url'] = 'http://localhost/sistema/';

Para la base de datos con el nombre propuesto de sistema para la base de datos y tambien para la aplicacion web php
