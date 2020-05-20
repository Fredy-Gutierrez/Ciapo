<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente_model extends CI_Model {
	
	/*=================================
	obtiene todos los pacientes activos
	===================================*/
    public function getPacientes(){
		$this->db->where("estado",true);
		$resultados = $this->db->get("paciente");
		return $resultados->result();
	}

	/*=================================
	obtiene el paciente activo con el no_exp
	===================================*/
    public function getPacienteNoexp($id){
		$this->db->where("estado",true);
		$this->db->where("no_exp",$id);
		$resultados = $this->db->get("paciente");
		return $resultados->result();
	}

	   public function getPacientebyNoexp($id){
		$this->db->where("estado",true);
		$this->db->where("no_exp",$id);
		$resultados = $this->db->get("paciente");
		return $resultados->result();
	}


		/*=================================
	obtiene el paciente activo con el curp
	===================================*/
    public function getPacienteCurp($id){
		$this->db->where("estado",true);
		$this->db->where("curp",$id);
		$resultados = $this->db->get("paciente");
		return $resultados->result();
	}

	/*=================================
	tipo de sangre
	===================================*/
	public function getCategorias(){
		$this->db->where("estado",true);
		$resultados = $this->db->get("cat_tiposangre");
		return $resultados->result();
	}

	/*=================================
	Religiones
	===================================*/
	public function getReligiones(){
		$this->db->where("estado",true);
		$resultados = $this->db->get("cat_religion");
		return $resultados->result();
	}

	/*=================================
	Discapacidades
	===================================*/
	public function getDiscapacidades(){
		$this->db->where("estado",true);
		$resultados = $this->db->get("cat_discapacidades");
		return $resultados->result();
	}

	/*=================================
	Grupos Etnicos
	===================================*/
	public function getGposEtnicos(){
		$this->db;
		$resultados = $this->db->get("cat_gposetnicos");
		return $resultados->result();
	}
	/*=================================
	Grupo de nacionalidades
	===================================*/
	public function getNacionalidades(){
		$this->db;
		$this->db->order_by("nacionalidad", "asc");
		$resultados = $this->db->get("nacionalidades");
		return $resultados->result();
	}
	public function getEstados(){
		$this->db;
		$this->db->order_by("nombre", "asc");
		$resultados = $this->db->get("estados");
		return $resultados->result();
	}

	public function getMunicipios($id){
		$id = (int) $id;
		$query="select municipios.id,municipios.nombre from municipios,estados where estados.id=municipios.estado_id and estados.id={$id} order by municipios.nombre asc";
		$resultados=$this->db->query($query);
		return $resultados->result();
	}

	public function getLocalidades($id){
		$id = (int) $id;
		$query="select localidades.id,localidades.nombre from localidades,municipios where municipios.id = localidades.municipio_id and municipios.id={$id} order by localidades.nombre asc";
		$resultados=$this->db->query($query);
		return $resultados->result();
	}
	/*=================================
	Viviendas
	===================================*/
	public function getViviendas(){
		$this->db;
		$resultados = $this->db->get("cat_vivienda");
		return $resultados->result();
	}

	/*=================================
	Nivel SocioEconomico
	===================================*/
	public function getNiveles(){
		$this->db;
		$resultados = $this->db->get("cat_nivelsocioeco");
		return $resultados->result();
	}

	/*=================================
	obtiene todos los pacientes inactivos
	===================================*/
    public function getPacientesInactivos(){
		$this->db->where("estado",false);
		$resultados = $this->db->get("paciente");
		return $resultados->result();
	}
    
    /*=================================
	Guarda los datos en la tabla paciente
	===================================*/
	public function save($data){
		return $this->db->insert("paciente",$data);
	}
    
    /*=================================
	obtiene el paciente de acuerdo al id
	===================================*/
	public function getPaciente($id){
		$this->db->where("id_pac",$id);
		$resultado = $this->db->get("paciente");
		return $resultado->row();
	}

	/*=================================
	Actualia lo datos del paciente de acuerdo al id
	===================================*/
	public function update($id_pac,$data){
		$this->db->where("id_pac",$id_pac);
		return $this->db->update("paciente",$data);
	}

}
