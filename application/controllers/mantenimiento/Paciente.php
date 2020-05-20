<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paciente extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Paciente_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	//aqui manda a llamar get
	public function index()
	{
		if ($this->session->userdata("login")) {
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/paciente/list");
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}
		
	}
	public function searchpac()
	{
		$id = $this->input->post("no_exp");
		$data  = array(
			'paciente' => $this->Paciente_model->getPacienteNoexp($id), 
		);

		if(empty($data['paciente'])){
			$data2  = array(
				'paciente' => $this->Paciente_model->getPacienteCurp($id), 
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/paciente/list",$data2);
			$this->load->view("layouts/footer");
		}else{
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/paciente/list",$data);
			$this->load->view("layouts/footer");
		}
	}
    
    public function  inactivos()
	{
		$data  = array(
			'paciente' => $this->Paciente_model->getPacientesInactivos(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/paciente/list",$data);
		$this->load->view("layouts/footer");
	}

	public function add(){
		$data =array( 
			'cat_tiposangre' => $this->Paciente_model->getCategorias(),
			'religion' => $this->Paciente_model->getReligiones(),
			'discapacidades' => $this->Paciente_model->getDiscapacidades(),
			'grupos' => $this->Paciente_model->getGposEtnicos(),
			'vivienda' => $this->Paciente_model->getViviendas(),
			'nivelsocio' => $this->Paciente_model->getNiveles(),
			'nacionalidades' => $this->Paciente_model->getNacionalidades()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/paciente/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
        $no_ex = $this->input->post("no_exp");

        $curp = $this->input->post("curp");
        $curp = strtoupper($curp);

        $exp = array(
			'ex'=>$this->Paciente_model->getPacienteNoexp($no_ex)
		);

		$cp= array(
			'cp'=>$this->Paciente_model->getPacienteCurp($curp)
		);

		
		if(!empty($exp['ex'])){
			$this->session->set_flashdata("error","No se pudo guardar la informacion ya hay un paciente con ese expediente");
			redirect(base_url()."mantenimiento/paciente/add");
		}elseif(!empty($cp['cp'])){
			$this->session->set_flashdata("error","No se pudo guardar la informacion ya hay un paciente con esa CURP");
			redirect(base_url()."mantenimiento/paciente/add");
		}else{
			$data  = array(
				'no_exp' => $no_ex,
				'curp'=> $curp
			);

			$nombrepx = $this->input->post("nombrepx");
	        $nombrepx = strtoupper($nombrepx);

	        $data["nombrepx"] = $nombrepx;

	        $fecha_ingr = $this->input->post("datein");
	        $data["fecha_ingr"] = $fecha_ingr;


	        $no_poliza = $this->input->post("no_poliza");
	        $data["no_poliza"] = $no_poliza;

	        $inicio_poliza = $this->input->post("dateinpoliza");
	        $data["inicio_poliza"] = $inicio_poliza;

	        $fin_poliza = $this->input->post("datefinpoliza");
	        $data["fin_poliza"] = $fin_poliza;




	        $ape_pat = $this->input->post("ape_pat");
	        $ape_pat = strtoupper($ape_pat);
	        $data["ape_pat"] = $ape_pat;


	        $ape_mat = $this->input->post("ape_mat");
	        $ape_mat = strtoupper($ape_mat);
	        $data["ape_mat"] = $ape_mat;


	        $fecha_nac = $this->input->post("datenac");
	        $data["fecha_nac"] = $fecha_nac;

	        $genero = $this->input->post("gender");
	        $data["sexo"] = $genero;

	        $sangre = $this->input->post("cat_tiposangre");
	        $data["id_tiposangre"] = $sangre;

	        $domicilio = $this->input->post("direccion");
	        $data["domicilio"] = $domicilio;

	        $telefono = $this->input->post("telefono");
	        $data["telefono"] = $telefono;

	        $grupos = $this->input->post("grupos");
	        $data["id_gpoetnico"] = $grupos;

	        $religion = $this->input->post("religion");
	        $data["id_religion"] = $religion;

	        $discapacidades = $this->input->post("discapacidades");
	        $data["id_discapacidad"] = $discapacidades;

	        $vivienda = $this->input->post("vivienda");
	        $data["id_vivienda"] = $vivienda;

	        $nivelsocio = $this->input->post("nivelsocio");
	        $data["id_niv"] = $nivelsocio;


	        $nacionalidad = $this->input->post("cat_nacionalidades");
	        if(!empty($nacionalidad)){
	        	$data["id_nacionalidad"] = $nacionalidad;
	        }else{
	        	$data["id_nacionalidad"] = null;
	        }

	        $edo = $this->input->post("cat_estados");
	       	if(!empty($edo)){
	        	$data["id_estado"] = $edo;
	        }else{
	        	$data["id_estado"] = null;
	        }


	        $municipio = $this->input->post("cat_municipios");
	       	if(!empty($municipio)){
	        	$data["id_municipio"] = $municipio;
	        }else{
	        	$data["id_municipio"] = null;
	        }

	        $localidad = $this->input->post("cat_localidades");
	       	if(!empty($localidad)){
	        	$data["id_localidad"] = $localidad;
	        }else{
	        	$data["id_localidad"] = null;
	        }

	        $supervivencia = $this->input->post("supervivencia");
	        $data["supervivencia"] = $supervivencia;

	        $derecho_habiencia = $this->input->post("derechohabiencia");
	        $data["derecho_habiencia"] = $derecho_habiencia;

	        $estado = "true";
	        $data["estado"] = $estado;



			if (!empty($fecha_defuncion)) {
	       		$data["fecha_defuncion"] = $fecha_defuncion;
			}else{
				$data["fecha_defuncion"] = null;
			}
				if ($this->Paciente_model->save($data)) {
					$this->session->set_flashdata("exito","Datos Guardados");
					redirect(base_url()."mantenimiento/paciente");
				}
				else{
					$this->session->set_flashdata("error","No se pudo guardar la informacion");
					redirect(base_url()."mantenimiento/paciente/add");
				}
		}
	}

	public function edit($id){
		
		$arrayp  = array(
			'infopac' => $this->Paciente_model->getPaciente($id), 
		);

		$id_estado = $arrayp['infopac']->id_estado;
		$id_municipio = $arrayp['infopac']->id_municipio;

		$data  = array(
			'paciente' => $this->Paciente_model->getPaciente($id),
			'nacionalidades' => $this->Paciente_model->getNacionalidades(),
			'estados' => $this->Paciente_model->getEstados(),

			'municipios' => $this->Paciente_model->getMunicipios($id_estado),
			'localidades' => $this->Paciente_model->getLocalidades($id_municipio),

			'cat_tiposangre' => $this->Paciente_model->getCategorias(),
			'religion' => $this->Paciente_model->getReligiones(),
			'discapacidades' => $this->Paciente_model->getDiscapacidades(),
			'grupos' => $this->Paciente_model->getGposEtnicos(),
			'vivienda' => $this->Paciente_model->getViviendas(),
			'nivelsocio' => $this->Paciente_model->getNiveles() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/paciente/edit",$data);
		$this->load->view("layouts/footer");
	}

	public function update(){
		$id_pac = $this->input->post("id_pac");
		
			$curp = $this->input->post("curp");
        	$curp = strtoupper($curp);


        	$no_ex = $this->input->post("no_exp");

        	$data  = array(
				'no_exp' => $no_ex,
				'curp'=> $curp
			);

        	$nombrepx = $this->input->post("nombrepx");
	        $nombrepx = strtoupper($nombrepx);

	        $data["nombrepx"] = $nombrepx;

	        $fecha_ingr = $this->input->post("datein");
	        $data["fecha_ingr"] = $fecha_ingr;


	        $no_poliza = $this->input->post("no_poliza");
	        $data["no_poliza"] = $no_poliza;

	        $inicio_poliza = $this->input->post("dateinpoliza");
	        $data["inicio_poliza"] = $inicio_poliza;

	        $fin_poliza = $this->input->post("datefinpoliza");
	        $data["fin_poliza"] = $fin_poliza;




	        $ape_pat = $this->input->post("ape_pat");
	        $ape_pat = strtoupper($ape_pat);
	        $data["ape_pat"] = $ape_pat;


	        $ape_mat = $this->input->post("ape_mat");
	        $ape_mat = strtoupper($ape_mat);
	        $data["ape_mat"] = $ape_mat;


	        $fecha_nac = $this->input->post("datenac");
	        $data["fecha_nac"] = $fecha_nac;

	        $genero = $this->input->post("gender");
	        $data["sexo"] = $genero;

	        $sangre = $this->input->post("cat_tiposangre");
	        $data["id_tiposangre"] = $sangre;

	        $domicilio = $this->input->post("direccion");
	        $data["domicilio"] = $domicilio;

	        $telefono = $this->input->post("telefono");
	        $data["telefono"] = $telefono;

	        $grupos = $this->input->post("grupos");
	        $data["id_gpoetnico"] = $grupos;

	        $religion = $this->input->post("religion");
	        $data["id_religion"] = $religion;

	        $discapacidades = $this->input->post("discapacidades");
	        $data["id_discapacidad"] = $discapacidades;

	        $vivienda = $this->input->post("vivienda");
	        $data["id_vivienda"] = $vivienda;

	        $nivelsocio = $this->input->post("nivelsocio");
	        $data["id_niv"] = $nivelsocio;


	        $nacionalidad = $this->input->post("cat_nacionalidades");
	        if(!empty($nacionalidad)){
	        	$data["id_nacionalidad"] = $nacionalidad;
	        }else{
	        	$data["id_nacionalidad"] = null;
	        }

	        $edo = $this->input->post("cat_estados");
	       	if(!empty($edo)){
	        	$data["id_estado"] = $edo;
	        }else{
	        	$data["id_estado"] = null;
	        }


	        $municipio = $this->input->post("cat_municipios");
	       	if(!empty($municipio)){
	        	$data["id_municipio"] = $municipio;
	        }else{
	        	$data["id_municipio"] = null;
	        }

	        $localidad = $this->input->post("cat_localidades");
	       	if(!empty($localidad)){
	        	$data["id_localidad"] = $localidad;
	        }else{
	        	$data["id_localidad"] = null;
	        }

	        $supervivencia = $this->input->post("supervivencia");
	        $data["supervivencia"] = $supervivencia;

	       	$derecho_habiencia = $this->input->post("derechohabiencia");
	        $data["derecho_habiencia"] = $derecho_habiencia;

        $fecha_defuncion = $this->input->post("fecha_defuncion");
		
		if (!empty($fecha_defuncion)) {
				$data["fecha_defuncion"] = $fecha_defuncion;
			}else{
				$data["fecha_defuncion"] = null;
			}

		if ($this->Paciente_model->update($id_pac,$data)) {
			redirect(base_url()."mantenimiento/paciente");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/paciente/edit/".$id_pac);
		}
	}

	public function view($id_pac){
		$data  = array(
			'paciente' => $this->Paciente_model->getPaciente($id_pac), 
		);
		$this->load->view("admin/paciente/view",$data);
	}
    
    public function tiposangre(){
		$data  = array(
			'cat_tiposangre' => $this->Paciente_model->sangre(), 
		);
        return $data;
	}

	public function delete($id){
		$data  = array(
			'estado' => false, 
		);
		$this->Paciente_model->update($id,$data);
		echo "mantenimiento/paciente";
	}
    
	public function activar($id){
		$data  = array(
			'estado' => true, 
		);
		$this->Paciente_model->update($id,$data);
		echo "mantenimiento/paciente/inactivos";
	}

	public function searchestados($id){
		$data  = array(
			'estados' => $this->Paciente_model->getEstados(), 
		);
		echo json_encode( $data );
	}
	public function searchmunicipios($id){
		$data  = array(
			'municipios' => $this->Paciente_model->getMunicipios($id), 
		);
		echo json_encode( $data );
	}
	public function searchlocalidades($id){
		$data  = array(
			'localidades' => $this->Paciente_model->getLocalidades($id), 
		);
		echo json_encode( $data );
	}
	public function searchpacbynoexp($id)
	{
		$data  = array(
			'paciente' => $this->Paciente_model->getPacientebyNoexp($id), 
		);

		echo json_encode( $data );
	}

	public function searchpacbycurp($id)
	{
		$data  = array(
			'paciente' => $this->Paciente_model->getPacienteCurp($id), 
		);

		echo json_encode( $data );
	}

}
