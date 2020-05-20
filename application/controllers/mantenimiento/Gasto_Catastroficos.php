<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gasto_catastroficos extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("Gastos_Catastroficos_model");
	}

	public function pag_inicio(){

		if(isset($_SESSION['exito_gastCat'])){
    		unset($_SESSION['exito_gastCat']);
		}
		
		redirect(base_url()."mantenimiento/gasto_catastroficos");
	}

	
	public function index()
	{
		
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/gasto_catastrofico/list");
		$this->load->view("layouts/footer");

	}

	public function pdf($id_receta)
	{
		$data2  = array(
			'recet'=> $this->Gastos_Catastroficos_model->getreceta2($id_receta),
			'receta' => $this->Gastos_Catastroficos_model->getgastos_catastroficos2($id_receta),
            'medico' => $this->Gastos_Catastroficos_model->getMedicos($id_receta),
            'medico2' => $this->Gastos_Catastroficos_model->getMedicos2($id_receta),
            'paciente' => $this->Gastos_Catastroficos_model->getPacientes2($id_receta),
            'medicinas' => $this->Gastos_Catastroficos_model->getMedicinas2($id_receta),
            'medicinas2' => $this->Gastos_Catastroficos_model->getMedicinas2($id_receta),
            'medjus'=> $this->Gastos_Catastroficos_model->getMedJust($id_receta),
            'pac' => $this->Gastos_Catastroficos_model->getPac($id_receta),
            'extra' => $this->Gastos_Catastroficos_model->getMedicinasExtras($id_receta),
            'medAlt'=> $this->Gastos_Catastroficos_model->getMedicinas_Alt2($id_receta),
            'medAlt2'=> $this->Gastos_Catastroficos_model->getMedicinas_Alt2($id_receta),
            'medAltJust'=> $this->Gastos_Catastroficos_model->getMedAltJust($id_receta),
		);

		//Ordena la fecha de Cumpleaños
		$originalDate = $data2['pac']->fecha_nac;
		$newDate = date("d- m- Y", strtotime($originalDate));
		$data2['pac']->fecha_nac=$newDate;

		//Ordena la Fecha
		$originalDate = $data2['pac']->fecha;
		$newDate = date("d- m- Y", strtotime($originalDate));
		$data2['pac']->fecha=$newDate;

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/gasto_catastrofico/crearPdf",$data2);
		$this->load->view("layouts/footer");
	}

	public function pdf_prueba($id_receta)
	{
		$data2  = array(
			'recet'=> $this->Gastos_Catastroficos_model->getreceta2($id_receta),
			'receta' => $this->Gastos_Catastroficos_model->getgastos_catastroficos2($id_receta),
            'medico' => $this->Gastos_Catastroficos_model->getMedicos($id_receta),
            'medico2' => $this->Gastos_Catastroficos_model->getMedicos2($id_receta),
            'paciente' => $this->Gastos_Catastroficos_model->getPacientes2($id_receta),
            'medicinas' => $this->Gastos_Catastroficos_model->getMedicinas2($id_receta),
            'medicinas2' => $this->Gastos_Catastroficos_model->getMedicinas2($id_receta),
            'medjus'=> $this->Gastos_Catastroficos_model->getMedJust($id_receta),
            'pac' => $this->Gastos_Catastroficos_model->getPac($id_receta),
            'extra' => $this->Gastos_Catastroficos_model->getMedicinasExtras($id_receta),
            'medAlt'=> $this->Gastos_Catastroficos_model->getMedicinas_Alt2($id_receta),
            'medAlt2'=> $this->Gastos_Catastroficos_model->getMedicinas_Alt2($id_receta),
            'medAltJust'=> $this->Gastos_Catastroficos_model->getMedAltJust($id_receta),
		);

		//Ordena la fecha de Cumpleaños
		$originalDate = $data2['pac']->fecha_nac;
		$newDate = date("d- m- Y", strtotime($originalDate));
		$data2['pac']->fecha_nac=$newDate;

		//Ordena la Fecha
		$originalDate = $data2['pac']->fecha;
		$newDate = date("d- m- Y", strtotime($originalDate));
		$data2['pac']->fecha=$newDate;

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/gasto_catastrofico/crearPdf2",$data2);
		$this->load->view("layouts/footer");
	}

    public function search($id)
	{
        $data  = array(
			'receta' => $this->Gastos_Catastroficos_model->getgastos_catastroficos1($id),
            'medico' => $this->Gastos_Catastroficos_model->getMedicos($id),
            'paciente' => $this->Gastos_Catastroficos_model->getPacientes($id),
            'medicinas' => $this->Gastos_Catastroficos_model->getMedicinas($id),
		);
        echo json_encode($data);
	}

	public function busc_idReceta($id){

		$data = array(
		 	'receta' => $this->Gastos_Catastroficos_model->getgastos_catastroficos1($id),
            'medico' => $this->Gastos_Catastroficos_model->getMedicos($id),
            'paciente' => $this->Gastos_Catastroficos_model->getPacientes($id),
            'medicinas' => $this->Gastos_Catastroficos_model->getMedicinas($id),
            'medicinasAlt' => $this->Gastos_Catastroficos_model->getMedicinas_Alt($id),
		);

		if(isset($data['medicinas'][0]->idreceta)){
			if(isset($_SESSION['errorbusq_gastCat'])){
	    		unset($_SESSION['errorbusq_gastCat']);
			}

			if(empty($data['medico'])){
				
				$this->session->set_flashdata("errorbusq_gastCat","\tBusca otra vez; No se ha encontrado dicha RECETA");
			}
			else{
				$this->session->set_flashdata("--","");
			}

			/*
			$x=0;
			$tot=count($data['medicinas']);
			setlocale(LC_TIME,'spanish');

			if (isset($data['medicinas'][$x]->fecha_aplicacion)) {
				do{
					$fechaInicio=strftime("%d/ %B/ %Y", strtotime($data['medicinas'][$x]->fecha_aplicacion));
					$data['medicinas'][$x]->fecha_aplicacion=$fechaInicio;
				}while($x<$tot);
			}

			$tot=count($data['medicinasAlt']);
			$x=0;
			if (isset($data['medicinasAlt'][$x]->fecha_aplicacion)) {
				do{
					$fechaInicio=strftime("%d/ %B/ %Y", strtotime($data['medicinasAlt'][$x]->fecha_aplicacion));
					$data['medicinasAlt'][$x]->fecha_aplicacion=$fechaInicio;
				}while($x<$tot);
			}
			*/
			

			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/gasto_catastrofico/edit",$data);
			$this->load->view("layouts/footer");

		}
		else{
			$this->session->set_flashdata("error_gastCat","La RECETA que ha buscado no contiene MEDICAMENTOS recetados; Por favor introduzcalos");
			redirect(base_url()."mantenimiento/gasto_catastroficos");
		}

		

		

	}

	public function update(){
        $nom_medico=$_POST['nom_medico'];
        $nom_usuario=$this->session->userdata("nombre")." ".$this->session->userdata("ape_pat")." ".$this->session->userdata("ape_mat");
        
        

        $i=1;
        $tot=count($_POST['idMed']);
        

        $justif[1]="";
        
        if ($tot>0) {
        	do{

        		if (!isset($_POST['coment'][$i])) {

        			$justif[$i]="";
        		}
        		else{

        			$justif[$i]=$_POST['coment'][$i];
        		}
        		
        		$i++;
        	}while ( $i<= $tot);
        }

        $i=1;
        $tot=count($_POST['idMedcAlt']);
        

        $justifAlt[1]="";
        
        if ($tot>0) {
        	do{

        		if (!isset($_POST['comentario'][$i])) {

        			$justifAlt[$i]="";
        		}
        		else{

        			$justifAlt[$i]=$_POST['comentario'][$i];
        		}
        		
        		$i++;
        	}while ( $i<= $tot);
        }

        if(empty($nom_medico[0])){
        	
        	$this->session->set_flashdata("error_gastCat","No debes dejar campos vacíos; Busca una RECETA antes de continuar");
			redirect(base_url()."mantenimiento/gasto_catastroficos");
        }
        else{
        	


        	$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));
			$dia=$fechaa->format("d");
			$mes=$fechaa->format("m");
			$anio=$fechaa->format("Y");

			$fecha_Act="";
			$fecha_Act=$anio."-".$mes."-".$dia;

        	$valid=$_POST['optradio'];
        	$idRec=$_POST['idRec'];
			$idMedicina=$_POST['idMed'];
			$idMedDet=$_POST['idMedDet'];

			$idMedAlt=$_POST['idMedcAlt'];
			$id_recetaAlt=$_POST['idRecAlt'];
			$validAlt=$_POST['optradioAlt'];

			
			
			if ($this->Gastos_Catastroficos_model->update($idMedicina,$idRec,$idMedDet,$valid,$justif,$fecha_Act,$nom_usuario,$idMedAlt,$id_recetaAlt,$validAlt,$justifAlt)){
                
                $id_receta = $idRec[1];
				$data2  = array(
					'recet'=> $this->Gastos_Catastroficos_model->getreceta2($id_receta),
					'receta' => $this->Gastos_Catastroficos_model->getgastos_catastroficos2($id_receta),
		            'medico' => $this->Gastos_Catastroficos_model->getMedicos($id_receta),
		            'medico2' => $this->Gastos_Catastroficos_model->getMedicos2($id_receta),
		            'paciente' => $this->Gastos_Catastroficos_model->getPacientes2($id_receta),
		            'medicinas' => $this->Gastos_Catastroficos_model->getMedicinas2($id_receta),
		            'medicinas2' => $this->Gastos_Catastroficos_model->getMedicinas2($id_receta),
		            'medjus'=> $this->Gastos_Catastroficos_model->getMedJust($id_receta),
		            'pac' => $this->Gastos_Catastroficos_model->getPac($id_receta),
		            'extra' => $this->Gastos_Catastroficos_model->getMedicinasExtras($id_receta),
		            'medAlt'=> $this->Gastos_Catastroficos_model->getMedicinas_Alt2($id_receta),
		            'medAlt2'=> $this->Gastos_Catastroficos_model->getMedicinas_Alt2($id_receta),
		            'medAltJust'=> $this->Gastos_Catastroficos_model->getMedAltJust($id_receta),
				);

				
				//Ordena la fecha de Cumpleaños
				$originalDate = $data2['pac']->fecha_nac;
				$newDate = date("d- m- Y", strtotime($originalDate));
				$data2['pac']->fecha_nac=$newDate;

				//Ordena la Fecha
				$originalDate = $data2['pac']->fecha;
				$newDate = date("d- m- Y", strtotime($originalDate));
				$data2['pac']->fecha=$newDate;
				
				$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/gasto_catastrofico/crearPdf",$data2);
				$this->load->view("layouts/footer");
				
				$this->session->set_flashdata("exito_gastCat","Las validaciones o rechazos de los MEDICAMENTOS se han guardado correctamente");
				//redirect(base_url()."mantenimiento/gasto_catastroficos");
				

			}
			else{
				
				print("NO pasa");
				$this->session->set_flashdata("error_gastCat","Ha ocurrido un problema con la Base de Datos, póngase en contacto con los técnicos");
				//redirect(base_url()."mantenimiento/gasto_catastroficos");
			}
			
        }
        
	}

	public function busc_no_exp(){
		
		$no_exp=$_POST['no_exp'];

		$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));
		$dia=$fechaa->format("d");
		$mes=$fechaa->format("m");
		$anio=$fechaa->format("Y");

		$fecha_Act="";
		$fecha_Act=$anio."-".$mes."-".$dia;

		$data = array(
	 		'paciente' => $this->Gastos_Catastroficos_model->get_paciente_no_exp($no_exp),
        	'medico' => $this->Gastos_Catastroficos_model->get_tabla_receta($no_exp),
        	'fecha_Actual'=>$fecha_Act,
        	'id_med'=>$this->session->userdata("id_med"),
        	
		);

		
		if(empty($data['paciente'])){
			$this->session->set_flashdata("error_gastCat","No existe ningun PACIENTE con dicho Numero de Expediente");
			redirect(base_url()."mantenimiento/gasto_catastroficos");
		}
		else{
			
			if(empty($data['medico'])){
				$this->session->set_flashdata("error_gastCat","No existe ninguna RECETA con dicho Numero de Expediente");
				redirect(base_url()."mantenimiento/gasto_catastroficos");
			}
			else{

				$tot=count($data['medico']);
				$x=0;

				do{
					$originalDate = $data['medico'][$x]->fecha;
					$newDate = date("d/ m/ Y", strtotime($originalDate));

					$data['medico'][$x]->fecha=$newDate;
					$x++;
				}while($x<$tot);

				$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/gasto_catastrofico/list",$data);
				$this->load->view("layouts/footer");
			}
		}
		
			
	}
    
}