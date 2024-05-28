<h2>Lista de productos</h2>
<br>
<div class ="table-responsive">
	<table id="tblProducto_simple" class="table table-striped table-bordered" width="100%">
		<thead>
	    <tr>
	        <th></th>
	        <th>Producto</th>
	    </tr>
	   	</thead>
	</table>
</div>

<div class="modal fade" id="myFrmProducto_simple" role="dialog" data-backdrop="static" data-keyboard="false">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="Titulo">
					Salida de producto
				</h4>
			</div>

			<form id="frmProducto_simple" name="frmProducto_simple" method="POST" onsubmit="return salidaProducto();">
					<div class="modal-body">
							<div class="row">
								<div class="col-md-6">
									<label>Nombre:</label>
									<input type="text" id="nombre" class="form-control" readonly/>
								</div>
								<div class="col-md-6">
									<label>Salida de producto: </label>
									<input type="number" name="salida" id="salida" min="0" required="required" value="0" class="form-control" />
								</div>
								<input type="hidden" name="modo" id="modo" value="4">
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
