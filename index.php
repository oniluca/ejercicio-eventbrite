<?php 
	session_start();
	include_once("controlador/controlador.php");
	include_once("controlador/enrutador.php");

 ?>

<!DOCTYPE html>
<html>
<head>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script type="text/javascript" src="js/bootstrap.min.js"></script>
		<script type="text/javascript" src="js/jquery.min.js"></script>
	
	<title>Adivina Adivinador!!</title>
</head>
<body>
	<div class="container">
		<h1>Adivina Adivinador!!</h1>
		<div id="navbarCollapse" class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li><a href="?cargar=adivinar" title="">ADIVINAR</a></li>
				<li><a href="?cargar=pensar" title="">PENSAR</a></li>
			</ul>
		</div>
	</div>
	
	<section>

	 <?php
		$enrutador= new Enrutador();
		if($enrutador->validarGet(isset($_GET["cargar"]))){
			$enrutador->cargarVista($_GET["cargar"]);
		}
	?>

	</section>

</body>
</html>