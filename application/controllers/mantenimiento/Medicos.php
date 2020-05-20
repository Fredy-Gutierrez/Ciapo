<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Medicos_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if ($this->session->userdata("login")) {
			$data  = array(
				'medicos' => $this->Medicos_model->getMedicos(), 
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/Medicos/list",$data);
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}
	}
    
    public function index_inactivos()
	{
		$data  = array(
			'medicos' => $this->Medicos_model->getMedicos_I(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Medicos/list",$data);
		$this->load->view("layouts/footer");

	}
    

    

	public function add(){
        $data  = array(
			'cat_empleados' => $this->Medicos_model->getEmp(),
			'cat_especialidades' => $this->Medicos_model->getEsp(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Medicos/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		//$id_emp = $this->input->post("id_emp");
		$id_med = $this->input->post("id_med");
        $id_emp = $this->input->post("id_emp");
        $cedula = $this->input->post("cedula");
        $clues = $this->input->post("clues");
        $id_especialidad = $this->input->post("id_especialidad");
        $estado = $this->input->post("estado");
		
		$id_med = strtoupper($id_med);

		//C:\wamp64\www\ciapo\assets\template\dist\img

		$config = [
			'upload_path' => './assets/template/dist/img/Firmas',
			'allowed_types' => 'png|jpg'
		];

		$this->load->library("upload",$config);

		if ($this->upload->do_upload('foto')) {
			$datafoto = array('upload_data' => $this->upload->data());
			$data  = array(
				//'id_emp' => $id_emp, 
				'id_med' => $id_med,
	            'id_emp' => $id_emp,
	            'cedula' => $cedula,
	            'clues' => $clues,
	            'id_especialidad' => $id_especialidad,
				'estado' => $estado,
				'foto' => $datafoto['upload_data']['file_name']
			);
		}else{
			$data  = array(
				//'id_emp' => $id_emp, 
				'id_med' => $id_med,
	            'id_emp' => $id_emp,
	            'cedula' => $cedula,
	            'clues' => $clues,
	            'id_especialidad' => $id_especialidad,
				'estado' => $estado
			);
		}

		

		if ($this->Medicos_model->save($data)) {
			redirect(base_url()."mantenimiento/Medicos");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/Medicos/add");
		}
	}

	public function edit($id_med){
		$data  = array(
			'medicos' => $this->Medicos_model->getMedico($id_med),
            'cat_empleados' => $this->Medicos_model->getEmp(),
			'cat_especialidades' => $this->Medicos_model->getEsp(),			
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Medicos/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id_med = $this->input->post("id_med");
        $id_emp = $this->input->post("id_emp");
        $cedula = $this->input->post("cedula");
        $clues = $this->input->post("clues");
        $id_especialidad = $this->input->post("id_especialidad");
        $estado = $this->input->post("estado");

		$data = array(
            'id_med' => $id_med,
			'id_emp' => $id_emp,
            'cedula' => $cedula,
            'clues' => $clues,
            'id_especialidad' => $id_especialidad,
            'estado' => $estado
		);

		if ($this->Medicos_model->update($id_med,$data)) {
			redirect(base_url()."mantenimiento/Medicos");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/Medicos/edit/".$id_med);
		}
	}

	public function view($id_med){
		$data  = array(
			'medicos' => $this->Medicos_model->getMedico($id_med), 
		);
		$this->load->view("admin/medicos/view",$data);
	}

	public function delete($id_med){
		$data  = array(
			'estado' => "false", 
		);
		$this->Medicos_model->update($id_med,$data);
		echo "mantenimiento/Medicos";
	}
    public function activated($id_med){
		$data  = array(
			'estado' => "true", 
		);
		$this->Medicos_model->update($id_med,$data);
		echo "mantenimiento/Medicos/index_inactivos";
	}
}
