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
					$resp = $this->comun_model->proceso('productos',$modo,$donde,$_POST);
					$datosh = array('fecha' => $hoy, 'descripcion' => 'el usuario '.$idu.' agrego un producto');
					$this->comun_model->proceso('historial',1,'',$datosh);
					if($resp != 0){
						echo 'Registrar '.$_POST['nombre'];
					}else{
						echo 'Error al insertar';
					}
			}
			
			if($modo == 2){				
				$donde = array('IdProducto' => $id);			
				$resp = $this->comun_model->proceso('productos',$modo,$donde,$_POST);

				$datosh = array('fecha' => $hoy, 'descripcion' => 'el usuario '.$idu.' actualizo el producto'.$id);
				$this->comun_model->proceso('historial',1,'',$datosh);
				if($resp != 0){
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
				$resp = $this->comun_model->proceso('productos',2,$donde,$datos);

				$datosh = array('fecha' => $hoy, 'descripcion' => 'el usuario '.$idu.' cambio el estatus del producto'.$id);
				$this->comun_model->proceso('historial',1,'',$datosh);
				if($resp != 0){
					echo 'Cambio de estatus '.$id;
				}else{
					echo 'Error estatus';
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
