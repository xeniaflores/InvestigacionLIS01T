<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>Formulario</title>
	
</head>
<link rel="stylesheet" type="text/css" href="../estilos.css">
<body>
	<div class="contenedor">
		
		<form method="post" action="../controladores/controlador.php" class="form">
			<div class="form-header">
				<h1 class="form-title"><span>Ingreso de datos</span></h1>
			</div>
			<input type="hidden" name="operacion" value="insertar">
			<label for="nombre" class="form-label">Nombre:</label>
			<input type="text" id="nombre" class="form-input" placeholder="Escriba su nombre" name="name">
			<label for="edad" class="form-label">Edad:</label>
			<input type="text" id="edad" class="form-input" placeholder="Escriba su edad" name="age">
			<label for="carnet" class="form-label">Carnet:</label>
			<input type="text" id="carnet" class="form-input" placeholder="Escriba su carnet" name="cnet">
			<label for="carrera" class="form-label">Carrera:</label>
			<input type="text" id="carrera" class="form-input" placeholder="Escriba su carrera" name="career">

		
			<input type="submit" class="btn-submit" value="enviar" name="submit">
		
		</form>
	</div>

		<?php
		session_start();
		if(isset($_SESSION['listaerrores']))
		{
			if(is_array($_SESSION['listaerrores'])){
				$texto = "<div class=\"contenedor2\"><ul class=\"advertencia\">";
				foreach ($_SESSION['listaerrores'] as $value) {
					$texto.= "<li> $value </li>";	
				}
				$texto.= "</ul></div>";
				echo $texto;
			}
		}
		session_destroy();
		?>
</body>
</html>

