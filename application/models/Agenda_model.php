<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agenda_model extends CI_Model {

	public function getAgenda(){
		//$this->db->where("estado","true");
		$resultados = $this->db->get("agenda");
		return $resultados->result();
	}

	public function getCama($id){
		$this->db->where("tipo",$id);
		$resultados = $this->db->get("cat_cama_onco");
		return $resultados->result();
	}
	
	public function getCama2($id){
		$this->db->where("tipo",$id);
		$resultados = $this->db->get("cat_cama_onco");
		return $resultados->result();
	}
	/*======================================
	  =	GUARDA LA CITA EN LA BASE DE DATOS =	
	  ======================================*/
	public function save($data){
		return $this->db->insert("agenda",$data);
	}

	/*==================================
	  =	ACTUALIZA LOS DATOS DE LA CITA =	
	  ==================================*/
	public function update($id,$data){
		$this->db->where("id",$id);
		return $this->db->update("agenda",$data);
	}

	/*=======================================
	  =	ELIMINA LA CITA EN LA BASE DE DATOS =	
	  =======================================*/
	public function delete($id){
		$this->db->where("id",$id);
		$this->db->delete("agenda");
	}

	/*=========================================================
	  =	CONSULTA QUE VERIFICA SI EXISTE UN CAMA A CIERTA HORA =	
	  =========================================================*/
	public function getHora_Fecha($f,$c){
		$this->db->where("start",$f);
		$this->db->where("cama",$c);
		$resultados = $this->db->get("agenda");
		return $resultados->result();
	}

	/*===============================================
	  =	OBTIENE TODAS LAS CITAS DE LA BASE DE DATOS =	
	  ===============================================*/
	public function getcitas(){
		$query = 'SELECT * FROM agenda';
		$result = pg_query($query) or die('La consulta fallo: ' . pg_last_error());
		return $result;
	}

	/*=============================================================
	  =	SECCION DE CONSULTAS PARA EXTRACION DE DATOS DEL PACIENTE =	
	  =============================================================*/

	/* CONSULTA A UN PACIENTE CON RECETA SEGUN LA ID(EXPEDIENTE) */
	public function getPaciente($id){
		$query = "SELECT paciente.fecha_nac,det_receta.dosis,cat_diagnostico.desdiag,receta.idreceta,paciente.nombrepx,paciente.ape_pat as apep_pac,paciente.ape_mat as apem_pac,cat_medicamentos.nombregen,cat_empleados.nombre,cat_empleados.ape_pat,cat_empleados.ape_mat 
			from paciente,receta,det_receta,cat_medicamentos,medicos,cat_empleados,cat_diagnostico,nota_medica
			where no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=det_receta.idreceta
			and det_receta.id_medicamento=cat_medicamentos.idmed and receta.id_medico=medicos.id_med
			and receta.id_pac=nota_medica.id_pac and nota_medica.diagnostico=cat_diagnostico.id_diag
			and medicos.id_emp=cat_empleados.id_emp and receta.idreceta=(SELECT MAX (receta.idreceta)
			FROM paciente,receta,det_receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=det_receta.idreceta)";
		$resultado=$this->db->query($query);

		return $resultado->result();
	}

	/* CONSULTA LOS DATOS DEL PACIENTE */
	public function datosPacientes($id){
		$query = "SELECT paciente.fecha_nac,cat_diagnostico.desdiag,receta.idreceta,paciente.nombrepx,paciente.ape_pat as apep_pac,paciente.ape_mat as 
		apem_pac,cat_empleados.nombre,cat_empleados.ape_pat,cat_empleados.ape_mat,receta.observacion
		from paciente,receta,medicos,cat_empleados,cat_diagnostico,nota_medica
		where no_exp='{$id}' and paciente.id_pac=receta.id_pac
		and receta.id_medico=medicos.id_med
		and receta.id_pac=nota_medica.id_pac and nota_medica.diagnostico=cat_diagnostico.id_diag and receta.id_notamedica = nota_medica.id_nota
		and medicos.id_emp=cat_empleados.id_emp and receta.idreceta=
		(SELECT MAX (receta.idreceta)
		FROM paciente,receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac)";
		$resultado=$this->db->query($query);

		return $resultado->result();
		/*SELECT paciente.fecha_nac,cat_diagnostico.desdiag,receta.idreceta,paciente.nombrepx,paciente.ape_pat as apep_pac,paciente.ape_mat as 
		apem_pac,cat_empleados.nombre,cat_empleados.ape_pat,cat_empleados.ape_mat,receta.observacion
		from paciente,receta,det_receta,medicos,cat_empleados,cat_diagnostico,nota_medica
		where no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=det_receta.idreceta
		and receta.id_medico=medicos.id_med
		and receta.id_pac=nota_medica.id_pac and nota_medica.diagnostico=cat_diagnostico.id_diag and receta.id_notamedica = nota_medica.id_nota
		and medicos.id_emp=cat_empleados.id_emp and receta.idreceta=(SELECT MAX (receta.idreceta)
		FROM paciente,receta,det_receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=det_receta.idreceta)*/
	}

	/* CONSULTA LOS MEDICAMENTO VALIDADOS DEL PACIENTE */
	public function medicamentosPaciente($id){
		$query = "SELECT det_receta.dosis,cat_medicamentos.nombregen,receta.idreceta,det_receta.validacion
		from paciente,receta,det_receta,cat_medicamentos
		where no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=det_receta.idreceta
		and det_receta.id_medicamento=cat_medicamentos.idmed
		and det_receta.validacion=true
		and receta.idreceta=(SELECT MAX (receta.idreceta)FROM paciente,receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac)
		and receta.idreceta=(SELECT MAX (det_receta.idreceta)FROM paciente,receta,det_receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=det_receta.idreceta)";
		$resultado=$this->db->query($query);

		return $resultado->result();
	}

	/* CONSULTA LOS MEDICAMENTOS NO VALIDADOS DEL PACIENTE */
	public function medicamentosnovaliPaciente($id){
		$query = "SELECT det_receta.dosis,cat_medicamentos.nombregen,receta.idreceta,det_receta.validacion
		from paciente,receta,det_receta,cat_medicamentos
		where no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=det_receta.idreceta
		and det_receta.id_medicamento=cat_medicamentos.idmed
		and det_receta.validacion=false
		and receta.idreceta=(SELECT MAX (receta.idreceta)FROM paciente,receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac)
		and receta.idreceta=(SELECT MAX (det_receta.idreceta)FROM paciente,receta,det_receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=det_receta.idreceta)";
		$resultado=$this->db->query($query);

		return $resultado->result();
		/*SELECT det_receta.dosis,cat_medicamentos.nombregen,receta.idreceta,det_receta.validacion
		from paciente,receta,det_receta,cat_medicamentos
		where no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=det_receta.idreceta
		and det_receta.id_medicamento=cat_medicamentos.idmed
		and det_receta.validacion=false
		and receta.idreceta=(SELECT MAX (receta.idreceta)
		FROM paciente,receta,det_receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=det_receta.idreceta)*/
	}

	/* CONSULTA LOS PREMEDICACION (MEDICAMENTOS EXTRA)*/
	public function medicamentos_Pre($id){
		$query = "SELECT medicamento_extra.dosis,receta.idreceta,medicamento_extra.medicamento
		from paciente,receta,medicamento_extra
		where no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=medicamento_extra.idreceta
		and receta.idreceta = (SELECT MAX (receta.idreceta) FROM paciente,receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac)
		and receta.idreceta = (SELECT MAX (medicamento_extra.idreceta)
		FROM paciente,receta,medicamento_extra WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=medicamento_extra.idreceta)";
		$resultado=$this->db->query($query);

		return $resultado->result();
		/*SELECT medicamento_extra.dosis,receta.idreceta,medicamento_extra.medicamento
		from paciente,receta,medicamento_extra
		where no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=medicamento_extra.idreceta
		and receta.idreceta=(SELECT MAX (receta.idreceta)
		FROM paciente,receta,det_receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=det_receta.idreceta)*/
	}

	public function medicamentos_Alternativos($id){
		$query = "SELECT alternativa_medicamentos.medicamento,receta.idreceta,alternativa_medicamentos.validacion
		from paciente,receta,alternativa_medicamentos
		where no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=alternativa_medicamentos.idreceta
		and alternativa_medicamentos.validacion=true
		and receta.idreceta = (SELECT MAX (receta.idreceta)
		FROM paciente,receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac)
		and receta.idreceta=
		(SELECT MAX (alternativa_medicamentos.idreceta)
		FROM paciente,receta,alternativa_medicamentos WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=alternativa_medicamentos.idreceta)";
		$resultado=$this->db->query($query);

		return $resultado->result();
		/*SELECT alternativa_medicamentos.dosis,alternativa_medicamentos.medicamento,receta.idreceta,alternativa_medicamentos.validacion
		from paciente,receta,alternativa_medicamentos
		where no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=alternativa_medicamentos.idreceta
		and alternativa_medicamentos.validacion=true
		and receta.idreceta=(SELECT MAX (receta.idreceta)
		FROM paciente,receta,alternativa_medicamentos WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=alternativa_medicamentos.idreceta)*/
	}

	public function medicamentos_Alternativos_no($id){
		$query = "SELECT alternativa_medicamentos.medicamento,receta.idreceta,alternativa_medicamentos.validacion
		from paciente,receta,alternativa_medicamentos
		where no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=alternativa_medicamentos.idreceta
		and alternativa_medicamentos.validacion=false
		and receta.idreceta = (SELECT MAX (receta.idreceta)
		FROM paciente,receta WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac)
		and receta.idreceta=
		(SELECT MAX (alternativa_medicamentos.idreceta)
		FROM paciente,receta,alternativa_medicamentos WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=alternativa_medicamentos.idreceta)";
		$resultado=$this->db->query($query);

		return $resultado->result();
		/*SELECT alternativa_medicamentos.dosis,alternativa_medicamentos.medicamento,receta.idreceta,alternativa_medicamentos.validacion
		from paciente,receta,alternativa_medicamentos
		where no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=alternativa_medicamentos.idreceta
		and alternativa_medicamentos.validacion=false
		and receta.idreceta=(SELECT MAX (receta.idreceta)
		FROM paciente,receta,alternativa_medicamentos WHERE no_exp='{$id}' and paciente.id_pac=receta.id_pac and receta.idreceta=alternativa_medicamentos.idreceta)*/
	}
	/*====================================================================
	  =	FIN DE SECCION DE CONSULTAS PARA EXTRACION DE DATOS DEL PACIENTE =	
	  ====================================================================*/

	//------------------------------------------PARTE DE ANGEL---------------------------------------------------
	public function reporte_dia($fechadia){
		$query = "SELECT * from agenda where fecha='{$fechadia}'";
		$resultado=$this->db->query($query);

		return $resultado->result();
	}
	public function reporte_mes($mes){
		$query = "SELECT * from agenda where TO_CHAR(fecha,'YYYY-MM')='{$mes}'";
		$resultado=$this->db->query($query);

		return $resultado->result();
	}
}
