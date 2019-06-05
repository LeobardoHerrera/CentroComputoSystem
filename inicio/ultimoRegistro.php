<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
    //Consulta para ver que registro es el ultimo
$consulta = mysql_query("SELECT
						 movimientos.id_alumno,
						 movimientos.id_carrera,
						 movimientos.id_persona,
						 (SELECT personas.nombre FROM personas WHERE personas.id_persona= movimientos.id_persona) AS nPersona,
						 (SELECT personas.ap_paterno FROM personas WHERE personas.id_persona=movimientos.id_persona) AS pPersona,
						 (SELECT personas.ap_materno FROM personas WHERE personas.id_persona=movimientos.id_persona) AS mPersona,
						 (SELECT carreras.nombre FROM carreras WHERE carreras.id_carrera=movimientos.id_carrera) AS Carrera,
						 movimientos.no_control,
						 movimientos.fecha_movimiento,
						 movimientos.hora_movimiento,
						 movimientos.tipo
						from movimientos
						INNER JOIN alumnos on movimientos.id_alumno=alumnos.id_alumno
						INNER JOIN carreras on movimientos.id_carrera=carreras.id_carrera
						WHERE
						fecha_movimiento = '$fecha'
						ORDER BY id_movimiento DESC
						LIMIT 1",$conexion)or die(mysql_error());
    $row=mysql_fetch_row($consulta);
    $contador=mysql_num_rows($consulta);

    /*Variables para pasar datos a las cajas de texto*/
	$nombre   =$row[3]." ".$row[4]." ".$row[5];
	$nCarrera =$row[6];
	$nControl =$row[7];
	$tipo     =$row[10];


    if ($contador!=0) {
    	/*CHECA CUAL ES EL TIPO DE MOVIMIENTO*/
    	if ($tipo=="Salida") {
    		$descripcion="El alumno registro una Salida";
    	}
    	else{
			$descripcion="El alumno registro una Entrada";
    	}
    }else{
		
    	$contador=0;
    }

   echo "$nControl,$nombre,$nCarrera,$descripcion";
?>