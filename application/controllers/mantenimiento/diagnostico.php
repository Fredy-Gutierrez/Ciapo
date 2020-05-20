<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class diagnostico extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("diagnostico_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	
	public function index()
	{
		$data  = array(
			'diagnostico' => $this->diagnostico_model->getDiagnosticos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/diagnostico/list",$data);
		$this->load->view("layouts/footer");

	}

	public function inactivos()
	{
		$data  = array(
			'diagnostico' => $this->diagnostico_model->getInactivos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/diagnostico/list",$data);
		$this->load->view("layouts/footer");

	}

	public function add(){
		$data  = array(
			'cat_espec' => $this->diagnostico_model->getEspecial()
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/diagnostico/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$id_diag = $this->input->post("id_diag");
		$desdiag = $this->input->post("desdiag");
        $idesp = $this->input->post("cat_espec");
        $cie10 = $this->input->post("cie10");
        $tipo = $this->input->post("tipo");
        $desdiag= strtoupper($desdiag);//Comando Para Convertir en Mayusculas

		$data  = array(
			'id_diag' => $id_diag, 
			'desdiag' => $desdiag,
            'idesp'  => $idesp,
            'cie10'  => $cie10,
            'tipo'  => $tipo,
			'estado' => "true"
		);

		if ($this->diagnostico_model->save($data)) {
			redirect(base_url()."mantenimiento/diagnostico");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/diagnostico/add");
		}
	}

	public function edit($id){
		$data  = array(
			'diagnostico' => $this->diagnostico_model->getDiagnostico($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/diagnostico/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$idDiagnostico = $this->input->post("idDiagnostico");
		$desdiag = $this->input->post("desdiag");
		$desdiag = strtoupper($desdiag);//Convertir A Mayusculas
		$cie10 = $this->input->post("cie10");
        $tipo = $this->input->post("tipo");
		$data = array(
			'cie10'  => $cie10,
            'tipo'  => $tipo,
			'desdiag' => $desdiag, 
		);

		if ($this->diagnostico_model->update($idDiagnostico,$data)) {
			redirect(base_url()."mantenimiento/diagnostico");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/diagnostico/edit/".$idDiagnostico);
		}
	}

	public function view($id){
		$data  = array(
			'diagnostico' => $this->diagnostico_model->getDiagnostico($id), 
		);
		$this->load->view("admin/diagnostico/view",$data);
	}

	public function delete($id){
		$data  = array(
			'estado' => "false", 
		);
		$this->diagnostico_model->update($id,$data);
		echo "mantenimiento/diagnostico";
	}

	public function activado($id){
		$data  = array(
			'estado' => "true", 
		);
		$this->diagnostico_model->update($id,$data);
		echo "mantenimiento/diagnostico";
	}
}
