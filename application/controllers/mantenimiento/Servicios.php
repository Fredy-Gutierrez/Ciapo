<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Servicios extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Servicios_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if ($this->session->userdata("login")) {
			$data  = array(
				'cat_servicios' => $this->Servicios_model->getServicios(), 
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/Servicios/list",$data);
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}

	}

	public function Inactivos()
	{
		$data  = array(
			'cat_servicios' => $this->Servicios_model->getInactivos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Servicios/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

	$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
	$this->load->view("admin/Servicios/add");
		$this->load->view("layouts/footer");
	}

public function store(){
		$estado = $this->input->post("estado");
		$desser = $this->input->post("desser");
		$desser=strtoupper($desser);
		$data  = array(
			'desser' => $desser,
			'estado' => $estado
		);

		if ($this->Servicios_model->save($data)) {
			redirect(base_url()."mantenimiento/Servicios");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/Servicios/add");
		}
	
}
	public function edit($id){
		$data  = array(
			'cat_servicios' => $this->Servicios_model->getServicios1($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Servicios/edit",$data);
	$this->load->view("layouts/footer");
	}

	public function update(){
		$id_catser = $this->input->post("id_catser");
		$desser = $this->input->post("desser");

		//$descripcion = $this->input->post("descripcion");

		$data = array(
			'desser' => $desser,
		);

		if ($this->Servicios_model->update($id_catser,$data)) {
			redirect(base_url()."mantenimiento/Servicios");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/Servicios/edit/".$id_catser);
		}	
	}

public function view($id){
		$data  = array(
			'Servicios' => $this->Sangre_model->getServicios1($id), 
		);
		$this->load->view("admin/Servicios/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => "false", 
	);
		$this->Servicios_model->update($id,$data);
		echo "mantenimiento/Servicios";
	}

	public function activar($id){
		$data  = array(
			'estado' => "true", 
	);
		$this->Servicios_model->update($id,$data);
		echo "mantenimiento/Servicios/Inactivos";
	}

}