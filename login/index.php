<?php
 $idC=$_SESSION["idUsuario"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" type="text/css" href="../plugins/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="../plugins/fontawesome-free-5.8.1-web/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<!-- Alertify	 -->
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="../plugins/alertifyjs/css/themes/bootstrap.css">

	    <!-- bootstrap-toggle-master -->
			<link href="../plugins/bootstrap-toggle-master/css/bootstrap-toggle.css" rel="stylesheet">
    <link href="../plugins/bootstrap-toggle-master/stylesheet.css" rel="stylesheet">
</head>
<body class="login">
	<div class="container" style="display:none" id="cuerpo">
		<div class="row justify-content-md-center">
			<div class="col-md-auto login-box borde sombra">
				<h3 class="text-center titulo">Iniciar Sesión</h3>
				<hr>
				<form id="frmIngreso">
					<div class="form-row">
						<div class="col-md-12">
							<label for="" class="colorLetra">Nombre de usuario:</label>
					          <div class="form-group has-feedback salto">
					            <input type="text" id="username" placeholder="Usuario" class="form-control " autofocus>
					            <span class="glyphicon glyphicon-user form-control-feedback"></span>
					          </div>
						</div>
						<div class="col-md-12">
							<label for="" class="colorLetra">Contraseña:</label>
					          <div class="form-group has-feedback salto">
					            <input type="password" id="pass" placeholder="Usuario" class="form-control " >
					            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					          </div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<button type="button" id="btnLista" class="btn btn-login  btn-flat  pull-left" onclick="registros();">Registros <i class="far fa-clipboard"></i></button>
								<p align="center">
									<input id="chkContra"  onchange='evaluarCheck(this.value)' data-on="Si" data-off="No" type="checkbox" checked data-toggle="toggle" data-size="mini" value='no'><label class="colorLetra"> &nbsp; Cambiar Contraseña</label>
									<button type="submit" class="btn btn-login  btn-flat  pull-right" id="btnIngresar">
									<i class="fas fa-lock-open"></i>
									Ingresar
									</button>
		              			</p>
	              			</div>
	            		</div><!-- /.col -->
					</div>
				</form>
			</div>			
		</div>
	</div>

	<div class="container" style="display:none" id="cambiarContra">
		<div class="row justify-content-md-center">
			<div class="col-md-auto login-box borde sombra">
				<h3 class="text-center titulo">Cambiar Contraseña</h3>
				<hr>
				<form id="frmCambiar">
					<div class="form-row">
						<div class="col-md-12">
							<input type="hidden" id="usuario" class="form-control">
						<div class="col-md-12">
							<label for="" class="colorLetra">Contraseña:</label>
					          <div class="form-group has-feedback salto">
					            <input type="password" id="vContra1"  class="form-control " >
					            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					          </div>
						</div>
						<div class="col-md-12">
							<label for="" class="colorLetra">Verificar Contraseña:</label>
					          <div class="form-group has-feedback salto">
					            <input type="password" id="vContra2"  class="form-control " >
					            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
					          </div>
						</div>
					</div>
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-12">
								<button type="button" class="btn btn-login  btn-flat  pull-left" id="btnCancelar" onclick="cancelar()">
			              			<i class="fas fa-times"></i>
			              			Cancelar
		              			</button>
		              			<button type="submit" class="btn btn-login  btn-flat  pull-right" id="btnActualizar">
			              			<i class="fas fa-sync-alt"></i>
			              			Actualizar
		              			</button>
	              			</div>
	            		</div>
					</div>
				</div>
				</form>
			</div>			
		</div>
	</div>
	<div class="container" style="display: none;" id="registros">
		<div class="row justify-content-md-center">
			<div class="contenido borde sombra">
				<h3 class="text-center titulo">Registro de Alumnos <a><img src="../img/btnSalir.png" alt="Salir" width="45px" height="45px" class="pull-right" onclick="salir();" id="img1"></a></h3>

				<hr>
				<div class="container-fluid">
					<section>
						<form id="frmRegistros">
							<!-- <div class="col-md-12"> -->
								<div class="col-xs-12 col-sm-8 col-md-9 col-lg-9">
									<div class="form-group">
										<br>
										<br>
										<div class="contenedor2 salto">
											<h1 id="span">Ingresa tu clave. .<span>&#160;</span></h1>
										</div>
										<label for="clave" class="colorLetra">Clave:</label>
										<div class="form-group has-feedback">
											<input type="text" id="clave"  class="form-control" autofocus="" >
											<span class="glyphicon glyphicon-credit-card form-control-feedback">
											</span>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
									<div class="form-group">
										<img src="../images/logo.jpg" alt="FOTOGRAFIA" width="180px;" height="200px" class="borde pull-right" id="img">
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="nombre" class="colorLetra">Nombre:</label>
										<div class="form-group has-feedback">
											<input type="text" id="nombre" class="form-control" placeholder="Nombre" disabled="">
											<span class="glyphicon glyphicon-user form-control-feedback"></span>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="carrera" class="colorLetra">Carrera:</label>
										<div class="form-group has-feedback">
											<input type="text" id="carrera" class="form-control" placeholder="Carrera" disabled="">
											<span class="glyphicon glyphicon-book form-control-feedback"></span>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="mensaje" class="colorLetra">Entrada/Salida:</label>
										<div class="form-group has-feedback">
											<input type="text" id="mensaje" class="form-control" placeholder="Entrada/Salida" disabled="" >
											<span class="glyphicon glyphicon-check form-control-feedback"></span>
										</div>
									</div>
								</div>
								<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										 <label class="colorLetra">Mensaje:</label>
						                <textarea class="form-control" id="descripcion" placeholder="Mensaje para el usuario" disabled=""></textarea>
									</div>
								</div>
								<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
									<div class="form-group">
										<div id="laFechaR"></div>
										<div id="infoR"></div>
									</div>
								</div>
						</form>
					</section>
				</div>

			</div>
		</div>
	</div>

	<audio src="" hidden class=speech></audio> 
	<!-- SCRIPTS -->
	
	<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
	<script src="../plugins/bootstrap/js/bootstrap.min.js"></script>
	<script src="../plugins/Preloaders/jquery.preloaders.js"></script>

	<!-- alertify -->
	<script type="text/javascript" src="../plugins/alertifyjs/alertify.js"></script>
	<!-- bootstrap-toggle-master -->
	<script src="../plugins/bootstrap-toggle-master/doc/script.js"></script>
    <script src="../plugins/bootstrap-toggle-master/js/bootstrap-toggle.js"></script>
    <!-- Funciones propias -->
    <script src="funciones.js"></script>
    <script src="../js/menu.js"></script>
    <script src="../js/precarga.js"></script>
	<!-- Script Sonido -->
	<script type="text/javascript" src="../plugins/voice/responsivevoice.js"></script>

	<script>
		window.onload = function() {
			$("#cuerpo").fadeIn("slow");
			$("#username").focus();
		};	
		$('#chkContra').bootstrapToggle('off');
		$('#chkContra').val('no');
	</script>


</body>
</html>