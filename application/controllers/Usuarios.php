<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('comun_model');
		$this->load->library('session');
	}
	
	public function index(){
		if($this->session->userdata('autenticado')){	
			$this->load->view('header');
			$this->load->view('usuario/usuario');
			$this->load->view('usuario/usuarioJs');
			$this->load->view('footer');
		}else{
			$this->session->set_userdata('autenticado', false);
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
	}
	
	public function getUsuarios() {
		if($this->session->userdata('autenticado')){			
			$data = $this->comun_model->getUsuarios();			
			echo json_encode($data);
		}else{
			$this->session->set_userdata('autenticado', false);
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
	}
	
	public function getUsuario(){
		if($this->session->userdata('autenticado')){
			$id = $this->input->post('id');
			$donde = array('IdUsuario' => $id);
			$registro = $this->comun_model->getRegistro('usuarios',$donde);
			echo json_encode($registro);
		}else{
			$this->session->set_userdata('autenticado', false);
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
	}
	
	public function procesoUsuario(){
		if($this->session->userdata('autenticado')){
			$modo = $this->input->post('modo');
			$id = $this->input->post('id');
			unset($_POST['id']);
			unset($_POST['modo']);
			
			if($modo == 1){	
				$donde = array('nombre' => $_POST['usuario']);
				$registro = $this->comun_model->getRegistro('usuarios',$donde);
				if(empty($registro->usuario)){
					$pass = sha1($_POST['contrasenia']);
					$_POST['contrasena'] = $pass;	
					$_POST['nombre'] = $_POST['usuario'];			
					unset($_POST['contrasenia']);
					unset($_POST['usuario']);
					$donde = '';
					$resp = $this->comun_model->proceso('usuarios',$modo,$donde,$_POST);
					if($resp != 0){
						echo 'Registrar '.$_POST['nombre'];
					}else{
						echo 'Error al insertar';
					}
				}else{
					echo 'El usuario ya existe '.$_POST['usuario'];
				}
			}
			if($modo == 2){				
				if($_POST['contrasenia'] != '' || !empty($_POST['contrasenia'])){				
					$pass = sha1($_POST['contrasenia']);
					$_POST['contrasena'] = $pass;					
				}
				$nombre = $_POST['usuario'];	
				unset($_POST['contrasenia']);
				unset($_POST['usuario']);
				$donde = array('IdUsuario' => $id);				
				$resp = $this->comun_model->proceso('usuarios',$modo,$donde,$_POST);
				if($resp != 0){
					echo 'Actualizar '.$nombre;
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
				$donde = array('IdUsuario' => $id);
				$resp = $this->comun_model->proceso('usuarios',2,$donde,$datos);
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
