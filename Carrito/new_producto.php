<?php 
include('dbConfig.php');
session_start();

if(isset($_POST['nombre']) && isset($_POST['cantidad']) && isset($_POST['precio'])){

	$nombre = $_POST['nombre'];
	$cantidad = $_POST['cantidad'];
	$precio = $_POST['precio'];		

	if(isset($_FILES["fileToUpload"])){
		$target_dir = "images/productos/";
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
			$query = "INSERT INTO producto (nombre,cantidad,precio,image,id_usuario) VALUES ('$nombre','$cantidad','$precio','" . $target_file . "'," . $_SESSION['id_usuario'] . ")";
			mysqli_query($connection,$query);
			echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		} else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
}


}
mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Nuevo Producto</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="background" >
		<div class="logo">
			<img src="images/logo/logo.png" alt="logo">	
		</div>

		<div class="panel">			
			<a href="catalogo.php" class="panel_btn">Home</a>
			<a href="mis_productos.php" class="panel_btn">Mis Productos</a>
			<a href="new_producto.php" class="panel_btn">Postear Producto</a>
			<a href="contacto.php" class="panel_btn">Contacto</a>
			<a href="logout.php" class="btn_logout"><img src="images/iconos/logout.png"></a>
		</div>
		<div class="input_form"><form action="new_producto.php" enctype="multipart/form-data" method="POST" ><br>
			<input type="text" name="nombre" placeholder="Nombre del Producto"><br>	
			<input type="text" name="cantidad" placeholder="Cantidad en stock"><br>
			<input type="text" name="precio" placeholder="Precio"><br>
			<p>Descripcion:</p><textarea type="text" name="descripcion"></textarea>
			<br><br>
			<input type="file" name="fileToUpload" id="fileToUpload">
			<br><br><br>
			<input type="submit" value="Agregar">
		</form></div>
		
	</div>
</body>
</html>