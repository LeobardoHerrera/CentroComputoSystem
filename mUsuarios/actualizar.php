<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$usuario = $_POST["usuario"];
// $contra  = $_POST["contra"];

// $contraMD5=md5($contra);

$ide     = $_POST["ide"];

$usuario = trim($usuario);
// $contra  = trim($contra);
$pVez=0;

$fecha   = date("Y-m-d"); 
$hora    = date ("H:i:s");

mysql_query("SET NAMES utf8");
$consulta = mysql_query("SELECT * from usuarios 
						where usuario='$usuario'",$conexion)or die(mysql_error());
$row=mysql_fetch_row($consulta);
    $contador=mysql_num_rows($consulta);
    if($contador>0){
        $contador=1;
    }else{
    	$insertar = mysql_query("UPDATE usuarios SET
							usuario='$usuario',
							pvez='$pVez',
							fecha_registro='$fecha',
							hora_registro='$hora',
							id_registro='1'
						WHERE id_usuario='$ide'
							 ",$conexion)or die(mysql_error());
        $contador=0;
    }
    echo $contador;
?>