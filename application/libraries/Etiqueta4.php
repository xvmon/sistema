<?php
class etiqueta4 {
    function html($hoja,$s1,$s2c,$s8b,$s8c) {
	    ?>
		<style>
			table {
	           font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
            }
		</style>
		<h2 align="center"><b><?=@utf8_decode($s1['nombre']);?></b></h2>
		<table BORDER CELLPADDING=0 CELLSPACING=0 style="width: 100%;">
              <tr>
                <td style="width: 40%;">
            		<h2><b>NFPA</b></h2><br>
            		<div align="center"><img src="<?=base_url();?>public/images/romboSeguridad.jpg" width="250" height="240"/></div>
            		<br>
                </td>
                <td style="width: 60%;">
                	<h3><b>GHS Riesgos a la salud</b></h3><br>
                	<?php
                	$salud = array(2,8,9,11);

                	foreach ($s2c as $img){
                	    if(in_array($img['id_imagen'], $salud)){
                	        echo '<img src="'.base_url().'public/images/pictogramas/'.$img['imagen'].'" width="80" height="80"/>';
                	    }
                	}
                	?>
                	<h3><b>GHS Riesgos f&iacute;sicos</b></h3><br>
                	<?php
                	$fisicos=array(2,3,4,7,10);

                	foreach ($s2c as $img){
                	    if(in_array($img['id_imagen'], $fisicos)){
                	        echo '<img src="'.base_url().'public/images/pictogramas/'.$img['imagen'].'" width="80" height="80"/>';
                	    }
                	}
                	?>
                	<br>
                </td>
              </tr>
              <tr>
                  <td colspan="2">
                  <img src="<?=base_url();?>public/images/e4img.png"/>
                  </td>
              </tr>
              <tr>
                  <td colspan="2" style="padding-top: 5px;">
                  <b style="font-size: 50px;">EPP</b>
                  <?php
                  foreach ($s8c as $d8c){
                      echo '<img src="'.base_url().'public/images/pictogramas/'.$d8c['imagen'].'" width="75" height="75"/>';
                  }
                  ?>
                  </td>
              </tr>
        </table>
        <br>
		<?php
	}
}
?>
