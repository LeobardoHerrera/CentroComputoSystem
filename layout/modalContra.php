<div id="modalEditarContra" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-md">

	    <!-- Modal content-->
	    <form id="frmEditarContra">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h4 class="modal-title">Cambiar mi contraseña</h4>
	      </div>
	      <div class="modal-body">
				<input type="hidden" id="idC" value="<?php echo $idC;?>">
				<div class="row">
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="contraC">Nueva Contraseña:</label>
							<input type="password" id="contraC" class="form-control" required="" placeholder="Escribe la contraseña" autofocus="">
						</div>
					</div>
					<div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
						<div class="form-group">
							<label for="vContraC">Verificar Nueva Contraseña:</label>
							<input type="password" id="vContraC" class="form-control" required="" placeholder="Vuelve a esrcribir la contraseña">
						</div>
					</div>
					<hr class="linea">
				</div>
	      </div>
	      <div class="modal-footer">
				<div class="row">
					<div class="col-lg-12">
						<button type="button" id="btnCerrarC" class="btn btn-login  btn-flat  pull-left" data-dismiss="modal">Cerrar</button>
						<button type="button" id="btnMostrarC" class="btn btn-login  btn-flat  pull-left" onclick="mostrarContraCambio()" value="oculto">
						<i class="far fa-eye fa-lg" id="icoMostrarC"></i>
						</button>
						<input type="submit" class="btn btn-login  btn-flat  pull-right" value="Actualizar Información">	
					</div>
				</div>
	      </div>
	    </div>
		</form>
	  </div>
	</div>
	<!-- Modal -->