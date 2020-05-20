<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Niveles extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Niveles_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if ($this->session->userdata("login")) {
			$data  = array(
				'Niveles' => $this->Niveles_model->getNiveles(), 
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/Niveles/list",$data);
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}
		

	}


public function Inactivos()
	{
		$data  = array(
			'Niveles' => $this->Niveles_model->getInactivos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Niveles/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Niveles/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		
		$descripcion = $this->input->post("descripcion");
        $descripcion= strtoupper($descripcion);//Comando Para Convertir en Mayusculas

		$data  = array(
			 
			'descripcion' => $descripcion,

		);

		if ($this->Niveles_model->save($data)) {
			redirect(base_url()."mantenimiento/Niveles");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/Niveles/add");
		}
	}

	public function edit($id){
		$data  = array(
			'Niveles' => $this->Niveles_model->getNiveles1($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Niveles/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idnse = $this->input->post("idnse");
		$descripcion = $this->input->post("descripcion");
		$descripcion = strtoupper($descripcion);//Convertir A Mayusculas

		$data = array(
			'descripcion' => $descripcion, 
		);

		if ($this->Niveles_model->update($idnse,$data)) {
			redirect(base_url()."mantenimiento/Niveles");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/Niveles/edit/".$idnse);
		}
	}

	public function view($id){
		$data  = array(
			'Niveles' => $this->Niveles_model->getNiveles1($id), 
		);
		$this->load->view("admin/Niveles/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => "false", 
		);
		$this->Niveles_model->update($id,$data);
		echo "mantenimiento/Niveles";
	}
	public function activar($id){
		$data  = array(
			'estado' => "true", 
		);
		$this->Niveles_model->update($id,$data);
		echo "mantenimiento/Niveles/Inactivos";
	}
}
