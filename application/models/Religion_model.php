<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Religion_model extends CI_Model {

	public function getReligion(){
		$this->db->where("estado","true");
		$this->db->order_by("id_religion", "asc");
		$resultados = $this->db->get("cat_religion");
		return $resultados->result();
	}
    
    public function getInactivos(){
        $this->db->where("estado","false");
        $this->db->order_by("id_religion", "asc");
		$resultados = $this->db->get("cat_religion");
		return $resultados->result();
    }

    public function checkRelig($data){
		$query="select * from cat_religion where descripcion='{$data}'";
        $resultado= $this->db->query($query);
        return $resultado->row();

    }
    public function checkIdRel($data){
    	$query="select * from cat_religion where id_religion='{$data}'";
        $resultado= $this->db->query($query);
        return $resultado->row();
    }

	public function save($data){
		return $this->db->insert("cat_religion",$data);
	}
    
	public function getReligion1($id){
		$this->db->where("id_religion",$id);
		$resultado = $this->db->get("cat_religion");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_religion",$id);
		return $this->db->update("cat_religion",$data);
	}
}
