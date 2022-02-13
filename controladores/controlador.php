<?php
include_once('../modelos/modelos.php');
function procesar($operacion, $parametros){
	switch ($operacion) {
		case 'insertar':
			if(is_array($parametros)){
				//validaciones
				//nombre
				$listaerrores = array();
				$errores = false;
				$patron = "/^([A-Z]{1}[a-z]+\s?)+$/";
				if(!preg_match($patron, $parametros["name"])){
					$errores = true;
					$listaerrores[] = "Solo se permite nombres correctos";

				}
				//edad
				$patron="/^([0-9]){2}$/";
				if(!preg_match($patron, $parametros["age"])){
					$errores = true;
					$listaerrores[] = "Solo se permite la edad en numeros";
				}
				//carnet
				$patron="/^([A-Z]{2}[0-9]{6})$/";
				if(!preg_match($patron, $parametros["cnet"])){
					$errores = true;
					$listaerrores[] = "Debe ser formato AA123456";
				}
				$patron="/^(\w+)$/";
				if(!preg_match($patron, $parametros["career"])){
					$errores = true;
					$listaerrores[] = "Solo se permite letras";

				}
				if(!$errores)
				{
				$db = conectar();
				if(insertar($db, $parametros["name"], $parametros['age'], $parametros['cnet'], $parametros['career']) > 0){
					header("Location: http://localhost/LIS/investigacion-LIS/investigacion-LIS/vistas/Ingresar.php");
				}	
				}else{
					session_start();
					$_SESSION['listaerrores'] = $listaerrores;
					header("Location: http://localhost/LIS/investigacion-LIS/investigacion-LIS/vistas/Ingresar.php");
				}
				
			}
			break;
		
		default:
			// code...
			break;
	}
}
if(isset($_POST['operacion'])){
	procesar($_POST['operacion'], $_POST);
}
if(isset($_GET['operacion'])){
	procesar($_GET['operacion'], $_GET);
}
?>