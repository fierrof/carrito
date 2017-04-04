<?php 
include('dbConfig.php');
session_start();

if(isset($_POST['nombre']) && isset($_POST['cantidad']) && isset($_POST['precio'])){

	$nombre = $_POST['nombre'];
	$cantidad = $_POST['cantidad'];
	$precio = $_POST['precio'];		

	if(isset($_FILES["fileToUpload"])){
		$target_dir = "images/";
		$filename = basename($_FILES['fileToUpload']['name']);	
		$imageFileType = pathinfo($filename,PATHINFO_EXTENSION);
		$target_file = $target_dir . $nombre . "." . $imageFileType;
		$uploadOk = 1;


	// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "File is an image - " . $check["mime"] . ".";
				$uploadOk = 1;
			} else {
				echo "File is not an image.";
				$uploadOk = 0;
			}
		}
	// Check if file already exists
		if (file_exists($target_file)) {
			echo "Sorry, file already exists.";
			$uploadOk = 0;
		}
	// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "Sorry, your file is too large.";
			$uploadOk = 0;
		}
	// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
			echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		$uploadOk = 0;
	}
	// Check if $uploadOk is set to 0 by an error
	if ($uploadOk == 0) {
		echo "Sorry, your file was not uploaded.";
	// if everything is ok, try to upload file
	} else {
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}
$query = "INSERT INTO producto (nombre,cantidad,precio,image,id_usuario) VALUES ('$nombre','$cantidad','$precio','" . $target_file . "'," . $_SESSION['id_usuario'] . ")";

mysqli_query($connection,$query);
}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="new_producto.php" enctype="multipart/form-data" method="POST">	
		<p>Nombre del Producto:</p><input type="text" name="nombre">
		<p>Cantidad en Stock:</p><input type="text" name="cantidad">
		<p>Precio:</p><input type="text" name="precio">
		<p>Descripcion:</p><textarea type="text" name="descripcion"></textarea>
		<br>
		<input type="file" name="fileToUpload" id="fileToUpload">
		<br>				
		<input type="submit" value="Agregar">
	</form>
	<form action="catalogo.php">
		<input type="submit" value="Volver a Catalogo">
	</form>
	<form action="mis_productos.php">
		<input type="submit" value="Volver a Mis Productos">
	</form>
</body>
</html>
