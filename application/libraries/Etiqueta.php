<?php
class etiqueta {
	function html($hoja,$s1,$s2a,$s2b,$s2c,$s2d,$s2e) {
	    ?>
		<style>
			.texto1{
				text-align: justify;
				font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
				padding-left: 35px;
			}
			.texto2{
				text-align: justify;
				font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
				text-transform: uppercase;
			}
			.texto3{
				text-align: justify;
				font-family: Arial,Helvetica Neue,Helvetica,sans-serif;
				text-transform: uppercase;
				padding-left: 35px;
			}
			img{
				width: 70px;
				height: 70px;
			}
			td{
			 border-radius: 20px;
			 border: black 10px solid;
			}
		</style>



		<table style="width: 100%;">
              <tr>
                <td style="width: 50%;">
	            		<h3><b class="texto3"><?=@utf8_decode($s1['nombre']);?></b></h3>
	            		<h3 align="center"><b class="texto2"><?=@utf8_decode($s2a['texto3'])?></b></h3>
	            		<?php
									$h1=0;
									$p1=0;
	            		$cont=0;
	            		$texto = '';
		            		foreach ($s2c as $d2c){
		            			$cont= $cont+1;
		            			$texto= $texto.'<img src="'.base_url().'public/images/pictogramas/'.$d2c['imagen'].'" width="50" height="50"/>';
		            			if ($cont==3){
		            				$texto= $texto.'<br>';
		            			}
		            			if ($cont==6){
		            				$texto= $texto.'<br>';
		            			}
		            			if ($cont==9){
		            				$texto= $texto.'<br>';
		            			}
		            		}
	            		echo '<center>'.$texto.'<br>';
	            		$h = 0;
		            		foreach ($s2e as $datos){
												$h1++;
												$h++;
		            		    echo '<b class="texto2">['.$datos['codigo'].']</b> ';
		            		    if($h >= 4){
		            		        echo '<br>';
		            		        $h = 0;
		            		    }
		            		}
	            		echo '<br><br>';
	            		$p = 0;
		            		foreach ($s2b as $datos){
												$p1++;
		            		    $p++;
		            		    echo '<b class="texto2">['.$datos['riesgo'].']</b> ';
		            		    if($p >= 4){
		            		        echo '<br>';
		            		        $p = 0;
		            		    }
		            		}
	            		echo '</center>';
			            ?>
			            <br>
			            <b class="texto1">Fecha de caducidad: _______________</b><br><br>
									<b class="texto1">Vea la hoja de seguridad</b>
                </td>
                <td style="width: 50%;">
	            		<h3><b class="texto3"><?=@utf8_decode($s1['nombre']);?></b></h3>
	            		<h3 align="center"><b class="texto2"><?=@utf8_decode($s2a['texto3'])?></b></h3>
	            		<?php
	            		$cont=0;
	            		$texto = '';
		            		foreach ($s2c as $d2c){
		            			$cont= $cont+1;
		            			$texto= $texto.'<img src="'.base_url().'public/images/pictogramas/'.$d2c['imagen'].'" width="50" height="50"/>';
		            			if ($cont==3){
		            				$texto= $texto.'<br>';
		            			}
		            			if ($cont==6){
		            				$texto= $texto.'<br>';
		            			}
		            			if ($cont==9){
		            				$texto= $texto.'<br>';
		            			}
		            		}
	            		echo '<center>'.$texto.'<br>';
	            		$h = 0;
		            		foreach ($s2e as $datos){
		            		    $h++;
		            		    echo '<b class="texto2">['.$datos['codigo'].']</b> ';
		            		    if($h >= 4){
		            		        echo '<br>';
		            		        $h = 0;
		            		    }
		            		}
	            		echo '<br><br>';
	            		$p = 0;
		            		foreach ($s2b as $datos){
		            		    $p++;
		            		    echo '<b class="texto2">['.$datos['riesgo'].']</b> ';
		            		    if($p >= 4){
		            		        echo '<br>';
		            		        $p = 0;
		            		    }
		            		}
	            		echo '</center>';
			            ?>
			            <br>
			            <b class="texto1">Fecha de caducidad: _______________</b><br><br>
									<b class="texto1">Vea la hoja de seguridad</b>
                </td>
              </tr>
        </table>
				<?php
						if($cont>6||($h1>6&&$p1>6)){
							echo '<br style="page-break-before: always">';
						}
				 ?>
				<table>
					<tr>
						<td style="width: 50%;">

						 <h3><b class="texto3"><?=@utf8_decode($s1['nombre']);?></b></h3>
						 <h3 align="center"><b class="texto2"><?=@utf8_decode($s2a['texto3'])?></b></h3>
						 <?php
						 $cont=0;
						 $texto = '';
							 foreach ($s2c as $d2c){
								 $cont= $cont+1;
								 $texto= $texto.'<img src="'.base_url().'public/images/pictogramas/'.$d2c['imagen'].'" width="50" height="50"/>';
								 if ($cont==3){
									 $texto= $texto.'<br>';
								 }
								 if ($cont==6){
									 $texto= $texto.'<br>';
								 }
								 if ($cont==9){
									 $texto= $texto.'<br>';
								 }
							 }
						 echo '<center>'.$texto.'<br>';
						 $h = 0;
							 foreach ($s2e as $datos){
									 $h++;
									 echo '<b class="texto2">['.$datos['codigo'].']</b> ';
									 if($h >= 4){
											 echo '<br>';
											 $h = 0;
									 }
							 }
						 echo '<br><br>';
						 $p = 0;
							 foreach ($s2b as $datos){
									 $p++;
									 echo '<b class="texto2">['.$datos['riesgo'].']</b> ';
									 if($p >= 4){
											 echo '<br>';
											 $p = 0;
									 }
							 }
						 echo '</center>';
						 ?>
						 <br>
						 <b class="texto1">Fecha de caducidad: _______________</b><br><br>
						 <b class="texto1">Vea la hoja de seguridad</b>
						</td>
						<td style="width: 50%;">

						 <h3><b class="texto3"><?=@utf8_decode($s1['nombre']);?></b></h3>
						 <h3 align="center"><b class="texto2"><?=@utf8_decode($s2a['texto3'])?></b></h3>
						 <?php
						 $cont=0;
						 $texto = '';
							 foreach ($s2c as $d2c){
								 $cont= $cont+1;
								 $texto= $texto.'<img src="'.base_url().'public/images/pictogramas/'.$d2c['imagen'].'" width="50" height="50"/>';
								 if ($cont==3){
									 $texto= $texto.'<br>';
								 }
								 if ($cont==6){
									 $texto= $texto.'<br>';
								 }
								 if ($cont==9){
									 $texto= $texto.'<br>';
								 }
							 }
						 echo '<center>'.$texto.'<br>';
						 $h = 0;
							 foreach ($s2e as $datos){
									 $h++;
									 echo '<b class="texto2">['.$datos['codigo'].']</b> ';
									 if($h >= 4){
											 echo '<br>';
											 $h = 0;
									 }
							 }
						 echo '<br><br>';
						 $p = 0;
							 foreach ($s2b as $datos){
									 $p++;
									 echo '<b class="texto2">['.$datos['riesgo'].']</b> ';
									 if($p >= 4){
											 echo '<br>';
											 $p = 0;
									 }
							 }
						 echo '</center>';
						 ?>
						 <br>
						 <b class="texto1">Fecha de caducidad: _______________</b><br><br>
						 <b class="texto1">Vea la hoja de seguridad</b>
						</td>
					</tr>
				</table>


		<?php
	}
}
?>
