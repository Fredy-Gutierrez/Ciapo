<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Camas extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Camas_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if ($this->session->userdata("login")) {
			
			$data  = array(
				'cama' => $this->Camas_model->getCamas(), 
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/Camas/list",$data);
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}
		

	}
	public function index_p()
	{
		$data  = array(
			'cama' => $this->Camas_model->getCamasp(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/camas/list",$data);
		$this->load->view("layouts/footer");

	}
	public function index_a()
	{
		$data  = array(
			'cama' => $this->Camas_model->getCamasa(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/camas/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Camas/add");
		$this->load->view("layouts/footer");
	}

	public function store(){
		//$descripcion = $this->input->post("nc");
		$tipo = $this->input->post("ti");
		if ($tipo==0) {
			$descripcion = "CAMA ". $this->input->post("nc"). " PISO";
		}else{
			$descripcion = "CAMA ". $this->input->post("nc"). " AMBULATORIA";
		}	
		$repetido = array(
			'ocupadoc'=>$this->Camas_model->comprovacion($descripcion,$tipo)
		);

		// Validacion de la consulta anteriror
		if(!empty($repetido['ocupadoc'])){
			$this->session->set_flashdata("ocupadoc","Ya existe esa cama");
			redirect(base_url()."mantenimiento/camas/add");
		}

		$data  = array(
			'descripcion' => $descripcion,
			'tipo' => $tipo,
		);

		if ($this->Camas_model->save($data)) {
			$this->session->set_flashdata("ex","Cama guardada con exito");
			redirect(base_url()."mantenimiento/Camas");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/Camas/add");
		}
	}
		public function delete($id){
		$this->Camas_model->delete($id);
		$this->session->set_flashdata("exg","La cama se ha eliminado");
		redirect(base_url()."mantenimiento/Camas");
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


}

