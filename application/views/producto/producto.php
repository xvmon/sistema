<h2>Lista de productos</h2>
<br>
<div class ="table-responsive">
	<table id="tblProducto" class="table table-striped table-bordered" width="100%">
		<thead>
	    <tr>
	        <th>Nombre</th>
			<th>Cantidad</th>
	        <th>Estatus</th>
	        <th></th>
	    </tr>
	   	</thead>
	</table>
</div>

<div class="modal fade" id="myFrmProducto" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="Titulo">
					Producto - <b id="proceso">Nuevo</b>
				</h4>
			</div>

			<form id="frmProducto" name="frmProducto" method="POST" onsubmit="return productoABC();">
					<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<label>Nombre:</label>
									<input type="text" name="nombre" id="nombre" required="required" class="form-control" />
								</div>
								<div class="col-md-6">
									<label>Cantidad: </label>
									<input type="number" name="cantidad" id="cantidad" min="0" required="required" value="0" class="form-control" />
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
