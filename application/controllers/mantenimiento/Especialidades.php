<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Especialidades extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Especialidades_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	
	public function index()
	{		
		if ($this->session->userdata("login")) {
			$data  = array(
				'Especialidades' => $this->Especialidades_model->getEspecialidades(), 
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/Especialidades/list",$data);
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}
		

	}


public function Inactivos()
	{
		$data  = array(
			'Especialidades' => $this->Especialidades_model->getInactivos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Especialidades/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Especialidades/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		
		$nombreesp = $this->input->post("nombreesp");
        $nombreesp= strtoupper($nombreesp);//Comando Para Convertir en Mayusculas

		$data  = array(
			 
			'nombreesp' => $nombreesp,

		);

		if (empty($this->Especialidades_model->comparar($nombreesp))) {
			# code...

if ($this->Especialidades_model->save($data)) {
			redirect(base_url()."mantenimiento/Especialidades");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/Especialidades/add");
		}

		} else {
			$this->session->set_flashdata("error","Ya Existe");
			redirect(base_url()."mantenimiento/Especialidades/add");


		}

		
	}

	public function edit($id){
		$data  = array(
			'Especialidades' => $this->Especialidades_model->getEspecialidades1($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Especialidades/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idesp = $this->input->post("idesp");
		$nombreesp = $this->input->post("descripcion");
		$nombreesp = strtoupper($nombreesp);//Convertir A Mayusculas

		$data = array(
			'nombreesp' => $nombreesp, 
		);

		if ($this->Especialidades_model->update($idesp,$data)) {
			redirect(base_url()."mantenimiento/Especialidades");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/Especialidades/edit/".$idesp);
		}
	}

	public function view($id){
		$data  = array(
			'Especialidades' => $this->Especialidades_model->getEspecialidades1($id), 
		);
		$this->load->view("admin/Especialidades/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => "false", 
		);
		$this->Especialidades_model->update($id,$data);
		echo "mantenimiento/Especialidades";
	}
	public function activar($id){
		$data  = array(
			'estado' => "true", 
		);
		$this->Especialidades_model->update($id,$data);
		echo "mantenimiento/Especialidades/Inactivos";
	}
}
