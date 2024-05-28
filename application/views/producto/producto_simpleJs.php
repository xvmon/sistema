<script type="text/javascript">
function Listar(){
	$.ajax({
        url: '<?=base_url()?>index.php/Productos/getProductos/',
        method: 'POST',
        dataType: 'json',
        data:{
            id: null
        },
        success:function(data) {
         var table = $('#tblProducto_simple').DataTable({
            destroy: true,
            responsive: true,

            dom: "<'row'<'col-xs-12 col-sm-4'B><'col-xs-12 col-sm-4'l><'col-xs-12 col-sm-4'fr>>" +
									"<'row'<'col-sm-12't>>" +
									"<'row'<'col-xs-12 col-md-6'i><'col-xs-12 col-md-6'p>>",
						language:{
								"lengthMenu":     "Mostrar _MENU_ registros",
								"search":         "Buscar:",
								"emptyTable":     "No hay datos disponibles en la tabla",
								"info":           "Mostrando _START_ al _END_ de _TOTAL_ registros",
								"infoEmpty":      "Mostrando 0 al 0 de 0 registros",
								"infoFiltered":   "(filtrado de _MAX_ registros totales)",
								"zeroRecords":    "No se encontraron registros que coincidan",
								"loadingRecords": "Cargando...",
								"processing":     "Procesando...",
								"paginate": {
										"first":      "Primero",
										"last":       "Último",
										"next":       "Siguiente",
										"previous":   "Previo"
								},
								"aria": {
										"sortAscending":  ": activar para ordenar la columna de forma ascendente",
										"sortDescending": ": activar para ordenar la columna de forma descendente"
								}
							},
						buttons: [
								{
										extend: 'copyHtml5',
										text: 'Copiar',
								},
								{
										extend: 'excelHtml5',
										text: 'Exportar a Excel',
								}
						],
            data:data,
            order: [[0,"desc"]],
            columns:[
				{"mData": null,
                          "bSortable": false,
                          "mRender": function (o) {

                              return "<div class='text-center'><button title='Editar Producto' onclick='forma("+o.IdProducto+",4);' class='btn btn-dark-blue'><i class='fa fa-pencil-square-o'></i></button>";
                              }
                          },
                      {"data":"nombre"},
                      
                    ],
         columnDefs: [{ width: 60, targets: 0 }]
          });
        }
     });
}

Listar();

function forma(id,modo){
	document.getElementById('frmProducto_simple').reset();
		$.ajax({
			url: '<?=base_url()?>index.php/Productos/getProducto/',
			type:"POST",
	        data:{
	            id: id,
	            modo: modo
	        },
			success: function(data) {
				var registros = JSON.parse(data);
	            document.getElementById("nombre").value= registros["nombre"];
	            document.getElementById("id").value= registros["IdProducto"];
	            document.getElementById("modo").value= modo;
			},
			error: function() {
				console.log('Error al cargar la forma');
			}
		});
	$("#myFrmProducto_simple").modal("show");
}

function producto_salida(){
	$.ajax({
		url : '<?=base_url()?>index.php/Productos/proceso/',
		type : 'post',
		data : $("#frmProducto_simple").serializeArray(),
		success : function(data) {
			location.reload();
		},
		error: function() {
			console.log('Error');
		}
	});
	return false;
}
</script>
