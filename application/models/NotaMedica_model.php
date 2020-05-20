<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NotaMedica_model extends CI_Model {

public function getMed($id_med){
	$query="select * from medicos me, cat_empleados em where me.id_emp=em.id_emp and me.id_med='{$id_med}'";
	$resultado=$this->db->query($query);
	return $resultado->row();	
}

public function getCns($idnota){
	$query="select id_signosvitales from nota_medica nt where nt.id_nota='{$idnota}'";
	$resultado=$this->db->query($query);
	return $resultado->row();	
}

public function getPac($id_pac, $cns){
	$query="select cd.desdiag, paciente.id_pac,paciente.fecha_nac, paciente.nombrepx, paciente.ape_pat, paciente.ape_mat, paciente.no_exp, signosVitales.cns, signosVitales.peso, signosVitales.estatura, signosVitales.imc, signosVitales.temperatura, signosVitales.fc,
		signosVitales.fr, signosVitales.ta from paciente,signosvitales, nota_medica nt, cat_diagnostico cd where paciente.id_pac=signosvitales.id_pac and signosvitales.cns='{$cns}' and nt.diagnostico=cd.id_diag and paciente.id_pac='{$id_pac}'";
	$resultado=$this->db->query($query);
	return $resultado->row();	
}

public function getCnsMax($id_pac){
	$query="select * from signosvitales 
			where id_pac='{$id_pac}' 
			and cns=(select max(cns) 
						from signosvitales 
						where id_pac='{$id_pac}')";
	$resultado=$this->db->query($query);
	return $resultado->row();	
}

public function getNota($idnota)
{
	$query="select * from nota_medica where nota_medica.id_nota='{$idnota}'";
	$resultado=$this->db->query($query);
	return $resultado->row();

}

public function getMedicamentos2($idnota, $idreceta){
	$query="select m.nombregen, r.dosis,r.dilucion, r.frecuencia, r.via_administracion, r.fecha_aplicacion, r.validacion, r.descripcion from receta rec, det_receta r, cat_medicamentos m where rec.id_notamedica='{$idnota}' and rec.idreceta='{$idreceta}' and rec.idreceta=r.idreceta and m.idmed=r.id_medicamento";
	$resultado=$this->db->query($query);
	return $resultado->result();
}
	
	/*=================================
	obtiene todos los pacientes activos
	===================================*/
public function getNotasMedicas(){
	$query = "select nm.id_nota, pa.curp,pa.nombrepx,pa.ape_pat,pa.ape_mat,pa.estado ,nm.fecha,nm.evolucion from nota_medica nm,paciente pa where nm.id_pac=pa.id_pac and pa.estado=true";
	$resultado=$this->db->query($query);
	return $resultado->result();
}

	public function getNotaMedicaById($id){
			$query = "select a1.id_nota, receta.idreceta, a1.id_nota, a1.curp, a1.nombrepx, a1.ape_pat, a1.ape_mat, a1.estado, a1.fecha, a1.evolucion 
				from (select nm.id_nota, pa.curp,pa.nombrepx,pa.ape_pat,pa.ape_mat,pa.estado ,nm.fecha,nm.evolucion 
						from nota_medica nm,paciente pa
						where nm.id_pac=pa.id_pac and pa.estado=true
						and nm.id_pac='{$id}') as a1 left join receta 
				on receta.id_notamedica=a1.id_nota
				order by a1.id_nota desc";

		$resultado=$this->db->query($query);
		return $resultado->result();
	}

	public function getIdnota($id){
		$this->db->where("idreceta",$id);
		$resultados = $this->db->get("receta");
		
		if ($resultados->num_rows() > 0) {
			return $resultados->row();
		}
		else{
			return false;
		}
	}

	/*=================================
	tipo de sangre
	===================================*/
	public function getMedicamentos(){
		$this->db->where("estado",true);
		$resultados = $this->db->get("cat_medicamentos");
		return $resultados->result();
	}

	public function updatepac($id_pac,$data){
		$this->db->where("id_pac",$id_pac);
		return $this->db->update("paciente",$data);
	}
    
    /*=================================
	obtiene el paciente de acuerdo al id
	===================================*/
	public function getNotaMedica($id){
		$this->db->where("id_nota",$id);
		$resultado = $this->db->get("nota_medica");
		return $resultado->row();
	}

	public function getConsecuente($id){
		/*$this->db->where("id_pac",$id);
		$resultado = $this->db->get("nota_medica");*/
		$query = "select * from nota_medica where id_pac ='{$id}' and id_nota=(select max(id_nota)from nota_medica where id_pac ='{$id}')";
		$resultado=$this->db->query($query);
		return $resultado->row();
	}

	/*=================================
	obtiene el paciente de acuerdo al expediente
	===================================*/
	public function getPaciente($no_exp){
		$query = "select paciente.id_pac,paciente.no_exp,paciente.fin_poliza,paciente.nombrepx,paciente.ape_pat,paciente.ape_mat,signosvitales.cns,signosvitales.peso,signosvitales.estatura,signosvitales.imc,signosvitales.temperatura,signosvitales.fc  
				from paciente,signosvitales
				where signosvitales.id_pac = paciente.id_pac
				and signosvitales.cns=(select max(signosvitales.cns) 
									   from signosvitales,paciente 
									   where signosvitales.id_pac = paciente.id_pac
									  and paciente.no_exp='{$no_exp}')
				and paciente.no_exp='{$no_exp}'";
		$resultado=$this->db->query($query);

		return $resultado->result();
	}

	public function getPacientesignos($id){
		$query = "select paciente.id_pac,paciente.curp,paciente.nombrepx,paciente.ape_pat,paciente.ape_mat,paciente.no_exp from paciente where no_exp='{$id}'";
		$resultado=$this->db->query($query);

		return $resultado->result();
	}

	public function getIdPac($id){
		$this->db->where("no_exp",$id);
		$resultados = $this->db->get("paciente");
		return $resultados->row();
	}
		
	public function getIdPac2($id){
		$query = "select paciente.id_pac,nm.id_nota from paciente,nota_medica nm where nm.id_pac=paciente.id_pac and paciente.no_exp='{$id}'";
		$resultado=$this->db->query($query);
		return $resultado->row();
	}

	public function getIdPac3($id){
		$query = "select paciente.id_pac,nm.id_nota from paciente,nota_medica nm where nm.id_pac=paciente.id_pac and paciente.no_exp='{$id}'";
		$resultado=$this->db->query($query);
		return $resultado->result();
	}

	public function getSearchIdMed($id){
		$query = "select * from medicos me, cat_empleados em where me.id_emp=em.id_emp and me.id_med={$id}";
		$resultado=$this->db->query($query);
		return $resultado->row();
	}

	public function getSearchIdPac($id){
		$this->db->where("id_pac",$id);
		$resultados = $this->db->get("paciente");
		return $resultados->row();
	}
	/*=================================
	obtiene el medico de acuerdo a su cedula
	===================================*/
	public function getMedico($id){
		$query = "select * from medicos me, cat_empleados em where me.id_emp=em.id_emp and me.cedula='{$id}'";
		$resultado=$this->db->query($query);

		return $resultado->result();
	}

	public function getRecetaMedicamentos($idreceta){
		$query = "select dr.id_detreceta,dr.idreceta,dr.id_medicamento,med.nombregen, dr.dosis,dr.frecuencia,dr.via_administracion,dr.dilucion,dr.descripcion,dr.fecha_aplicacion from det_receta dr,cat_medicamentos med where dr.id_medicamento=med.idmed and dr.idreceta='{$idreceta}'";
		$resultado=$this->db->query($query);
		return $resultado->result();
	}

	public function getRecetaMedicamentosextra($idreceta){
		$query = "select * from medicamento_extra where idreceta='{$idreceta}'";
		$resultado=$this->db->query($query);
		return $resultado->result();
	}

	public function getAlternativas($idreceta){
		$query = "select * from alternativa_medicamentos where idreceta='{$idreceta}'";

		$resultado=$this->db->query($query);

		return $resultado->result();
	}

	public function getObservacion($idreceta){
		$query="select observacion from receta r where r.idreceta='{$idreceta}'";
		$resultado=$this->db->query($query);
		return $resultado->row();	
	}

	public function getAlternativa($idreceta){
		$query = "select * from alternativa_medicamentos where idreceta='{$idreceta}'";
		$resultado=$this->db->query($query);
		return $resultado->result();
	}

	public function insertConsulta($id_pac,$id_med,$date){
		$query = "insert into consulta(id_med,id_pac,fecha_hr) values('{$id_med}','{$id_pac}','{$date}') returning idconsulta";
		$resultado = $this->db->query($query);
		return $resultado->row();
	}


	public function insertNota($id_pac,$cns, $id_med, $fecha, $idconsulta,$antecedentes_heredados,$antecedentes_no_personales, $antecedentes_personales, $antecedentes_padecimiento,$diagnostico,$etapa, $laboratorios, $evolucion, $toxicidad, $sintomas, $plan, $estado_enfermedad,$etapa_enfermedad,$tiempo_libre_enfermedad,$observacion,$analisis,$pronostico,$histopatologia,$exploracion){

		if(empty($estado_enfermedad)){
			$query = "insert into nota_medica(id_med,id_pac,id_consulta,fecha,antecedentes_heredados,antecedentes_no_personales,antecedentes_personales,antecedentes_padecimiento,diagnostico,etapa,laboratorios,evolucion,toxicidad,sintomas,plan,id_signosvitales,estado_enfermedad,etapa_enfermedad,tiempo_libre_enfermedad,observacion,analisis,pronostico,histopatologia,exploracion) values('{$id_med}','{$id_pac}','{$idconsulta}','{$fecha}','{$antecedentes_heredados}','{$antecedentes_no_personales}','{$antecedentes_personales}','{$antecedentes_padecimiento}','{$diagnostico}','{$etapa}','{$laboratorios}','{$evolucion}','{$toxicidad}','{$sintomas}','{$plan}','{$cns}',null,null,null,'{$observacion}','{$analisis}','{$pronostico}','{$histopatologia}','{$exploracion}') returning id_nota";
		}else{
			if(empty($etapa_enfermedad)){
				$query = "insert into nota_medica(id_med,id_pac,id_consulta,fecha,antecedentes_heredados,antecedentes_no_personales,antecedentes_personales,antecedentes_padecimiento,diagnostico,etapa,laboratorios,evolucion,toxicidad,sintomas,plan,id_signosvitales,estado_enfermedad,etapa_enfermedad,tiempo_libre_enfermedad,observacion,analisis,pronostico,histopatologia,exploracion) values('{$id_med}','{$id_pac}','{$idconsulta}','{$fecha}','{$antecedentes_heredados}','{$antecedentes_no_personales}','{$antecedentes_personales}','{$antecedentes_padecimiento}','{$diagnostico}','{$etapa}','{$laboratorios}','{$evolucion}','{$toxicidad}','{$sintomas}','{$plan}','{$cns}','{$estado_enfermedad}',null,null,'{$observacion}','{$analisis}','{$pronostico}','{$histopatologia}','{$exploracion}') returning id_nota";
			}else{
				$query = "insert into nota_medica(id_med,id_pac,id_consulta,fecha,antecedentes_heredados,antecedentes_no_personales,antecedentes_personales,antecedentes_padecimiento,diagnostico,etapa,laboratorios,evolucion,toxicidad,sintomas,plan,id_signosvitales,estado_enfermedad,etapa_enfermedad,tiempo_libre_enfermedad,observacion,analisis,pronostico,histopatologia,exploracion) values('{$id_med}','{$id_pac}','{$idconsulta}','{$fecha}','{$antecedentes_heredados}','{$antecedentes_no_personales}','{$antecedentes_personales}','{$antecedentes_padecimiento}','{$diagnostico}','{$etapa}','{$laboratorios}','{$evolucion}','{$toxicidad}','{$sintomas}','{$plan}','{$cns}','{$estado_enfermedad}','{$etapa_enfermedad}','{$tiempo_libre_enfermedad}','{$observacion}','{$analisis}','{$pronostico}','{$histopatologia}','{$exploracion}') returning id_nota";
			}
		}
		
		

		$resultado = $this->db->query($query);
		return $resultado->row();
	}

	public function insertReceta($id_pac, $id_med, $fecha,$idnota,$observacion){
		$query = "insert into receta(id_medico,id_pac,fecha,id_notamedica,observacion) values('{$id_med}','{$id_pac}','{$fecha}','{$idnota}','{$observacion}') returning idreceta";
		$resultado = $this->db->query($query);
		return $resultado->row();
	}

	/*=================================
	Actualia lo datos del paciente de acuerdo al idS
	===================================*/
	public function update($id_nota,$data){
		$this->db->where("id_nota",$id_nota);
		return $this->db->update("nota_medica",$data);
	}

	public function updateConsulta($id,$data){
		$this->db->where("idconsulta",$id);
		return $this->db->update("consulta",$data);
	}

	public function updateSignos($id,$data){
		$this->db->where("cns",$id);
		return $this->db->update("signosvitales",$data);
	}

	public function medicamentos($idreceta,$idmedicamento){
		$query = "insert into det_receta(idreceta,id_medicamento) values('{$idreceta}','{$idmedicamento}')  returning id_detreceta";
		$resultado = $this->db->query($query);
		echo $resultado->id_detreceta;
		
	}

	public function savemedicamento($data){
		return $this->db->insert("det_receta",$data);
	}

	public function savepremedicacion($data){
		return $this->db->insert("medicamento_extra",$data);
	}
	public function savealternativa($data){
		return $this->db->insert("alternativa_medicamentos",$data);
	}

	public function getMedicamentoAgregado($idreceta){
		$this->db->where("idreceta",$idreceta);
		$resultado = $this->db->get("det_receta");
		return $resultado->row();
	}
	public function getMedicamentoExtraAgregado($idreceta){
		$this->db->where("idreceta",$idreceta);
		$resultado = $this->db->get("medicamento_extra");
		return $resultado->row();
	}
	public function getMedicamentoAlternoAgregado($idreceta){
		$this->db->where("idreceta",$idreceta);
		$resultado = $this->db->get("alternativa_medicamentos");
		return $resultado->row();
	}

	public function deleteMed($idreceta){
		$this->db->where("idreceta",$idreceta);
		$this->db->delete("det_receta");
	}
	public function deleteMedExtra($idreceta){
		$this->db->where("idreceta",$idreceta);
		$this->db->delete("medicamento_extra");
	}
	public function deleteAlter($idreceta){
		$this->db->where("idreceta",$idreceta);
		$this->db->delete("alternativa_medicamentos");
	}

	public function getNotaNoexp($id){
		$this->db->where("id_pac",$id);
		$resultados = $this->db->get("nota_medica");
		return $resultados->result();
	}


	public function deletestudios($id){
		$this->db->where("id_notaactual",$id);
		$this->db->delete("estudios_ext");
	}
	public function deletehistorial($id){
		$this->db->where("id_notaactual",$id);
		$this->db->delete("historial_tx");
	}

	public function savehistorial($data){
		return $this->db->insert("historial_tx",$data);
	}

	public function savestudios($data){
		return $this->db->insert("estudios_ext",$data);
	}

	public function getstudiosub($id){
		$this->db->where("id_nota",$id);
		$resultados = $this->db->get("estudios_ext");
		return $resultados->result();
	}

	public function gethistorialsub($id){
		$this->db->where("id_nota",$id);
		$resultados = $this->db->get("historial_tx");
		return $resultados->result();
	}


	public function getstudioedit($id){
		$this->db->where("id_notaactual",$id);
		$resultados = $this->db->get("estudios_ext");
		return $resultados->result();
	}

	public function gethistorialedit($id){
		$this->db->where("id_notaactual",$id);
		$resultados = $this->db->get("historial_tx");
		return $resultados->result();
	}



	public function getstudios($id,$id_act){
		$query = "select * from estudios_ext where id_nota = '{$id}' and id_notaactual <= '{$id_act}' order by id_estudio desc limit 5";
		$resultado=$this->db->query($query);
		return $resultado->result();
	}

	//select * from historial_tx where id_nota = 180 and id_notaactual <= 

	public function gethistorial($id,$id_act){
		$query = "select * from historial_tx where id_nota = '{$id}' and id_notaactual <= '{$id_act}' order by id_historial desc limit 5";
		
		$resultado=$this->db->query($query);

		return $resultado->result();
	}

	public function getDiagnostico(){
		$this->db;
		$this->db->order_by("desdiag", "asc");
		$resultados = $this->db->get("cat_diagnostico");
		return $resultados->result();
	}
	public function getDiagnosticobyid($id){
		$this->db->where("id_diag",$id);
		$resultados = $this->db->get("cat_diagnostico");
		return $resultados->result();
	}

	public function getPacienteId($id){
		$this->db->where("consentimiento",true);
		$this->db->where("id_pac",$id);
		$resultados = $this->db->get("paciente");
		return $resultados->row();
	}

	public function getNotaPrincipal($idpac){
		$query = "select * from nota_medica where id_pac={$idpac} and id_nota=(select min(id_nota) from nota_medica where id_pac={$idpac})";

		$resultado=$this->db->query($query);

		return $resultado->row();
	}

	public function getMedico2($id){
		$query = "select * from medicos me, cat_empleados em, cat_especialidades esp where me.id_emp=em.id_emp and me.id_especialidad=esp.idesp and me.id_med='{$id}'";
		$resultado=$this->db->query($query);

		return $resultado->row();
	}

	// -------------------------------- CONSULTAS PARA EL ÁREA DE MEDICAMENTOS-----------------------------------------------

	public function updatereceta($idreceta,$data){
		$this->db->where("idreceta",$idreceta);
		return $this->db->update("receta",$data);
	}

	public function getReceta($id){
		$this->db->where("id_notamedica",$id);
		$resultados = $this->db->get("receta");
		return $resultados->row();
	}

	public function getHistorialMedicamentos($idpac){
		$query = "select receta.idreceta 
					from nota_medica, receta
					where nota_medica.id_pac={$idpac} and nota_medica.id_nota=receta.id_notamedica 
						and receta.idreceta = (select max(receta.idreceta)
											   from nota_medica,receta
											  	where nota_medica.id_nota=receta.id_notamedica)";
		$resultado=$this->db->query($query);
		return $resultado->row();
	}
}
