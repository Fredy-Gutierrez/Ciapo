<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Formatos_model extends CI_Model {

		
	/*=================================
	obtiene el paciente de acuerdo al expediente
	===================================*/
	public function getPaciente($id){
		$query ="select paciente.id_pac, paciente.fecha_nac, paciente.sexo, paciente.no_poliza ,paciente.no_exp,paciente.nombrepx,paciente.ape_pat,paciente.ape_mat,paciente.no_exp, ct.desdiag from paciente, nota_medica nm, cat_diagnostico ct where  nm.id_pac=paciente.id_pac and nm.diagnostico=ct.id_diag and paciente.no_exp='{$id}'
			and nm.id_nota=(select max(id_nota)
							from nota_medica, paciente
							where nota_medica.id_pac=paciente.id_pac and paciente.no_exp='{$id}')";
		$resultado=$this->db->query($query);

		return $resultado->result();
	}

	public function getMedico($id){
		$query = "select * from medicos me, cat_empleados em where me.id_emp=em.id_emp and me.cedula='{$id}'";
		$resultado=$this->db->query($query);

		return $resultado->result();
	}

	public function getMedico2($id){
		$query = "select * from medicos me, cat_empleados em, cat_especialidades ce where me.id_emp=em.id_emp and me.id_especialidad=ce.idesp and me.id_med='{$id}'";
		$resultado=$this->db->query($query);

		return $resultado->row();
	}

	public function getPaciente2($id){
		$query = "select paciente.id_pac, paciente.fin_poliza, estados.nombre , paciente.fecha_nac, paciente.sexo, paciente.no_poliza ,paciente.no_exp,paciente.nombrepx,paciente.ape_pat,paciente.ape_mat,paciente.no_exp, ct.desdiag, nm.etapa from paciente, nota_medica nm, cat_diagnostico ct, estados where  nm.id_pac=paciente.id_pac and nm.diagnostico=ct.id_diag and paciente.id_estado=estados.id and paciente.no_exp='{$id}'
			and nm.id_nota=(select max(id_nota)
							from nota_medica, paciente
							where nota_medica.id_pac=paciente.id_pac and paciente.no_exp='{$id}')";
		$resultado=$this->db->query($query);

		return $resultado->row();
	}

}
