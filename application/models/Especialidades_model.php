<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidades_model extends CI_Model {

	public function getEspecialidades(){
$this->db->where("estado",true);
		$resultados = $this->db->get("cat_especialidades");
		return $resultados->result();
	}

public function getInactivos(){
$this->db->where("estado",false);
		$resultados = $this->db->get("cat_especialidades");
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("cat_especialidades",$data);
	}
    
	public function getEspecialidades1($idesp){
		$this->db->where("idesp",$idesp);
		$resultado = $this->db->get("cat_especialidades");
		return $resultado->row();

	}

	public function update($idesp,$data){
		$this->db->where("idesp",$idesp);
		return $this->db->update("cat_especialidades",$data);
	}

	public function comparar($nombreesp){
	$this->db->where("nombreesp",$nombreesp);
		$resultados = $this->db->get("cat_especialidades");
		return $resultados->result();
	}

}
