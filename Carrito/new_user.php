<?php 
include('dbConfig.php');
session_start();

if(isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['email']) && isset($_POST['pass'])){

	$nombre = $_POST['nombre'];
	$apellido = $_POST['apellido'];
	$enail = $_POST['email'];
	$pass = $_POST['pass'];

	$query = "INSERT INTO usuario (nombre,apellido,email,pass,id_tipo_usuario) VALUES ('$nombre','$apellido','$enail','$pass',2)";

	mysqli_query($connection,$query);
	header("location:index.php");
	
}

mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Signup</h1>
	<form action="new_user.php" method="POST">
		<p>Nombre:</p><input type="text" name="nombre">
		<p>Apellido:</p><input type="text" name="apellido">
		<p>E-Mail:</p><input type="email" name="email">
		<p>E-Mail:</p><input type="email" name="email_ver">
		<p>Contraseña:</p><input type="password" name="pass">
		<br>
		<input type="submit" value="Signup">
	</form>
</body>
</html>