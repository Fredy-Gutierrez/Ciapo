<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empleados extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Empleados_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	
	public function index()
	{
		if ($this->session->userdata("login")) {
			$data  = array(
				'cat_empleados' => $this->Empleados_model->getEmpleados(), 
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/Empleados/list",$data);
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}

	}
    
    public function index_inactivos()
	{
		$data  = array(
			'cat_empleados' => $this->Empleados_model->getEmpleados_I(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Empleados/list",$data);
		$this->load->view("layouts/footer");

	}
    

    

	public function add(){
        $data  = array(
			'tipos' => $this->Empleados_model->getTipos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Empleados/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		//$id_emp = $this->input->post("id_emp");
		$nombre = $this->input->post("nombre");
        $ape_pat = $this->input->post("ape_pat");
        $ape_mat = $this->input->post("ape_mat");
        $nip = $this->input->post("nip");
        $rfc = $this->input->post("rfc");
        $curp = $this->input->post("curp");
        $direccion = $this->input->post("direccion");
        $id_tipoemp = $this->input->post("id_tipoemp");
        $estado = $this->input->post("estado");
		$nombre = strtoupper($nombre);

		$data  = array(
			//'id_emp' => $id_emp, 
			'nombre' => $nombre,
            'ape_pat' => $ape_pat,
            'ape_mat' => $ape_mat,
            'nip' => $nip,
            'rfc' => $rfc,
            'curp' => $curp,
            'direccion' => $direccion,
            'id_tipoemp' => $id_tipoemp,
			'estado' => $estado
		);

		if ($this->Empleados_model->save($data)) {
			redirect(base_url()."mantenimiento/Empleados");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/Empleados/add");
		}
	}

	public function edit($id_emp){
		$data  = array(
			'cat_empleados' => $this->Empleados_model->getEmpleado($id_emp),
            'tipos' => $this->Empleados_model->getTipos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Empleados/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id_emp = $this->input->post("id_emp");
        $nombre = $this->input->post("nombre");
        $ape_pat = $this->input->post("ape_pat");
        $ape_mat = $this->input->post("ape_mat");
        $id_tipoemp = $this->input->post("id_tipoemp");
        $estado = $this->input->post("estado");

		$data = array(
            'id_emp' => $id_emp,
			'nombre' => $nombre,
            'ape_pat' => $ape_pat,
            'ape_mat' => $ape_mat,
            'id_tipoemp' => $id_tipoemp,
            'estado' => $estado
		);

		if ($this->Empleados_model->update($id_emp,$data)) {
			redirect(base_url()."mantenimiento/Empleados");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/Empleados/edit/".$id_emp);
		}
	}

	public function view($id_emp){
		$data  = array(
			'cat_empleados' => $this->Empleados_model->getEmpleado($id_emp), 
		);
		$this->load->view("admin/empleados/view",$data);
	}

	public function delete($id_emp){
		$data  = array(
			'estado' => "false", 
		);
		$this->Empleados_model->update($id_emp,$data);
		echo "mantenimiento/Empleados";
	}
    public function activated($id_emp){
		$data  = array(
			'estado' => "true", 
		);
		$this->Empleados_model->update($id_emp,$data);
		echo "mantenimiento/Empleados/index_inactivos";
	}
}
