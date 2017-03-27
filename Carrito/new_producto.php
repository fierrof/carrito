<?php 
include('dbConfig.php');
session_start();

if(isset($_POST['nombre']) && isset($_POST['cantidad']) && isset($_POST['precio']) && isset($_POST['image'])){

	$nombre = $_POST['nombre'];
	$cantidad = $_POST['cantidad'];
	$precio = $_POST['precio'];		

	$query = "INSERT INTO producto (nombre,cantidad,precio,image,id_usuario) VALUES ('$nombre','$cantidad','$precio','$image'," . $_SESSION['id_usuario'] . ")";

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
	<form action="upload.php" method="post" enctype="multipart/form-data">
		<input type="file" name="fileToUpload" id="fileToUpload">
		<input type="submit" value="Upload Image" name="submit">
	</form>
	<form action="new_user.php" method="POST">
		<p>Nombre del Producto:</p><input type="text" name="nombre">
		<p>Cantidad en Stock:</p><input type="text" name="cantidad">
		<p>Precio:</p><input type="text" name="precio">
		<p>Descripcion:</p><textarea type="text" name="descripcion"></textarea>
		<br>
		<br>				
		<input type="submit" value="Agregar">
	</form>
	</body>
	</html>