<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicos_model extends CI_Model {

	public function getMedicos(){
		$this->db->where("estado","true");
		$resultados = $this->db->get("medicos");
		return $resultados->result();
	}
    
    public function getMedicos_I(){
		$this->db->where("estado","false");
		$resultados = $this->db->get("medicos");
		return $resultados->result();
	}
    public function getEmp(){
		$this->db;
		$resultados = $this->db->get("cat_empleados");
		return $resultados->result();
	}
	
	public function getEsp(){
		$this->db;
		$resultados = $this->db->get("cat_especialidades");
		return $resultados->result();
	}
    
	public function save($data){
		return $this->db->insert("medicos",$data);
	}
	public function getMedico($id_med){
		$this->db->where("id_med",$id_med);
		$resultado = $this->db->get("medicos");
		return $resultado->row();

	}

	public function update($id_med,$data){
		$this->db->where("id_med",$id_med);
		return $this->db->update("medicos",$data);
	}
}
