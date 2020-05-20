<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Farmacia extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Farmacia_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function index()
	{
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Farmacia/list");
		$this->load->view("layouts/footer");
	}
	public function citas_json(){
		$data=$this->Farmacia_model->getcitas();
		$i=0;
		$array=array();
		while ($row = pg_fetch_array($data, null, PGSQL_ASSOC)) {
			$array[$i]=$row;
			$i++;
		};
		echo json_encode( $array );
	}
}

