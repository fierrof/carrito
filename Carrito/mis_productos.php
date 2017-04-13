<?php
include("dbConfig.php");
session_start();

if($_SESSION['email']==NULL){
	header("location:index.php");
}

$query="SELECT * FROM producto WHERE id_usuario = " . $_SESSION['id_usuario'] . "";
$result= mysqli_query($connection, $query);

mysqli_close($connection);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Mis Productos</title>
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
		<h1>Productos Posteados</h1>
		<form action="catalogo.php" method="POST">		
			<?php while ($row = mysqli_fetch_assoc($result)) {?> <!-- preguntar aca que es associated array -->	
			<div class="gallery">
				<a target="_blank" href="URL DESCRIPCION DE PRODUCTO">
					<img src=<?php echo $row["image"]?>  alt=<?php echo $row["nombre"]?> width="300" height="200">
				</a>
				<div class="desc"><?php echo $row["nombre"] . " - $ " . $row["precio"];?></div>
			</div>		
			<?php } ?>		
		</form>			


	</div>
</body>
</html>