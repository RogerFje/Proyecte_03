<!DOCTYPE html>
<?php
	include_once 'conexion.php';
	include_once 'header.php';	

	$usuario = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'club_estudio');
			$sql = "UPDATE usuario SET nom='$_REQUEST[nom]', pass='$_REQUEST[pass]', rol=$_REQUEST[rol], img=$_REQUEST[img] WHERE id_user=$_REQUEST[id]";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: usuarios.php")
		?>
	</body>
		<?php  
	include 'footer.php';
?>
</html>