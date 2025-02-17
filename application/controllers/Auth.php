<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Usuarios_model");
	}
    
	public function index()
	{
		if ($this->session->userdata("login")) {
			redirect(base_url()."dashboard");
		}
		else{
			$this->load->view("admin/login");
		}
	}

	public function login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");

		$password= base64_encode($password);

		
        $res = $this->Usuarios_model->login($username, $password);

		if (!$res) {
			$this->session->set_flashdata("error","El usuario y/o contraseña son incorrectos");
			$this->load->view("admin/login");
		}else{
			
			$data  = array(
				'id' => $res->id_emp, 
				'nombre' => $res->nombre,
				'ape_pat' => $res->ape_pat,
				'ape_mat' => $res->ape_mat,
				'rol' => $res->descripcionr,
				'tipo_empleado'=> $res->descripcionte,
				'id_med' => $res->id_med,
				'login' => TRUE
			);

			
			$this->session->set_userdata($data);
			redirect(base_url()."dashboard");
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}
}