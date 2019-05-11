<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$idPersona = $_POST["idPersona"];
$usuario   = $_POST["usuario"];
$contra    = $_POST["contra"];
$contraMD5=md5($contra);

$idPersona = trim($idPersona);
$usuario   = trim($usuario);
// $contra    = trim($contra);
$pVez=1;

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
 $insertar = mysql_query("INSERT INTO usuarios 
 								(
 								id_persona,
 								usuario,
 								contra,
 								id_registro,
 								pvez,
 								fecha_registro,
 								hora_registro,
 								activo
 								)
							VALUES
								(
 								'$idPersona',
 								'$usuario',
 								'$contraMD5',
 								'1',
 								'$pVez',
 								'$fecha',
 								'$hora',
 								'1'
								)
							",$conexion)or die(mysql_error());

?>