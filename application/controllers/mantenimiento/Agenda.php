<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
		$this->load->model("Agenda_model");
	}

	/*=====================================
	  =			  VISTA INICIAL           =	
	  = CARGA LOS COMPONENTES DE LA VISTA =
	  =====================================*/
	public function index(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Agenda/list");
		$this->load->view("layouts/footer");
	}
	public function camas($id){
		$data  = array(
			'cama' => $this->Agenda_model->getCama($id), 
		);
		echo json_encode( $data );
	}
	public function camas2($id){
		$data  = array(
			'cama' => $this->Agenda_model->getCama2($id), 
		);
		echo json_encode( $data );
	}

	/*===============================================
	  =  LLAMADA AL MODELO PARA CONSULTAR TODAS LAS =
	  =               CITAS CREADAS Y               =
	  = CREA JSON PARA CARGAR LAS CITAS EN LA VISTA =
	  ===============================================*/
	public function citas_json(){
		$data=$this->Agenda_model->getcitas();
		$i=0;
		$array=array();
		while ($row = pg_fetch_array($data, null, PGSQL_ASSOC)) {
			$array[$i]=$row;
			$i++;
		};
		echo json_encode( $array );
	}

	/*======================================================
  	  = ENVIA LOS DATOS AL MODELO PARA GUARDAR INFORMACION =
  	  ======================================================*/
	public function store(){
		$expediente = $this->input->post("exp");
		$programado = $this->input->post("prog");
		$paciente = $this->input->post("p");
		$observaciones = $this->input->post("ob");
		$fecha_nac = $this->input->post("fnac");
		$cama = $this->input->post("cama");
		$cdgc = $this->input->post("cdgc");
		$medic_onco = $this->input->post("medonco");
		$medic_onco_noval = $this->input->post("medonco-no");
		$medic_alter = $this->input->post("medalt");
		$medic_alter_noval = $this->input->post("medalt-no");
		$pre_medic = $this->input->post("premed");
		$frec_ciclo = $this->input->post("frec");
		$medico = $this->input->post("medt");
		$fecha = $this->input->post("f");
		$min = $this->input->post("m");
		$hora = $this->input->post("h").$min;
		$nombreenfer = $this->session->userdata("nombre")." ".$this->session->userdata("ape_pat")." ".$this->session->userdata("ape_mat");
		$estado = $this->input->post("estadoc");
		$title = $this->input->post("p")." - ".$cama;
		$start = $this->input->post("f").$hora ;

		// Llamada al modelo para consultar si la cama esta ocupada
		$repetido = array(
			'ocupado'=>$this->Agenda_model->getHora_Fecha($start,$cama)
		);

		// Validacion de la consulta anteriror
		if(!empty($repetido['ocupado'])){
			$this->session->set_flashdata("ocupado","La cama ya esta ocupada a esa hora. Cambie la hora y/o la cama");
			redirect(base_url()."mantenimiento/agenda/");
		}else{
			$data  = array(
				'title' => $title,
				'start' => $start,
	
				'expediente' => $expediente,
				'programado' => $programado,
				'paciente' => $paciente,
				'observaciones' => $observaciones,
				'fecha_nac' => $fecha_nac,
				'cama' => $cama,
				'cdgc' => $cdgc,
				'medic_onco' => $medic_onco,
				'medic_onco_noval' => $medic_onco_noval,
				'medic_alter' => $medic_alter,
				'medic_alter_noval' => $medic_alter_noval,
				'pre_medic' => $pre_medic,
				'frec_ciclo' => $frec_ciclo,
				'medico' => $medico,
				'enfermera' => $nombreenfer,
				'fecha' => $fecha,
				'hora' => $hora,
				'estado' => $estado
	
			);
		}

		if ($this->Agenda_model->save($data)) {
			$this->session->set_flashdata("exitosave","Cita Guardada Con Exito");
			redirect(base_url()."mantenimiento/Agenda");
		}
		else{
			$this->session->set_flashdata("error","No se pudo guardar la informacion");
			redirect(base_url()."mantenimiento/Agenda/list");
		}
	}

	/*=========================================================
  	  = ENVIA LOS DATOS AL MODELO PARA ACTUALIZAR INFORMACION =
  	  =========================================================*/	
	public function update(){
		$id = $this->input->post("editid");
		$expediente = $this->input->post("editexp");
		$programado = $this->input->post("editprog");
		$paciente = $this->input->post("editp");
		$observaciones = $this->input->post("editob");
		$cama = $this->input->post("editcama");
		$cdgc = $this->input->post("editcdgc");
		$medic_onco = $this->input->post("editmedonco");
		$medic_onco_noval = $this->input->post("editmedonco-no");
		$medic_alter = $this->input->post("editmedalt");
		$medic_alter_noval = $this->input->post("editmedalt-no");
		$pre_medic = $this->input->post("editpremed");
		$frec_ciclo = $this->input->post("editfrec");
		$medico = $this->input->post("editmedt");
		$enfermera = $this->input->post("editenf");
		$fecha = $this->input->post("editf");
		$min = $this->input->post("editm");
		$hora = $this->input->post("edith").$min;
		$estado = $this->input->post("editestado");
		$title = $this->input->post("editp")." - ".$cama;
		$start = $this->input->post("editf").$hora;

		$data = array(
			'id' => $id,
			'title' => $title,
			'start' => $start,
			'expediente' => $expediente,
			'programado' => $programado,
			'paciente' => $paciente,
			'observaciones' => $observaciones,
			'cama' => $cama,
			'cdgc' => $cdgc,
			'medic_onco' => $medic_onco,
			'medic_onco_noval' => $medic_onco_noval,
			'medic_alter' => $medic_alter,
			'medic_alter_noval' => $medic_alter_noval,
			'pre_medic' => $pre_medic,
			'frec_ciclo' => $frec_ciclo,
			'medico' => $medico,
			'enfermera' => $enfermera,
			'fecha' => $fecha,
			'hora' => $hora,
			'estado' => $estado,
			'id' => $id,
		);

		if ($this->Agenda_model->update($id,$data)) {
			$this->session->set_flashdata("actualizar","Cita Actualizada");
			redirect(base_url()."mantenimiento/agenda");
		}
		else{
			$this->session->set_flashdata("errora","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/agenda/list");
		}
	}

	/*================================================
  	  = ENVIA LA ID AL MODELO PARA ElIMINAR UNA CITA =
  	  ================================================*/
	public function eliminar($id){
		$this->Agenda_model->delete($id);
		$this->session->set_flashdata("hecho","Cita Eliminada");
		echo "mantenimiento/agenda";
	}

 	/*=========================================================
   	  = SECCION DE BUSCAR PACIENTE Y SUS DATOS PARA LAS CITAS =
      =========================================================*/
      
  	/* LLAMADA AL MODELO PARA BUSCAR SI EXISTE EL PACIENTE CON UNA RECETA */ 
	public function buscarpac($id){
		$data  = array(
			'paciente' => $this->Agenda_model->getPaciente($id), 
		);
		echo json_encode( $data );
	}

	/* LLAMADA AL MODELO PARA BUSCAR LOS DATOS DEL PACIENTE */
	public function buscar_Datos_Pac($id){
		$data  = array(
			'datos' => $this->Agenda_model->datosPacientes($id), 
		);
		echo json_encode( $data );
	}

	/* LLAMADA AL MODELO PARA BUSCAR LOS MEDICAMENTOS DEL PACIENTE (MEDICAMENTOS VALIDADOS) */
	public function buscar_Medicamentos_Pac($id){
		$data  = array(
			'medicamentosval' => $this->Agenda_model->medicamentosPaciente($id), 
		);
		echo json_encode( $data );
	}

	/* LLAMADA AL MODELO PARA BUSCAR LOS MEDICAMENTOS NO VALIDADOS DEL PACIENTE */
	public function buscar_Medicamentos_Novali_pac($id){
		$data  = array(
			'medicamentosnoval' => $this->Agenda_model->medicamentosnovaliPaciente($id), 
		);
		echo json_encode( $data );
	}

	/* LLAMADA AL MODELO PARA BUSCAR LOS MEDICAMENTOS EXTRAS DEL PACIENTE */
	public function buscar_Medicamentos_Pre($id){
		$data  = array(
			'medicamentosextra' => $this->Agenda_model->medicamentos_Pre($id), 
		);
		echo json_encode( $data );
	}
	public function buscar_Medicamentos_Alternativos($id){
		$data  = array(
			'medicamentosalter' => $this->Agenda_model->medicamentos_Alternativos($id), 
		);
		echo json_encode( $data );
	}
	public function buscar_Medicamentos_Alternativos_no($id){
		$data  = array(
			'medicamentosalterno' => $this->Agenda_model->medicamentos_Alternativos_no($id), 
		);
		echo json_encode( $data );
	}
 	/*=============================================================
      = FIN SECCION DE BUSCAR PACIENTE Y SUS DATOS PARA LAS CITAS =
      =============================================================*/

	public function reports(){
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Agenda/reportes");
		$this->load->view("layouts/footer");	
	}
	public function consulta_Reporte_dia(){
		$fecha = $this->input->post("fechareport");
		$data  = array(
			'datos' => $this->Agenda_model->reporte_dia($fecha), 
		);
		$this->load->view("admin/Agenda/pdf",$data);
	}
	public function consulta_Reporte_Mes(){
		$fecha = $this->input->post("fechareport");
		$mes = substr($fecha, 0, -3);
		$data  = array(
			'datos' => $this->Agenda_model->reporte_mes($mes), 
		);
		$this->load->view("admin/Agenda/pdf",$data);
	}
}

