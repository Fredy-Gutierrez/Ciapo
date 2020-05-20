<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {
    
    public function getUsuario(){
		$this->db->where("estado",true);
		$this->db->order_by("id_usuario", "asc");
		$resultados = $this->db->get("cat_usuario");
		return $resultados->result();
	}

	public function getUsuarioId($id){
		$this->db->where("id_emp",$id);
		$resultados = $this->db->get("cat_usuario");
		return $resultados->result();
	}
    
    public function getEmpleado(){
		$query="select * 
			from cat_empleados left join cat_usuario 
				on cat_usuario.id_emp = cat_empleados.id_emp
			where cat_usuario.id_emp IS NULL";
        $resultado= $this->db->query($query);
        return $resultado->result();
	}
    
    public function getRol(){
		$this->db;
		$resultados = $this->db->get("cat_rol");
		return $resultados->result();
	}
    

	public function login($username, $password){
		$query = "SELECT cat_empleados.id_emp,cat_empleados.nombre,cat_empleados.ape_pat,cat_empleados.ape_mat,
						cat_rol.descripcion as descripcionr, cat_tipoempleado.descripcion as descripcionte, medicos.id_med
				FROM CAT_USUARIO inner join cat_empleados on cat_usuario.id_emp=cat_empleados.id_emp
					inner join cat_rol on cat_usuario.id_rol=cat_rol.id_tipo 
					inner join cat_tipoempleado on cat_empleados.id_tipoemp=cat_tipoempleado.id_tipo
					left join medicos on cat_empleados.id_emp = medicos.id_emp
				where cat_usuario.usuario='{$username}' and cat_usuario.pass='{$password}'";

		$resultados = $this->db->query($query);


		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	public function checkEmpleado($data){
		$query="select * from cat_usuario where id_emp='{$data}'";
        $resultado= $this->db->query($query);
        return $resultado->result();
	}

	public function checkUsuario($data){
		$query="select * from cat_usuario where usuario='{$data}'";
        $resultado= $this->db->query($query);
        return $resultado->row();
	}
	public function checkIdUsuario($data){
		$query="select * from cat_usuario where id_usuario='{$data}'";
        $resultado= $this->db->query($query);
        return $resultado->row();
	}
    
    
    public function getInactivos(){
        $this->db->where("estado","false");
        $this->db->order_by("id_usuario", "asc");
		$resultados = $this->db->get("cat_usuario");
		return $resultados->result();
    }

	public function save($data){
		return $this->db->insert("cat_usuario",$data);
	}
    
	public function getUsuarios1($id){
		$this->db->where("id_usuario",$id);
		$resultado = $this->db->get("cat_usuario");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_usuario",$id);
		return $this->db->update("cat_usuario",$data);
	}

	public function search($usuario){
		$this->db->where("usuario",$usuario);
		$resultados = $this->db->get("cat_usuario");
		return $resultados->result();
	}

	public function getMedico($id){
		$this->db->where("id_emp",$id);
		$resultado = $this->db->get("medicos");
		return $resultado->row();

	}

}
