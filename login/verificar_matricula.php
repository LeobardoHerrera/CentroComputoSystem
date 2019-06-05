<?php
//se manda llamar la conexion
include("../conexion/conexion.php");

$matricula = $_POST["clave"];

$fecha=date("Y-m-d"); 
$hora=date ("H:i:s");

mysql_query("SET NAMES utf8");
    //Consulta para verificar que la matricula exista
$consultaMatricula = mysql_query("SELECT
                                    id_alumno,
                                    id_persona,
                                  (SELECT personas.nombre FROM personas WHERE personas.id_persona=alumnos.id_persona) AS nPersona,
                                    (SELECT personas.ap_paterno FROM personas WHERE personas.id_persona=alumnos.id_persona) AS pPersona,
                                    (SELECT personas.ap_materno FROM personas WHERE personas.id_persona=alumnos.id_persona) AS mPersona,
                                    id_carrera,
                                  (SELECT carreras.nombre FROM carreras WHERE carreras.id_carrera=alumnos.id_carrera) AS nCarrera,
                                    no_control,
                                     (SELECT personas.sexo FROM personas WHERE personas.id_persona=alumnos.id_persona) AS Sexo
                                FROM
                                    alumnos
                                WHERE
                                    no_control = '$matricula' AND activo = '1'",$conexion)or die(mysql_error());
    $row=mysql_fetch_row($consultaMatricula);
    $contador=mysql_num_rows($consultaMatricula);

//Variables
  $idAlumno  =$row[0];
  $idPersona =$row[1];
  $nPersona  =$row[2];
  $pPersona  =$row[3];
  $mPersona  =$row[4];
  $idCarrera =$row[5];
  $nCarrera  =$row[6];
  $sexo      =$row[8];
  $nControl=$row[7];

  if ($contador!=0){
     /*CHECA SI TIENE REGRISTRO DE HOY Y SI TIENE FECHA_SALIDA NULO*/
     $consultaSalidaNula = mysql_query("SELECT
                        registros.id_registro,
                        registros.id_alumno,
                        registros.id_persona,
                        registros.no_control,
                        registros.fecha_ingreso,
                        registros.hora_ingreso,
                        registros.fecha_salida,
                        registros.hora_salida
                    FROM
                        registros
                    WHERE
                        no_control = '$matricula'
                    AND fecha_ingreso = '$fecha' AND hora_salida is NULL",$conexion)or die(mysql_error());
        $rowSalidasNulas=mysql_fetch_row($consultaSalidaNula);
        $contadorSalidasNulas=mysql_num_rows($consultaSalidaNula);
        $idRegistro=$rowSalidasNulas[0];
        /*SI ENCUENTRA SALIDAS NULAS*/
        if ($contadorSalidasNulas!=0) {
           $update = mysql_query("UPDATE registros SET
                            fecha_salida='$fecha',
                            hora_salida='$hora'
                        WHERE id_registro='$idRegistro'
                             ",$conexion)or die(mysql_error());
           /*REGISTRAMOS LA MODIFICACION EN LA TABLA DE MOVIMIENTOS*/
           $registrarSalida= mysql_query("INSERT INTO movimientos 
                                (
                                id_alumno,
                                id_persona,
                                no_control,
                                id_carrera,
                                fecha_movimiento,
                                hora_movimiento,
                                tipo
                                )
                            VALUES
                                (
                                '$idAlumno',
                                '$idPersona',
                                '$matricula',
                                '$idCarrera',
                                '$fecha',
                                '$hora',
                                'Salida'
                                )
                            ",$conexion)or die(mysql_error());
           // *******************************************
           $var1="Salida";
           $mje="Se ha registrado una salida";
        }else{ 
            /*SI NO ENCUENTRA SALIDAS NULAS*/
            $insertar= mysql_query("INSERT INTO registros 
                                (
                                id_alumno,
                                id_persona,
                                no_control,
                                fecha_ingreso,
                                hora_ingreso
                                )
                            VALUES
                                (
                                '$idAlumno',
                                '$idPersona',
                                '$matricula',
                                '$fecha',
                                '$hora'
                                )
                            ",$conexion)or die(mysql_error());
            /*REGISTRAR LA ACCION REALIZADA EN LA TABLA MOVIMIENTOS*/
            $registrarEntrada= mysql_query("INSERT INTO movimientos
                                (
                                id_alumno,
                                id_persona,
                                no_control,
                                id_carrera,
                                fecha_movimiento,
                                hora_movimiento,
                                tipo
                                )
                            VALUES
                                (
                                '$idAlumno',
                                '$idPersona',
                                '$matricula',
                                '$idCarrera',
                                '$fecha',
                                '$hora',
                                'Entrada'
                                )
                            ",$conexion)or die(mysql_error());
            /*****************************/
            $var1="Entrada";
            $mje="Se ha registrado una entrada";
        }
             
         // $contador=1;
  }else{
     $contador=0;
  }
$nombre=$row[2]." ".$row[3]." ".$row[4];

$foto ='../images/'.$nControl.'.jpg';
 if (file_exists($foto)){
        $varRuta="1";
             // $("#img").attr("src","../images/"+$nControl+".jpg"); 
       }
      else{
        $varRuta="2";
          // if (sexo=='M') {
          //     $("#img").attr("src","../images/hombre.jpg");
          // }else{
          //     $("#img").attr("src","../images/mujer.jpg");
          // }
      }

echo "$var1,$mje,$nombre,$nCarrera,$sexo,$varRuta";
       
?>
