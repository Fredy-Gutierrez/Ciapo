<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sangre extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Sangre_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if ($this->session->userdata("login")) {
			$data  = array(
				'cat_tiposangre' => $this->Sangre_model->getSangre(), 
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/Sangre/list",$data);
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}
		

	}

	public function Inactivos()
	{
		$data  = array(
			'cat_tiposangre' => $this->Sangre_model->getInactivos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Sangre/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

	$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
	$this->load->view("admin/Sangre/add");
		$this->load->view("layouts/footer");
	}

public function store(){
		
		$estado = $this->input->post("estado");
		$descripcion = $this->input->post("descripcion");
		$descripcion=strtoupper($descripcion);
		$data  = array(
			'descripcion' => $descripcion,
			'estado' => $estado
		);

		if ($this->Sangre_model->save($data)) {
			redirect(base_url()."mantenimiento/Sangre");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/Sangre/add");
		}
	
}
	public function edit($id){
		$data  = array(
			'cat_tiposangre' => $this->Sangre_model->getSangre1($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Sangre/edit",$data);
	$this->load->view("layouts/footer");
	}

	public function update(){
		$id_sangre = $this->input->post("id_sangre");
		$descripcion = $this->input->post("descripcion");
		//$descripcion = $this->input->post("descripcion");

		$data = array(
			'descripcion' => $descripcion, 
		);

		if ($this->Sangre_model->update($id_sangre,$data)) {
			redirect(base_url()."mantenimiento/Sangre");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/Sangre/edit/".$id_sangre);
		}	
	}

public function view($id){
		$data  = array(
			'Sangre' => $this->Sangre_model->getSangre1($id), 
		);
		$this->load->view("admin/Sangre/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => false, 
	);
		$this->Sangre_model->update($id,$data);
		echo "mantenimiento/Sangre";
	}

	public function activar($id){
		$data  = array(
			'estado' => true, 
	);
		$this->Sangre_model->update($id,$data);
		echo "mantenimiento/Sangre/Inactivos";
	}

}