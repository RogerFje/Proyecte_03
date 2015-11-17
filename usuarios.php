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
	    <!-- full d'estils per a fer servir fonts d'icons -->
	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
	    <style>
	    	a {color: blue;}
	    </style>
	</head>
	<body>
		<?php
			
			//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			$sql = "SELECT usuario.* FROM usuario ORDER BY id_user ASC";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);

			?>
			<table border>
				<tr>					

					<th>user_id</th>
				
					<th>Nombre</th>

				</tr>

				<?php

				//recorremos los resultados y los mostramos por pantalla
				//la función substr devuelve parte de una cadena. A partir del segundo parámetro (aquí 0) devuelve tantos carácteres como el tercer parámetro (aquí 25)
				while ($usuario = mysqli_fetch_array($datos)){
					
					echo "<td>" . substr($usuario['id_user'], 0, 25) . "</td>";
					echo "<td>";
					echo "<a href='ver.php?id=$usuario[id_user]'>$usuario[nom]</a>";
					if(file_exists($fichero)&&(($user_id) != '')){
                  	echo "<div class='perfil'><img src='$fichero' width='50' heigth='50' ></div>";
                	}
               		 else{
                 	 echo "<div class='perfil'><img src ='img/no_disponible.jpg'width='50' heigth='50'/></div>";
               		 }
				
  					$fichero="img/$user_id".".jpg";

	
					echo "</td></tr>";
				}

				?>

			</table>

			<a href="insertar.php"><i class='fa fa-plus-square fa-2x fa-pull-left fa-border'></i></a>

				<?php
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
	</body>

<?php  
	include 'footer.php';
?>
</html>