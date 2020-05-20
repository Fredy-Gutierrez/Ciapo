<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estados_model extends CI_Model {

	public function getEstados(){
		$this->db->where("estado","true");
		$resultados = $this->db->get("cat_estados");
		return $resultados->result();
	}

	public function getInactivos(){
		$this->db->where("estado","false");
		$resultados = $this->db->get("cat_estados");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("cat_estados",$data);
	}
	public function getEstados1($id){
		$this->db->where("id_edo",$id);
		$resultado = $this->db->get("cat_estados");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_edo",$id);
		return $this->db->update("cat_estados",$data);
	}
}