<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Religion extends CI_Controller{
    
    public function __construct(){
		parent::__construct();
		$this->load->model("Religion_model");
	}
    
    public function index()
	{
		$data  = array(
			'religion' => $this->Religion_model->getReligion(), 
		);


		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/religion/list",$data);
		$this->load->view("layouts/footer");

	}
    
    public function VerInactivos(){
        $data  = array(
			'religion' => $this->Religion_model->getInactivos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/religion/list",$data);
		$this->load->view("layouts/footer");
    }
    
    public function edit($id){
		$data  = array(
			'cat_religion' => $this->Religion_model->getReligion1($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/religion/edit",$data);
		$this->load->view("layouts/footer");
	}
    
    
    
     
    public function view($id){
		$data  = array(
			'religion' => $this->Religion_model->getReligion1($id), 
		);
		$this->load->view("admin/religion/view",$data);
    }
    
    public function add(){

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/religion/add");
		$this->load->view("layouts/footer");
	}
    
    public function store(){
		
		$descripcion = $this->input->post("descripcion");
		//$descripcion = strtoupper($descripcion);
       

		$data  = array(
			
			'descripcion' => $descripcion,
			'estado' => "true"
		);

		if(empty($this->Religion_model->checkRelig($descripcion))){
			if ($this->Religion_model->save($data)) {
				$this->session->set_flashdata("exitoRelig","Se ha guardado la información de la nueva Religión");
				redirect(base_url()."mantenimiento/religion");
				
			}
			else{
				$this->session->set_flashdata("errorRelig","No se pudo guardar la informacion");
				redirect(base_url()."mantenimiento/religion/add");
			}

		}

		else{
			$this->session->set_flashdata("errorRelig","Ésta RELIGIÓN ya ha sido registrada");
			redirect(base_url()."mantenimiento/religion/add");
			
		}


		
	}
    
    public function update(){
		$id_religion = $this->input->post("idrelig");
		$descripcion = $this->input->post("descripcion"); //Aqui se recibe el nombre, no la Id de la variable de la Edit
        $activo = $this->input->post("estado");
		//$descripcion = $this->input->post("descripcion");

		$data = array(
 
			'descripcion' => $descripcion, 
            'estado' => $activo
			//'descripcion' => $descripcion,
		);

		$religionRep=$this->Religion_model->checkRelig($descripcion);

		if(empty($religionRep->descripcion)){
			if ($this->Religion_model->update($id_religion,$data)) { //AQUI ME QUEDE
				$this->session->set_flashdata("exitoRelig","Se ha actualizado la información de la Religión");
				redirect(base_url()."mantenimiento/religion");
			}
			else{
				$this->session->set_flashdata("errorRelig","No se pudo actualizar la informacion");
				redirect(base_url()."mantenimiento/religion/edit/".$id_religion);
			}
		}
		else{
			$id_Reli=$this->Religion_model->checkIdRel($id_religion);
			
			
			
			if ($id_Reli->descripcion==$descripcion) {
				echo "SE GUARDARÁ, ";
				print_r($id_Reli->descripcion);
				echo ", ";
				print_r($descripcion);
				
				if ($this->Religion_model->update($id_religion,$data)) {
					$this->session->set_flashdata("exitoRelig","Se ha actualizado la información de la Religión");
					redirect(base_url()."mantenimiento/religion");
				}
				else{
					$this->session->set_flashdata("errorRelig","No se pudo actualizar la informacion");
					redirect(base_url()."mantenimiento/religion/edit/".$id_religion);
				}
				
			}
			else{
				echo "ERROR, ";
				print_r($id_Reli->descripcion);
				echo ", ";
				print_r($descripcion);
				
				$this->session->set_flashdata("errorRelig","Ésta RELIGIÓN ya ha sido registrada");
				redirect(base_url()."mantenimiento/religion/edit/".$id_religion);
				
			}
			
			
		}

		/*
		
		*/
	}
    
    public function delete($id){
		$data  = array(
			'estado' => "false", 
		);
		$this->Religion_model->update($id,$data);
		echo "mantenimiento/religion";
	}
    
    public function deleteInact($id){
		$data  = array(
			'estado' => "true", 
		);
		$this->Religion_model->update($id,$data);
		echo "mantenimiento/religion/verInactivos";
	}
}