<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class signosvita extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->model("signosvita_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}
	
	public function index()
	{
		if ($this->session->userdata("login")) {
			$data  = array(
				'signosvita' => $this->signosvita_model->getsignosvitales()
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/signosvita/list",$data);
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}
		
	}
	public function inactivos()
	{
		$data  = array(
			'signosvita_model' => $this->signosvita_model->getInactivos()
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/signosvita/list",$data);
		$this->load->view("layouts/footer");

	}

	public function search($id)
	{
		$data  = array(
			'paciente' => $this->signosvita_model->getpaciente($id), 
		);

		echo json_encode($data);


	}


	public function add(){

		$data = array(
			'signosvitales' => $this ->signosvita_model->getsignosvitales() 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/signosvita/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		$id_pac = $this->input->post("id_pac");
		if(empty($id_pac)){
			$this->session->set_flashdata("error","No se pudo guardar, falta información del paciente");
			redirect(base_url()."mantenimiento/signosvita/add/");
		}else{
			$peso = $this->input->post("peso");
	        $estatura = $this->input->post("estatura");
	        $imc = $this->input->post("imc");
	        $temperatura = $this->input->post("temperatura");
	        $fc = $this->input->post("fc");
	        $fr = $this->input->post("fr");
	        $ta = $this->input->post("ta");
	        //Comando Para Convertir en Mayusculas

			$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

	        $fecha_actual = $fechaa->format("Y-m-d");

	        $hora_solicitud = $fechaa->format("H:i");

	        $turno = $this->input->post("turno");

	        $derecho_habiencia = $this->input->post("derecho_habiencia");

	        $id_emp = $this->session->userdata("id");

	        $pago_consulta = $this->input->post("pago_consulta");

	        $paciente_agendado = $this->input->post("agendado");

	        $hora_cita = $this->input->post("hora");

	        $folio_curacion = $this->input->post("folio_curacion");

				
			$data = array(
				'id_pac' => $id_pac,
				'peso' => $peso,
				'estatura' => $estatura,
				'imc' => $imc,
				'temperatura' => $temperatura,
				'fc' => $fc,
				'fr' => $fr,
				'ta' => $ta,
				'fecha' => $fecha_actual,
				'turno' => $turno,
				'derecho_habiencia' => $derecho_habiencia,
				'id_emp' => $id_emp,
				'pago_consulta' => $pago_consulta,
				'paciente_agendado' => $paciente_agendado,
				'hora_cita' => $hora_cita,
				'folio_curacion' => $folio_curacion,
				'hora_solicitud' => $hora_solicitud,

			);

			if ($this->signosvita_model->save($data)) {
					$this->session->set_flashdata("exitos","Se guardo correctamente!");
					redirect(base_url()."mantenimiento/signosvita/add");
			}

			$this->session->set_flashdata("exitos","Se guardo correctamente!");
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/signosvita/add");
			$this->load->view("layouts/footer");
		}
	}

	public function edit($id){
		$data  = array(
			'signosvita' => $this->signosvita_model->getsignosvital($id), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/signosvita/edit",$data);
		$this->load->view("layouts/footer");
	}



	public function view($id){
		$data  = array(
			'signosvitales' => $this->signosvita_model->getsignosvital($id), 
		);
		$this->load->view("admin/signosvita/view",$data);
	}



	
	public function generar_excel(){

		$tipo = $this->input->post("tipo");
		$fecha = $this->input->post("fecha");

		if($tipo=="diario"){
			$primerDia=date ("Y-m-d",strtotime($fecha));
			$ultimoDia=date ("Y-m-d",strtotime($fecha));
		}elseif ($tipo=="semanal") {
			$anio = date("Y", strtotime($fecha));
			$mes1 = date("m", strtotime($fecha));
			$dia1 = date("d", strtotime($fecha));
			$nuevaFecha = mktime(0,0,0,$mes1,$dia1,$anio);
			$diaDeLaSemana = date("w", $nuevaFecha);
			$nuevaFecha = $nuevaFecha - ($diaDeLaSemana*24*3600); //Restar los segundos totales de los dias transcurridos de la semana
			$primerDia=date ("Y-m-d",$nuevaFecha);
			$ultimoDia=date ("Y-m-d",($nuevaFecha+6*24*3600));
		}elseif ($tipo=="mensual") {
			$timestamp = strtotime( $fecha );
			$diasdelmes = date( "t", $timestamp );

			$anio = date("Y", strtotime($fecha));
			$mes1 = date("m", strtotime($fecha));
			$diaf = $diasdelmes;

			$primerDia = date ("Y-m-d",strtotime("01"."-".$mes1."-".$anio));

			$ultimoDia = date ("Y-m-d",strtotime($diaf."-".$mes1."-".$anio));

		}

		$reporte = $this->signosvita_model->getHistorial($primerDia,$ultimoDia);
		    if(count($reporte) > 0){
		        //Cargamos la librería de excel.
		        $this->load->library('excel'); 
		        $this->excel->setActiveSheetIndex(0);
		        $this->excel->getActiveSheet()->setTitle('reportes');
		        //Contador de filas
		        $contador = 1;
		        //Le aplicamos ancho las columnas.
		        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(15);
		        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(15);
		        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(15);
		        $this->excel->getActiveSheet()->getColumnDimension('D')->setWidth(50);
		        $this->excel->getActiveSheet()->getColumnDimension('E')->setWidth(10);
		        $this->excel->getActiveSheet()->getColumnDimension('F')->setWidth(10);
		        $this->excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
		        $this->excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
		        $this->excel->getActiveSheet()->getColumnDimension('I')->setWidth(60);
		        $this->excel->getActiveSheet()->getColumnDimension('J')->setWidth(50);
		        $this->excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
		        $this->excel->getActiveSheet()->getColumnDimension('L')->setWidth(50);
		        $this->excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
		        $this->excel->getActiveSheet()->getColumnDimension('N')->setWidth(15);
		        $this->excel->getActiveSheet()->getColumnDimension('O')->setWidth(20);
		        $this->excel->getActiveSheet()->getColumnDimension('P')->setWidth(20);
		        $this->excel->getActiveSheet()->getColumnDimension('Q')->setWidth(20);
		        $this->excel->getActiveSheet()->getColumnDimension('R')->setWidth(20);

		        //aplicar colores de fondo a las celdas de titulo
				$this->excel->getActiveSheet()->getStyle('A1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFF300');
				$this->excel->getActiveSheet()->getStyle('B1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00EEFF');
				$this->excel->getActiveSheet()->getStyle('C1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('F76C00');
				$this->excel->getActiveSheet()->getStyle('D1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('A3B903');
				$this->excel->getActiveSheet()->getStyle('E1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('4EFF00');
				$this->excel->getActiveSheet()->getStyle('F1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FFFD');
				$this->excel->getActiveSheet()->getStyle('G1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('C6C6C6');
				$this->excel->getActiveSheet()->getStyle('H1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFA9EB');
				$this->excel->getActiveSheet()->getStyle('I1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('098229');
				$this->excel->getActiveSheet()->getStyle('J1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FFF05B');
				$this->excel->getActiveSheet()->getStyle('K1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('C173FE');
				$this->excel->getActiveSheet()->getStyle('L1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FF0000');
				$this->excel->getActiveSheet()->getStyle('M1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('43E600');
				$this->excel->getActiveSheet()->getStyle('N1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FF0000');
				$this->excel->getActiveSheet()->getStyle('O1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00EEFF');
				$this->excel->getActiveSheet()->getStyle('P1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('A3B903');
				$this->excel->getActiveSheet()->getStyle('Q1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('FF0000');
				$this->excel->getActiveSheet()->getStyle('R1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('2E652F');


		        //Le aplicamos negrita a los títulos de la cabecera.
		        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("D{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("E{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("F{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("G{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("H{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("I{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("J{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("K{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("L{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("M{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("N{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("O{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("P{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("Q{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("R{$contador}")->getFont()->setBold(true);
		        //Definimos los títulos de la cabecera.
		        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'FECHA');
		        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'TURNO');
		        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'EXPEDIENTE');
		        $this->excel->getActiveSheet()->setCellValue("D{$contador}", 'NOMBRE DEL PACIENTE');
		        $this->excel->getActiveSheet()->setCellValue("E{$contador}", 'EDAD');
		        $this->excel->getActiveSheet()->setCellValue("F{$contador}", 'GENERO');
		        $this->excel->getActiveSheet()->setCellValue("G{$contador}", 'DERECHOHABIENCIA');
		        $this->excel->getActiveSheet()->setCellValue("H{$contador}", 'TIPO DE CONSULTA');
		        $this->excel->getActiveSheet()->setCellValue("I{$contador}", 'DIAGNOSTICO');
		        $this->excel->getActiveSheet()->setCellValue("J{$contador}", 'MEDICO');
		        $this->excel->getActiveSheet()->setCellValue("K{$contador}", 'ESPECIALIDAD');
		        $this->excel->getActiveSheet()->setCellValue("L{$contador}", 'PERSONAL DE ENFERMERIA');
		        $this->excel->getActiveSheet()->setCellValue("M{$contador}", 'FOLIO DE PAGO DE CONSULTA');
		        $this->excel->getActiveSheet()->setCellValue("N{$contador}", 'AGENDADO');
		        $this->excel->getActiveSheet()->setCellValue("O{$contador}", 'HORA DE CITA AGENDADA');
		        $this->excel->getActiveSheet()->setCellValue("P{$contador}", 'HORA DE SOLICITUD EN MODULO DE ENFERMERIA');
		        $this->excel->getActiveSheet()->setCellValue("Q{$contador}", 'HORA DE SALIDA  DEL CONSULTORIO MEDICO');
		        $this->excel->getActiveSheet()->setCellValue("R{$contador}", 'FOLIO DE CURACION');
		        //Definimos la data del cuerpo.        
		        foreach($reporte as $l){
		           //Incrementamos una fila más, para ir a la siguiente.
		           $contador++;
		           //Informacion de las filas de la consulta.
		           $this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->fecha);
		           $this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->turno);
		           $this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->no_exp);
		           $this->excel->getActiveSheet()->setCellValue("D{$contador}", $l->nombrepx." ".$l->ape_pat." ".$l->ape_mat);

		            $dia=date("j");
					$mes=date("n");
					$anno=date("Y");
			 
					//descomponer fecha de nacimiento
					$dia_nac=substr($l->fecha_nac, 8, 2);
					$mes_nac=substr($l->fecha_nac, 5, 2);
					$anno_nac=substr($l->fecha_nac, 0, 4);
			 
					if($mes_nac>$mes){
						$calc_edad= $anno-$anno_nac-1;
					}else{
						if($mes==$mes_nac AND $dia_nac>$dia){
							$calc_edad= $anno-$anno_nac-1;
						}else{
							$calc_edad= $anno-$anno_nac;
						}
					}

		           $this->excel->getActiveSheet()->setCellValue("E{$contador}", $calc_edad);
		           $this->excel->getActiveSheet()->setCellValue("F{$contador}", $l->sexo);
		           $this->excel->getActiveSheet()->setCellValue("G{$contador}", $l->derecho_habiencia);
		           $this->excel->getActiveSheet()->setCellValue("H{$contador}", $l->tipo_consulta);
		           $this->excel->getActiveSheet()->setCellValue("I{$contador}", $l->desdiag);
		           $this->excel->getActiveSheet()->setCellValue("J{$contador}", $l->nombre_medico." ".$l->ape_pat_medico." ".$l->ape_mat_medico);
		           $this->excel->getActiveSheet()->setCellValue("K{$contador}", $l->nombreesp);
		           $this->excel->getActiveSheet()->setCellValue("L{$contador}", $l->nombre_enfermera." ".$l->ape_pat_enfermera." ".$l->ape_mat_enfermera);
		           $this->excel->getActiveSheet()->setCellValue("M{$contador}", $l->pago_consulta);
		           $this->excel->getActiveSheet()->setCellValue("N{$contador}", $l->paciente_agendado);
		           $this->excel->getActiveSheet()->setCellValue("O{$contador}", $l->hora_cita);
		           $this->excel->getActiveSheet()->setCellValue("P{$contador}", $l->hora_solicitud);
		           $this->excel->getActiveSheet()->setCellValue("Q{$contador}", $l->hora_salida);
		           $this->excel->getActiveSheet()->setCellValue("R{$contador}", $l->folio_curacion);
		        }
		        //Le ponemos un nombre al archivo que se va a generar.
		        $fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

	        	$fecha_actual = $fechaa->format("Y-m-d");
		        
		        $archivo = "Reporte_de_signos_vitales_{$fecha_actual}.xls";
		        //$archivo = "llamadas_cliente.xls";
		        header('Content-Type: application/vnd.ms-excel');
		        header('Content-Disposition: attachment;filename="'.$archivo.'"');
		        header('Cache-Control: max-age=0');
		        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		        //Hacemos una salida al navegador con el archivo Excel.
		        $objWriter->save('php://output');
		     }else{
		        $this->session->set_flashdata("errors","No hay reporte de esa fecha!");
				redirect(base_url()."mantenimiento/signosvita");        
		     }
	}

}




