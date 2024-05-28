<h2>Lista de usuarios</h2>
<br>
<div class ="table-responsive">
	<table id="tblUsuario" class="table table-striped table-bordered" width="100%">
		<thead>
	    <tr>
	        <th>Usuario</th>
	        <th>Estatus</th>
	        <th>Acciones</th>
	    </tr>
	   	</thead>
	</table>
</div>

<div class="modal fade" id="myFrmUsuario" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="Titulo">
					Usuario - <b id="proceso">Nuevo</b>
				</h4>
			</div>

			<form id="frmUsuario" name="frmUsuario"	method="POST" onsubmit="return usuarioABC();">
					<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<label>Usuario:</label>
									<input type="text" name="usuario" id="usuario" required="required" value="" class="form-control" maxlength="15"/>
								</div>
								<div class="col-md-6">
									<label>Contraseña: </label>
									<input type="password" name="contrasenia" id="contrasenia" value="" class="form-control" maxlength="10"/>
								</div>
								<input type="hidden" name="modo" id="modo" value="1">
								<input type="hidden" name="id" id="id" value="0">
							</div>
					</div>

				<div class="modal-footer">
					<button class="btn gray" type="submit">Aceptar</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
				</div>
			</form>

		</div>
	</div>
</div>
