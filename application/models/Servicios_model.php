<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios_model extends CI_Model {

	public function getServicios(){
		$this->db->where("estado","true");
		$resultados = $this->db->get("cat_servicios");
		return $resultados->result();
	}

	public function getInactivos(){
		$this->db->where("estado","false");
		$resultados = $this->db->get("cat_servicios");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("cat_servicios",$data);
	}
	public function getServicios1($id){
		$this->db->where("id_catser",$id);
		$resultado = $this->db->get("cat_servicios");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_catser",$id);
		return $this->db->update("cat_servicios",$data);
	}
}
