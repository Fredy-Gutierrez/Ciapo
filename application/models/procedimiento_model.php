<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class procedimiento_model extends CI_Model {

	public function getProcedimientos(){
		$this->db->where("estado","true");
		$resultados = $this->db->get("cat_procedimiento");
		return $resultados->result();
        
	}

	public function getTabulador(){
		$this->db;
		$resultados = $this->db->get("cat_tabulador");
		return $resultados->result();
        
	}
	public function getInactivos(){
		$this->db->where("estado","false");
		$resultados = $this->db->get("cat_procedimiento");
		return $resultados->result();
        
	}


	public function save($data){
		return $this->db->insert("cat_procedimiento",$data);
	}
    
	public function getProcedimiento($id_proc){
		$this->db->where("id_proc",$id_proc);
		$resultado = $this->db->get("cat_procedimiento");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_proc",$id);
		return $this->db->update("cat_procedimiento",$data);
	}
}
