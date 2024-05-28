<?php
class htmlMonografia {
	function html($areas,$hoja,$s1,$s2a,$s2b,$s2c,$s2e,$s3,$s4,$s5,$s6,$s7,$s14) {
		$texto= '<style>
					body{
						font-family: helvetica;
						font-size: 10px;
					}
					.tabla2{
						text-align: center;
						width: 100%;
					}
					.tabla2 td{
						border-width: 0.5px;
						border-color:#000000;
						border-style:solid;
						text-align: center;
					}
					.tabla2 th{
						border-width: 0.5px;
						border-color:#000000;
						border-style:solid;
						text-align: center;
						background-color: #d9e0e1;
					}
					.tdb {
  						border: 1px solid;
					}
				</style>
				<table style="width:100%; height: 50px;">
				<tr>
				<td style="width: 50%; text-align:left;"><h1>'.utf8_decode($s1['nombre']).'</h1></td>
				<td style="width: 50%; text-align:right;"><h3>'.$hoja['nombre'].'</h3></td>
				</tr>
				</table>
				<table style = "width: 100%;">
					<tr>
					<td style = "text-align: left; width: 50%;" class="tdb">
						<b>Area(s) de uso: </b> ';
		foreach ($areas as $datos){
		    $texto= $texto.' '.utf8_decode($datos->nombre);
		}
		$texto= $texto.'<br>
						<b>Datos del Proveedor: </b> '.utf8_decode($s1['fabrica']).' '.utf8_decode($s1['direccion']).' '.$s1['telefono'].' <br> '.utf8_decode($s1['contacto']).' <br>
						<b>UN: </b> '.$s14['onu'].'<br>
						<b>Palabra clave: </b> '.utf8_decode($s2a['texto']).'
					</td>
					<td style = "text-align: center; width: 50%;" class="tdb">
								<b>COMPOSICION</b><br>
								<table class="tabla2">
							        <tr>
							        <th>Nombre com&uacute;n</th>
							        <th>No. CAS</th>
							        <th>Porcentaje</th>
							    	</tr>';
							        foreach($s3 as $datos3){
							        		$texto= $texto.'<tr>
							        			<td>'.utf8_decode($datos3['nombre']).'</td>
							        			<td>'.utf8_decode($datos3['cas']).'</td>
							        			<td>'.utf8_decode($datos3['porcentaje']).'</td>
										    </tr>';
							        }
								$texto= $texto.'</table>
					</td>
					</tr>

					<tr>
					<td style = "text-align: center; width: 50%;" class="tdb">
								<b>PELIGROS</b> <br>';
			$cont=0;
			foreach ($s2c as $d2c){
				$cont= $cont+1;
				$texto= $texto.'<img src="'.base_url().'public/images/pictogramas/'.$d2c['imagen'].'" style="width: 30px; height: 30px;"/>';
			}
			$texto= $texto.'
					</td>
					<td style = "text-align: center; width: 50%;" class="tdb">
			<table class="tabla2">
				<tr>
			        <th>C&oacute;digo H</th>
			        <th>Indicaci&oacute;n de peligro f&iacute;sico</th>
			    </tr>
			    ';
			foreach ($s2e as $datos){
				$texto= $texto.'<tr>
			<td>'.utf8_decode($datos['codigo']).'</td>
			<td>'.utf8_decode($datos['indicacion']).'</td>
			</tr>';
			}
			$texto= $texto.'</table>
			<br>
			<table class="tabla2">
				<tr>
			        <th>C&oacute;digo P</th>
			        <th>Consejo de prudencia</th>
			    </tr>';
			foreach ($s2b as $datos){
				$texto= $texto.'<tr>
			        	<td>'.utf8_decode($datos['riesgo']).'</td>
			        	<td>'.utf8_decode($datos['categoria']).'</td>
			        </tr>';
			}
			$texto= $texto.'</table>
					</td>
					</tr>
				</table>

				<table style = "width: 100%;">
					<tr>
					<td style = "text-align: left;" class="tdb">
					<b>CONDICIONES DE ALMACENAMIENTO</b><br>
					<b>Precauciones que se deben tomar para garantizar un manejo seguro </b> '.utf8_decode($s7['manejo']).'
					<br><b>Condiciones de almacenamiento seguro, incluida cualquier incompatibilidad</b> '.utf8_decode($s7['almacen']).'
					</td>
					</tr>

					<tr>
					<td style = "text-align: left;" class="tdb">
					<b>PRIMEROS AUXILIOS</b><br>
					<b>Inhalaci&oacute;n </b> '.utf8_decode($s4['inhalacion']).'
					<br><b>Contacto con la piel</b> '.utf8_decode($s4['piel']).'
					<br><b>Contacto con los ojos</b> '.utf8_decode($s4['visual']).'
					<br><b>Ingesti&oacute;n </b> '.utf8_decode($s4['ingestion']).'
					</td>
					</tr>

					<tr>
					<td style = "text-align: left;" class="tdb">
					<b>DERRAMES</b><br>
					<b>Precauciones personales</b> '.utf8_decode($s6['personal']).'
					<br><b>Equipo de protecci&oacute;n</b>	'.utf8_decode($s6['equipos']).'
					<br><b>Procedimientos de emergencia</b>	'.utf8_decode($s6['procedimientos']).'
					<br><b>Precauciones relativas al medio ambiente</b>	'.utf8_decode($s6['precaucion']).'
					<br><b>M&eacute;todos y materiales para la contenci&oacute;n y limpieza de derrames o fugas</b> '.utf8_decode($s6['metodo']).'
					</td>
					</tr>

					<tr>
					<td style = "text-align: left;" class="tdb">
					<b>FUEGO</b><br>
					<b>Medios de extinci&oacute;n apropiados</b> '.utf8_decode($s5['extincion']).'
					<br><b>Procedimientos especiales contra incendios</b> '.utf8_decode($s5['procedimiento']).'
					</td>
					</tr>
				</table>';

			return $texto;
	}
}
?>
