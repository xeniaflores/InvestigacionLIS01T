<?php
//Datos de conexión
define("DBHOST", "localhost");
define("DBUSER", "root");
define("DBPASS", "");
define("DBDATA", "estudiantes");
$db;

function conectar(){
    //Creando el objeto de conexión a la base de datos con MySQLi
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATA);
//Verificar que la conexión se ha realizado o terminar 
//el programa o secuencia de comando si no ha sido así
if($db->connect_errno){
    die("No se ha podido conectar a MySQL: (" . $db->connect_errno . ")" . $db->connect_error);
}
//Establecer el conjunto de caracteres
$db->set_charset("utf8");
return $db;
}

function insertar($db, $nombre, $edad, $carnet, $carrera){
   // $e = intval($edad);
    $consulta = "insert into estudiante (nombre,edad,carnet,carrera) values ('".$nombre."','".$edad."','".$carnet."','".$carrera."')";
  /*  $s = $db->prepare($consulta);
    $s->bind_param($nombre, $edad, $carnet, $carrera);
    $s->execute();
    $fila = $s->affected_rows;

    return $fila;*/
    $resultc = $db->query($consulta);
  if($resultc){
     return $db->affected_rows . " libro agregado a la base de datos.";
  } 
}



?>