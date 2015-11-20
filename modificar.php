<!DOCTYPE html>
<?php
	include_once 'conexion.php';
	include_once 'header_admin.php';	

	$usuario = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

?>
<html>
	<head>
		<meta charset="utf-8"/>
		<title>Ejemplo de formularios con datos en BD</title>
	</head>
	<style type="text/css">
	textarea {
  width: auto !important;
  margin:0 auto;
}
</style>
	<body>
		<?php
			//realizamos la conexión con mysql
			$con = mysqli_connect('localhost', 'root', '', 'club_estudio');

			//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
			$sql = "SELECT * FROM usuario WHERE id_user=$_REQUEST[id]";

			//mostramos la consulta para ver por pantalla si es lo que esperábamos o no
			//echo "$sql<br/>";

			//lanzamos la sentencia sql que devuelve el producto en cuestión
			$datos = mysqli_query($con, $sql);
			if(mysqli_num_rows($datos)>0){
				$usuario=mysqli_fetch_array($datos);
				?>
				<div class="containermod" style="margin-top:10px">
					<div class="contenmod">
				<form name="formulario1" action="modificar.proc.php" method="get">
				<input type="hidden" name="id" value="<?php echo $usuario['id_user']; ?>">
				Nombre:
				<input type="text" name="nom" size="20" maxlength="25" value="<?php echo $usuario['nom']; ?>">
				Contraseña:
				<input type="password" name="pass" value="<?php echo $usuario['pass']; ?>">
				imagen:
				<input type="text" name="img" size="5" maxlength="8" value="<?php echo $usuario['img']; ?>">
				rol:
			<select name="rol">
				<?php
					//esta consulta devuelve todos los datos del producto cuyo campo clave (pro_id) es igual a la id que nos llega por la barra de direcciones
					$sql = "SELECT * FROM usuario ORDER BY rol";
					//lanzamos la sentencia sql que devuelve todos los tipos de producto
					$rol = mysqli_query($con, $sql);

					while ($rol=mysqli_fetch_array($rol)){
						
						if($usuario['rol']==1){
							echo "<option value='1'>admin</option>";
							echo "<option value='0'>user normal</option>";
						}
						if($usuario['rol']==0){
							echo "<option value='0'>user normal</option>";
							echo "<option value='1'>admin</option>";
						}
						
 			 		
					}

				?>
				</select><br/><br/>
				<input type="submit" value="Guardar">
				</form>
				<div class="btn btn-primary">
				<a href="usuarios.php">Volver</a>
			</div>
			</div>
			</div>
			

				<?php
			} else {
				echo "Producto con id=$_REQUEST[id] no encontrado!";
			}
			//cerramos la conexión con la base de datos
			mysqli_close($con);
		?>
		<br/><br/>
		
	</body>
		<?php  
	include 'footer.php';
?>
</html>