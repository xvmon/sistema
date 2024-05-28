<script type="text/javascript">
function Listar(){
	$.ajax({
        url: '<?=base_url()?>index.php/Historial/getHistorial/',
        method: 'POST',
        dataType: 'json',
        data:{
            id: null
        },
        success:function(data) {
         var table = $('#tblHistorial').DataTable({
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
						{"data":"fecha"},
                      {"data":"descripcion"},
					  
                    ],
         columnDefs: [{ width: 60, targets: 0 }]
          });
					table.button().add( 0, {
							action: function ( e, dt, button, config ) {
									forma(0,1);
							},
							text: 'Registrar nuevo Producto'
					});
        }
     });
}

Listar();
	
</script>
