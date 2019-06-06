<?php
$fecha1=date("Y-m-d");
$fecha2=date("Y-m-d");

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sistema de Registros de Alumnos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<!-- Estilos para la tabla -->
	<!-- DataTableButtons -->
     <link rel="stylesheet" href="../plugins/dataTableButtons/buttons.dataTables.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">

    <!-- bootstrap-toggle-master -->
    <link href="../plugins/bootstrap-toggle-master/css/bootstrap-toggle.css" rel="stylesheet">
    <link href="../plugins/bootstrap-toggle-master/stylesheet.css" rel="stylesheet">
	

	<!-- Alertify	 -->
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/themes/bootstrap.css">
</head>
<body>
	<header>
		<?php 
			include('../layout/encabezado.php');
			include('../layout/modalContra.php');
		 ?>
	</header><!-- /header -->	
	<div class="container-fluid" >
		<div class="row" id="cuerpo" style="display:none">
			<div class="col-xs-0 col-sm-3 col-md-2 col-lg-2 vertical">
			<?php 
				include('../layout/menuv.php');
			 ?>
			</div>
			<div class="col-xs-12 col-sm-9 col-md-10 col-lg-10 cont">
				<div class="titulo borde sombra">
			        <h3 align="center">Listado de Registros</h3>
			   </div>
				<div class="contenido borde sombra">
				    <div class="container-fluid">
				    	<button type="submit" class="btn btn-login  btn-flat  pull-left" id="btnVerRegistro" onclick="verUltimoAcceso();" value="activado">
							<i class="far fa-address-card"></i>
							Ver Ùltimo Registro
						</button>
						<button type="submit" class="btn btn-login  btn-flat  pull-left" id="btnOcultarRegistro" onclick="ocultarUltimoAcceso();" value="desactivado" style="display: none;">
							<i class="far fa-address-card"></i>
							Ocultar Ùltimo Registro
						</button>
				    	<section id="ultimoRegistro" style="margin-top: 45px; display: none;">
				    		<div class="row borde ultimoacceso " id="ult">
				    			<p><h3 class="colorLetra" align="center">Último registro del sistema</h3></p>
				    			<hr>
				    			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
									<div class="form-group">
										<img src="../img/logo.JPG" alt="FOTOGRAFIA" width="160px;" height="180px" class="borde pull-right" id="imgUA">
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
									<div class="form-group">
										<label for="nombre" class="colorLetra">Nombre:</label>
										<div class="form-group has-feedback">
											<input type="text" id="nombre" class="form-control" placeholder="Nombre" disabled="">
											<span class="glyphicon glyphicon-user form-control-feedback"></span>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
									<div class="form-group">
										<label for="nombre" class="colorLetra">Número de control:</label>
										<div class="form-group has-feedback">
											<input type="text" id="matricula" class="form-control" placeholder="Nombre" disabled="">
											<span class="glyphicon glyphicon-user form-control-feedback"></span>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
									<div class="form-group">
										<label for="carrera" class="colorLetra">Carrera:</label>
										<div class="form-group has-feedback">
											<input type="text" id="carrera" class="form-control" placeholder="Carrera" disabled="">
											<span class="glyphicon glyphicon-book form-control-feedback"></span>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
									<div class="form-group">
										 <label class="colorLetra">Mensaje:</label>
						                <textarea class="form-control" id="descripcion" placeholder="Mensaje para el usuario" disabled=""></textarea>
									</div>
								</div>
				    			
				    		</div>
				    	</section>
				        <section id="fechas" style="margin-top: 60px;">
            				<!-- <form id="frmAlta"> -->

								<div class="row">

									<div class="form-group">

										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5">
											<br>
											
											<label class="colorLetra">Seleccione las fechas:</label>
											<input type="date" id="fecha1" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo $fecha1;?>" onchange="llenar_lista();">
										</div>
									</div>
									<div class="form-group">
										<div class="col-xs-12 col-sm-12 col-md-12 col-lg-5" style="margin-top:30px;">
											<input type="date" id="fecha2" class="form-control" placeholder="yyyy-mm-dd" value="<?php echo $fecha2;?>" onchange="llenar_lista();">
										</div>
									</div>
								</div>
							<!-- </form> -->
						</section>
						<br>
					 	<section id="lista">
		            
					    </section>
					</div>
				</div>
			</div>
				 	
		</div>
	</div>	
	<footer class="fondo">
		<?php 
			include('../layout/pie.php');
		 ?>			

	</footer>

	<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<!-- Preloaders -->
    <script src="../plugins/Preloaders/jquery.preloaders.js"></script>
	
	
	<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>

	<!-- Js para la Tabla -->
	<!-- DataTables -->
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- bootstrap-toggle-master -->
    <script src="../plugins/bootstrap-toggle-master/doc/script.js"></script>
    <script src="../plugins/bootstrap-toggle-master/js/bootstrap-toggle.js"></script>

     <!-- dataTableButtons -->
    <script type="text/javascript" src="../plugins/dataTableButtons/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.flash.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.colVis.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/jszip.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/pdfmake.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/vfs_fonts.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.html5.min.js"></script>
    <script type="text/javascript" src="../plugins/dataTableButtons/buttons.print.min.js"></script>
<!-- funciones propias -->
    <script src="funciones.js"></script>
	<script src="../js/menu.js"></script>
	<script src="../js/precarga.js"></script>
	<script src="../js/salir.js"></script>
	<script src="../js/funcionesCambioContra.js"></script>
	<!-- alertify -->
	<script type="text/javascript" src="../plugins/alertifyjs/alertify.js"></script>
	<script>
		window.onload = function() {
			$("#cuerpo").fadeIn("slow");
			ultimoRegistro();
		};	
	</script>
	
	<!-- Llamar la funcion para llenar la lista -->
	<script type="text/javascript">
		llenar_lista();
	</script>
</body>
</html>