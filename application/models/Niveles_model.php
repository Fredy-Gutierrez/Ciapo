<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Niveles_model extends CI_Model {

	public function getNiveles(){
$this->db->where("estado",true);
		$resultados = $this->db->get("cat_nivelsocioeco");
		return $resultados->result();
	}

public function getInactivos(){
$this->db->where("estado",false);
		$resultados = $this->db->get("cat_nivelsocioeco");
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("cat_nivelsocioeco",$data);
	}
    
	public function getNiveles1($idnse){
		$this->db->where("idnse",$idnse);
		$resultado = $this->db->get("cat_nivelsocioeco");
		return $resultado->row();

	}

	public function update($idnse,$data){
		$this->db->where("idnse",$idnse);
		return $this->db->update("cat_nivelsocioeco",$data);
	}
}
