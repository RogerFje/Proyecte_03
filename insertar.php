
<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';	

	$usuario = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

?>
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

			//como la sentencia SIEMPRE va a buscar todos los registros de la tabla producto, pongo en la variable $sql esa parte de la sentencia que SI o SI, va a contener
			$sql = "SELECT * FROM usuario ORDER BY id_user ASC";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql
			$datos = mysqli_query($con, $sql);
			?>
			<div class="containermod" style="margin-top:10px">
					<div class="contenmod">
		<form action="insertar.proc.php" method="GET">
			Nombre:
			<input type="text" name="nom" size="20" maxlength="25">
			Contraseña:
        	<input type="password" name="pass" class="form-input" required/>
			rol:
			<select name="rol">
 			 <option value="0">user normal</option>
 			 <option value="1">admin</option>
			</select>

			imagen:

			<input type="text" name="img" size="5" maxlength="8">
			
		    <br/><br/>
			<input type="submit" value="Enviar">
		</form>
			<div class="btn btn-primary">
				<a href="usuarios.php">Volver</a>
			</div>
			</div>
			</div>
		<br/><br/>
		
	</body>
	<?php  
	include 'footer.php';
?>
</html>