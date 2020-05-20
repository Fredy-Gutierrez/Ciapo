<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class signosvita_model extends CI_Model {

	public function getsignosvitales(){
		$query="select *  from paciente,signosvitales where paciente.id_pac=signosvitales.id_pac";
		$resultado=$this->db->query($query);
		return $resultado->result();      
	}



	public function getpaciente($no_exp){
		$query="select id_pac,nombrepx,ape_pat,ape_mat,fin_poliza,derecho_habiencia  from paciente where  no_exp='{$no_exp}'";
		$resultado=$this->db->query($query);
		return $resultado->result();
	}

	public function getHistorial($fechai,$fechaf){
		$query="select signosvitales.fecha,signosvitales.turno,paciente.no_exp,paciente.nombrepx,paciente.ape_pat,paciente.ape_mat,
				paciente.fecha_nac,paciente.sexo,signosvitales.derecho_habiencia,signosvitales.tipo_consulta,cat_diagnostico.desdiag,
				cat_empleados.nombre nombre_medico,cat_empleados.ape_pat ape_pat_medico,cat_empleados.ape_mat ape_mat_medico,cat_especialidades.nombreesp,ce.nombre nombre_enfermera,
				ce.ape_pat ape_pat_enfermera,ce.ape_mat ape_mat_enfermera,signosvitales.pago_consulta,
				signosvitales.paciente_agendado,signosvitales.hora_cita,signosvitales.hora_solicitud,signosvitales.hora_salida,
				signosvitales.folio_curacion
				from paciente inner join signosvitales 
					on paciente.id_pac = signosvitales.id_pac
				inner join cat_diagnostico on paciente.diagnostico = cat_diagnostico.id_diag
				left join medicos on signosvitales.id_med = medicos.id_med
				left join cat_especialidades on medicos.id_especialidad = cat_especialidades.idesp
				left join cat_empleados on medicos.id_emp = cat_empleados.id_emp
				left join cat_empleados ce on signosvitales.id_emp = ce.id_emp
				where signosvitales.fecha >= '{$fechai}' and signosvitales.fecha <= '{$fechaf}'";
		$resultado=$this->db->query($query);
		return $resultado->result();
	}






	public function save($data){
		return $this->db->insert("signosvitales",$data);
	}
    
	public function getsignosvital($id_pac){
		$this->db->where("id_pac",$id_pac);
		$resultado = $this->db->get("signosvitales");
		return $resultado->row();

	}

	public function update($id,$data){
		$this->db->where("id_pac",$id);
		return $this->db->update("signosvitales",$data);
	}
}
