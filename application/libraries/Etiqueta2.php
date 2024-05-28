<?php
class etiqueta2 {
    function html($hoja,$s1,$s2a,$s2b,$s2c,$s2d,$s2e,$s2f,$s3,$s14) {
	    ?>
		<style>
			img{
				width: 90px;
				height: 90px;
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
                <td style="width: 50%;">
            		<h3><b><?=@utf8_decode($s1['nombre']);?></b></h3>
                </td>
                <td>
                	<p style="font-size: 20px;">Hoja <?=utf8_decode($hoja->nombre);?>
                	<br>
                	UN <?=utf8_decode($s14['onu']);?>
                	</p>
                </td>
              </tr>
              <tr>
                <td style="width: 50%;">
            		<?php
            		$cont=0;
            		$texto = '';
            		foreach ($s2c as $d2c){
            			$cont= $cont+1;
            			$texto= $texto.'<img src="'.base_url().'public/images/pictogramas/'.$d2c['imagen'].'" width="50" height="50"/>';
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
                <td>
                	<table BORDER CELLPADDING=0 CELLSPACING=0 style="font-size: 12px; width: 100%;">
                        <tr>
                        <th>Componente peligroso</th>
                        <th>No. CAS</th>
                        <th>Porcentaje</th>
                    	</tr>
                    	<?php
                		foreach($s3 as $datos3){
                			echo '<tr>
                        			<td>'.utf8_decode($datos3['componentes']).'</td>
                        			<td>'.$datos3['cas'].'</td>
                        			<td>'.$datos3['porcentaje'].'</td>
                			    </tr>';
                		}
                		?>
                	</table>
                  <?php $advertenciaGral=strtoupper($s2f['advertenciaGral']) ?>
                  <p><b><?=$advertenciaGral?></b></p>
                </td>
              </tr>
        </table>
        <br>
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
        <br>
        <table CELLPADDING=0 CELLSPACING=0 style="font-size: 11px; width: 100%;">
          <tr>
            <td>
            	Nombre del fabricante:<br>
            	<?=utf8_decode($s1['fabrica']);?>
            </td>
            <td>
            	Direcci&oacute;n:<br>
            	<?=utf8_decode($s1['direccion']);?>
            </td>
            <td>
            	Telefono:<br>
            	<?=utf8_decode($s1['telefono']);?>
            </td>
          </tr>
        </table>
        <br>
    </div>
		<?php
	}
}
?>
