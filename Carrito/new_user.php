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
	<title>Sign Up</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="background" >
		<div class="logo">
			<img src="images/logo/logo.png" alt="logo">	
		</div>
		<div class="panel">			
			<a href="catalogo.php" class="panel_btn">Home</a>			
			<a href="contacto.php" class="panel_btn">Contacto</a>
			<a href="logout.php" class="btn_logout"><img src="images/iconos/logout.png"></a>			
		</div>
		<h2>Para registrarse completar los sigientes datos:</h2>
		<form action="new_user.php" method="POST" >
			<input type="text" name="nombre" placeholder="Nombre"><br>
			<input type="text" name="apellido" placeholder="Apellido"><br>
			<input type="email" name="email" placeholder="E-Mail"><br>
			<input type="email" name="email_ver" placeholder="Confirmar E-Mail"><br>
			<input type="password" name="pass" placeholder="Contraseña"><br>
			<br>
			<input type="submit" value="Signup">
		</form>
	</div>
</body>
</html>