<!DOCTYPE html>
<html>
    <head>
        <title>Sistema</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="icon" type="image/png" href="<?php echo base_url();?>public/images/icon.png" />
	    <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url();?>public/font-awesome/css/font-awesome.min.css">
	    <link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url();?>public/DataTable/css/dataTables.bootstrap.min.css">
    	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url();?>public/DataTable/css/buttons.dataTables.min.css">
    	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url();?>public/Selector/css/bootstrap-select.min.css" />
    	<link rel = "stylesheet" type = "text/css"  href = "<?php echo base_url();?>public/css/estilos.css" />

	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/js/jquery-3.2.1.min.js"></script>
	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/DataTable/js/jquery.dataTables.min.js"></script>
	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/DataTable/js/dataTables.bootstrap.min.js"></script>
	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/DataTable/js/dataTables.buttons.min.js"></script>
	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/DataTable/js/buttons.html5.min.js"></script>
	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/DataTable/js/vfs_fonts.js"></script>
	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/DataTable/js/pdfmake.min.js"></script>
	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/DataTable/js/jszip.min.js"></script>
	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/DataTable/js/buttons.print.min.js"></script>
	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/DataTable/js/dataTables.searchHighlight.min.js"></script>
	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/DataTable/js/jquery.highlight.js"></script>
	    <script type = 'text/javascript' src = "<?php echo base_url();?>public/Selector/js/bootstrap-select.min.js"></script>

	  	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
<body>
<?php
if($this->session->userdata('autenticado')){
	if ($this->session->userdata('rol') == 1){
	?>
	<div class="topnav" id="myTopnav">
    <div class="topnav-elements">
      <a class="nav-link" href="<?=base_url();?>">Inicio</a>
      <a class="nav-link" href="<?=base_url();?>index.php/Usuarios">Usuarios</a>
	  <a class="nav-link" href="<?=base_url()?>index.php/Productos">Productos</a>
	  <a class="nav-link" href="<?=base_url()?>index.php/Historial">Historial</a>
      <a class="nav-link" href="<?=base_url()?>index.php/Login/cerrar">Salir</a>
          <a class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
          </a>
    </div>
	</div>
	<?php
	}else{
	?>
	<div class="topnav" id="myTopnav">
    <div class="topnav-elements">
    		<a class="nav-link" href="<?=base_url()?>">Inicio</a>
    		<a class="nav-link" href="<?=base_url()?>index.php/Productos">Productos</a>
    		<a class="nav-link" href="<?=base_url()?>index.php/Login/cerrar">Salir</a>
          	<a class="icon" onclick="myFunction()">
            	<i class="fa fa-bars"></i>
          	</a>
    </div>
	</div>
	<?php
	}
}
?>
<div style="padding: 50px;">
