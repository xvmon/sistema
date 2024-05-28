<?php
class etiqueta3 {
    function html($hoja,$s1,$s2a,$s2b,$s2c,$s2d,$s2e,$s3,$s4) {
	    ?>
		<style>
			img{
				width: 50px;
				height: 50px;
			}
			table {
	           font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
            }
      .borderline{
            border:10px solid black;
      }
		</style>
    <div class="borderline">


		<table style="width: 100%;">
              <tr>
                <td style="width: 30%;">
            		<h3><b><?=utf8_decode($hoja->nombre);?> <?=@utf8_decode($s1['nombre']);?></b></h3>
                </td>
                <td style="width: 70%;">
            		<?php
            		$cont=0;
            		$texto = '';
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
            		echo $texto;
		            ?>
                </td>
              </tr>
              <tr>
                <td style="font-size: 11px; width: 30%;">
            		Nombre del fabricante:<br>
                	<?=utf8_decode($s1['fabrica']);?><br>
                	Direcci&oacute;n:<br>
                	<?=utf8_decode($s1['direccion']);?><br>
                	Telefono:<br>
                	<?=utf8_decode($s1['telefono']);?><br>
                </td>
                <td style="font-size: 11px; width: 70%;">
                    <table CELLPADDING=0 CELLSPACING=0 style="font-size: 11px;">
                      <tr>
                        <td>
                        <?php
                        foreach ($s2e as $datos){
                            echo 'C&oacute;digo '.$datos['codigo'].': '.utf8_decode($datos['indicacion']).'<br>';
                        }
                        ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                        <?php
                        foreach ($s2b as $datos){
                            echo 'C&oacute;digo '.$datos['riesgo'].': '.utf8_decode($datos['categoria']).'<br>';
                        }
                        ?>
                        </td>
                      </tr>
                    </table>
                    <h3>Primeros auxilios</h3>
                	<b>Inhalaci&oacute;n:</b><br>
                	<?=utf8_decode($s4['inhalacion']);?><br>
                	<b>Contacto con la piel:</b><br>
                	<?=utf8_decode($s4['piel']);?><br>
                	<b>Contacto con los ojos:</b><br>
                	<?=utf8_decode($s4['visual']);?><br>
                	<b>Ingesti&oacute;n:</b><br>
                	<?=utf8_decode($s4['ingestion']);?><br>
                	<b>Sintomas:</b><br>
                	<?=utf8_decode($s4['sintomas']);?><br>
                	<b>Otros riesgos o efectos a la salud:</b><br>
                	<?=utf8_decode($s4['otros']);?><br>
                	<b>Ant&iacute;doto:</b><br>
                	<?=utf8_decode($s4['antidoto']);?><br>
                	<b>Otra informaci&oacute;n importante para la atenci&oacute;n m&eacute;dica primaria:</b><br>
                	<?=utf8_decode($s4['informacion']);?><br>
                </td>
              </tr>
        </table>
        <br>
        <table CELLPADDING=0 CELLSPACING=0 style="font-size: 11px; width: 100%;">
          <tr>
            <td>
            	Tara:<br>
            	Peso bruto:<br>
            	Fecha de expiraci&oacute;n:<br>
            	N&uacute;mero del lote:<br>
            	Fecha de carga:<br>
            </td>
          </tr>
        </table>
        <br>
          </div>
		<?php
	}
}
?>
