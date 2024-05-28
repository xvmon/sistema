<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Historial extends CI_Controller{
	public function __construct() {
		parent::__construct();
		$this->load->model('comun_model');
		$this->load->library('session');
	}
	
	public function index(){
		if($this->session->userdata('autenticado')){	
			$this->load->view('header');
			$this->load->view('historial/historial');
			$this->load->view('historial/historialJs');
			$this->load->view('footer');
		}else{
			$this->session->set_userdata('autenticado', false);
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
	}
	
	public function getHistorial() {
		if($this->session->userdata('autenticado')){			
			$data = $this->comun_model->getHistorial();			
			echo json_encode($data);
		}else{
			$this->session->set_userdata('autenticado', false);
			$this->load->view('header');
			$this->load->view('login');
			$this->load->view('footer');
		}
	}
}
?>
