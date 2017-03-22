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