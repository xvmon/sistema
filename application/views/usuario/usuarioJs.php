<script type="text/javascript">
function Listar(){
	$.ajax({
        url: '<?=base_url()?>index.php/Usuarios/getUsuarios/',
        method: 'POST',
        dataType: 'json',
        data:{
            id: null
        },
        success:function(data) {
         var table = $('#tblUsuario').DataTable({
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
                      {"data":"estatus"},
                      {"mData": null,
                          "bSortable": false,
                          "mRender": function (o) {
                              var nombre = '"'+o.nombre+'"';
                              var estatus = '"'+o.estatus+'"';
                              var icono = "";
                              if(o.estatus == 'Baja'){
                                  icono = "'fa fa-square-o'";
                              }else{
                                  icono = "'fa fa-check-square-o'";
                              }
                              return "<div class='text-center'><button title='Editar Usuario' onclick='forma("+o.IdUsuario+",2);' class='btn btn-dark-blue'><i class='fa fa-pencil-square-o'></i></button>"+
                              "<button title='Cambiar Estatus Usuario' onclick='estatus("+o.IdUsuario+","+estatus+",3);' class='btn btn-default'><i class="+icono+"></i></button></div>";
                              }
                          },
                    ],
         columnDefs: [{ width: 60, targets: 0 }]
          });
					table.button().add( 0, {
							action: function ( e, dt, button, config ) {
									forma(0,1);
							},
							text: 'Registrar nuevo usuario'
					});
        }
     });
}

Listar();

function forma(id,modo){
	document.getElementById('frmUsuario').reset();
	if(modo == 1){
		document.getElementById("usuario").readOnly = false;
		document.getElementById("proceso").innerHTML= 'Nuevo';
		$('#contrasenia').prop('required', true);
		document.getElementById("modo").value= 1;
		document.getElementById("id").value= 0;
	}else{
		$.ajax({
			url: '<?=base_url()?>index.php/Usuarios/getUsuario/',
			type:"POST",
	        data:{
	            id: id,
	            modo: modo
	        },
			success: function(data) {
				var registros = JSON.parse(data);

	            document.getElementById("usuario").value= registros["nombre"];
	            document.getElementById("id").value= registros["IdUsuario"];

	        	if(modo == 2){
	        		document.getElementById("usuario").readOnly = true;
	        		$('#contrasenia').prop('required', false);
	        		document.getElementById("proceso").innerHTML= 'Editar';
	                document.getElementById("modo").value= modo;
	        	}
			},
			error: function() {
				console.log('Error al cargar la forma');
			}
		});
	}
	$("#myFrmUsuario").modal("show");
}

function estatus(id, estatus, modo){
	$.ajax({
		url: '<?=base_url()?>index.php/Usuarios/procesoUsuario/',
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

function usuarioABC(){
	$.ajax({
		url : '<?=base_url()?>index.php/Usuarios/procesoUsuario/',
		type : 'post',
		data : $("#frmUsuario").serializeArray(),
		success : function(data) {
			location.reload();
		}
	});
	return false;
}
</script>
