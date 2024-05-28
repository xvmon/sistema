<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('comun_model');
		$this->load->library('session');
	}
	
	public function index(){
		if($this->session->userdata('autenticado')){	
			$this->load->view('header');
			$idu = $this->session->userdata('id');
			if($idu == 1){
				$this->load->view('producto/producto');
				$this->load->view('producto/productoJs');
			}else{
				$this->load->view('producto/producto_simple');
				$this->load->view('producto/producto_simpleJs');
			}
			$this->load->view('footer');
		}else{
			$this->session->set_userdata('autenticado', false);
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
	}
	
	public function getProductos() {
		if($this->session->userdata('autenticado')){			
			$data = $this->comun_model->getProductos();			
			echo json_encode($data);
		}else{
			$this->session->set_userdata('autenticado', false);
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
	}
	
	public function getProducto(){
		if($this->session->userdata('autenticado')){
			$id = $this->input->post('id');
			$donde = array('IdProducto' => $id);
			$registro = $this->comun_model->getRegistro('productos',$donde);
			echo json_encode($registro);
		}else{
			$this->session->set_userdata('autenticado', false);
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
	}
	
	public function proceso(){
		if($this->session->userdata('autenticado')){
			$modo = $this->input->post('modo');
			$id = $this->input->post('id');
			unset($_POST['id']);
			unset($_POST['modo']);	
			$hoy = date("Y-m-d");
			$idu = $this->session->userdata('id');
			
			if($modo == 1){				
				$donde = '';
				$_POST['cantidad'] = 0;
				$resp = $this->comun_model->proceso('productos',$modo,$donde,$_POST);
				$dh = array('fecha' => $hoy, 'descripcion' => 'Usuario '.$idu.', agregar producto');
				$this->comun_model->proceso('historial',1,'',$dh);
				if($resp != 0){
					echo 'Registrar '.$_POST['nombre'];
				}else{
					echo 'Error al insertar';
				}
			}
			
			if($modo == 2){				
				$donde = array('IdProducto' => $id);			
				$resp2 = $this->comun_model->proceso('productos',$modo,$donde,$_POST);
				$dh = array('fecha' => $hoy, 'descripcion' => 'Usuario '.$idu.', actualiza producto'.$id);
				$this->comun_model->proceso('historial',1,'',$dh);
				if($resp2 != 0){
					echo 'Actualizar '.$_POST['nombre'];
				}else{
					echo 'Error al actualizar';
				}
			}
			
			if($modo == 3){
				if($_POST['estatus'] == 'Baja'){
					$estatus = 1;
				}else{
					$estatus = 0;
				}
				$datos = array('estatus' => $estatus);				
				$donde = array('IdProducto' => $id);
				$resp3 = $this->comun_model->proceso('productos',2,$donde,$datos);
				$dh = array('fecha' => $hoy, 'descripcion' => 'Usuario '.$idu.', cambio estatus del producto'.$id);
				$this->comun_model->proceso('historial',1,'',$dh);
				if($resp3 != 0){
					echo 'Cambio de estatus '.$id;
				}else{
					echo 'Error estatus';
				}
			}

			if($modo == 4){				
				$donde = array('IdProducto' => $id);	
				$salida = $_POST['salida'];
				unset($_POST['salida']);		
				$registro = $this->comun_model->getRegistro('productos',$donde);
				$cantidad = $registro->cantidad;
				if($cantidad >= $salida){
					$_POST['cantidad'] = $cantidad - $salida;
					$resp4 = $this->comun_model->proceso('productos',2,$donde,$_POST);

					$dh = array('fecha' => $hoy, 'descripcion' => 'Usuario '.$idu.', salida de producto'.$id);
					$this->comun_model->proceso('historial',1,'',$dh);
					if($resp4 != 0){
						echo 2;
					}else{
						echo 1;
					}
				}else{
					echo 0;
				}
			}

			if($modo == 5){	
				$entrada = $_POST['entrada'];				
				$donde = array('IdProducto' => $id);	
				$registro = $this->comun_model->getRegistro('productos',$donde);
				$_POST['cantidad'] = $registro->cantidad + $_POST['entrada'];	
				unset($_POST['entrada']);	

				$resp5 = $this->comun_model->proceso('productos',2,$donde,$_POST);
				$dh = array('fecha' => $hoy, 'descripcion' => 'Usuario '.$idu.', entrada de producto'.$id);
				$this->comun_model->proceso('historial',1,'',$dh);
				if($resp5 != 0){
					echo 1;
				}else{
					echo 0;
				}
			}
		}else{
			$this->session->set_userdata('autenticado', false);
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
	}
}
?>
