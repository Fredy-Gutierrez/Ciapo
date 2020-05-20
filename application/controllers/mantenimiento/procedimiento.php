<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class procedimiento extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("procedimiento_model");
	}

	
	public function index()
	{
		$data  = array(
			'procedimiento' => $this->procedimiento_model->getProcedimientos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/procedimiento/list",$data);
		$this->load->view("layouts/footer");

	}
	public function inactivos()
	{
		$data  = array(
			'procedimiento' => $this->procedimiento_model->getInactivos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/procedimiento/list",$data);
		$this->load->view("layouts/footer");

	}


	public function add(){

		$data = array('cat_tabulador' => $this ->procedimiento_model->getTabulador() 

		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/procedimiento/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$id_proc = $this->input->post("id_proc");
		$desproc = $this->input->post("desproc");
        $id_tab = $this->input->post("cat_tabulador");
        $desProc= strtoupper($desProc);//Comando Para Convertir en Mayusculas

		$data  = array(
			'id_proc' => $id_proc, 
			'desproc' => $desproc,
            'id_tab'  => $id_tab,
			'estado' => "true"
		);

		if ($this->procedimiento_model->save($data)) {
			redirect(base_url()."mantenimiento/procedimiento");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/procedimiento/add");
		}
	}

	public function edit($id){
		$data  = array(
			'procedimiento' => $this->procedimiento_model->getProcedimiento($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/procedimiento/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idProcedimiento = $this->input->post("idProcedimiento");
		$desproc = $this->input->post("desproc");
		$desproc = strtoupper($desproc);//Convertir A Mayusculas

		$data = array(
			'desproc' => $desproc, 
		);

		if ($this->procedimiento_model->update($idProcedimiento,$data)) {
			redirect(base_url()."mantenimiento/procedimiento");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/procedimiento/edit/".$idProcedimiento);
		}
	}

	public function view($id){
		$data  = array(
			'procedimiento' => $this->procedimiento_model->getProcedimiento($id), 
		);
		$this->load->view("admin/procedimiento/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => "false", 
		);
		$this->procedimiento_model->update($id,$data);
		echo "mantenimiento/procedimiento";
	}
	public function activado($id){
		$data  = array(
			'estado' => "true", 
		);
		$this->procedimiento_model->update($id,$data);
		echo "mantenimiento/procedimiento";
	}
}
