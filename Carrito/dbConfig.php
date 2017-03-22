<?php
DEFINE ('DB_USER', 'carritoUser');
DEFINE ('DB_PASSWORD', '123');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', 'CarritoDB');

$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die('No se pudo conectar a la base de datos, Error ' .
	mysqli_connect_error());
	?>
	