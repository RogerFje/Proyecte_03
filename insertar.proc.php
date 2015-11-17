<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'club_estudio');
			$sql = "INSERT INTO usuario (nom, pass, rol, img) VALUES ('$_REQUEST[nom]', '$_REQUEST[pass]', $_REQUEST[rol], $_REQUEST[img])";

			//echo $sql;

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			header("location: usuarios.php")
		?>
	</body>
</html>