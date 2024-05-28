<?php
class htmlHojaXLS {
	function html($hoja,$s1,$s2a,$s2b,$s2c,$s2d,$s2e,$s2f,$s3,$s4,$s5,$s6,$s7,$s8a,$s8b,$s8c,$s9,$s10,$s11a,$s11b,$s11c,$s12,$s13,$s14,$s14a,$s15,$s16,$s16a) {
		$texto= '<style>
			.t1 {
                width: 100%;
			}
			.t1 td{
			  background-color: #d9e0e1;
                text-align: center;
			  font-family: verdana;
			}
            table th{
                text-align: left;
            }
			img{
				width: 100px;
				height: 100px;
			}
		</style>

<table>
			<tr>
			<td style="text-align: left;"><b>Hoja '.$hoja['nombre'].' '.$hoja['quimico'].'</b></td>
			<td style="text-align: center;">Versi&oacute;n: '.$hoja['version'].'.0</td>
			<td style="text-align: right;">Fecha: '.date("d-m-Y").'</td>
			</tr>
		</table>
		<br>
			<table class="t1"><tr><td colspan="3"><h3>1 Identificaci&oacute;n de la sustancia qu&iacute;mica peligrosa o mezcla y del proveedor o fabricante</h3></td></tr></table>
			<table >
				<tr><th>Nombre del qu&iacute;mico </th><td>'.$s1['nombre'].'</td></tr>
				<tr><th>Sinonimo </th><td>'.$s1['sinonimo'].'</td></tr>

				<tr><th>Numero CAS </th><td>'.$s1['nocas'].'</td></tr>
				<tr><th>Tipo de producto </th><td>'.$s1['tipo'].'</td></tr>

				<tr><th>Restricci&oacute;n de uso </th><td>'.$s1['restriccion'].'</td></tr>
				<tr><th>Nombre del fabricante </th><td>'.$s1['fabrica'].'</td></tr>

				<tr><th>Direcci&oacute;n </th><td>'.$s1['direccion'].'</td></tr>
				<tr><th>Telefono(s) </th><td>'.$s1['telefono'].'</td></tr>

				<tr><th>Familia qu&iacute;mica </th><td>'.$s1['familia'].'</td></tr>
				<tr><th>Comunicarse en caso de emergencia </th><td>'.$s1['contacto'].'</td></tr>
			</table>
  <br>
			<table class="t1"><tr><td colspan="3"><h3>2 Identificaci&oacute;n de los peligros</h3></td></tr></table>
			<br>
			<table>';
			foreach ($s2a as $datos){
				$texto= $texto.'
						<tr><th>Tipo de peligro</th><td>'.$datos['tipo'].'</td></tr>
						<tr><th>Clasificaci&oacute;n</th><td>'.$datos['texto'].'</td></tr>
						<tr><th>Categor&iacute;a o divisi&oacute;n</th><td>'.$datos['categoria'].'</td></tr>
						<tr><th>Palabra de advertencia</th><td>'.$datos['advertencia'].'</td></tr>';
			}
				$texto= $texto.'</table>
			<br>
			<table>
				';

		foreach ($s2e as $datos){
			$texto= $texto.'
			    <tr><th>C&oacute;digo H</th><td>'.$datos['codigo'].'</td></tr>
			    <tr><th>Indicaci&oacute;n de peligro f&iacute;sico</th><td>'.$datos['indicacion'].'</td></tr>
			    <tr><th>Clase de peligro</th><td>'.$datos['clase'].'</td></tr>
			    <tr><th>Categor&iacute;a de peligro</th><td>'.$datos['categoria'].'</td></tr>';
		}
			$texto= $texto.'</table>
			<br>
			<table >';
			foreach ($s2b as $datos){
				$texto= $texto.'<tr><th>C&oacute;digo P</th><td>'.$datos['riesgo'].'</td></tr>
			  <tr><th>Consejo de prudencia</th><td>'.$datos['categoria'].'</td></tr>';
			}
			$texto= $texto.'</table>
			<br>

	<table>
		<tr><td><b>Otros peligros que no contribuyen en la clasificaci&oacute;n </b></td>
		<td>'.$s2f['otrosPeligros'].'</td></tr>
		<tr><td><b>Palabra de advertencia general para la sustancia</b></td>
		<td>'.$s2f['advertenciaGral'].'</td></tr>
  </table>
			<br>
			<table><tr><th colspan="3"><b>Precauciones y consejos </b></th></tr>
			<tr><td ><b>Prevenci&oacute;n</b></td><td>'.$s2d['prevencion'].'</td></tr>
			<tr><td ><b>Respuesta</b></td><td >'.$s2d['respuesta'].'</td></tr>
			<tr><td ><b>Almacenamiento</b></td><td >'.$s2d['almacen'].'</td></tr>
			<tr><td ><b>Disposici&oacute;n</b></td><td >'.$s2d['disposicion'].'</td></tr>
			</table>
  <br>
			<table class="t1"><tr><td colspan="3"><h3>3 Composici&oacute;n e Informaci&oacute;n sobre los componentes</h3></td></tr></table>
	<table >';
    		foreach($s3 as $datos3){
    		$texto= $texto.'
    			<tr><th>Componente peligroso</th><td>'.$datos3['componentes'].'</td></tr>
    			<tr><th>Nombre com&uacute;n</th><td>'.$datos3['nombre'].'</td></tr>
    			<tr><th>No. CAS</th><td>'.$datos3['cas'].'</td></tr>
    			<tr><th>Porcentaje</th><td>'.$datos3['porcentaje'].'</td></tr>
    			<tr><th>No. ONU</th><td>'.$datos3['onu'].'</td></tr>
    			<tr><th>Observaciones</th><td>'.$datos3['observaciones'].'</td></tr>
			  ';
    		}
	$texto= $texto.'</table>
  <br>
			<table class="t1"><tr><td colspan="3"><h3>4 Primeros auxilios</h3></td></tr></table>
	<table>
  <tr><td><b>Inhalaci&oacute;n </b></td><td >'.$s4['inhalacion'].'</td></tr>
	<tr><td ><b>Contacto con la piel</b></td><td >'.$s4['piel'].'</td></tr>
	<tr><td ><b>Contacto con los ojos</b></td><td >'.$s4['visual'].'</td></tr>
	<tr><td ><b>Ingesti&oacute;n </b></td><td >'.$s4['ingestion'].'</td></tr>
	<tr><td ><b>Sintomas </b></td><td >'.$s4['sintomas'].'</td></tr>
	<tr><td ><b>Otros riesgos o efectos a la salud </b></td><td >'.$s4['otros'].'</td></tr>
	<tr><td ><b>Ant&iacute;doto</b></td><td >'.$s4['antidoto'].'</td></tr>
	<tr><td ><b>Otra informaci&oacute;n importante para la atenci&oacute;n m&eacute;dica primaria </b></td><td >'.$s4['informacion'].'</td></tr>
  </table>
  <br>

			<table class="t1"><tr><td colspan="3"><h3>5 Medidas contra incedios</h3></td></tr></table>
  <table>
	<tr><td ><b>Medios de extinci&oacute;n apropiados</b></td><td >'.$s5['extincion'].'</td></tr>
	<tr><td ><b>Peligros especificos de la sustancia quimica peligrosa o mezcla</b></td><td >'.$s5['procedimiento'].'</td></tr>
	<tr><td ><b>Medidas especiales que deberan seguir los grupos de combate contra incendio</b></td><td >'.$s5['riesgo'].'</td></tr>
	<tr><td ><b>Productos de combusti&oacute;n peligrosos</b></td><td >'.$s5['combustion'].'</td></tr>
  </table>
  <br>

			<table class="t1"><tr><td colspan="3"><h3>6 Medidas en caso de fuga o derrame accidental</h3></td></tr></table>
  <table>
	<tr><td ><b>Precauciones personales</b></td><td >'.$s6['personal'].'</td></tr>
	<tr><td ><b>Equipo de protecci&oacute;n</b></td><td >'.$s6['equipos'].'</td></tr>
	<tr><td ><b>Procedimientos de emergencia</b></td><td >'.$s6['procedimientos'].'</td></tr>
	<tr><td ><b>Precauciones relativas al medio ambiente</b></td><td >'.$s6['precaucion'].'</td></tr>
	<tr><td ><b>M&eacute;todos y materiales para la contenci&oacute;n y limpieza de derrames o fugas</b></td><td >'.$s6['metodo'].'</td></tr>
  </table>
  <br>

			<table class="t1"><tr><td colspan="3"><h3>7 Manejo y Almacenamiento</h3></td></tr></table>
  <table>
	<tr><td ><b>Precauciones que se deben tomar para garantizar un manejo seguro</b></td><td >'.$s7['manejo'].'</td></tr>
	<tr><td ><b>Condiciones de almacenamiento seguro, incluida cualquier incompatibilidad</b></td><td >'.$s7['almacen'].'</td></tr>
  </table>
  <br>

			<table class="t1"><tr><td colspan="3"><h3>8 Controles de exposici&oacute;n / protecci&oacute;n personal</h3></td></tr></table>
<table >';
  foreach($s8a as $datos){
    $texto= $texto.'
    	<tr><th>Componente peligroso</th><td>'.$datos['componente'].'</td></tr>
    	<tr><th>VLE-PPT</th><td>'.$datos['ACGIHTLV'].'</td></tr>
    	<tr><th>VLE-CT</th><td>'.$datos['OSHAPEL'].'</td></tr>
    	<tr><th>VLE-P</th><td>'.$datos['AIHAWEEL'].'</td></tr>
    	<tr><th>Limite Biologico</th><td>'.$datos['limite'].'</td></tr>
    	<tr><th>Otros</th><td>'.$datos['otro'].'</td></tr>';
  }
$texto= $texto.'</table>
<br>
<table>
<tr><td ><b>Controles de ingenieria</b></td><td >'.$s8b['ingeneria'].'</td></tr>
<tr><td ><b>Protecci&oacute;n respiratoria</b></td><td >'.$s8b['respiratorio'].'</td></tr>
<tr><td ><b>Protecci&oacute;n ocular / facial</b></td><td >'.$s8b['cara'].'</td></tr>
<tr><td ><b>Protecci&oacute;n dermica</b></td><td >'.$s8b['piel'].'</td></tr>
<tr><td ><b>Otros</b></td><td >'.$s8b['otro'].'</td></tr>
</table>
<br>

		<table class="t1"><tr><td colspan="3"><h3>9 Propiedades f&iacute;sicas y qu&iacute;micas</h3></td></tr></table>
	<table >
  <tr>
		<th>Estado f&iacute;sico </th>
		<td>'.$s9['estado'].'</td>
    </tr>
	<tr>
		<th>Color </th>
		<td>'.$s9['color'].'</td>
	</tr>
	<tr>
		<th>Olor </th>
		<td>'.$s9['olor'].'</td>
</tr>
	<tr>
		<th>Umbral de olor </th>
		<td>'.$s9['limiteolor'].'</td>
	</tr>
	<tr>
		<th>pH </th>
		<td>'.$s9['ph'].'</td>
</tr>
	<tr>
		<th>Punto inicial e intervalo de ebullici&oacute;n </th>
		<td>'.$s9['ebullicion'].'</td>
	</tr>
	<tr>
		<th>Punto de inflamaci&oacute;n </th>
		<td>'.$s9['flash'].'</td>
</tr>
	<tr>
		<th>Velocidad de evaporaci&oacute;n </th>
		<td>'.$s9['velocidad'].'</td>
	</tr>
	<tr>
		<th>Punto de fusi&oacute;n / Punto de congelaci&oacute;n </th>
		<td>'.$s9['derrite'].' </td>
</tr>
	<tr>
		<th>Inflamabilidad </th>
		<td>'.$s9['gravedad'].' </td>
	</tr>
	<tr>
		<th>L&iacute;mite inferior de Inflamabilidad / Explosividad </th>
		<td>'.$s9['limitemin'].' </td>
</tr>
	<tr>
		<th>L&iacute;mite superior de Inflamabilidad / Explosividad </th>
		<td>'.$s9['limitemax'].' </td>
	</tr>
	<tr>
		<th>Presi&oacute;n de vapor </th>
		<td>'.$s9['vapor'].' </td>
</tr>
	<tr>
		<th>Densidad de vapor </th>
		<td>'.$s9['densidad'].' </td>
	</tr>
	<tr>
		<th>Densidad relativa </th>
		<td>'.$s9['evaporacion'].' </td>
</tr>
	<tr>
		<th>Solubilidad en agua </th>
		<td>'.$s9['sublimacion'].' </td>
	</tr>
	<tr>
		<th>Solubilidad en otros medios </th>
		<td>'.$s9['otrosmedios'].' </td>
</tr>
	<tr>
		<th>Coeficiente de partici&oacute;n n-octanol / agua </th>
		<td>'.$s9['coeficiente'].' </td>
	</tr>
	<tr>
		<th>Temperatura de ignici&oacute;n espont&aacute;nea </th>
		<td>'.$s9['temperatura'].' </td>
</tr>
	<tr>
		<th>Temperatura de descomposici&oacute;n </th>
		<td>'.$s9['descomposicion'].' </td>
	</tr>
	<tr>
		<th>Viscosidad </th>
		<td>'.$s9['viscosidad'].'</td>
</tr>
	<tr>
		<th>Peso molecular </th>
		<td>'.$s9['voc'].'</td>
	</tr>
	<tr>
		<th>Otros datos relevantes </th>
		<td>'.$s9['otros'].'</td>
	</tr>
  </table>
  <br>

			<table class="t1"><tr><td colspan="3"><h3>10 Estabilidad y reactividad</h3></td></tr></table>
	<table >
	<tr>
		<th>Reactividad </th>
		<td>'.$s10['radioactividad'].' </td>
	</tr>
  <tr>
		<th>Estabilidad qu&iacute;mica </th>
		<td>'.$s10['estabilidad'].' </td>
	</tr>
	<tr>
		<th>Posibilidad de reacciones peligrosas </th>
		<td>'.$s10['reaccion'].' </td>
	</tr>
	<tr>
		<th>Condiciones que deber&aacute;n evitarse </th>
		<td>'.$s10['condiciones'].' </td>
	</tr>
	<tr>
		<th>Materiales incompatibles </th>
		<td>'.$s10['incompatible'].' </td>
	</tr>
	<tr>
		<th>Productos de descomposici&oacute;n peligrosos </th>
		<td>'.$s10['descomposicion'].' </td>
	</tr>
  </table>
  <br>

			<table class="t1"><tr><td colspan="3"><h3>11 Informaci&oacute;n toxicol&oacute;gica</h3></td></tr></table>
  <table>
	<tr><td ><b>Informaci&oacute;n sobre las v&iacute;as probables de ingreso: </b> '.$s11a['relevante'].'</td></tr>
	<tr><td colspan="3"><b>S&iacute;ntomas relacionados con las caracter&iacute;sticas f&iacute;sicas, qu&iacute;micas y toxicol&oacute;gicas</b></td></tr>
	<tr><td ><b>Inhalaci&oacute;n </b></td><td >'.$s11a['inhalacion'].'</td></tr>
	<tr><td ><b>Contacto con la piel </b></td><td >'.$s11a['piel'].'</td></tr>
	<tr><td ><b>Contacto con los ojos </b></td><td >'.$s11a['ojos'].'</td></tr>
	<tr><td ><b>Ingesti&oacute;n </b></td><td >'.$s11a['ingestion'].'</td></tr>
	<tr><td ><b>Informaci&oacute;n sobre la mezcla o sobre sus componentes </b></td><td >'.$s11a['mezcla'].'</td></tr>
	<tr><td ><b>Otra Informaci&oacute;n </b></td><td >'.$s11a['otra'].'</td></tr>
  </table>
<br>
<table >';
  foreach($s11b as $datos){
    $texto= $texto.'
    	<tr><th>Componente peligroso</th><td>'.$datos['componente'].'</td></tr>
    	<tr><th>LD50s</th><td>'.$datos['ld'].'</td></tr>
    	<tr><th>LC50s</th><td>'.$datos['lc'].'</td></tr>
    	<tr><th>Efectos inmediatos y retardados</th><td>'.$datos['efectos'].'</td></tr>';
  }
$texto= $texto.'</table>
<br>
<table >
  <tr>
	<th>Toxicidad aguda </th>
	<td >'.$s11c['texto1'].'</td>
	</tr>
	<tr>
  <th>Corrosi&oacute;n/irritaci&oacute;n cut&aacute;nea </th>
  <td >'.$s11c['texto2'].'</td>
  </tr>
	<tr>
  <th>Lesi&oacute;n ocular grave/irritaci&oacute;n ocular </th>
  <td >'.$s11c['texto3'].'</td>
  </tr>
	<tr>
  <th>Sensibilizaci&oacute;n respiratoria o cut&aacute;nea </th>
  <td >'.$s11c['texto4'].'</td>
  </tr>
	<tr>
  <th>Mutagenicidad en c&eacute;lulas germinales </th>
  <td >'.$s11c['texto5'].'</td>
  </tr>
	<tr>
  <th>Carcinogenicidad </th>
  <td >'.$s11c['texto6'].'</td>
  </tr>
	<tr>
  <th>Toxicidad para la reproducci&oacute;n </th>
  <td >'.$s11c['texto7'].'</td>
  </tr>
  <tr>
  <th>Toxicidad sist&eacute;mica espec&iacute;fica del &oacute;rgano blanco-Exposici&oacute;n &uacute;nica </th>
  <td >'.$s11c['texto8'].'</td>
  </tr>
  <tr>
  <th>Toxicidad sist&eacute;mica espec&iacute;fica del &oacute;rgano blanco-Exposiciones repetidas </th>
  <td >'.$s11c['texto9'].'</td>
  </tr>
  <tr>
  <th>Peligro por aspiraci&oacute;n </th>
  <td >'.$s11c['textoa'].'</td>
  </tr>
</table>

  		<table class="t1"><tr><td colspan="3"><h3>12 Informaci&oacute;n ecotoxicol&oacute;gica</h3></td></tr></table>
	<table >
	<tr>
		<th>Toxicidad </th>
		<td >'.$s12['toxicidad'].'</td>
	</tr>
	<tr>
		<th>Persistencia y degradabilidad </th>
		<td >'.$s12['persistencia'].'</td>
	</tr>
	<tr>
		<th>Potencial de bioacumulaci&oacute;n </th>
		<td >'.$s12['potencial'].'</td>
	</tr>
	<tr>
		<th>Movilidad en el suelo </th>
		<td >'.$s12['movil'].'</td>
	</tr>
	<tr>
		<th>Otros efectos adversos </th>
		<td >'.$s12['otros'].'</td>
	</tr>
  </table>
  <br>

			<table class="t1"><tr><td colspan="3"><h3>13 Informaci&oacute;n relativa a la eliminaci&oacute;n de los productos</h3></td></tr></table>
  <table>
	<tr><td ><b>Metodos y recipientes utilizados para la eliminaci&oacute;n</b></td><td >'.$s13['recomendacion'].'</td></tr>
	<tr><td ><b>Propiedades f&iacute;sicas y qu&iacute;micas que pueden influir en el proceso de eliminaci&oacute;n</b></td><td >'.$s13['propiedades'].'</td></tr>
	<tr><td ><b>Precauciones especiales para la incineraci&oacute;n o el confinamiento de los desechos</b></td><td >'.$s13['precauciones'].'</td></tr>
	<tr><td ><b>Otras precauciones / recomendaciones</b></td><td >'.$s13['otros'].'</td></tr>
  </table>
  <br>

  		<table class="t1"><tr><td colspan="3"><h3>14 Informaci&oacute;n relativa al transporte</h3></td></tr></table>
	<table >
  <tr>
		<th>N&uacute;mero ONU </th>
		<td >'.$s14['onu'].'</td>
	</tr>
	<tr>
		<th>Designaci&oacute;n oficial de transporte </th>
		<td >'.$s14['transporteonu'].'</td>
	</tr>
	<tr>
		<th>Clases(s) relativas al transporte </th>
		<td >'.$s14['clase'].'</td>
	</tr>
	<tr>
		<th>Grupo de embalaje/envasado </th>
		<td >'.$s14['grupo'].'</td>
	</tr>
	<tr>
		<th>Riesgos ambientales </th>
		<td >'.$s14['riesgo'].'</td>
	</tr>
	<tr>
		<th>Precauciones especiales para el usuario </th>
		<td >'.$s14['precaucion'].'</td>
	</tr>
	<tr>
		<th>Transporte a granel </th>
		<td >'.$s14['transporte'].'</td>
	</tr>
  </table>
				<br>

<table class="t1"><tr><td colspan="3"><h3>15 Informaci&oacute;n reglamentaria</h3></td></tr></table>
	<table >
  <tr>
		<th>TSCA </th>
		<td >'.$s15['tsca'].'</td>
	</tr>
	<tr>
		<th>CERCLA / SARA </th>
		<td >'.$s15['cercla'].'</td>
	</tr>
	<tr>
		<th>California propuesta 65 </th>
		<td >'.$s15['texto'].'</td>
	</tr>
	<tr>
		<th>CEPA DSL/NDSL</th>
		<td >'.$s15['cepa'].'</td>
	</tr>
	<tr>
		<th>Aplica el protocolo de Montreal </th>
		<td >'.$s15['montreal'].'</td>
	</tr>
	<tr>
		<th>Estocolmo </th>
		<td >'.$s15['estocolmo'].'</td>
	</tr>
	<tr>
		<th>Rhoterdam </th>
		<td >'.$s15['rhoterdam'].'</td>
	</tr>
	<tr>
		<th>Legislacion Mexicana </th>
		<td >'.$s15['mexico'].'</td>
	</tr>
  </table>
  <br>

		<table class="t1"><tr><td colspan="3"><h3>16 Otras informaciones incluidas las relativas a la preparaci&oacute;n y actualizaci&oacute;n de las hojas de datos de seguridad</h3></td></tr></table>
		<table><tr><td colspan="3">
<b>La informaci&oacute;n se considera correcta,
pero no es exhaustiva y se utilizar&aacute; &uacute;nicamente como orientaci&oacute;n,
la cual est&aacute; basada en el conocimiento actual de la sustancia qu&iacute;mica o mezcla y
es aplicable a las precauciones de seguridad apropiadas para el producto</b><br>
		'.$s16['texto'].'</td></tr></table>	';

		return $texto;
	}
}
?>
