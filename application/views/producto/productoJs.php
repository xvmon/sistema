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
         var table = $('#tblProducto').DataTable({
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
                      {"data":"nombre"},
					  {"data":"cantidad"},
                      {"data":"estatus"},
                      {"mData": null,
                          "bSortable": false,
                          "mRender": function (o) {
                              var nombre = '"'+o.nombre+'"';
                              var estatus = '"'+o.estatus+'"';
                              var icono = "";
                              if(o.estatus == '0'){
                                  icono = "'fa fa-square-o'";
                              }else{
                                  icono = "'fa fa-check-square-o'";
                              }
                              return "<div class='text-center'><button title='Editar Producto' onclick='forma("+o.IdProducto+",2);' class='btn btn-dark-blue'><i class='fa fa-pencil-square-o'></i></button>"+
							  "<div class='text-center'><button title='Salida de producto' onclick='formaEntrada("+o.IdProducto+",2);' class='btn btn-success'><i class='fa fa-truck'></i></button>"+
                              "<button title='Cambiar Estatus Producto' onclick='estatus("+o.IdProducto+","+estatus+",3);' class='btn btn-default'><i class="+icono+"></i></button></div>";
                              }
                          },
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

function forma(id,modo){
	document.getElementById('frmProducto').reset();
	if(modo == 1){
		document.getElementById("proceso").innerHTML= 'Nuevo';
		document.getElementById("modo").value= 1;
		document.getElementById("id").value= 0;
	}else{
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

	        	if(modo == 2){
	        		document.getElementById("proceso").innerHTML= 'Editar';
	                document.getElementById("modo").value= modo;
	        	}
			},
			error: function() {
				console.log('Error al cargar la forma');
			}
		});
	}
	$("#myFrmProducto").modal("show");
}

function estatus(id, estatus, modo){
	$.ajax({
		url: '<?=base_url()?>index.php/Productos/proceso/',
		type:"POST",
        data:{
            id: id,
            estatus: estatus,
            modo: modo
        },
		success: function(data) {
			Listar();
		},
		error: function() {
			console.log('Error estatus');
		}
	});
}

function formaEntrada(id,modo){
	document.getElementById('frmEntrada').reset();
		$.ajax({
			url: '<?=base_url()?>index.php/Productos/getProducto/',
			type:"POST",
	        data:{
	            id: id,
	            modo: modo
	        },
			success: function(data) {
				var registros = JSON.parse(data);
	            document.getElementById("producto").value= registros["nombre"];
	            document.getElementById("idp").value= registros["IdProducto"];
			},
			error: function() {
				console.log('Error al cargar la forma');
			}
		});
	$("#myFrmEntrada").modal("show");
}

function entradaProducto(){
	$.ajax({
		url : '<?=base_url()?>index.php/Productos/proceso/',
		type : 'post',
		data : $("#frmEntrada").serializeArray(),
		success : function(data) {
			if(data == 0){
				alert('Error entrada producto');
			}else{
				location.reload();
			}
		},
		error: function() {
			console.log('Error');
		}
	});
	return false;
}

function productoABC(){
	$.ajax({
		url : '<?=base_url()?>index.php/Productos/proceso/',
		type : 'post',
		data : $("#frmProducto").serializeArray(),
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
