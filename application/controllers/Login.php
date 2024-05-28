<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('comun_model');
		$this->load->library('session');
	}

	public function cache(){
		$this->output->clear_all_cache(); // Clears all cache from the cache directory
		$this->load->view("configuracion/cache");

	}

	public function index(){
		if($this->input->post('acceso') == 1){
			$usuario = $this->input->post('usuario');
			$password = $this->input->post('pass');
			$password2 = sha1($password);

			$donde = array('nombre' => $usuario, 'contrasena' => $password2, 'estatus' => 1);
			$usuario = $this->comun_model->getRegistro('usuarios',$donde);
			if(empty($usuario)){
				$data['msj']= 'Error usuario o contraseña, son incorrectos';
				$this->session->set_userdata('autenticado', false);
				$this->load->view('header');
				$this->load->view('login',$data);
				$this->load->view('footer');
			}else{
				$this->session->set_userdata('autenticado', true);
				$this->session->set_userdata('rol', $usuario->IdRol);
				$this->session->set_userdata('usuario', $usuario->nombre);
				$this->session->set_userdata('id', $usuario->IdUsuario);

				$data['reg'] = $this->comun_model->getUsuarioByID($usuario->IdUsuario);
				$this->load->view('header');
				$this->load->view('base',$data);
				$this->load->view('footer');
			}
		}else{
			if($this->session->userdata('autenticado')){
				$data['reg'] = $this->comun_model->getUsuarioByID($this->session->userdata('id'));
				$this->load->view('header');
				$this->load->view('base',$data);
				$this->load->view('footer');
			}else{
				$this->session->set_userdata('autenticado', false);
				$this->load->view('header');
				$this->load->view('login');
				$this->load->view('footer');
			}
		}
	}

	public function cerrar(){
		$this->session->set_userdata('autenticado', false);
		$this->session->sess_destroy();
		redirect('');
	}
}
?>
