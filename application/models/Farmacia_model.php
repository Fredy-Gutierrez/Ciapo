<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Farmacia_model extends CI_Model {

	public function getAgenda(){
		//$this->db->where("estado","true");
		$resultados = $this->db->get("agenda");
		return $resultados->result();
	}
	public function getcitas(){
		$query = 'SELECT * FROM agenda';
		$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		return $result;
	}
}
