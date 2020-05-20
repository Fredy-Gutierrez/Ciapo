<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicamentos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Medicamentos_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if ($this->session->userdata("login")) {
			
			$data  = array(
				'cat_medicamentos' => $this->Medicamentos_model->getMedicamentos(), 
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/Medicamentos/list",$data);
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}
		

	}
	public function index_Inactivos()
	{
		$data  = array(
			'cat_medicamentos' => $this->Medicamentos_model->getMedicamentos_Inactivos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Medicamentos/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Medicamentos/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		//$id = $this->input->post("id");
		$clave = $this->input->post("clave");
		$nombre = $this->input->post("nombregen");
		$tabulador = $this->input->post("idtab");
		$estado = $this->input->post("estado");
		$nombre = strtoupper($nombre);

		$data  = array(
			//'id' => $id, 
			'clave' => $clave,
			'nombregen' => $nombre,
			'idtab' => "1",
			'estado' => $estado

		);

		if ($this->Medicamentos_model->save($data)) {
			redirect(base_url()."mantenimiento/Medicamentos");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/Medicamentos/add");
		}
	}

	public function edit($id){
		$data  = array(
			'cat_medicamentos' => $this->Medicamentos_model->getMedicamento($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Medicamentos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id = $this->input->post("idmed");
		$clave = $this->input->post("clave");
		$nombre = $this->input->post("nombregen");
		$tabulador = $this->input->post("idtab");
		$estado = $this->input->post("estado");


		$data = array(
			'idmed' => $id,
			'clave' => $clave,
			'nombregen' => $nombre,
			'idtab' => "1",  
			'estado' => $estado,
		);

		if ($this->Medicamentos_model->update($id,$data)) {
			redirect(base_url()."mantenimiento/medicamentos");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/medicamentos/edit/".$id);
		}
	}


	public function view($id){
		$data  = array(
			'cat_medicamentos' => $this->Medicamentos_model->getMedicamento($id), 
		);
		$this->load->view("admin/medicamentos/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => "false", 
		);
		$this->Medicamentos_model->update($id,$data);
		echo "mantenimiento/Medicamentos";
	}
	public function activated($id){
		$data  = array(
			'estado' => "true", 
		);
		$this->Medicamentos_model->update($id,$data);
		echo "mantenimiento/medicamentos/index_Inactivos";
		
	}
}

