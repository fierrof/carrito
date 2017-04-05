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
	<h1>Mis Productos </h1>
	<form action="catalogo.php" method="POST">
		<ul style="none">
			<?php while ($row = mysqli_fetch_assoc($result)) {?> 
			<li>
				<?php echo $row["nombre"] ." ". $row["cantidad"] ." ". $row["precio"];?>
				<img src= <?php echo $row["image"]?> alt= <?php echo $row["nombre"]?> style="width:128px;height:128px;"> 
			</li><?php } ?>
		</ul>
	</form>
	<form action="logout.php" method="POST">
		<input type="submit" name="logout" value="Log Out">
	</form>	
	<form action="new_producto.php" method="POST">
		<input type="submit" name="logout" value="Agregar Productos">
	</form>	

	<form action="catalogo.php" method="POST">
		<input type="submit" name="logout" value="Volver a Catalogo">
	</form>	
</body>
</html>