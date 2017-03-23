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
</head>
<body>
	<h1>Catalogo</h1>
	<form action="catalogo.php" method="POST">
		<ul style="none">
			<?php while ($row = mysqli_fetch_assoc($result)) {?> <!-- preguntar aca que es associated array -->
			<li>
				<?php echo $row["nombre"] ." ". $row["cantidad"] ." ". $row["precio"];?>
				<img src= <?php echo $row["image"]?> alt= <?php echo $row["nombre"]?> style="width:128px;height:128px;">
			</li><?php } ?>
		</ul>
	</form>	

	<form action="logout.php" method="POST">
		<input type="submit" name="logout" value="Log Out">
	</form>	

	<form action="mis_productos.php" method="POST">
		<input type="submit" name="logout" value="Mis Productos">
	</form>		
</body>
</html>
