<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formatos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Formatos_model");
	}

	
	

	public function laboratorio()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/laboratorio");
		$this->load->view("layouts/footer");

	}

	public function Imageneologia()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/Imageneologia");
		$this->load->view("layouts/footer");
	}

	public function Subrogado()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/subrogados");
		$this->load->view("layouts/footer");
	}

	public function Interconsulta()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/Interconsulta");
		$this->load->view("layouts/footer");
	}

	public function Anatomia()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/Anatomia");
		$this->load->view("layouts/footer");
	}

	public function Electro()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/Electro");
		$this->load->view("layouts/footer");
	}


	public function Hospitalaria()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/Hospitalaria");
		$this->load->view("layouts/footer");
	}

	public function Indicaciones()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/Indicaciones");
		$this->load->view("layouts/footer");
	}

	public function Pertu()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/Pertu");
		$this->load->view("layouts/footer");
	}

	public function Lapa()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/Lapa");
		$this->load->view("layouts/footer");
	}

	public function Cetu()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/Cetu");
		$this->load->view("layouts/footer");
	}

	public function Onco()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/onco");
		$this->load->view("layouts/footer");
	}

	public function general()
	{
		$medico = $this->session->userdata("id_med");
		$data=array(
			'medico'=>$medico,
		);
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/general", $data);
		$this->load->view("layouts/footer");
	}

	public function storelaboratorio()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/laboratorio");
				$this->load->view("layouts/footer");
	    }else{
		$no_exp = $this->input->post("no_exp");
		$id_med = $this->session->userdata("id_med");
		$fecha = $this->input->post("fecha");
		$servicio = $this->input->post("servicio");
		$cita = $this->input->post("cita");
		$estudios = $this->input->post("estudios");
		$data=array(
			'no_exp'=>$no_exp,
			'paciente'=> $this->Formatos_model->getPaciente2($no_exp),
			'medico' => $this->Formatos_model->getMedico2($id_med),
			'fecha'=>$fecha,
			'servicio'=>$servicio,
			'cita'=>$cita,
			'estudios'=>nl2br($estudios),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdflab",$data);
		$this->load->view("layouts/footer");
	}

	}

	public function storeimage()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/Imageneologia");
				$this->load->view("layouts/footer");
	    }else{
		$no_exp = $this->input->post("no_exp");
		$id_med = $this->session->userdata("id_med");
		$fecha = $this->input->post("fecha");
		$servicio = $this->input->post("servicio");
		$cita = $this->input->post("cita");
		$estudios = $this->input->post("estudios");
		$diagnostico = $this->input->post("diagnostico");
		$data=array(
			'no_exp'=>$no_exp,
			'paciente'=> $this->Formatos_model->getPaciente2($no_exp),
			'medico' => $this->Formatos_model->getMedico2($id_med),
			'fecha'=>$fecha,
			'diagnostico'=>nl2br($diagnostico),
			'servicio'=>$servicio,
			'cita'=>$cita,
			'estudios'=>nl2br($estudios),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdfimg",$data);
		$this->load->view("layouts/footer");
	}

	}

	public function storeinter()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/Interconsulta");
				$this->load->view("layouts/footer");
	    }else{
		$no_exp = $this->input->post("no_exp");
		$id_med = $this->session->userdata("id_med");
		$fecha = $this->input->post("fecha");
		$servicio = $this->input->post("servicio");
		$cita = $this->input->post("cita");
		$motivo = $this->input->post("motivo");
		$resumen = $this->input->post("resumen");
		$data=array(
			'no_exp'=>$no_exp,
			'paciente'=> $this->Formatos_model->getPaciente2($no_exp),
			'medico' => $this->Formatos_model->getMedico2($id_med),
			'fecha'=>$fecha,
			'servicio'=>$servicio,
			'cita'=>$cita,
			'motivo'=>nl2br($motivo),
			'resumen'=>nl2br($resumen),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdfinter",$data);
		$this->load->view("layouts/footer");
	}

	}

	public function searchmed($id){
		$data  = array(
			'medico' => $this->NotaMedica_model->getMedico($id), 
		);
		echo json_encode( $data );
	}

	public function storesubrogado()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/subrogados");
				$this->load->view("layouts/footer");
	    }else{
		$no_exp = $this->input->post("no_exp");
		$id_med = $this->session->userdata("id_med");
		$fecha = $this->input->post("fecha");
		$razon = $this->input->post("razon");
		$direccion = $this->input->post("direccion");
		$servicio = $this->input->post("servicio");
		$sanitaria = $this->input->post("sanitaria");
		$domicilio = $this->input->post("domicilio");
		$tipo = $this->input->post("tipo");
		$auxiliares = $this->input->post("auxiliares");
		$tratamiento = $this->input->post("tratamiento");
		$observaciones = $this->input->post("observaciones");
		$data=array(
			'no_exp'=>$no_exp,
			'paciente'=> $this->Formatos_model->getPaciente2($no_exp),
			'medico' => $this->Formatos_model->getMedico2($id_med),
			'direccion'=>$direccion,
			'razon' => $razon,
			'fecha'=>$fecha,
			'servicio'=>$servicio,
			'sanitaria'=>$sanitaria,
			'domicilio'=>$domicilio,
			'tipo'=>$tipo,
			'auxiliares'=>$auxiliares,
			'tratamiento'=>nl2br($tratamiento),
			'observaciones'=>nl2br($observaciones),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdfsub",$data);
		$this->load->view("layouts/footer");
	}

	}

	public function storeanatomia()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/Anatomia");
				$this->load->view("layouts/footer");
	    }else{
		$no_exp = $this->input->post("no_exp");
		$id_med = $this->session->userdata("id_med");
		$fecha = $this->input->post("fecha");
		$num = $this->input->post("num");
		$pieza = $this->input->post("pieza");
		$estudio = $this->input->post("estudio");
		$datos = $this->input->post("datos");
		$servicio = $this->input->post("servicio");
		$cama = $this->input->post("cama");
		$data=array(
			'no_exp'=>$no_exp,
			'paciente'=> $this->Formatos_model->getPaciente2($no_exp),
			'medico' => $this->Formatos_model->getMedico2($id_med),
			'fecha'=>$fecha,
			'num'=>$num,
			'servicio'=>$servicio,
			'cama'=>$cama,
			'pieza'=>nl2br($pieza),
			'estudio'=>$estudio,
			'datos'=>nl2br($datos),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdfana",$data);
		$this->load->view("layouts/footer");
	}

	}

	public function storelectro()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/Electro");
				$this->load->view("layouts/footer");
	    }else{
		$no_exp = $this->input->post("no_exp");
		$id_med = $this->session->userdata("id_med");
		$fecha= $this->input->post("fecha");
		$hora= $this->input->post("hora");
		$fecha2= $this->input->post("fecha2");
		$hora2= $this->input->post("hora2");
		$fecha3= $this->input->post("fecha3");
		$hora3= $this->input->post("hora3");
		$tipo = $this->input->post("tipo");
		
		$data=array(
			'no_exp'=>$no_exp,
			'paciente'=> $this->Formatos_model->getPaciente2($no_exp),
			'medico' => $this->Formatos_model->getMedico2($id_med),
			'fecha'=>$fecha,
			'hora'=>$hora,
			'fecha2'=>$fecha2,
			'hora2'=>$hora2,
			'fecha3'=>$fecha3,
			'hora3'=>$hora3,
			'tipo'=>$tipo,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdfele",$data);
		$this->load->view("layouts/footer");
	}

	}

	public function storehosp()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/Hospitalaria");
				$this->load->view("layouts/footer");
	    }else{
		$no_exp = $this->input->post("no_exp");
		$id_med = $this->session->userdata("id_med");
		$medicamentos = $this->input->post("medicamentos");
		$data=array(
			'no_exp'=>$no_exp,
			'paciente'=> $this->Formatos_model->getPaciente2($no_exp),
			'medico' => $this->Formatos_model->getMedico2($id_med),
			'medicamentos'=>nl2br($medicamentos),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdfhosp",$data);
		$this->load->view("layouts/footer");
	}

	}

	public function storeindi()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/Indicaciones");
				$this->load->view("layouts/footer");
	    }else{
			$no_exp = $this->input->post("no_exp");
			$id_med = $this->session->userdata("id_med");
			$tipo = $this->input->post("tipo");
			$dieta = $this->input->post("dieta");
			$soluciones = $this->input->post("soluciones");
			$medicamentos = $this->input->post("medicamentos");
			$estudios = $this->input->post("estudios");
			$cuidados = $this->input->post("cuidados");
			$data=array(
				'no_exp'=>$no_exp,
				'paciente'=> $this->Formatos_model->getPaciente2($no_exp),
				'medico' => $this->Formatos_model->getMedico2($id_med),
				'tipo'=>$tipo,
				'dieta'=>nl2br($dieta),
				'soluciones'=>nl2br($soluciones),
				'medicamentos'=>nl2br($medicamentos),
				'estudios'=>nl2br($estudios),
				'cuidados'=>nl2br($cuidados),
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/Formatos/pdfindi",$data);
			$this->load->view("layouts/footer");
		}
	}

	public function storepertu()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/Pertu");
				$this->load->view("layouts/footer");
	        }else{
	    $no_exp = $this->input->post("no_exp");
		$menopausia = $this->input->post("1");
		$tumor = $this->input->post("7");
		$adenopatia = $this->input->post("2");
		$renal = $this->input->post("8");
		$hepatica = $this->input->post("3");
		$cancer = $this->input->post("9");
		$etapa = $this->input->post("4");
		$ihq = $this->input->post("10");
		$recep = $this->input->post("5");
		$biopsia = $this->input->post("11");
		$basal = $this->input->post("fevi");
		$ganglios = $this->input->post("ganglios");
		$organos = $this->input->post("organos");
		$terapia = $this->input->post("12");
		$antecedente = $this->input->post("13");
		$monoterapia = $this->input->post("monoterapia");
		$trata = $this->input->post("trata");
		$combinacion = $this->input->post("combinacion");
		$aroma = $this->input->post("aroma");
		$taxano = $this->input->post("taxano");
		$platinos = $this->input->post("platinos");
		$ciclo = $this->input->post("ciclo");
		$anticuerpo = $this->input->post("anticuerpo");
		$justificacion = $this->input->post("justificacion");
		$fase = $this->input->post("fase");
		$unidad = $this->input->post("unidad");
		$servicio = $this->input->post("servicio");
		$data=array(
			'no_exp'=>$no_exp,
			'paciente'=> $this->Formatos_model->getPaciente2($no_exp),
			'medico' => $this->Formatos_model->getMedico2($id_med),
			'meno'=>$menopausia,
			'tumor'=>$tumor,
			'adenopatia'=>$adenopatia,
			'renal'=>$renal,
			'hepatica'=>$hepatica,
			'cancer'=>$cancer,
			'etapa'=>$etapa,
			'ihq'=>$ihq,
			'recep'=>$recep,
			'biopsia'=>$biopsia,
			'basal'=>$basal,
			'ganglios'=>$ganglios,
			'organos'=>$organos,
			'terapia'=>$terapia,
			'antecedente'=>$antecedente,
			'monoterapia'=>$monoterapia,
			'trata'=>$trata,
			'combinacion'=>$combinacion,
			'aroma'=>$aroma,
			'taxano'=>$taxano,
			'platinos'=>$platinos,
			'ciclo'=>$ciclo,
			'anticuerpo'=>$anticuerpo,
			'justificacion'=>nl2br($justificacion),
			'fase'=>$fase,
			'unidad'=>$unidad,
			'servicio'=>$servicio,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdfper",$data);
		$this->load->view("layouts/footer");
	}}

	public function storelapa()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/Lapa");
				$this->load->view("layouts/footer");
	        }else{
	    $no_exp = $this->input->post("no_exp");
		$hispa = $this->input->post("1");
		$tumor = $this->input->post("7");
		$adenopatia = $this->input->post("2");
		$renal = $this->input->post("8");
		$hepatica = $this->input->post("3");
		$cancer = $this->input->post("9");
		$etapa = $this->input->post("4");
		$ihq = $this->input->post("10");
		$recep = $this->input->post("5");
		$biopsia = $this->input->post("11");
		$basal = $this->input->post("fevi");
		$ganglios = $this->input->post("ganglios");
		$organos = $this->input->post("organos");
		$terapia = $this->input->post("12");
		$antecedente = $this->input->post("13");
		$justificacion = $this->input->post("justificacion");
		$fase = $this->input->post("fase");
		$reporte = $this->input->post("reporte");
		$motivo = $this->input->post("motivo");
		$tri = $this->input->post("tri");
		$unidad = $this->input->post("unidad");
		$servicio = $this->input->post("servicio");
		$data=array(
			'no_exp'=>$no_exp,
			'paciente'=> $this->Formatos_model->getPaciente2($no_exp),
			'medico' => $this->Formatos_model->getMedico2($id_med),
			'hispa'=>$hispa,
			'tumor'=>$tumor,
			'adenopatia'=>$adenopatia,
			'renal'=>$renal,
			'hepatica'=>$hepatica,
			'cancer'=>$cancer,
			'etapa'=>$etapa,
			'ihq'=>$ihq,
			'recep'=>$recep,
			'biopsia'=>$biopsia,
			'basal'=>$basal,
			'ganglios'=>$ganglios,
			'organos'=>$organos,
			'terapia'=>$terapia,
			'antecedente'=>$antecedente,
			'justificacion'=>nl2br($justificacion),
			'fase'=>$fase,
			'unidad'=>$unidad,
			'servicio'=>$servicio,
			'reporte'=>$reporte,
			'motivo'=>$motivo,
			'tri'=>$tri,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdflap",$data);
		$this->load->view("layouts/footer");
	    }
	}

public function storecetu()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/Cetu");
				$this->load->view("layouts/footer");
	        }else{
	    $no_exp = $this->input->post("no_exp");
		$depuracion = $this->input->post("1");
		$terapia = $this->input->post("7");
		$hemo = $this->input->post("2");
		$antecedente = $this->input->post("8");
		$plaquetas = $this->input->post("3");
		$espectativa = $this->input->post("9");
		$alt = $this->input->post("4");
		$meta = $this->input->post("10");
		$bili = $this->input->post("5");
		$fase = $this->input->post("fase");
		$unidad = $this->input->post("unidad");
		$servicio = $this->input->post("servicio");
		$ras = $this->input->post("6");
		$tratamiento = $this->input->post("11");
		$parcial = $this->input->post("12");
		$carci = $this->input->post("13");
		$justificacion = $this->input->post("justificacion");
		$sitio = $this->input->post("sitio");
		$data=array(
			'no_exp'=>$no_exp,
			'paciente'=> $this->Formatos_model->getPaciente2($no_exp),
			'medico' => $this->Formatos_model->getMedico2($id_med),
			'depuracion'=>$depuracion,
			'hemo'=>$hemo,
			'ras'=>$ras,
			'terapia'=>$terapia,
			'antecedente'=>$antecedente,
			'plaquetas'=>$plaquetas,
			'espectativa'=>$espectativa,
			'alt'=>$alt,
			'meta'=>$meta,
			'bili'=>$bili,
			'fase'=>$fase,
			'unidad'=>$unidad,
			'servicio'=>$servicio,
			'trata'=>$tratamiento,
			'terapia'=>$terapia,
			'justificacion'=>nl2br($justificacion),
			'sitio'=>$sitio,
			'parcial'=>$parcial,
			'carci'=>$carci,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdfCetu",$data);
		$this->load->view("layouts/footer");
	    }
	}

	public function storeonco()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/Onco");
				$this->load->view("layouts/footer");
	    }else{
	    $no_exp = $this->input->post("no_exp");
		$procedimiento = $this->input->post("procedimiento");
		$diagnostico = $this->input->post("diagnostico");
		$intervencion = $this->input->post("intervencion");
		$beneficios = $this->input->post("beneficios");
		$medico = $this->input->post("medico");
		$testigo1 = $this->input->post("testigo1");
		$testigo2 = $this->input->post("testigo2");
		$tutor = $this->input->post("tutor");

		$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

        $fecha_actual = $fechaa->format("d/m/Y");

        $infopac= $this->Formatos_model->getPaciente2($no_exp);
       

        $dia=date("j");
		$mes=date("n");
		$anno=date("Y");
 
		//descomponer fecha de nacimiento
		$dia_nac=substr($infopac->fecha_nac, 8, 2);
		$mes_nac=substr($infopac->fecha_nac, 5, 2);
		$anno_nac=substr($infopac->fecha_nac, 0, 4);
 
		if($mes_nac>$mes){
			$calc_edad= $anno-$anno_nac-1;
		}else{
			if($mes==$mes_nac AND $dia_nac>$dia){
				$calc_edad= $anno-$anno_nac-1;
			}else{
				$calc_edad= $anno-$anno_nac;
			}
		}
		$data=array(
			'no_exp'=>$no_exp,
			'infopac'=> $infopac,
			'medico' => $this->Formatos_model->getMedico2($id_med),
			'fecha' => $fecha_actual,
			'edad' => $calc_edad,
			'procedimiento'=> $procedimiento,
			'diagnostico'=> $diagnostico,
			'intervencion'=> $intervencion,
			'beneficios'=> nl2br($beneficios),
			'testigo1'=> $testigo1,
			'testigo2'=> $testigo2,
			'tutor'=> $tutor,
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdfonco",$data);
		$this->load->view("layouts/footer");
	}}

	public function storegeneral()
	{
		$id_pac = $this->input->post("id_pac");
		$id_med = $this->session->userdata("id_med");
		$id_med2 = $this->input->post("id_med");
		if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo generar el pdf no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/Formatos/general");
				$this->load->view("layouts/footer");
	    }else{
	    $no_exp = $this->input->post("exp");
		$procedimiento = $this->input->post("procedimiento");
		$diagnostico = $this->input->post("diagnostico");
		$intervencion = $this->input->post("intervencion");
		$riesgos = $this->input->post("riesgos");
		$beneficios = $this->input->post("beneficios");
		$medico = $this->input->post("medico");
		$testigo1 = $this->input->post("testigo1");
		$testigo2 = $this->input->post("testigo2");
		$tutor = $this->input->post("tutor");

		$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

        $fecha_actual = $fechaa->format("d/m/Y");

        $infopac= $this->Formatos_model->getPaciente2($no_exp);
       
        if(empty($id_med2)){
				$medico = $this->Formatos_model->getMedico2($id_med);
			}else
			{
				$medico = $this->Formatos_model->getMedico2($id_med2);
			}
        $dia=date("j");
		$mes=date("n");
		$anno=date("Y");
 
		//descomponer fecha de nacimiento
		$dia_nac=substr($infopac->fecha_nac, 8, 2);
		$mes_nac=substr($infopac->fecha_nac, 5, 2);
		$anno_nac=substr($infopac->fecha_nac, 0, 4);
 
		if($mes_nac>$mes){
			$calc_edad= $anno-$anno_nac-1;
		}else{
			if($mes==$mes_nac AND $dia_nac>$dia){
				$calc_edad= $anno-$anno_nac-1;
			}else{
				$calc_edad= $anno-$anno_nac;
			}
		}
		$data=array(
			'no_exp'=>$no_exp,
			'medico'=>$medico,
			'infopac'=> $infopac,
			'fecha' => $fecha_actual,
			'edad' => $calc_edad,
			'procedimiento'=> $procedimiento,
			'diagnostico'=> $diagnostico,
			'intervencion'=> $intervencion,
			'riesgos'=> nl2br($riesgos),
			'beneficios'=> nl2br($beneficios),
			'testigo1'=> $testigo1,
			'testigo2'=> $testigo2,
			'tutor'=> $tutor,
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/Formatos/pdfgeneral",$data);
		$this->load->view("layouts/footer");
	}
	}

	public function search($id){
		$data  = array(
			'paciente' => $this->Formatos_model->getPaciente($id), 
		);
		echo json_encode( $data );
	}

	


}