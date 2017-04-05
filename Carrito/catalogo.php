<?php
include("dbConfig.php");
session_start();

if($_SESSION['email']==NULL){
	header("location:index.php");
}

$query="SELECT * FROM producto";
$result = mysqli_query($connection, $query);

mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>	
	<title>Catalogo</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<h1>Catalogo</h1>
	<form action="catalogo.php" method="POST">		
		<?php while ($row = mysqli_fetch_assoc($result)) {?> <!-- preguntar aca que es associated array -->		
		<div class="gallery">
			<a target="_blank" href="URL DESCRIPCION DE PRODUCTO">
				<img src=<?php echo $row["image"]?>  alt=<?php echo $row["nombre"]?> width="300" height="200">
			</a>
			<div class="desc"><?php echo $row["nombre"] ." ". $row["cantidad"] ." ". $row["precio"];?></div>
		</div>		
		<?php } ?>		
	</form>	
	<div>
		<form action="logout.php" method="POST">
			<input type="submit" name="logout" value="Log Out">
		</form>	
		<form action="mis_productos.php" method="POST">
			<input type="submit" name="logout" value="Mis Productos">
		</form>		
	</div>	
</body>
</html>



