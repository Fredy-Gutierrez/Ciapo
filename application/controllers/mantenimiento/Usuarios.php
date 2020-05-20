<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller{
    
    public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Usuarios_model");
        $this->load->model("Empleados_model");
	}
    
    public function index()
	{
		if ($this->session->userdata("rol")=="Administrador") {
			$data  = array(
				'usuario' => $this->Usuarios_model->getUsuario(), 
			);
		}else{
			$data  = array(
				'usuario' => $this->Usuarios_model->getUsuarioId($this->session->userdata("id")), 
			);
		}
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/usuarios/list",$data);
			$this->load->view("layouts/footer");
	}
    
    public function VerInactivos(){
        $data  = array(
			'usuario' => $this->Usuarios_model->getInactivos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/list",$data);
		$this->load->view("layouts/footer");
    }
    
    public function edit($id){
		$data  = array(
			'usuario' => $this->Usuarios_model->getUsuarios1($id), 
		);
		
		$data['usuario']->pass=base64_decode($data['usuario']->pass);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/edit",$data);
		$this->load->view("layouts/footer");
		
	}
    
    
    
     
    public function view($id){
		$data  = array(
			'usuario' => $this->Usuarios_model->getUsuarios1($id), 
		);
		$this->load->view("admin/usuarios/view",$data);
    }

    public function search(){

    	$id_usua= $this->input->post("id_usuario");

    	$id_usuario=$id_usua;



    	$data  = array(
			'usuario' => $this->Usuarios_model->search($id_usuario), 
		);

		
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/list",$data);
		$this->load->view("layouts/footer");
    }

    
    public function add(){
    	


        $data  = array(
			'cat_empleados' => $this->Usuarios_model->getEmpleado(),
            'cat_rol'=> $this->Usuarios_model->getRol(),
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/usuarios/add",$data);
		$this->load->view("layouts/footer");
	}
    
    public function store(){
        
        $rol_usuario = $this->input->post("Rol");
        $id_empleado = $this->input->post("empleado");
            
        $nom_usuario = $this->input->post("nom_usuar");


        $contra2 = $this->input->post("contra");

        $contra=base64_encode($contra2);
        
		$data  = array(
			'id_emp' => $id_empleado,
            'usuario' => $nom_usuario,
            'pass' => $contra,
            'id_rol' => $rol_usuario,
			'estado' => "true"
		);

		if(empty($this->Usuarios_model->checkEmpleado($id_empleado))){
			echo "No Repetido";

			if(empty($this->Usuarios_model->checkUsuario($nom_usuario))){

				if ($this->Usuarios_model->save($data)) {
					$this->session->set_flashdata("exito","Se ha guardado la información");
					redirect(base_url()."mantenimiento/usuarios");
				}
				else{
					$this->session->set_flashdata("error","No se pudo guardar la informacion");
					redirect(base_url()."mantenimiento/usuarios/add");
				}
			}
			else{
				$this->session->set_flashdata("error","El empleado ya cuenta con un USUARIO registrado");
				redirect(base_url()."mantenimiento/usuarios/add");
			}
		}
		else{
			$this->session->set_flashdata("error","Este USUARIO ya ha sido registrado");
			redirect(base_url()."mantenimiento/usuarios/add");
		}

		/*
		if(empty($this->Usuarios_model->checkUsuario($nom_usuario))){

			if ($this->Usuarios_model->save($data)) {
				//redirect(base_url()."mantenimiento/usuarios");
			}
			else{
				$this->session->set_flashdata("error","No se pudo guardar la informacion");
				//redirect(base_url()."mantenimiento/usuarios/add");
			}
		}
		else{
			$msj=0;
			//redirect(base_url()."mantenimiento/usuarios/add?msj=".$msj);
		}*/

		
	}
    
    public function update(){
		$id_usuario= $this->input->post("id_User");
		$nombre_usuario = $this->input->post("nom_usuario"); //Aqui se recibe el nombre, no la Id de la variable de la Edit
        $contras = $this->input->post("contra");
		//$descripcion = $this->input->post("descripcion");
        $contras= base64_encode($contras);
		$data = array(
 
			'usuario' => $nombre_usuario, 
            'pass' => $contras
			//'descripcion' => $descripcion,
		);

		if ($this->Usuarios_model->update($id_usuario,$data)) { 
			$this->session->set_flashdata("exito","Se ha actualizado la información del Usuario");
			redirect(base_url()."mantenimiento/usuarios");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/usuarios/edit/".$id_usuario);
		}
	}
    
    public function delete($id){
		$data  = array(
			'estado' => "false", 
		);
		$this->Usuarios_model->update($id,$data);
		echo "mantenimiento/usuarios";
	}
    
    public function deleteInact($id){
		$data  = array(
			'estado' => "true", 
		);
		$this->Usuarios_model->update($id,$data);
		echo "mantenimiento/usuarios/verInactivos";
	}
}