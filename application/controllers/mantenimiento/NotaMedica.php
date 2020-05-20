<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotaMedica extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("NotaMedica_model");
		if (!$this->session->userdata("login")) {
			redirect(base_url());
		}
	}

	public function salir(){
		echo "mantenimiento/notamedica";
	}

	//aqui manda a llamar get
	public function index()
	{
		if ($this->session->userdata("login")) {
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/notamedica/list");
			$this->load->view("layouts/footer");
		}
		else{
			$this->load->view("admin/login");
		}
	}
	
	public function searchnota()
	{
		$id = $this->input->post("no_rec");

		$id_pac = $this->NotaMedica_model->getIdPac2($id);

		if(!$id_pac){
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/notamedica/list");
			$this->load->view("layouts/footer");
		}else{
			$idpac = $id_pac->id_pac;
			$idnota=$id_pac->id_nota;

			$id_notaprin=$this->NotaMedica_model->getNotaPrincipal($idpac);

			$id_notap=$id_notaprin->id_nota;


	    	$data  = array(
				'notas_medicas' => $this->NotaMedica_model->getNotaMedicaById($idpac),
				'notap' => $id_notap,
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/notamedica/list",$data);
			$this->load->view("layouts/footer");
		}
	}

	public function add(){
		$data  = array(
				'cat_diagnostico' => $this->NotaMedica_model->getDiagnostico(), 
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/notamedica/add",$data);
		$this->load->view("layouts/footer");
	}

	public function store(){
		
			$id_pac = $this->input->post("id_pac");

			$no_exp = $this->input->post("exp");

	        $id_med = $this->session->userdata("id_med");

	        if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo guardar la informacion no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/notamedica/add");
				$this->load->view("layouts/footer");
	        }else{

	        	$exp = array(
					'ex'=>$this->NotaMedica_model->getNotaNoexp($id_pac)
				);

	        	if(!empty($exp['ex'])){
					$this->session->set_flashdata("error","No se pudo guardar la informacion ya hay información registrada del paciente, favor de ir al apartado de Subsecuente!");
					redirect(base_url()."mantenimiento/notamedica/add");
				}else{
					$cns = $this->input->post("id_sig");

					$infopac = $this->NotaMedica_model->getSearchIdPac($id_pac);

					$finpoliza = $infopac->fin_poliza;

					$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

                    $fecha_actual = $fechaa->format("Y-m-d");

					if($finpoliza > $fecha_actual)
					{
						$fecha = $fecha_actual;

				        // inicia recuperar el id de la consulta de un insert
				        $id_consulta = array(
				        	'consulta'=>$this->NotaMedica_model->insertConsulta($id_pac,$id_med,$fecha),
				    	);

				    	$idconsulta = $id_consulta['consulta']->idconsulta;
				    	//fin de la recuperacion

				    	$antecedentes_heredados = $this->input->post("antecedentesheredados");

				    	$antecedentes_personales = $this->input->post("antecedentes");

				    	$antecedentes_no_personales = $this->input->post("antecedentesno");

				    	$antecedentes_padecimiento = $this->input->post("patologicos");

				    	$diagnostico = $this->input->post("cat_diagnostico");

						$etapa = $this->input->post("etapa");


				    	$laboratorios = $this->input->post("laboratorios");

				    	$evolucion =  $this->input->post("evolucion");

				    	$toxicidad = $this->input->post("toxicidad");

				    	$sintomas = $this->input->post("sintomas");

				    	$plan = $this->input->post("plan");

				    	$cobertura = $this->input->post("cobertura");

				    	$estado_enfermedad = $this->input->post("estado_enfermedad");

				    	$etapa_enfermedad = $this->input->post("etapa_enfermedad");

				    	$tiempo_libre_enfermedad = $this->input->post("tiempo_libre_enfermedad");

				    	if(empty($etapa_enfermedad)){
				    		$etapa_enfermedad = null;
				    	}

				    	if(empty($tiempo_libre_enfermedad)){
				    		$tiempo_libre_enfermedad = null;
				    	}

				    	$datapac = array(
				    		'diagnostico' => $diagnostico,
				    		'cobertura' => $cobertura,
				    		'estado_enfermedad' => $estado_enfermedad,
				    		'etapa_enfermedad' => $etapa_enfermedad,
				    		'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
				    	);

				    	$this->NotaMedica_model->updatepac($id_pac,$datapac);


				    	$hora_solicitud = $fechaa->format("H:i");

				    	$datasignos = array(
				    		'tipo_consulta' => "PRIMERA VEZ",
				    		'hora_salida' => $hora_solicitud,
				    		'id_med' => $id_med,
				    	);

				    	$this->NotaMedica_model->updateSignos($cns,$datasignos);

				    	//nuevos campos

				    	$observacion = $this->input->post("observacion");
				    	$analisis = $this->input->post("analisis");
				    	$pronostico = $this->input->post("pronostico");
				    	$histopatologia = $this->input->post("histopatologia");
				    	$exploracion = $this->input->post("exploracion");


						$id_nota = array(
				        	'nota'=>$this->NotaMedica_model->insertNota($id_pac,$cns,$id_med,$fecha,$idconsulta,nl2br($antecedentes_heredados),nl2br($antecedentes_no_personales),nl2br($antecedentes_personales),nl2br($antecedentes_padecimiento),nl2br($diagnostico),nl2br($etapa),nl2br($laboratorios),nl2br($evolucion),nl2br($toxicidad),nl2br($sintomas),nl2br($plan),$estado_enfermedad,$etapa_enfermedad,$tiempo_libre_enfermedad,$observacion,nl2br($analisis),nl2br($pronostico),nl2br($histopatologia),nl2br($exploracion)),
				    	);

				    	$idnota = $id_nota['nota']->id_nota;

				    	/*$id_receta = array(
				        	'receta'=>$this->NotaMedica_model->insertReceta($id_pac,$id_med,$fecha,$idnota),
				    	);

				    	$idreceta = $id_receta['receta']->idreceta;*/

				    	$tratamientos = $this->input->post("tratamientos");

				    	$estudios = $this->input->post("estudios");

				    	if(!empty($tratamientos)){
				    		foreach ($tratamientos as $tratamientos) {
					    		if (!empty($tratamientos)) {
						    		$datat=array(
										'id_nota' => $idnota,
										'id_notaactual' => $idnota,
										'descripcion' => ($tratamientos),
									);
									$this->NotaMedica_model->savehistorial($datat);
					    		}

				    		}
				    	}

				    	if(!empty($estudios)){
				    		foreach ($estudios as $estudios) {
				    			if (!empty($estudios)){
				    				$datae=array(
										'id_nota' => $idnota,
										'id_notaactual' => $idnota,
										'descripcion' => ($estudios),
									);
									$this->NotaMedica_model->savestudios($datae);
				    			}
					    		
				    		}
				    	}

				    	$idreceta = 0;

				    	$data = array(
				    		'medicamentos' => $this->NotaMedica_model->getRecetaMedicamentos($idreceta),
							'paciente' => $id_pac,
							'expediente' => $no_exp,
							'medico' => $id_med,
							'fecha'=> $fecha,
							'nota'=> $idnota,
	    					'notap'  => $idnota,
							'cat_medicamentos' => $this->NotaMedica_model->getMedicamentos(),
						);
						$this->load->view("layouts/header");
						$this->load->view("layouts/aside");
						$this->load->view("admin/notamedica/consentimiento",$data);
						$this->load->view("layouts/footer");
					}else{
						$this->session->set_flashdata("error","La vigencia de la poliza a terminado!");
						redirect(base_url()."mantenimiento/notamedica/add");
					}
				}  
		    }
	}

	public function onlystore(){
		
			$id_pac = $this->input->post("id_pac");

			$no_exp = $this->input->post("exp");

	        $id_med = $this->session->userdata("id_med");

	        if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo guardar la informacion no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/notamedica/add");
				$this->load->view("layouts/footer");
	        }else{

	        	$exp = array(
					'ex'=>$this->NotaMedica_model->getNotaNoexp($id_pac)
				);

	        	if(!empty($exp['ex'])){
					$this->session->set_flashdata("error","No se pudo guardar la informacion ya hay información registrada del paciente, favor de ir al apartado de Subsecuente!");
					redirect(base_url()."mantenimiento/notamedica/add");
				}else{
					$cns = $this->input->post("id_sig");

					$infopac = $this->NotaMedica_model->getSearchIdPac($id_pac);

					$finpoliza = $infopac->fin_poliza;

					$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

                    $fecha_actual = $fechaa->format("Y-m-d");

					if($finpoliza > $fecha_actual)
					{
						$fecha = $fecha_actual;

				        // inicia recuperar el id de la consulta de un insert
				        $id_consulta = array(
				        	'consulta'=>$this->NotaMedica_model->insertConsulta($id_pac,$id_med,$fecha),
				    	);

				    	$idconsulta = $id_consulta['consulta']->idconsulta;
				    	//fin de la recuperacion

				    	$antecedentes_personales = $this->input->post("antecedentes");

				    	$antecedentes_heredados = $this->input->post("antecedentesheredados");


				    	$antecedentes_no_personales = $this->input->post("antecedentesno");


				    	$antecedentes_padecimiento = $this->input->post("patologicos");

				    	$diagnostico = $this->input->post("cat_diagnostico");

						$etapa = $this->input->post("etapa");


				    	$laboratorios = $this->input->post("laboratorios");

				    	$evolucion =  $this->input->post("evolucion");

				    	$toxicidad = $this->input->post("toxicidad");

				    	$sintomas = $this->input->post("sintomas");

				    	$plan = $this->input->post("plan");

				    	$cobertura = $this->input->post("cobertura");

				   		$estado_enfermedad = $this->input->post("estado_enfermedad");

				    	$etapa_enfermedad = $this->input->post("etapa_enfermedad");

				    	$tiempo_libre_enfermedad = $this->input->post("tiempo_libre_enfermedad");

				    	if(empty($etapa_enfermedad)){
				    		$etapa_enfermedad = null;
				    	}

				    	if(empty($tiempo_libre_enfermedad)){
				    		$tiempo_libre_enfermedad = null;
				    	}

				    	$datapac = array(
				    		'diagnostico' => $diagnostico,
				    		'cobertura' => $cobertura,
				    		'estado_enfermedad' => $estado_enfermedad,
				    		'etapa_enfermedad' => $etapa_enfermedad,
				    		'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
				    	);

				    	$this->NotaMedica_model->updatepac($id_pac,$datapac);

				    	$hora_solicitud = $fechaa->format("H:i");

				    	$datasignos = array(
				    		'tipo_consulta' => "PRIMERA VEZ",
				    		'hora_salida' => $hora_solicitud,
				    		'id_med' => $id_med,
				    	);

				    	$this->NotaMedica_model->updateSignos($cns,$datasignos);


				    	//nuevos campos

				    	$observacion = $this->input->post("observacion");
				    	$analisis = $this->input->post("analisis");
				    	$pronostico = $this->input->post("pronostico");
				    	$histopatologia = $this->input->post("histopatologia");

				    	$exploracion = $this->input->post("exploracion");


						$id_nota = array(
				        	'nota'=>$this->NotaMedica_model->insertNota($id_pac,$cns,$id_med,$fecha,$idconsulta,nl2br($antecedentes_heredados),nl2br($antecedentes_no_personales),nl2br($antecedentes_personales),nl2br($antecedentes_padecimiento),nl2br($diagnostico),nl2br($etapa),nl2br($laboratorios),nl2br($evolucion),nl2br($toxicidad),nl2br($sintomas),nl2br($plan),$estado_enfermedad,$etapa_enfermedad,$tiempo_libre_enfermedad,$observacion,nl2br($analisis),nl2br($pronostico),nl2br($histopatologia),nl2br($exploracion)),
				    	);

				    	$idnota = $id_nota['nota']->id_nota;

				    	

				    	$tratamientos = $this->input->post("tratamientos");

				    	$estudios = $this->input->post("estudios");

				    	if(!empty($tratamientos)){
				    		foreach ($tratamientos as $tratamientos) {
					    		if (!empty($tratamientos)) {
						    		$datat=array(
										'id_nota' => $idnota,
										'id_notaactual' => $idnota,
										'descripcion' => ($tratamientos),
									);
									$this->NotaMedica_model->savehistorial($datat);
					    		}

				    		}
				    	}

				    	if(!empty($estudios)){
				    		foreach ($estudios as $estudios) {
				    			if (!empty($estudios)){
				    				$datae=array(
										'id_nota' => $idnota,
										'id_notaactual' => $idnota,
										'descripcion' => ($estudios),
									);
									$this->NotaMedica_model->savestudios($datae);
				    			}
					    		
				    		}
				    	}

				    	$data  = array(
								'cat_diagnostico' => $this->NotaMedica_model->getDiagnostico(), 
						);
						$this->session->set_flashdata("exito","Se guardo correctamente!");

						$this->load->view("layouts/header");
						$this->load->view("layouts/aside");
						$this->load->view("admin/notamedica/add",$data);
						$this->load->view("layouts/footer");
					}else{
						$this->session->set_flashdata("error","La vigencia de la poliza a terminado!");
						redirect(base_url()."mantenimiento/notamedica/add");
					}
				}  
		    }

	}

	public function storeandprint(){
		
			$id_pac = $this->input->post("id_pac");

			$no_exp = $this->input->post("exp");

	        $id_med = $this->session->userdata("id_med");

	        if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo guardar la informacion no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/notamedica/add");
				$this->load->view("layouts/footer");
	        }else{

	        	$exp = array(
					'ex'=>$this->NotaMedica_model->getNotaNoexp($id_pac)
				);

	        	if(!empty($exp['ex'])){
					$this->session->set_flashdata("error","No se pudo guardar la informacion ya hay información registrada del paciente, favor de ir al apartado de Subsecuente!");
					redirect(base_url()."mantenimiento/notamedica/add");
				}else{
					$cns = $this->input->post("id_sig");

					$infopac = $this->NotaMedica_model->getSearchIdPac($id_pac);

					$finpoliza = $infopac->fin_poliza;

					$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

                    $fecha_actual = $fechaa->format("Y-m-d");

					if($finpoliza > $fecha_actual)
					{
						$fecha = $fecha_actual;

				        // inicia recuperar el id de la consulta de un insert
				        $id_consulta = array(
				        	'consulta'=>$this->NotaMedica_model->insertConsulta($id_pac,$id_med,$fecha),
				    	);

				    	$idconsulta = $id_consulta['consulta']->idconsulta;
				    	//fin de la recuperacion

				    	$antecedentes_personales = $this->input->post("antecedentes");

				    	$antecedentes_heredados = $this->input->post("antecedentesheredados");


				    	$antecedentes_no_personales = $this->input->post("antecedentesno");


				    	$antecedentes_padecimiento = $this->input->post("patologicos");

				    	$diagnostico = $this->input->post("cat_diagnostico");

						$etapa = $this->input->post("etapa");


				    	$laboratorios = $this->input->post("laboratorios");

				    	$evolucion =  $this->input->post("evolucion");

				    	$toxicidad = $this->input->post("toxicidad");

				    	$sintomas = $this->input->post("sintomas");

				    	$plan = $this->input->post("plan");

				    	$cobertura = $this->input->post("cobertura");

				    	$estado_enfermedad = $this->input->post("estado_enfermedad");

				    	$etapa_enfermedad = $this->input->post("etapa_enfermedad");

				    	$tiempo_libre_enfermedad = $this->input->post("tiempo_libre_enfermedad");

				    	if(empty($etapa_enfermedad)){
				    		$etapa_enfermedad = null;
				    	}

				    	if(empty($tiempo_libre_enfermedad)){
				    		$tiempo_libre_enfermedad = null;
				    	}

				    	$datapac = array(
				    		'diagnostico' => $diagnostico,
				    		'cobertura' => $cobertura,
				    		'estado_enfermedad' => $estado_enfermedad,
				    		'etapa_enfermedad' => $etapa_enfermedad,
				    		'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
				    	);

				    	$this->NotaMedica_model->updatepac($id_pac,$datapac);

				    	$hora_solicitud = $fechaa->format("H:i");

				    	$datasignos = array(
				    		'tipo_consulta' => "PRIMERA VEZ",
				    		'hora_salida' => $hora_solicitud,
				    		'id_med' => $id_med,
				    	);

				    	$this->NotaMedica_model->updateSignos($cns,$datasignos);


				    	//nuevos campos

				    	$observacion = $this->input->post("observacion");
				    	$analisis = $this->input->post("analisis");
				    	$pronostico = $this->input->post("pronostico");
				    	$histopatologia = $this->input->post("histopatologia");


				    	$exploracion = $this->input->post("exploracion");


						$id_nota = array(
				        	'nota'=>$this->NotaMedica_model->insertNota($id_pac,$cns,$id_med,$fecha,$idconsulta,nl2br($antecedentes_heredados),nl2br($antecedentes_no_personales),nl2br($antecedentes_personales),nl2br($antecedentes_padecimiento),nl2br($diagnostico),nl2br($etapa),nl2br($laboratorios),nl2br($evolucion),nl2br($toxicidad),nl2br($sintomas),nl2br($plan),$estado_enfermedad,$etapa_enfermedad,$tiempo_libre_enfermedad,$observacion,nl2br($analisis),nl2br($pronostico),nl2br($histopatologia),nl2br($exploracion)),
				    	);

				    	$idnota = $id_nota['nota']->id_nota;

				    	/*$id_receta = array(
				        	'receta'=>$this->NotaMedica_model->insertReceta($id_pac,$id_med,$fecha,$idnota),
				    	);

				    	$idreceta = $id_receta['receta']->idreceta;*/

				    	$tratamientos = $this->input->post("tratamientos");

				    	$estudios = $this->input->post("estudios");

				    	if(!empty($tratamientos)){
				    		foreach ($tratamientos as $tratamientos) {
					    		if (!empty($tratamientos)) {
						    		$datat=array(
										'id_nota' => $idnota,
										'id_notaactual' => $idnota,
										'descripcion' => ($tratamientos),
									);
									$this->NotaMedica_model->savehistorial($datat);
					    		}

				    		}
				    	}

				    	if(!empty($estudios)){
				    		foreach ($estudios as $estudios) {
				    			if (!empty($estudios)){
				    				$datae=array(
										'id_nota' => $idnota,
										'id_notaactual' => $idnota,
										'descripcion' => ($estudios),
									);
									$this->NotaMedica_model->savestudios($datae);
				    			}
					    		
				    		}
				    	}

				    	$paciente=$this->NotaMedica_model->getNota($idnota);
		
						$id_med1 = $paciente->id_med;
						$id_pac1 = $paciente->id_pac;

						$data3=array(
							//'med'=>$this->NotaMedica_model->getRecetaMedicamentosextra($idreceta),
							'med'=>null,
							'historial'=>$this->NotaMedica_model->gethistorial($idnota,$idnota),
							'estudios'=>$this->NotaMedica_model->getstudios($idnota,$idnota),
							'medico'=>$this->NotaMedica_model->getMed($id_med1),
							//'rec'=>$idreceta,
							'rec'=>null,
							'pac'=>$this->NotaMedica_model->getPac($id_pac1,$cns),
							'nota'=>$this->NotaMedica_model->getNota($idnota),
							'medico2'=>$this->NotaMedica_model->getMedico2($id_med1),							
							//'medicamentos'=>$this->NotaMedica_model->getMedicamentos2($idnota, $idreceta),
							'medicamentos'=>null,
							'observacion' =>'',
						);
						$this->load->view("layouts/header");
						$this->load->view("layouts/aside");
						$this->load->view("admin/notamedica/crearPdf2",$data3);
						$this->load->view("layouts/footer");

				    	
					}else{
						$this->session->set_flashdata("error","La vigencia de la poliza a terminado!");
						redirect(base_url()."mantenimiento/notamedica/add");
					}
				}  
		    }

	}
	public function updateConsecuente(){
			//$id_nota = $this->input->post("id_nota");

			$id_pac = $this->input->post("id_pac");


	        $id_med = $this->session->userdata("id_med");

	        if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo guardar la informacion no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/notamedica/consecuente");
				$this->load->view("layouts/footer");
	        }else{

				$cns = $this->input->post("id_sig");

	        	$id_notaprin = $this->NotaMedica_model->getNotaPrincipal($id_pac);

				$id_notap=$id_notaprin->id_nota;

				$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

                $fecha_actual = $fechaa->format("Y-m-d");

				$fecha = $fecha_actual;

				$id_consulta = array(
					'consulta'=>$this->NotaMedica_model->insertConsulta($id_pac,$id_med,$fecha),
				);

				$idconsulta = $id_consulta['consulta']->idconsulta;

		    	$antecedentes_personales = $this->input->post("antecedentes");

				$antecedentes_no_personales = $this->input->post("antecedentesno");

				$antecedentes_heredados = $this->input->post("antecedentesheredados");

		    	$antecedentes_padecimiento = $this->input->post("patologicos");

		    	$diagnostico = $this->input->post("cat_diagnostico");
				
				$etapa = $this->input->post("etapa");


		    	$laboratorios = $this->input->post("laboratorios");

		    	$evolucion =  $this->input->post("evolucion");

		    	$toxicidad = $this->input->post("toxicidad");

		    	$sintomas = $this->input->post("sintomas");

		    	$plan = $this->input->post("plan");

		    	$cobertura = $this->input->post("cobertura");

				$estado_enfermedad = $this->input->post("estado_enfermedad");

				$etapa_enfermedad = $this->input->post("etapa_enfermedad");

				$tiempo_libre_enfermedad = $this->input->post("tiempo_libre_enfermedad");

				if(empty($etapa_enfermedad)){
				    $etapa_enfermedad = null;
				}

				if(empty($tiempo_libre_enfermedad)){
				    $tiempo_libre_enfermedad = null;
				}

				$datapac = array(
				    'diagnostico' => $diagnostico,
				    'cobertura' => $cobertura,
				    'estado_enfermedad' => $estado_enfermedad,
				    'etapa_enfermedad' => $etapa_enfermedad,
				    'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
				);

				$this->NotaMedica_model->updatepac($id_pac,$datapac);

				$hora_solicitud = $fechaa->format("H:i");

				$datasignos = array(
				    'tipo_consulta' => "SUBSECUENTE",
				    'hora_salida' => $hora_solicitud,
				    'id_med' => $id_med,
				);

				$this->NotaMedica_model->updateSignos($cns,$datasignos);

				    	//nuevos campos

				$observacion = $this->input->post("observacion");
				$analisis = $this->input->post("analisis");
				$pronostico = $this->input->post("pronostico");
				$histopatologia = $this->input->post("histopatologia");
				$exploracion = $this->input->post("exploracion");


				$id_nota = array(
				    'nota'=>$this->NotaMedica_model->insertNota($id_pac,$cns,$id_med,$fecha,$idconsulta,nl2br($antecedentes_heredados),nl2br($antecedentes_no_personales),nl2br($antecedentes_personales),nl2br($antecedentes_padecimiento),nl2br($diagnostico),nl2br($etapa),nl2br($laboratorios),nl2br($evolucion),nl2br($toxicidad),nl2br($sintomas),nl2br($plan),$estado_enfermedad,$etapa_enfermedad,$tiempo_libre_enfermedad,$observacion,nl2br($analisis),nl2br($pronostico),nl2br($histopatologia),nl2br($exploracion)),
				);

				$idnota = $id_nota['nota']->id_nota;

				$tratamientos = $this->input->post("tratamientos");

				$estudios = $this->input->post("estudios");

				if(!empty($tratamientos)){
					foreach ($tratamientos as $tratamientos) {
						if (!empty($tratamientos)) {
							$datat=array(
								'id_nota' => $id_notap,
								'id_notaactual' => $idnota,
								'descripcion' => ($tratamientos),
							);
							$this->NotaMedica_model->savehistorial($datat);
						}

					}
				}

				if(!empty($estudios)){
					foreach ($estudios as $estudios) {
					    if (!empty($estudios)){
					    	$datae=array(
								'id_nota' => $id_notap,
								'id_notaactual' => $idnota,
								'descripcion' => ($estudios),
							);
							$this->NotaMedica_model->savestudios($datae);
					    }
						    		
					}
				}

				$no_exp  = $this->NotaMedica_model->getSearchIdPac($id_pac);

				$data1  = array(
					'pac' => $this->NotaMedica_model->getPacienteId($id_pac), 
				);

				if(empty($data1['pac'])){
					$this->session->set_flashdata("error","Hoja de consentimiento necesaria!");
					$data = array(
						'paciente' => $id_pac,
						'expediente' => $no_exp->no_exp,
						'medico' => $id_med,
						'nota'=> $idnota,
						'notap'=> $id_notap
					);
					$this->load->view("layouts/header");
					$this->load->view("layouts/aside");
					$this->load->view("admin/notamedica/consentimiento",$data);
					$this->load->view("layouts/footer");
				}else{

					$idrecetap = $this->NotaMedica_model->getHistorialMedicamentos($id_pac);

					if(empty($idrecetap)){
						$data2 = array(
				    		'nota'  => $idnota,
				    		'notap'  => $id_notap,
				    		'medicamentosextra' => null,
	    					'alternativas' => null,
				    		'medicamentos' => null,
				    		'cat_medicamentos' => $this->NotaMedica_model->getMedicamentos(),
				    		'historial' => $this->NotaMedica_model->gethistorial($id_notap,$idnota),
							'estudios' => $this->NotaMedica_model->getstudios($id_notap,$idnota)
		    			);
					}else{
						$data2 = array(
				    		'nota'  => $idnota,
				    		'notap'  => $id_notap,
				    		'medicamentosextra' => $this->NotaMedica_model->getRecetaMedicamentosextra($idrecetap->idreceta),
	    					'alternativas' => $this->NotaMedica_model->getAlternativas($idrecetap->idreceta),
				    		'medicamentos' => $this->NotaMedica_model->getRecetaMedicamentos($idrecetap->idreceta),
				    		'cat_medicamentos' => $this->NotaMedica_model->getMedicamentos(),
				    		'historial' => $this->NotaMedica_model->gethistorial($id_notap,$idnota),
							'estudios' => $this->NotaMedica_model->getstudios($id_notap,$idnota)
		    			);
					}
					$this->load->view("layouts/header");
					$this->load->view("layouts/aside");
					$this->load->view("admin/notamedica/medicamento",$data2);
					$this->load->view("layouts/footer");
				}

			}
		
	}

	public function onlystoreconsecuente(){
			//$id_nota = $this->input->post("id_nota");

			$id_pac = $this->input->post("id_pac");


	        $id_med = $this->session->userdata("id_med");

	        if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo guardar la informacion no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/notamedica/consecuente");
				$this->load->view("layouts/footer");
	        }else{

				$cns = $this->input->post("id_sig");

	        	$id_notaprin = $this->NotaMedica_model->getNotaPrincipal($id_pac);

				$id_notap=$id_notaprin->id_nota;

				$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

                $fecha_actual = $fechaa->format("Y-m-d");

				$fecha = $fecha_actual;

				$id_consulta = array(
					'consulta'=>$this->NotaMedica_model->insertConsulta($id_pac,$id_med,$fecha),
				);

				$idconsulta = $id_consulta['consulta']->idconsulta;

				$antecedentes_heredados = $this->input->post("antecedentesheredados");

		    	$antecedentes_personales = $this->input->post("antecedentes");

				$antecedentes_no_personales = $this->input->post("antecedentesno");

		    	$antecedentes_padecimiento = $this->input->post("patologicos");

		    	$diagnostico = $this->input->post("cat_diagnostico");
				
				$etapa = $this->input->post("etapa");

		    	$laboratorios = $this->input->post("laboratorios");

		    	$evolucion =  $this->input->post("evolucion");

		    	$toxicidad = $this->input->post("toxicidad");

		    	$sintomas = $this->input->post("sintomas");

		    	$plan = $this->input->post("plan");

		    	$cobertura = $this->input->post("cobertura");

				$estado_enfermedad = $this->input->post("estado_enfermedad");

				$etapa_enfermedad = $this->input->post("etapa_enfermedad");

				$tiempo_libre_enfermedad = $this->input->post("tiempo_libre_enfermedad");

				if(empty($etapa_enfermedad)){
				    $etapa_enfermedad = NULL;
				}

				if(empty($tiempo_libre_enfermedad)){
				    $tiempo_libre_enfermedad = NULL;
				}

				$datapac = array(
				    'diagnostico' => $diagnostico,
				    'cobertura' => $cobertura,
				    'estado_enfermedad' => $estado_enfermedad,
				    'etapa_enfermedad' => $etapa_enfermedad,
				    'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
				);

				$this->NotaMedica_model->updatepac($id_pac,$datapac);

				$hora_solicitud = $fechaa->format("H:i");

				$datasignos = array(
				    'tipo_consulta' => "SUBSECUENTE",
				    'hora_salida' => $hora_solicitud,
				    'id_med' => $id_med,
				);

				$this->NotaMedica_model->updateSignos($cns,$datasignos);

				$observacion = $this->input->post("observacion");
				$analisis = $this->input->post("analisis");
				$pronostico = $this->input->post("pronostico");
				$histopatologia = $this->input->post("histopatologia");

				$exploracion = $this->input->post("exploracion");


				$id_nota = array(
				    'nota'=>$this->NotaMedica_model->insertNota($id_pac,$cns,$id_med,$fecha,$idconsulta,nl2br($antecedentes_heredados),nl2br($antecedentes_no_personales),nl2br($antecedentes_personales),nl2br($antecedentes_padecimiento),nl2br($diagnostico),nl2br($etapa),nl2br($laboratorios),nl2br($evolucion),nl2br($toxicidad),nl2br($sintomas),nl2br($plan),$estado_enfermedad,$etapa_enfermedad,$tiempo_libre_enfermedad,$observacion,nl2br($analisis),nl2br($pronostico),nl2br($histopatologia),nl2br($exploracion)),
				);
				$idnota = $id_nota['nota']->id_nota;

				$tratamientos = $this->input->post("tratamientos");

				$estudios = $this->input->post("estudios");

				if(!empty($tratamientos)){
					foreach ($tratamientos as $tratamientos) {
						if (!empty($tratamientos)) {
							$datat=array(
								'id_nota' => $id_notap,
								'id_notaactual' => $idnota,
								'descripcion' => ($tratamientos),
							);
							$this->NotaMedica_model->savehistorial($datat);
						}

					}
				}

				if(!empty($estudios)){
					foreach ($estudios as $estudios) {
					    if (!empty($estudios)){
					    	$datae=array(
								'id_nota' => $id_notap,
								'id_notaactual' => $idnota,
								'descripcion' => ($estudios),
							);
							$this->NotaMedica_model->savestudios($datae);
					    }
						    		
					}
				}

				$this->session->set_flashdata("exito","Se guardo correctamente!");
				$data  = array(
					'paciente' =>null,
					'nota' => null
				);
		        $this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/notamedica/consecuente",$data);
				$this->load->view("layouts/footer");
				
			}
		
	}

		public function storeandprintconsecuente(){

			$id_pac = $this->input->post("id_pac");


	        $id_med = $this->session->userdata("id_med");

	        if(empty($id_pac) || empty($id_med)){
	        	$this->session->set_flashdata("error","No se pudo guardar la informacion no se ingresaron datos del medico y/o paciente");
	        	$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/notamedica/consecuente");
				$this->load->view("layouts/footer");
	        }else{

				$cns = $this->input->post("id_sig");

	        	$id_notaprin = $this->NotaMedica_model->getNotaPrincipal($id_pac);

				$id_notap=$id_notaprin->id_nota;

				$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

                $fecha_actual = $fechaa->format("Y-m-d");

				$fecha = $fecha_actual;

				$id_consulta = array(
					'consulta'=>$this->NotaMedica_model->insertConsulta($id_pac,$id_med,$fecha),
				);

				$idconsulta = $id_consulta['consulta']->idconsulta;

		    	$antecedentes_personales = $this->input->post("antecedentes");

				$antecedentes_heredados = $this->input->post("antecedentesheredados");

				$antecedentes_no_personales = $this->input->post("antecedentesno");

		    	$antecedentes_padecimiento = $this->input->post("patologicos");

		    	$diagnostico = $this->input->post("cat_diagnostico");
				
				$etapa = $this->input->post("etapa");

		    	$laboratorios = $this->input->post("laboratorios");

		    	$evolucion =  $this->input->post("evolucion");

		    	$toxicidad = $this->input->post("toxicidad");

		    	$sintomas = $this->input->post("sintomas");

		    	$plan = $this->input->post("plan");

		    	$cobertura = $this->input->post("cobertura");

				$estado_enfermedad = $this->input->post("estado_enfermedad");

				$etapa_enfermedad = $this->input->post("etapa_enfermedad");

				$tiempo_libre_enfermedad = $this->input->post("tiempo_libre_enfermedad");

				if(empty($etapa_enfermedad)){
				    $etapa_enfermedad = null;
				}

				if(empty($tiempo_libre_enfermedad)){
				    $tiempo_libre_enfermedad = null;
				}

				$datapac = array(
				    'diagnostico' => $diagnostico,
				    'cobertura' => $cobertura,
				    'estado_enfermedad' => $estado_enfermedad,
				    'etapa_enfermedad' => $etapa_enfermedad,
				    'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
				);

				$this->NotaMedica_model->updatepac($id_pac,$datapac);

				$hora_solicitud = $fechaa->format("H:i");

				$datasignos = array(
				    'tipo_consulta' => "SUBSECUENTE",
				    'hora_salida' => $hora_solicitud,
				    'id_med' => $id_med,
				);

				$this->NotaMedica_model->updateSignos($cns,$datasignos);

				$observacion = $this->input->post("observacion");
				$analisis = $this->input->post("analisis");
				$pronostico = $this->input->post("pronostico");
				$histopatologia = $this->input->post("histopatologia");

				$exploracion = $this->input->post("exploracion");


				$id_nota = array(
				    'nota'=>$this->NotaMedica_model->insertNota($id_pac,$cns,$id_med,$fecha,$idconsulta,nl2br($antecedentes_heredados),nl2br($antecedentes_no_personales),nl2br($antecedentes_personales),nl2br($antecedentes_padecimiento),nl2br($diagnostico),nl2br($etapa),nl2br($laboratorios),nl2br($evolucion),nl2br($toxicidad),nl2br($sintomas),nl2br($plan),$estado_enfermedad,$etapa_enfermedad,$tiempo_libre_enfermedad,$observacion,nl2br($analisis),nl2br($pronostico),nl2br($histopatologia),nl2br($exploracion)),
				);

				$idnota = $id_nota['nota']->id_nota;

				$tratamientos = $this->input->post("tratamientos");

				$estudios = $this->input->post("estudios");

				if(!empty($tratamientos)){
					foreach ($tratamientos as $tratamientos) {
						if (!empty($tratamientos)) {
							$datat=array(
								'id_nota' => $id_notap,
								'id_notaactual' => $idnota,
								'descripcion' => ($tratamientos),
							);
							$this->NotaMedica_model->savehistorial($datat);
						}

					}
				}

				if(!empty($estudios)){
					foreach ($estudios as $estudios) {
					    if (!empty($estudios)){
					    	$datae=array(
								'id_nota' => $id_notap,
								'id_notaactual' => $idnota,
								'descripcion' => ($estudios),
							);
							$this->NotaMedica_model->savestudios($datae);
					    }
						    		
					}
				}

				    	$paciente=$this->NotaMedica_model->getNota($idnota);
		
						$id_med1 = $paciente->id_med;
						$id_pac1 = $paciente->id_pac;

						$data3=array(
							//'med'=>$this->NotaMedica_model->getRecetaMedicamentosextra($idreceta),
							'med'=>null,
							'historial'=>$this->NotaMedica_model->gethistorial($id_notap,$idnota),
							'estudios'=>$this->NotaMedica_model->getstudios($id_notap,$idnota),
							'medico'=>$this->NotaMedica_model->getMed($id_med1),
							//'rec'=>$idreceta,
							'rec'=>null,
							'pac'=>$this->NotaMedica_model->getPac($id_pac1,$cns),
							'nota'=>$this->NotaMedica_model->getNota($idnota),
							'medico2'=>$this->NotaMedica_model->getMedico2($id_med1),
							//'medicamentos'=>$this->NotaMedica_model->getMedicamentos2($idnota, $idreceta),
							'medicamentos'=>null,
							'observacion' =>'',
						);
						$this->load->view("layouts/header");
						$this->load->view("layouts/aside");
						$this->load->view("admin/notamedica/crearPdf2",$data3);
						$this->load->view("layouts/footer");
				
			}
		
	}

	public function medicamentos(){
			$id_nota = $this->input->post("id_nota");
			$id_notap=$this->input->post("idnotap");
			$id_pac = $this->input->post("id_pac");
			$no_exp = $this->input->post("no_exp");
			$id_med = $this->input->post("id_med");

			$data1  = array(
				'pac' => $this->NotaMedica_model->getPacienteId($id_pac), 
			);

			if(empty($data1['pac'])){
				$this->session->set_flashdata("error","Genere hoja de consentimiento!");
				$data = array(
					'paciente' => $id_pac,
					'expediente' => $no_exp,
					'medico' => $id_med,
					'nota'=> $id_nota,
					'notap'=> $id_notap
				);
				$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/notamedica/consentimiento",$data);
				$this->load->view("layouts/footer");
			}else{
				
				$idrecetap = $this->NotaMedica_model->getHistorialMedicamentos($id_pac);

				if(empty($idrecetap)){
					$data2 = array(
			    		'nota'  => $id_nota,
			    		'notap'  => $id_notap,
			    		'id_medico'=> $id_med,
			    		'id_pac'=> $id_pac,
			    		'medicamentos' => null,
	    				'alternativas' => null,
			    		'medicamentosextra' => null,
			    		'cat_medicamentos' => $this->NotaMedica_model->getMedicamentos(),
			    		'historial' => $this->NotaMedica_model->gethistorial($id_notap,$id_nota),
						'estudios' => $this->NotaMedica_model->getstudios($id_notap,$id_nota)
			    	);
				}else{
					$data2 = array(
			    		'nota'  => $id_nota,
			    		'notap'  => $id_notap,
			    		'id_medico'=> $id_med,
			    		'id_pac'=> $id_pac,
			    		'medicamentos' => $this->NotaMedica_model->getRecetaMedicamentos($idrecetap->idreceta),
	    				'alternativas' => $this->NotaMedica_model->getAlternativas($idrecetap->idreceta),
			    		'medicamentosextra' => $this->NotaMedica_model->getRecetaMedicamentosextra($idrecetap->idreceta),
			    		'cat_medicamentos' => $this->NotaMedica_model->getMedicamentos(),
			    		'historial' => $this->NotaMedica_model->gethistorial($id_notap,$id_nota),
						'estudios' => $this->NotaMedica_model->getstudios($id_notap,$id_nota)
			    	);
				}

				$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/notamedica/medicamento",$data2);
				$this->load->view("layouts/footer");
			}

	}



	public function storedetreceta(){

		$idnota= $this->input->post("idnota");

		$idnotap= $this->input->post("idnotap");

		$observacion = $this->input->post("observacion");
		
		$paciente=$this->NotaMedica_model->getNota($idnota);

		$sv=$this->NotaMedica_model->getCns($idnota);

		$id_med = $paciente->id_med;

		$id_pac = $paciente->id_pac;

		$cns = $sv->id_signosvitales;
		
		$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

        $fecha_actual = $fechaa->format("Y-m-d");

		$fecha = $fecha_actual;

		//updatereceta

		$inforec = $this->NotaMedica_model->getReceta($idnota);

		if(empty($inforec)){
			$id_receta = array(
				'receta'=>$this->NotaMedica_model->insertReceta($id_pac,$id_med,$fecha,$idnota,$observacion),
			);
			$idreceta = $id_receta['receta']->idreceta;
		}else{
			$idreceta = $inforec->idreceta;
			
			$datarec  = array(
				'id_pac' => $id_pac,
				'id_medico' => $id_med,
				'fecha' => $fecha,
				'id_notamedica' => $idnota,
				'observacion' => $observacion,
			);
        	$this->NotaMedica_model->updatereceta($idreceta,$datarec);
		}

		$id_medicamentom = $this->input->post("idm");

        $dosism=$this->input->post("dosism");

        $dilucionm=$this->input->post("dilucionm");

        $frecuenciam=$this->input->post("frecuenciam");

        $administracionm=$this->input->post("administracionm");

        $descripcionm=$this->input->post("descripcionm");

        $fecha_aplicacionm = $this->input->post("fecha_aplicacionm");

        if(!empty($this->NotaMedica_model->getMedicamentoAgregado($idreceta))){
        	$this->NotaMedica_model->deleteMed($idreceta);
        }

        for ($i=0; $i < sizeof($id_medicamentom); $i++) {
        		$data  = array(
					'idreceta' => $idreceta,
					'id_medicamento' => $id_medicamentom[$i],
					'dosis' => $dosism[$i],
					'frecuencia' => $frecuenciam[$i],
					'via_administracion' => $administracionm[$i],
					'dilucion' => $dilucionm[$i],
					'descripcion' => $descripcionm[$i],
					'fecha_aplicacion' => $fecha_aplicacionm[$i],
				
				);
        		$this->NotaMedica_model->savemedicamento($data);
        }

        $medicamentop = $this->input->post("nombrep");

        $dosisp=$this->input->post("dosisp");

        $dilucionp=$this->input->post("dilucionp");

        $frecuenciap=$this->input->post("frecuenciap");

        $administracionp=$this->input->post("administracionp");

        $descripcionp=$this->input->post("descripcionp");

        $fecha_aplicacionp = $this->input->post("fecha_aplicacionp");

        if(!empty($this->NotaMedica_model->getMedicamentoExtraAgregado($idreceta))){
        	$this->NotaMedica_model->deleteMedExtra($idreceta);
        }

        for ($i=0; $i < sizeof($medicamentop); $i++) {
	        	$data2  = array(
					'idreceta' => $idreceta,
					'medicamento' => $medicamentop[$i],
					'dosis' => $dosisp[$i],
					'frecuencia' => $frecuenciap[$i],
					'via_administracion' => $administracionp[$i],
					'dilucion' => $dilucionp[$i],
					'descripcion' => $descripcionp[$i],
					'fecha_aplicacion' => $fecha_aplicacionp[$i],
					
				);
	        	$this->NotaMedica_model->savepremedicacion($data2);
        	
			
        }

        $medicamentoa = $this->input->post("nombrea");

        $diluciona=$this->input->post("diluciona");

        $frecuenciaa=$this->input->post("frecuenciaa");

        $administraciona=$this->input->post("administraciona");

        $descripciona=$this->input->post("descripciona");

        $fecha_aplicaciona = $this->input->post("fecha_aplicaciona");

        if(!empty($this->NotaMedica_model->getMedicamentoAlternoAgregado($idreceta))){
        	$this->NotaMedica_model->deleteAlter($idreceta);
        }

        for ($i=0; $i < sizeof($medicamentoa); $i++) {
	        	$data2  = array(
					'idreceta' => $idreceta,
					'medicamento' => $medicamentoa[$i],
					'frecuencia' => $frecuenciaa[$i],
					'via_administracion' => $administraciona[$i],
					'dilucion' => $diluciona[$i],
					'descripcion' => $descripciona[$i],
					'fecha_aplicacion' => $fecha_aplicaciona[$i],
					
				);
	        	$this->NotaMedica_model->savealternativa($data2);
        }

		$data3=array(
			'med2'=>$this->NotaMedica_model->getAlternativa($idreceta),
			'med'=>$this->NotaMedica_model->getRecetaMedicamentosextra($idreceta),
			'historial'=>$this->NotaMedica_model->gethistorial($idnotap,$idnota),
			'estudios'=>$this->NotaMedica_model->getstudios($idnotap,$idnota),
			'medico'=>$this->NotaMedica_model->getMed($id_med),
			'rec'=>$idreceta,
			'pac'=>$this->NotaMedica_model->getPac($id_pac,$cns),
			'nota'=>$this->NotaMedica_model->getNota($idnota),
			'medico2'=>$this->NotaMedica_model->getMedico2($id_med),
			'medicamentos'=>$this->NotaMedica_model->getMedicamentos2($idnota, $idreceta),
			'observacion' => $this->NotaMedica_model->getObservacion($idreceta),
		);
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/notamedica/crearPdf2",$data3);
		$this->load->view("layouts/footer");
	}


	public function edit($id){
		$data  = array(
			'nota' => $this->NotaMedica_model->getNotaMedica($id)
		);

		$id_pac = $data['nota']->id_pac;

		$cns = $this->NotaMedica_model->getCnsMax($id_pac);

		$infopac = $this->NotaMedica_model->getSearchIdPac($id_pac);

		$finpoliza = $infopac->fin_poliza;

		$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

	    $fecha_actual = $fechaa->format("Y-m-d");

	    $receta = $this->NotaMedica_model->getReceta($data['nota']->id_nota);

	    $data2  = array(
	        'historial' => $this->NotaMedica_model->gethistorialedit($data['nota']->id_nota),
			'estudios' => $this->NotaMedica_model->getstudioedit($data['nota']->id_nota),
			'paciente' => $infopac,
			'cns' => $cns,
			'nota' => $data['nota'],
			'cat_diagnostico' => $this->NotaMedica_model->getDiagnostico(),
			'receta' => $receta,
		);

		if($fecha_actual < $finpoliza){
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/notamedica/edit",$data2);
			$this->load->view("layouts/footer");
		}else{
		    $this->session->set_flashdata("error","La vigencia de la poliza a terminado!");
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/notamedica/edit");
			$this->load->view("layouts/footer");
		}

	}

	public function consecuente1()
	{
		$data  = array(
			'paciente' =>null,
			'nota' => null
		);
        $this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/notamedica/consecuente",$data);
		$this->load->view("layouts/footer");
	}

	public function consecuente(){
		$id2 = $this->input->post("no_exp");

		$id_pac  = $this->NotaMedica_model->getIdPac($id2);

		if (!empty($id_pac)) {

			$id = $id_pac->id_pac;

			$id_notaprin = $this->NotaMedica_model->getNotaPrincipal($id);

			if(!empty($id_notaprin)){
				$id_notap=$id_notaprin->id_nota;
			}else{
				$id_notap=0;
			}
			
			$cns = $this->NotaMedica_model->getCnsMax($id);
			

			$finpoliza = $id_pac->fin_poliza;

			$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

	        $fecha_actual = $fechaa->format("Y-m-d");

	        $data  = array(
	        	'historial' => $this->NotaMedica_model->gethistorialsub($id_notap),
				'estudios' => $this->NotaMedica_model->getstudiosub($id_notap),
				'paciente' =>$id_pac,
				'cns' => $cns,
				'nota' => $this->NotaMedica_model->getConsecuente($id),
				'cat_diagnostico' => $this->NotaMedica_model->getDiagnostico(),
			);

			if(!empty($data['nota'])){
		        if($fecha_actual < $finpoliza){
		        	
						$this->load->view("layouts/header");
						$this->load->view("layouts/aside");
						$this->load->view("admin/notamedica/consecuente",$data);
						$this->load->view("layouts/footer");
		        }else{
		        		$this->session->set_flashdata("error","La vigencia de la poliza a terminado!");
						$this->load->view("layouts/header");
						$this->load->view("layouts/aside");
						$this->load->view("admin/notamedica/consecuente");
						$this->load->view("layouts/footer");
		        }
	        }else{
	        	$data1  = array(
					'paciente' =>null,
					'nota' => null
				);
	        	$this->session->set_flashdata("error","No hay notas anteriores favor de Generar nueva nota!");
				$this->load->view("layouts/header");
				$this->load->view("layouts/aside");
				$this->load->view("admin/notamedica/consecuente",$data1);
				$this->load->view("layouts/footer");
	        }
			
		}else{
			$data0  = array(
				'paciente' =>null,
				'nota' => null
			);
			$this->session->set_flashdata("error","No hay paciente registrado con ese expediente!");
	        $this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/notamedica/consecuente",$data0);
			$this->load->view("layouts/footer");
		}
 	
	}

	public function update(){

			$id_nota = $this->input->post("id_nota");

			$id_med = $this->session->userdata("id_med");

			$id_pac = $this->input->post("id_pac");

			$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

            $fecha_actual = $fechaa->format("Y-m-d");

			$fecha = $fecha_actual;

			$id_notaprin = $this->NotaMedica_model->getNotaPrincipal($id_pac);

			$id_notap=$id_notaprin->id_nota;

			$id_consulta = $this->input->post("id_consulta");

			$antecedentes_personales = $this->input->post("antecedentes");

			$antecedentes_heredados = $this->input->post("antecedentesheredados");

			$antecedentes_no_personales = $this->input->post("antecedentesno");

			$antecedentes_padecimiento = $this->input->post("patologicos");

			$diagnostico = $this->input->post("cat_diagnostico");

			$etapa = $this->input->post("etapa");

	    	$laboratorios = $this->input->post("laboratorios");

	    	$evolucion =  $this->input->post("evolucion");

	    	$toxicidad = $this->input->post("toxicidad");

	    	$sintomas = $this->input->post("sintomas");

	    	$plan = $this->input->post("plan");

	    	$cobertura = $this->input->post("cobertura");

		   	$estado_enfermedad = $this->input->post("estado_enfermedad");

			$etapa_enfermedad = $this->input->post("etapa_enfermedad");

			$tiempo_libre_enfermedad = $this->input->post("tiempo_libre_enfermedad");
			
			$observacion = $this->input->post("observacion");
				
			$analisis = $this->input->post("analisis");
				
			$pronostico = $this->input->post("pronostico");
				
			$histopatologia = $this->input->post("histopatologia");

			$exploracion = $this->input->post("exploracion");


			if(empty($etapa_enfermedad)){
				$etapa_enfermedad = null;
			}

			if(empty($tiempo_libre_enfermedad)){
				$tiempo_libre_enfermedad = null;
			}

			$datapac = array(
				'diagnostico' => $diagnostico,
				'cobertura' => $cobertura,
				'estado_enfermedad' => $estado_enfermedad,
				'etapa_enfermedad' => $etapa_enfermedad,
				'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
			);
			$this->NotaMedica_model->updatepac($id_pac,$datapac);


	    	$consulta = array(
	    		'id_med'=> $id_med,
				'fecha_hr' => $fecha,
			);

			$this->NotaMedica_model->updateConsulta($id_consulta,$consulta);

	    	$data = array(
	    		'id_med'=> $id_med,
				'fecha' => $fecha,
				'antecedentes_personales' => $antecedentes_personales,
				'antecedentes_padecimiento'=> $antecedentes_padecimiento,
				'diagnostico' => $diagnostico,
				'etapa' => $etapa,
				'laboratorios'=> $laboratorios,
				'evolucion'=> $evolucion,
				'toxicidad'=> $toxicidad,
				'sintomas'=> $sintomas,
				'plan'=> $plan,
				'antecedentes_no_personales' => $antecedentes_no_personales,
				'antecedentes_heredados' => $antecedentes_heredados,
				'estado_enfermedad' => $estado_enfermedad,
				'etapa_enfermedad' => $etapa_enfermedad,
				'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
				'observacion' => $observacion,
				'analisis' => $analisis,
				'pronostico' => $pronostico,
				'histopatologia' => $histopatologia,
				'exploracion' => $exploracion
			);

		if ($this->NotaMedica_model->update($id_nota,$data)) {

			$tratamientos = $this->input->post("tratamientos");

			$estudios = $this->input->post("estudios");

			$this->NotaMedica_model->deletehistorial($id_nota);

			if(!empty($tratamientos)){
				foreach ($tratamientos as $tratamientos) {
					if (!empty($tratamientos)) {
						$datat=array(
							'id_nota' => $id_notap,
							'id_notaactual' => $id_nota,
							'descripcion' => ($tratamientos),
						);
						$this->NotaMedica_model->savehistorial($datat);
					}
				}
			}

			$this->NotaMedica_model->deletestudios($id_nota);

			if(!empty($estudios)){
				foreach ($estudios as $estudios) {
					if (!empty($estudios)){
						$datae=array(
							'id_nota' => $id_notap,
							'id_notaactual' => $id_nota,
							'descripcion' => ($estudios),
						);
						$this->NotaMedica_model->savestudios($datae);
					}    		
				}
			}

			$this->session->set_flashdata("exito","ACTUALIZADO");
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/notamedica/list");
			$this->load->view("layouts/footer");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/paciente/notamedica/".$id_pac);
		}
	}

	public function updateandprint(){

			$id_nota = $this->input->post("id_nota");

			$id_med = $this->session->userdata("id_med");

			$id_pac = $this->input->post("id_pac");

			$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

            $fecha_actual = $fechaa->format("Y-m-d");

			$fecha = $fecha_actual;

			$id_notaprin = $this->NotaMedica_model->getNotaPrincipal($id_pac);

			$id_notap=$id_notaprin->id_nota;

			$id_consulta = $this->input->post("id_consulta");

			$antecedentes_personales = $this->input->post("antecedentes");

			$antecedentes_heredados = $this->input->post("antecedentesheredados");

			$antecedentes_no_personales = $this->input->post("antecedentesno");

			$antecedentes_padecimiento = $this->input->post("patologicos");

			$diagnostico = $this->input->post("cat_diagnostico");

			$etapa = $this->input->post("etapa");

	    	$laboratorios = $this->input->post("laboratorios");

	    	$evolucion =  $this->input->post("evolucion");

	    	$toxicidad = $this->input->post("toxicidad");

	    	$sintomas = $this->input->post("sintomas");

	    	$plan = $this->input->post("plan");

	    	$cobertura = $this->input->post("cobertura");

		   	$estado_enfermedad = $this->input->post("estado_enfermedad");

			$etapa_enfermedad = $this->input->post("etapa_enfermedad");

			$tiempo_libre_enfermedad = $this->input->post("tiempo_libre_enfermedad");

			$observacion = $this->input->post("observacion");
				
			$analisis = $this->input->post("analisis");
				
			$pronostico = $this->input->post("pronostico");
				
			$histopatologia = $this->input->post("histopatologia");

			$exploracion = $this->input->post("exploracion");


			if(empty($etapa_enfermedad)){
				$etapa_enfermedad = null;
			}

			if(empty($tiempo_libre_enfermedad)){
				$tiempo_libre_enfermedad = null;
			}

			$datapac = array(
				'diagnostico' => $diagnostico,
				'cobertura' => $cobertura,
				'estado_enfermedad' => $estado_enfermedad,
				'etapa_enfermedad' => $etapa_enfermedad,
				'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
			);
			$this->NotaMedica_model->updatepac($id_pac,$datapac);




	    	$consulta = array(
	    		'id_med'=> $id_med,
				'fecha_hr' => $fecha,
			);

			$this->NotaMedica_model->updateConsulta($id_consulta,$consulta);

	    	$data = array(
	    		'id_med'=> $id_med,
				'fecha' => $fecha,
				'antecedentes_personales' => $antecedentes_personales,
				'antecedentes_padecimiento'=> $antecedentes_padecimiento,
				'diagnostico' => $diagnostico,
				'etapa' => $etapa,
				'laboratorios'=> $laboratorios,
				'evolucion'=> $evolucion,
				'toxicidad'=> $toxicidad,
				'sintomas'=> $sintomas,
				'plan'=> $plan,
				'antecedentes_no_personales' => $antecedentes_no_personales,
				'antecedentes_heredados' => $antecedentes_heredados,
				'estado_enfermedad' => $estado_enfermedad,
				'etapa_enfermedad' => $etapa_enfermedad,
				'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
				'observacion' => $observacion,
				'analisis' => $analisis,
				'pronostico' => $pronostico,
				'histopatologia' => $histopatologia,
				'exploracion' => $exploracion
			);

		if ($this->NotaMedica_model->update($id_nota,$data)) {

			$tratamientos = $this->input->post("tratamientos");

			$estudios = $this->input->post("estudios");

			$this->NotaMedica_model->deletehistorial($id_nota);

			if(!empty($tratamientos)){
				foreach ($tratamientos as $tratamientos) {
					if (!empty($tratamientos)) {
						$datat=array(
							'id_nota' => $id_notap,
							'id_notaactual' => $id_nota,
							'descripcion' => ($tratamientos),
						);
						$this->NotaMedica_model->savehistorial($datat);
					}
				}
			}

			$this->NotaMedica_model->deletestudios($id_nota);

			if(!empty($estudios)){
				foreach ($estudios as $estudios) {
					if (!empty($estudios)){
						$datae=array(
							'id_nota' => $id_notap,
							'id_notaactual' => $id_nota,
							'descripcion' => ($estudios),
						);
						$this->NotaMedica_model->savestudios($datae);
					}    		
				}
			}
////////////////////////////////////////////////////////////////

			$rec = $this->NotaMedica_model->getReceta($id_nota);

			$cns = $this->NotaMedica_model->getCnsMax($id_pac);

			if(empty($rec)){
				$idreceta = 0;
			}else{
				$idreceta = $rec->idreceta;
			}

			$data3=array(
				'med2'=>$this->NotaMedica_model->getAlternativa($idreceta),
				'med'=>$this->NotaMedica_model->getRecetaMedicamentosextra($idreceta),
				'historial'=>$this->NotaMedica_model->gethistorial($id_notap,$id_nota),
				'estudios'=>$this->NotaMedica_model->getstudios($id_notap,$id_nota),
				'medico'=>$this->NotaMedica_model->getMed($id_med),
				'rec'=>$idreceta,
				'pac'=>$this->NotaMedica_model->getPac($id_pac,$cns->cns),
				'nota'=>$this->NotaMedica_model->getNota($id_nota),
				'medico2'=>$this->NotaMedica_model->getMedico2($id_med),
				'medicamentos'=>$this->NotaMedica_model->getMedicamentos2($id_nota, $idreceta),
				'observacion' => $this->NotaMedica_model->getObservacion($idreceta),
			);
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/notamedica/crearPdf2",$data3);
			$this->load->view("layouts/footer");
		}
		else{
			$this->session->set_flashdata("error","No se pudo actualizar la informacion");
			redirect(base_url()."mantenimiento/paciente/notamedica/".$id_pac);
		}
	}

	public function updateandrecet(){

			$id_nota = $this->input->post("id_nota");

			$id_med = $this->session->userdata("id_med");

			$id_pac = $this->input->post("id_pac");

			$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

            $fecha_actual = $fechaa->format("Y-m-d");

			$fecha = $fecha_actual;

			$id_notaprin = $this->NotaMedica_model->getNotaPrincipal($id_pac);

			$id_notap=$id_notaprin->id_nota;

			$id_consulta = $this->input->post("id_consulta");

			$antecedentes_personales = $this->input->post("antecedentes");

			$antecedentes_heredados = $this->input->post("antecedentesheredados");

			$antecedentes_no_personales = $this->input->post("antecedentesno");

			$antecedentes_padecimiento = $this->input->post("patologicos");

			$diagnostico = $this->input->post("cat_diagnostico");

			$etapa = $this->input->post("etapa");

	    	$laboratorios = $this->input->post("laboratorios");

	    	$evolucion =  $this->input->post("evolucion");

	    	$toxicidad = $this->input->post("toxicidad");

	    	$sintomas = $this->input->post("sintomas");

	    	$plan = $this->input->post("plan");

	    	$cobertura = $this->input->post("cobertura");

		   	$estado_enfermedad = $this->input->post("estado_enfermedad");

			$etapa_enfermedad = $this->input->post("etapa_enfermedad");

			$tiempo_libre_enfermedad = $this->input->post("tiempo_libre_enfermedad");

			$observacion = $this->input->post("observacion");
				
			$analisis = $this->input->post("analisis");
				
			$pronostico = $this->input->post("pronostico");
				
			$histopatologia = $this->input->post("histopatologia");

			$exploracion = $this->input->post("exploracion");


			if(empty($etapa_enfermedad)){
				$etapa_enfermedad = null;
			}

			if(empty($tiempo_libre_enfermedad)){
				$tiempo_libre_enfermedad = null;
			}

			$datapac = array(
				'diagnostico' => $diagnostico,
				'cobertura' => $cobertura,
				'estado_enfermedad' => $estado_enfermedad,
				'etapa_enfermedad' => $etapa_enfermedad,
				'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
			);
			$this->NotaMedica_model->updatepac($id_pac,$datapac);

	    	$consulta = array(
	    		'id_med'=> $id_med,
				'fecha_hr' => $fecha,
			);

			$this->NotaMedica_model->updateConsulta($id_consulta,$consulta);

	    	$data = array(
	    		'id_med'=> $id_med,
				'fecha' => $fecha,
				'antecedentes_personales' => $antecedentes_personales,
				'antecedentes_padecimiento'=> $antecedentes_padecimiento,
				'diagnostico' => $diagnostico,
				'etapa' => $etapa,
				'laboratorios'=> $laboratorios,
				'evolucion'=> $evolucion,
				'toxicidad'=> $toxicidad,
				'sintomas'=> $sintomas,
				'plan'=> $plan,
				'antecedentes_no_personales' => $antecedentes_no_personales,
				'antecedentes_heredados' => $antecedentes_heredados,
				'estado_enfermedad' => $estado_enfermedad,
				'etapa_enfermedad' => $etapa_enfermedad,
				'tiempo_libre_enfermedad' => $tiempo_libre_enfermedad,
				'observacion' => $observacion,
				'analisis' => $analisis,
				'pronostico' => $pronostico,
				'histopatologia' => $histopatologia,
				'exploracion' => $exploracion
			);

		if ($this->NotaMedica_model->update($id_nota,$data)) {

			$tratamientos = $this->input->post("tratamientos");

			$estudios = $this->input->post("estudios");

			$this->NotaMedica_model->deletehistorial($id_nota);

			if(!empty($tratamientos)){
				foreach ($tratamientos as $tratamientos) {
					if (!empty($tratamientos)) {
						$datat=array(
							'id_nota' => $id_notap,
							'id_notaactual' => $id_nota,
							'descripcion' => ($tratamientos),
						);
						$this->NotaMedica_model->savehistorial($datat);
					}
				}
			}

			$this->NotaMedica_model->deletestudios($id_nota);

			if(!empty($estudios)){
				foreach ($estudios as $estudios) {
					if (!empty($estudios)){
						$datae=array(
							'id_nota' => $id_notap,
							'id_notaactual' => $id_nota,
							'descripcion' => ($estudios),
						);
						$this->NotaMedica_model->savestudios($datae);
					}    		
				}
			}
////////////////////////////////////////////////////////////////

			$rec = $this->NotaMedica_model->getReceta($id_nota);

			$cns = $this->NotaMedica_model->getCnsMax($id_pac);



			if(empty($rec)){
				$idreceta = 0;
				$observacionrec = null;
			}else{
				$idreceta = $rec->idreceta;
				$observacionrec = $rec->observacion;
			}

			$data2 = array(
				'nota'  => $id_nota,
				'notap'  => $id_notap,
				'medicamentosextra' => $this->NotaMedica_model->getRecetaMedicamentosextra($idreceta),
	    		'alternativas' => $this->NotaMedica_model->getAlternativas($idreceta),
				'medicamentos' => $this->NotaMedica_model->getRecetaMedicamentos($idreceta),
				'cat_medicamentos' => $this->NotaMedica_model->getMedicamentos(),
				'historial' => $this->NotaMedica_model->gethistorial($id_notap,$id_nota),
				'estudios' => $this->NotaMedica_model->getstudios($id_notap,$id_nota),
				'observacion' => $observacionrec
		    );
					
			$this->load->view("layouts/header");
			$this->load->view("layouts/aside");
			$this->load->view("admin/notamedica/medicamento",$data2);
			$this->load->view("layouts/footer");	

		}	
		
	}



	public function search($id){
		$data  = array(
			'paciente' => $this->NotaMedica_model->getPaciente($id),
			'nota' => $this->NotaMedica_model->getIdPac3($id),  
		);
		echo json_encode( $data );
	}

	public function searchsig($id){
		$data  = array(
			'paciente' => $this->NotaMedica_model->getPacientesignos($id), 
		);
		echo json_encode( $data );
	}

	public function searchmed($id){
		$data  = array(
			'medico' => $this->NotaMedica_model->getMedico($id), 
		);
		echo json_encode( $data );
	}

    public function tiposangre(){
		$data  = array(
			'cat_tiposangre' => $this->Paciente_model->sangre(), 
		);
        return $data;
	}

	public function activar($id){
		$data  = array(
			'estado' => true, 
		);
		$this->Paciente_model->update($id,$data);
		echo "mantenimiento/paciente/inactivos";
	}

	public function pdfl($idnota,$idnotap,$idreceta){
		$paciente=$this->NotaMedica_model->getNota($idnota);
		
		$sv=$this->NotaMedica_model->getCns($idnota);
		$id_med = $paciente->id_med;
		$id_pac = $paciente->id_pac;
		$cns = $sv->id_signosvitales;

		if (!empty($idreceta)){
			$data3=array(
				'med2'=>$this->NotaMedica_model->getAlternativa($idreceta),
				'med'=>$this->NotaMedica_model->getRecetaMedicamentosextra($idreceta),
				'historial'=>$this->NotaMedica_model->gethistorial($idnotap,$idnota),
				'estudios'=>$this->NotaMedica_model->getstudios($idnotap,$idnota),
				'medico'=>$this->NotaMedica_model->getMed($id_med),
				'rec'=>$idreceta,
				'pac'=>$this->NotaMedica_model->getPac($id_pac,$cns),
				'nota'=>$this->NotaMedica_model->getNota($idnota),
				'medico2'=>$this->NotaMedica_model->getMedico2($id_med),
				'medicamentos'=>$this->NotaMedica_model->getMedicamentos2($idnota, $idreceta),
				'observacion' => $this->NotaMedica_model->getObservacion($idreceta),
			);
		}else{
			$data3=array(
				'med2'=>null,
				'med'=>null,
				'historial'=>$this->NotaMedica_model->gethistorial($idnotap,$idnota),
				'estudios'=>$this->NotaMedica_model->getstudios($idnotap,$idnota),
				'medico'=>$this->NotaMedica_model->getMed($id_med),
				'rec'=>null,
				'pac'=>$this->NotaMedica_model->getPac($id_pac,$cns),
				'nota'=>$this->NotaMedica_model->getNota($idnota),
				'medico2'=>$this->NotaMedica_model->getMedico2($id_med),
				'medicamentos'=>null,
				'observacion' =>'',
			);
		}
		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/notamedica/crearPdf2",$data3);
		$this->load->view("layouts/footer");
	}

	public function pdfconsentimiento(){
		$id_pac = $this->input->post("id_pac");

		$data3 = array(
			'consentimiento' => true,	
		);
		$this->NotaMedica_model->updatepac($id_pac,$data3);

		$id_med = $this->input->post("id_med");
		$procedimiento = $this->input->post("procedimiento");
		$diagnostico = $this->input->post("diagnostico");
		$intervencion = $this->input->post("intervencion");
		$beneficios = $this->input->post("beneficios");
		$medico = $this->input->post("medico");
		$testigo1 = $this->input->post("testigo1");
		$testigo2 = $this->input->post("testigo2");
		$tutor = $this->input->post("tutor");

		$medicoinfo = $this->NotaMedica_model->getSearchIdMed($id_med);

		$fechaa= new DateTime("now", new DateTimeZone('America/Monterrey'));

        $fecha_actual = $fechaa->format("d-m-Y");

        $infopac = $this->NotaMedica_model->getSearchIdPac($id_pac);

       

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
		$data2=array(
			'id_pac' => $id_pac,
			'infopac'=> $infopac,
			'fecha' => $fecha_actual,
			'edad' => $calc_edad,
			'procedimiento'=> $procedimiento,
			'diagnostico'=> $diagnostico,
			'intervencion'=> $intervencion,
			'beneficios'=> $beneficios,
			'medico'=> $medico,
			'medicoinfo'=> $medicoinfo,
			'testigo1'=> $testigo1,
			'testigo2'=> $testigo2,
			'tutor'=> $tutor
		);

		$this->load->view("layouts/header");
		$this->load->view("layouts/aside");
		$this->load->view("admin/notamedica/crearPdf",$data2);
		$this->load->view("layouts/footer");
	}

	public function searchdiagnostico($id){
		$data  = array(
			'diagnostico' => $this->NotaMedica_model->getDiagnosticobyid($id), 
		);
		echo json_encode( $data );
	}
/*
	public function generar_excel($id_cliente=null){
		$llamadas = $this->llamada_model->listarPorCliente($id_cliente);
		    if(count($llamadas) > 0){
		        //Cargamos la librería de excel.
		        $this->load->library('excel'); $this->excel->setActiveSheetIndex(0);
		        $this->excel->getActiveSheet()->setTitle('Llamadas');
		        //Contador de filas
		        $contador = 1;
		        //Le aplicamos ancho las columnas.
		        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
		        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
		        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(100);
		        //Le aplicamos negrita a los títulos de la cabecera.
		        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
		        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
		        //Definimos los títulos de la cabecera.
		        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'Número de teléfono');
		        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'Fecha');
		        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'Mensaje');
		        //Definimos la data del cuerpo.        
		        foreach($llamadas as $l){
		           //Incrementamos una fila más, para ir a la siguiente.
		           $contador++;
		           //Informacion de las filas de la consulta.
		           $this->excel->getActiveSheet()->setCellValue("A{$contador}", $l->telefono);
		           $this->excel->getActiveSheet()->setCellValue("B{$contador}", $l->fecha);
		           $this->excel->getActiveSheet()->setCellValue("C{$contador}", $l->mensaje);
		        }
		        //Le ponemos un nombre al archivo que se va a generar.
		        $archivo = "llamadas_cliente_{$id_cliente}.xls";
		        header('Content-Type: application/vnd.ms-excel');
		        header('Content-Disposition: attachment;filename="'.$archivo.'"');
		        header('Cache-Control: max-age=0');
		        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
		        //Hacemos una salida al navegador con el archivo Excel.
		        $objWriter->save('php://output');
		     }else{
		        echo 'No se han encontrado llamadas';
		        exit;        
		     }
	}
*/

}
