<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sangre_model extends CI_Model {

	public function getSangre(){
		$this->db->where("estado","true");
		$resultados = $this->db->get("cat_tiposangre");
		return $resultados->result();
	}

	public function getInactivos(){
		$this->db->where("estado","false");
		$resultados = $this->db->get("cat_tiposangre");
		return $resultados->result();
	}

	public function save($data){
		return $this->db->insert("cat_tiposangre",$data);
	}
	public function getSangre1($id){
		$this->db->where("id_sangre",$id);
		$resultado = $this->db->get("cat_tiposangre");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_sangre",$id);
		return $this->db->update("cat_tiposangre",$data);
	}
}
