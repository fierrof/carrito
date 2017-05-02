<?php
include("dbConfig.php");
session_start();

$query="SELECT * FROM producto";
$result = mysqli_query($connection, $query);

mysqli_close($connection);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="stylesheet" href="style.css">	
</head>
<body>
	<div class="background" >
		<div class="logo">
			<img src="images/logo/logo.png" alt="logo">	
		</div>
		<div class="panel">			
			<a href="index.php" class="panel_btn">Home</a>			
			<a href="contacto.php" class="panel_btn">Contacto</a>
			<a href="login.php" class="panel_btn">Log In</a>		
		</div>
		<h1>Catalogo Completo</h1>
		<form action="catalogo.php" method="POST">		
			<?php while ($row = mysqli_fetch_assoc($result)) {?> 
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