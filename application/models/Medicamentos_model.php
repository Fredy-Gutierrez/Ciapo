<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamentos_model extends CI_Model {

	public function getMedicamentos(){
		$this->db->where("estado","true");
		$resultados = $this->db->get("cat_medicamentos");
		return $resultados->result();
	}
	public function getMedicamentos_Inactivos(){
		$this->db->where("estado","false");
		$resultados = $this->db->get("cat_medicamentos");
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("cat_medicamentos",$data);
	}
	public function getMedicamento($id){
		$this->db->where("idmed",$id);
		$resultado = $this->db->get("cat_medicamentos");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("idmed",$id);
		return $this->db->update("cat_medicamentos",$data);
	}
}
