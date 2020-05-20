<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class diagnostico_model extends CI_Model {

	public function getDiagnosticos(){
		$this->db->where("estado","true");
		$resultados = $this->db->get("cat_diagnostico");
		return $resultados->result();
        
	}
	public function getEspecial(){
		$this->db;
		$resultados = $this->db->get("cat_especialidades");
		return $resultados->result();
        
	}
	public function getInactivos(){
		$this->db->where("estado","false");
		$resultados = $this->db->get("cat_diagnostico");
		return $resultados->result();
        
	}

	public function save($data){
		return $this->db->insert("cat_diagnostico",$data);
	}
    
	public function getDiagnostico($id_diag){
		$this->db->where("id_diag",$id_diag);
		$resultado = $this->db->get("cat_diagnostico");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_diag",$id);
		return $this->db->update("cat_diagnostico",$data);
	}
}
