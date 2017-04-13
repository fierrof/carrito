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
			<a href="catalogo.php" class="panel_btn">Home</a>			
			<a href="contacto.php" class="panel_btn">Contacto</a>
			<a href="logout.php" class="btn_logout"><img src="images/iconos/logout.png"></a>			
		</div>
		<form action="login.php" method="POST">
			<br>
			<input type="text" name="email" placeholder="E-Mail" /><br>
			<input type="password" name="pass" placeholder="Password" /><br>
			<input type="submit" name="submit" value="Login" class="button1" /><br>
		</form>
		<a href="new_user.php">Signup</a>
	</div>
</body>
</html>