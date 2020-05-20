<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados_model extends CI_Model {

	public function getEmpleados(){
		$this->db->where("estado","true");
		$resultados = $this->db->get("cat_empleados");
		return $resultados->result();
	}
    
    public function getEmpleados_I(){
		$this->db->where("estado","false");
		$resultados = $this->db->get("cat_empleados");
		return $resultados->result();
	}
    public function getTipos(){
		$this->db;
		$resultados = $this->db->get("cat_tipoempleado");
		return $resultados->result();
	}
    
    public function getA(){
		$this->db->where("estado","true");
		$resultados = $this->db->get("cat_tipoEmpleado");
		return $resultados->result();
	}
    
	public function save($data){
		return $this->db->insert("cat_empleados",$data);
	}
	public function getEmpleado($id_emp){
		$this->db->where("id_emp",$id_emp);
		$resultado = $this->db->get("cat_empleados");
		return $resultado->row();

	}

	public function update($id_emp,$data){
		$this->db->where("id_emp",$id_emp);
		return $this->db->update("cat_empleados",$data);
	}
}
