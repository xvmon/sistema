<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class comun_model extends CI_Model{
	function getRegistro($tabla,$donde){
		$this->db->where($donde);
		$query = $this->db->get($tabla);
		if($query->num_rows() >= 0){
			return $query->row();
		}else{
			return 0;
		}
	}
	
	
	function consultaRegistro($query) {
		$query = $this->db->query($query);
		if($query->num_rows() >= 0){
			return $query->row();
		}else{
			return 0;
		}
	}
	
	function consultaLista($query) {
		$query = $this->db->query($query);
		if($query->num_rows() >= 0){
			return $query->result();
		}else{
			return 0;
		}
	}
	
	function proceso($tabla,$modo,$donde,$datos){
		$sql = 0;
		
		if($modo == 1){
			try {				
				$sql = $this->db->insert($tabla,$datos);
			}catch (Exception $e) {
				$sql = 0;
			}
		}
		
		if($modo == 2){
			try {				
				$this->db->where($donde);
				$sql = $this->db->update($tabla,$datos);
			}catch (Exception $e) {
				$sql = 0;
			}
		}
		
		if($modo == 4){
			try {
				$this->db->where($donde);
				$sql = $this->db->delete($tabla);
			}catch (Exception $e) {
				$sql = 0;
			}
		}
		
		return $sql;
	}
	
	function getUsuarioByID($id) {
		$texto = "SELECT * FROM usuarios WHERE IdUsuario = '".$id."';";
		return $this->consultaRegistro($texto);
	}
	
	function getUsuarios() {
		$texto = "SELECT IdUsuario, nombre, IF(estatus = 1, 'Alta','Baja') AS estatus FROM usuarios;";
		return $this->consultaLista($texto);
	}

	function getProductos() {
		$texto = "SELECT IdProducto, nombre, IF(estatus = 1, 'Alta','Baja') AS estatus, cantidad FROM productos;";
		return $this->consultaLista($texto);
	}

	function getHistorial() {
		$texto = "SELECT * FROM historial;";
		return $this->consultaLista($texto);
	}
}
?>
