<?php 
include("dbConfig.php");
session_start();

$error='';
if(isset($_POST['submit'])){
	if(empty($_POST['email']) || empty($_POST['pass'])){
		$error = "Rellenar todos los campos";
		echo $error;
	}else{
		$email = $_POST['email'];
		$pass = $_POST['pass'];

		$query = mysqli_query($connection, "SELECT * FROM usuario WHERE email='$email' and pass = '$pass'");
		$query1 = mysqli_query($connection, "SELECT id_usuario FROM usuario WHERE email='$email' and pass = '$pass'");
		$rows = mysqli_num_rows($query);
		$result = mysqli_fetch_assoc($query1);

		if($rows == 1){
			$_SESSION['email']=$email;
			$_SESSION['id_usuario'] = $result['id_usuario'];
			header("location:catalogo.php");
		}else{
			$error = "Usuario o contraseña incorrecto/s";
			echo $error;
		}
		mysqli_close($connection);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log In</title>
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
		</div>
		<div class="input_form">
			<form action="login.php" method="POST">
				<br>
				<input type="text" name="email" placeholder="E-Mail" class="textbox01" /><br>
				<input type="password" name="pass" placeholder="Password" class="textbox01" /><br><br>
				<a href="new_user.php">Signup</a>
				<input type="submit" name="submit" value="Login" class="button1" /><br>				
			</form>
		</div>		
	</div>
</body>
</html>