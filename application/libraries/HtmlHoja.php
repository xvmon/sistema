<?php
class htmlHoja {
	function html($hoja,$s1,$s2a,$s2b,$s2c,$s2d,$s2e,$s2f,$s3,$s4,$s5,$s6,$s7,$s8a,$s8b,$s8c,$s9,$s10,$s11a,$s11b,$s11c,$s12,$s13,$s14,$s14a,$s15,$s16,$s16a) {
		$texto= '<style>
			.tabla3{
				text-align: left;
				width: 100%;
			}
			.tabla3 td{
				text-align: left;
				width: 50%;
			}
			.tabla3 th{
				text-align: left;
				width: 50%;
			}
			.tabla3a{
				text-align: left;
				width: 100%;
			}
			.tabla3a td{
				text-align: left;
				width: 25%;
			}
			.tabla3a th{
				text-align: left;
				width: 25%;
			}
			h3 {
			    background-color: #d9e0e1;
			    font-family: verdana;
			}
			.titulo{
				background-color: #d9e0e1;
				font-family: verdana;
			}
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
			p{
				text-align: justify;
				font-family: helvetica;
				font-size: 10px;
			}
			img{
				width: 100px;
				height: 100px;
			}
		</style>
		<table style="width: 100%;">
			<tr>
			<td style="text-align: left; width: 30%;"><b>Hoja '.$hoja['nombre'].' '.$hoja['quimico'].'</b></td>
			<td style="text-align: center; width: 30%;">Versi&oacute;n: '.$hoja['version'].'.0</td>
			<td style="text-align: right; width: 30%;">Fecha: '.date("d-m-Y").'</td>
			</tr>
		</table>
		<div align="center">
			<h3>1 Identificaci&oacute;n de la sustancia qu&iacute;mica peligrosa o mezcla y del proveedor o fabricante</h3>
			<table class="tabla3a">
				<tr>
				<th>Nombre del qu&iacute;mico </th>
				<td>'.$s1['nombre'].'</td>
				<th>Sinonimo </th>
				<td>'.$s1['sinonimo'].'</td>
				</tr>

				<tr>
				<th>Numero CAS </th>
				<td>'.$s1['nocas'].'</td>
				<th>Tipo de producto </th>
				<td>'.$s1['tipo'].'</td>
				</tr>

				<tr>
				<th>Restricci&oacute;n de uso </th>
				<td>'.$s1['restriccion'].'</td>
				<th>Nombre del fabricante </th>
				<td>'.$s1['fabrica'].'</td>
				</tr>

				<tr>
				<th>Direcci&oacute;n </th>
				<td>'.$s1['direccion'].'</td>
				<th>Telefono(s) </th>
				<td>'.$s1['telefono'].'</td>
				</tr>

				<tr>
				<th>Familia quimica </th>
				<td>'.$s1['familia'].'</td>
				<th>Comunicarse en caso de emergencia </th>
				<td>'.$s1['contacto'].'</td>
				</tr>
			</table>

			<h3>2 Identificaci&oacute;n de los peligros</h3>

			<table class="tabla2">
				<tr>
							<th>Tipo de peligro</th>
							<th>Clasificaci&oacute;n</th>
							<th>Categor&iacute;a o divisi&oacute;n</th>
							<th>Palabra de advertencia</th>
					</tr>
					';
		foreach ($s2a as $datos){
			$texto= $texto.'<tr>
			<td>'.$datos['tipo'].'</td>
			<td>'.$datos['texto'].'</td>
			<td>'.$datos['categoria'].'</td>
			<td>'.$datos['advertencia'].'</td>
			</tr>';
		}
		$texto= $texto.'</table>

			<br>
			<table class="tabla2">
				<tr>
			        <th>C&oacute;digo H</th>
			        <th>Indicaci&oacute;n de peligro f&iacute;sico</th>
			        <th>Clase de peligro</th>
			        <th>Categor&iacute;a de peligro</th>
			    </tr>
			    ';
		foreach ($s2e as $datos){
			$texto= $texto.'<tr>
			<td>'.$datos['codigo'].'</td>
			<td>'.$datos['indicacion'].'</td>
			<td>'.$datos['clase'].'</td>
			<td>'.$datos['categoria'].'</td>
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
			        	<td>'.$datos['riesgo'].'</td>
			        	<td>'.$datos['categoria'].'</td>
			        </tr>';
		}
		$texto= $texto.'</table>
			<br>
			<p><b>Pictograma(s)</b></p>';

		$cont=0;
		foreach ($s2c as $d2c){
			$cont= $cont+1;
			$texto= $texto.'<img src="'.base_url().'public/images/pictogramas/'.$d2c['imagen'].'"/>';
			if ($cont==3){
				$texto= $texto.'<br><br>';
			}
			if ($cont==6){
				$texto= $texto.'<br><br>';
			}
			if ($cont==9){
				$texto= $texto.'<br>';
			}
		}

		$texto= $texto.'<br>
			<table><tr><td><b>Otros peligros que no contribuyen en la clasificaci&oacute;n </b></td>
			<td>&nbsp;'.$s2f['otrosPeligros'].'</td></tr>
			<tr><td><b>Palabra de advertencia general para la sustancia</b></td>
			<td>'.$s2f['advertenciaGral'].'</td></tr></table>
			<br>
			<p><b>Precauciones y consejos </b></p>
			<br>
			<p><b>Prevenci&oacute;n</b></p>
			<p >'.$s2d['prevencion'].'</p>
			<p><b>Respuesta</b></p>
			<p >'.$s2d['respuesta'].'</p>
			<p><b>Almacenamiento</b></p>
			<p >'.$s2d['almacen'].'</p>
			<p><b>Disposici&oacute;n</b></p>
			<p >'.$s2d['disposicion'].'</p>

			<h3>3 Composici&oacute;n e Informaci&oacute;n sobre los componentes</h3>
	<table class="tabla2">
        <tr>
        <th>Componente peligroso</th>
        <th>Nombre com&uacute;n</th>
        <th>No. CAS</th>
        <th>Porcentaje</th>
        <th>No. ONU</th>
        <th>Observaciones</th>
    	</tr>';
		foreach($s3 as $datos3){
			$texto= $texto.'<tr>
        			<td>'.$datos3['componentes'].'</td>
        			<td>'.$datos3['nombre'].'</td>
        			<td>'.$datos3['cas'].'</td>
        			<td>'.$datos3['porcentaje'].'</td>
        			<td>'.$datos3['onu'].'</td>
        			<td>'.$datos3['observaciones'].'</td>
			    </tr>';
		}
		$texto= $texto.'</table>
			<h3>4 Primeros auxilios</h3>
	<p><b>Inhalaci&oacute;n </b></p>
	<p >'.$s4['inhalacion'].'</p>
	<p><b>Contacto con la piel</b></p>
	<p >'.$s4['piel'].'</p>
	<p><b>Contacto con los ojos</b></p>
	<p >'.$s4['visual'].'</p>
	<p><b>Ingesti&oacute;n </b></p>
	<p>'.$s4['ingestion'].'</p>
	<p><b>Sintomas </b></p>
	<p >'.$s4['sintomas'].'</p>
	<p><b>Otros riesgos o efectos a la salud </b></p>
	<p >'.$s4['otros'].'</p>
	<p><b>Ant&iacute;doto</b></p>
	<p >'.$s4['antidoto'].'</p>
	<p><b>Otra informaci&oacute;n importante para la atenci&oacute;n m&eacute;dica primaria </b></p>
	<p >'.$s4['informacion'].'</p>

			<h3>5 Medidas contra incedios</h3>
	<p><b>Medios de extinci&oacute;n apropiados</b></p>
	<p >'.$s5['extincion'].'</p>
	<p><b>Peligros especificos de la sustancia quimica peligrosa o mezcla</b></p>
    <p >'.$s5['procedimiento'].'</p>
	<p><b>Medidas especiales que deberan seguir los grupos de combate contra incendio</b></p>
	<p >'.$s5['riesgo'].'</p>
	<p><b>Productos de combusti&oacute;n peligrosos</b></p>
	<p >'.$s5['combustion'].'</p>

			<h3>6 Medidas en caso de fuga o derrame accidental</h3>
	<p><b>Precauciones personales</b></p>
	<p >'.$s6['personal'].'</p>
	<p><b>Equipo de protecci&oacute;n</b></p>
	<p >'.$s6['equipos'].'</p>
	<p><b>Procedimientos de emergencia</b></p>
	<p >'.$s6['procedimientos'].'</p>
	<p><b>Precauciones relativas al medio ambiente</b></p>
	<p >'.$s6['precaucion'].'</p>
	<p><b>M&eacute;todos y materiales para la contenci&oacute;n y limpieza de derrames o fugas</b></p>
	<p >'.$s6['metodo'].'</p>

			<h3>7 Manejo y Almacenamiento</h3>
	<p><b>Precauciones que se deben tomar para garantizar un manejo seguro</b></p>
	<p >'.$s7['manejo'].'</p>
	<p><b>Condiciones de almacenamiento seguro, incluida cualquier incompatibilidad</b></p>
	<p >'.$s7['almacen'].'</p>

			<h3>8 Controles de exposici&oacute;n / protecci&oacute;n personal</h3>
<table class="tabla2">
	<tr>
        <th>Componente peligroso</th>
	        <th>VLE-PPT</th>
	        <th>VLE-CT</th>
	        <th>VLE-P</th>
	        <th>Limite Biologico</th>
	        <th>Otros</th>
    </tr>';
		foreach($s8a as $datos){
			$texto= $texto.'<tr>
        	<td>'.$datos['componente'].'</td>
        	<td>'.$datos['ACGIHTLV'].'</td>
        	<td>'.$datos['OSHAPEL'].'</td>
        	<td>'.$datos['AIHAWEEL'].'</td>
        	<td>'.$datos['limite'].'</td>
        	<td>'.$datos['otro'].'</td>
        </tr>';
		}
		$texto= $texto.'</table>
<br>
<p><b>Controles de ingenieria</b></p>
<p  >'.$s8b['ingeneria'].'</p>
<p><b>Protecci&oacute;n respiratoria</b></p>
<p  >'.$s8b['respiratorio'].'</p>
<p><b>Protecci&oacute;n ocular / facial</b></p>
<p  >'.$s8b['cara'].'</p>
<p><b>Protecci&oacute;n dermica</b></p>
<p  >'.$s8b['piel'].'</p>
<p><b>Otros</b></p>
<p  >'.$s8b['otro'].'</p>
<p><b>Equipo de protecci&oacute;n(s)</b></p>';

		$cont=0;
		foreach ($s8c as $d8c){
			$cont= $cont+1;
			$texto= $texto.'<img src="'.base_url().'public/images/pictogramas/'.$d8c['imagen'].'" width="80" height="80"/>';
			if ($cont==3){
				$texto= $texto.'<br><br>';
			}
			if ($cont==6){
				$texto= $texto.'<br><br>';
			}
		}

		$texto= $texto.'<br>
		<h3>9 Propiedades f&iacute;sicas y qu&iacute;micas</h3>
	<table class="tabla3a">
    <tr>
		<th>Estado f&iacute;sico </th>
		<td>'.$s9['estado'].'</td>
		<th>Color </th>
		<td>'.$s9['color'].'</td>
	</tr>
	<tr>
		<th>Olor </th>
		<td>'.$s9['olor'].'</td>
		<th>Umbral de olor </th>
		<td>'.$s9['limiteolor'].'</td>
	</tr>
	<tr>
		<th>pH </th>
		<td>'.$s9['ph'].'</td>
		<th>Punto inicial e intervalo de ebullici&oacute;n </th>
		<td>'.$s9['ebullicion'].'</td>
	</tr>
	<tr>
		<th>Punto de inflamaci&oacute;n </th>
		<td>'.$s9['flash'].'</td>
		<th>Velocidad de evaporaci&oacute;n </th>
		<td>'.$s9['velocidad'].'</td>
	</tr>
	<tr>
		<th>Punto de fusi&oacute;n / Punto de congelaci&oacute;n </th>
		<td>'.$s9['derrite'].' </td>
		<th>Inflamabilidad </th>
		<td>'.$s9['gravedad'].' </td>
	</tr>
	<tr>
		<th>L&iacute;mite inferior de Inflamabilidad / Explosividad </th>
		<td>'.$s9['limitemin'].' </td>
		<th>L&iacute;mite superior de Inflamabilidad / Explosividad </th>
		<td>'.$s9['limitemax'].' </td>
	</tr>
	<tr>
		<th>Presi&oacute;n de vapor </th>
		<td>'.$s9['vapor'].' </td>
		<th>Densidad de vapor </th>
		<td>'.$s9['densidad'].' </td>
	</tr>
	<tr>
		<th>Densidad relativa </th>
		<td>'.$s9['evaporacion'].' </td>
		<th>Solubilidad en agua </th>
		<td>'.$s9['sublimacion'].' </td>
	</tr>
	<tr>
		<th>Solubilidad en otros medios </th>
		<td>'.$s9['otrosmedios'].' </td>
		<th>Coeficiente de partici&oacute;n n-octanol / agua </th>
		<td>'.$s9['coeficiente'].' </td>
	</tr>
	<tr>
		<th>Temperatura de ignici&oacute;n espont&aacute;nea </th>
		<td>'.$s9['temperatura'].' </td>
		<th>Temperatura de descomposici&oacute;n </th>
		<td>'.$s9['descomposicion'].' </td>
	</tr>
	<tr>
		<th>Viscosidad </th>
		<td>'.$s9['viscosidad'].'</td>
		<th>Peso molecular </th>
		<td>'.$s9['voc'].'</td>
	</tr>
	<tr>
		<th>Otros datos relevantes </th>
		<td>'.$s9['otros'].'</td>
	</tr>
    </table>

			<h3>10 Estabilidad y reactividad</h3>
	<table class="tabla3">
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

			<h3>11  Informaci&oacute;n toxicol&oacute;gica</h3>
	<p><b>Informaci&oacute;n sobre las v&iacute;as probables de ingreso </b> '.$s11a['relevante'].'</p>
	<p><b>S&iacute;ntomas relacionados con las caracter&iacute;sticas f&iacute;sicas, qu&iacute;micas y toxicol&oacute;gicas</b></p>
	<p><b>Inhalaci&oacute;n </b></p>
	<p >'.$s11a['inhalacion'].'</p>
	<p><b>Contacto con la piel </b></p>
	<p >'.$s11a['piel'].'</p>
	<p><b>Contacto con los ojos </b></p>
	<p >'.$s11a['ojos'].'</p>
	<p><b>Ingesti&oacute;n </b></p>
	<p >'.$s11a['ingestion'].'</p>
	<p><b>Informaci&oacute;n sobre la mezcla o sobre sus componentes </b></p>
	<p >'.$s11a['mezcla'].'</p>
	<p><b>Otra Informaci&oacute;n </b></p>
	<p >'.$s11a['otra'].'</p>
<table class="tabla2">
	<tr>
        <th>Componente peligroso</th>
        <th>LD50s</th>
        <th>LC50s</th>
        <th>Efectos inmediatos y retardados</th>
    </tr> ';
		foreach($s11b as $datos){
			$texto= $texto.'<tr>
        	<td>'.$datos['componente'].'</td>
        	<td>'.$datos['ld'].'</td>
        	<td>'.$datos['lc'].'</td>
        	<td>'.$datos['efectos'].'</td>
        </tr>';
		}
		$texto= $texto.'</table>
<br>
<table class="tabla3">
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

    		<h3>12 Informaci&oacute;n ecotoxicol&oacute;gica</h3>
	<table class="tabla3">
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

			<h3>13 Informaci&oacute;n relativa a la eliminaci&oacute;n de los productos</h3>
	<p><b>Metodos y recipientes utilizados para la eliminaci&oacute;n</b></p>
    <p >'.$s13['recomendacion'].'</p>
	<p><b>Propiedades f&iacute;sicas y qu&iacute;micas que pueden influir en el proceso de eliminaci&oacute;n</b></p>
    <p >'.$s13['propiedades'].'</p>
	<p><b>Precauciones especiales para la incineraci&oacute;n o el confinamiento de los desechos</b></p>
    <p >'.$s13['precauciones'].'</p>
	<p><b>Otras precauciones / recomendaciones</b></p>
    <p >'.$s13['otros'].'</p>

    		<h3>14 Informaci&oacute;n relativa al transporte</h3>
	<table class="tabla3">
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
<p><b>Pictograma(s)</b></p>';

		$cont=0;
		foreach ($s14a as $datos){
			$cont= $cont+1;
			$texto= $texto.'<img src="'.base_url().'public/images/pictogramas/'.$datos['imagen'].'"/>';
			if ($cont==5){
				$texto= $texto.'<br><br>';
			}
			if ($cont==10){
				$texto= $texto.'<br><br>';
			}
			if ($cont==15){
				$texto= $texto.'<br><br>';
			}
			if ($cont==20){
				$texto= $texto.'<br><br>';
			}
		}

		$texto= $texto.'<h3>15 Informaci&oacute;n reglamentaria</h3>
	<table class="tabla3">
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

		<h4 class="titulo">16 Otras informaciones incluidas las relativas a la preparaci&oacute;n y actualizaci&oacute;n de las hojas de datos de seguridad</h4>
		<p><b>La informaci&oacute;n se considera correcta, pero no es exhaustiva y se utilizar&aacute; &uacute;nicamente como orientaci&oacute;n, la cual est&aacute; basada en el conocimiento actual de la sustancia qu&iacute;mica o mezcla y es aplicable a las precauciones de seguridad apropiadas para el producto</b></p>
		<p >'.$s16['texto'].'</p>

		<br>
			<table class="tabla2">
        <tr>
        <th>Versi&oacute;n</th>
        <th>Fecha de ultima modificaci&oacute;n</th>
        <th>Descripci&oacute;n del cambio</th>
        <th>Responsable</th>
    	</tr>';
		foreach($s16a as $datos){
			$texto= $texto.'<tr>
        	<td>'.$datos['version'].'</td>
        	<td>'.$datos['fecha'].'</td>
        	<td>'.$datos['comentario'].'</td>
        	<td>'.$datos['responsable'].'</td>
		</tr>';
		}
		$texto= $texto.'</table>

		</div>';

		return $texto;
	}
}
?>
