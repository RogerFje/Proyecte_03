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

			//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
			$sql = "SELECT usuario.* FROM usuario WHERE id_user=$_REQUEST[id]";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				?>
				<table border>
					<tr>
						<th>Nom</th>
						
					</tr>

					<?php

					//recorremos los resultados y los mostramos por pantalla
					//la función substr devuelve parte de una cadena. A partir del segundo parámetro (aquí 0) devuelve tantos carácteres como el tercer parámetro (aquí 25)
					while ($usuario = mysqli_fetch_array($datos)){
						echo "<tr><td>$usuario[nom]</td><td>
						";
						if(file_exists($fichero)&&(($user_id) != '')){
                  	echo "<div class='perfil'><img src='$fichero' width='50' heigth='50' ></div></tr>";
                	}
               		 else{
                 	 echo "<div class='perfil'><img src ='img/no_disponible.jpg'width='50' heigth='50'/></div></tr>";
               		 }
					}

					?>

				</table>

					<?php
			} else {
				echo "Usuario con id=$_REQUEST[id] no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
		<a href="usuarios.php">Volver</a>
	</body>
	<?php  
	include 'footer.php';
?>
</html>