<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camas_model extends CI_Model {

	public function getCamas(){
		$resultados = $this->db->get("cat_cama_onco");
		return $resultados->result();
	}
	public function getCamasp(){
		$this->db->where("tipo","0");
		$resultados = $this->db->get("cat_cama_onco");
		return $resultados->result();
	}
	public function getCamasa(){
		$this->db->where("tipo","1");
		$resultados = $this->db->get("cat_cama_onco");
		return $resultados->result();
	}
	public function comprovacion($d,$t){
		$this->db->where("descripcion",$d);
		$this->db->where("tipo",$t);
		$resultados = $this->db->get("cat_cama_onco");
		return $resultados->result();
	}


	public function save($data){
		return $this->db->insert("cat_cama_onco",$data);
	}
	public function delete($id){
		$this->db->where("id_cama",$id);
		$this->db->delete("cat_cama_onco");
	}


	public function getMedicamento($id){
		$this->db->where("id_cama",$id);
		$resultado = $this->db->get("cat_medicamentos");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("idmed",$id);
		return $this->db->update("cat_medicamentos",$data);
	}
}
