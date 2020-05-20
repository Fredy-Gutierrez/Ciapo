<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Estados extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Estados_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if ($this->session->userdata("login")) {
			$data  = array(
				'cat_estados' => $this->Estados_model->getEstados(), 
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/Estados/list",$data);
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}
		

	}

	public function Inactivos()
	{
		$data  = array(
			'cat_estados' => $this->Estados_model->getInactivos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Estados/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

	$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
	$this->load->view("admin/Estados/add");
		$this->load->view("layouts/footer");
	}

public function store(){
		$id = $this->input->post("id_edo");
		$estado = $this->input->post("estado");
		$descripcion = $this->input->post("descripcion");
		$descripcion=strtoupper($descripcion);
		$data  = array(
			'id_edo'=> $id,
			'descripcion' => $descripcion,
			'estado' => $estado
		);

		if ($this->Estados_model->save($data)) {
			redirect(base_url()."mantenimiento/Estados");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/Estados/add");
		}
	
}
	public function edit($id){
		$data  = array(
			'cat_estados' => $this->Estados_model->getEstados1($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Estados/edit",$data);
	$this->load->view("layouts/footer");
	}

	public function update(){
		$id = $this->input->post("id");
		$id_edo = $this->input->post("id_edo");
		$descripcion = $this->input->post("descripcion");
		//$descripcion = $this->input->post("descripcion");

		$data = array(
			'id_edo' => $id_edo,
			'descripcion' => $descripcion, 
		);

		if ($this->Estados_model->update($id,$data)) {
			redirect(base_url()."mantenimiento/Estados");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/Estados/edit/".$id);
		}	
	}

public function view($id){
		$data  = array(
			'Estados' => $this->Estados_model->getEstados1($id), 
		);
		$this->load->view("admin/Estados/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => false, 
	);
		$this->Estados_model->update($id,$data);
		echo "mantenimiento/Estados";
	}

	public function activar($id){
		$data  = array(
			'estado' => true, 
	);
		$this->Estados_model->update($id,$data);
		echo "mantenimiento/Estados/Inactivos";
	}

}