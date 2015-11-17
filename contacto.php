<?php
	include_once 'conexion.php';
	include_once 'header.php';	

	$nomUsuari = $_SESSION['nom'];
	$user_id = $_SESSION['id_user'];

?>
<div class="container" style="margin-top:10px">
<div class="map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3072.8515973170165!2d2.166942515347145!3d41.398166612244644!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a4a2ebd3ad1b97%3A0xe207a06d6398ccdd!2sCentro+Estudios+Adams+Barna+S+A!5e1!3m2!1ses!2ses!4v1447668221683" width="800" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
</div></div>
<?php  
	include 'footer.php';
?>