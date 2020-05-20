<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CategoriaSangre_model extends CI_Model {
    
    public function getCategorias(){
		$this->db;
		$resultados = $this->db->get("cat_tiposangre");
		return $resultados->result();
	}
}