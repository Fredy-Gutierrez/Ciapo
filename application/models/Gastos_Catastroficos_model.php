<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gastos_Catastroficos_model extends CI_Model {

	public function getgastos_catastroficos1($id){
		$query="select idreceta from det_receta where idReceta='{$id}' group by idreceta";
        $resultado= $this->db->query($query);
        return $resultado->row();
	}
    
    public function getgastos_catastroficos(){
		$this->db->where("estado","1");
		$resultados = $this->db->get("clientes");
		return $resultados->result();
	}
    
    public function get_idrecetas(){
        $query="select idreceta from det_receta group by idreceta order by idreceta asc";
        $resultado=$this->db->query($query);
        return $resultado->result();
    }

    public function getMedicinasExtras($id){
        $query="select  me.idReceta,  me.dilucion , me.descripcion, --MEDICAMENTOS
        me.dosis, me.frecuencia, me.via_administracion, me.medicamento, me.fecha_aplicacion
        from medicamento_extra as me
        where me.idreceta='{$id}'";
        $resultado= $this->db->query($query);
        return $resultado->result();
    }
    
    public function getMedicos($id){
        $query="select emp.nombre, emp.ape_pat, emp.ape_mat				--Nombre del Medico
                from cat_empleados as emp, (select med.id_emp
							from medicos as med, (select id_medico
												 from receta
												 where idReceta='{$id}') as r1
							where r1.id_medico=med.id_med) as r2
                where r2.id_emp= emp.id_emp";
        $resultado= $this->db->query($query);
        return $resultado->row();
    }
    
    public function getMedicos2($id){
        $query="select r2.cedula, e.nombreesp             --Nombre del Medico
                from cat_empleados as emp, cat_especialidades as e ,(select *
                            from medicos as med, (select id_medico
                                                 from receta
                                                 where idReceta='{$id}') as r1
                            where r1.id_medico=med.id_med ) as r2
                where r2.id_emp= emp.id_emp and r2.id_especialidad=e.idesp";
        $resultado= $this->db->query($query);
        return $resultado->row();
    }
    
    public function getgastos_catastroficos2($id){
        $query="select * from det_receta where idReceta='{$id}'";
        $resultado= $this->db->query($query);
        return $resultado->row();
    }

    public function getreceta2($id){
        $query="select * from receta where idReceta='{$id}'";
        $resultado= $this->db->query($query);
        return $resultado->row();
    }
    
    public function getPacientes($id){
        $query="select pac.nombrepx, pac.ape_pat, pac.ape_mat,  pac.no_exp			--Nombre del Paciente
                from paciente as pac, (select id_pac
                                       from receta
                                       where idreceta='{$id}') as r1
                where r1.id_pac=pac.id_pac";
        $resultado= $this->db->query($query);
        return $resultado->row();
    }
    
    public function getPacientes2($id){
        $query="select pac.nombrepx, pac.ape_pat, pac.ape_mat           --Nombre del Paciente
                from paciente as pac, (select id_pac
                                       from receta
                                       where idreceta='{$id}') as r1
                where r1.id_pac=pac.id_pac";
        $resultado= $this->db->query($query);
        return $resultado->row();
    }
    
    public function getMedicinas($id){
        $query="select cat_med.clave, cat_med.nombregen, detRec.idReceta, detRec.id_detreceta, detRec.id_medicamento, detRec.descripcion, --MEDICAMENTOS
        detRec.dosis, detRec.frecuencia, detRec.via_administracion, detRec.fecha_aplicacion, detRec.validacion, detRec.justif
        from det_receta as detRec, cat_medicamentos as cat_med
        where idreceta='{$id}' and detRec.id_medicamento=cat_med.idmed and cat_med.estado='true'";
        $resultado= $this->db->query($query);
        return $resultado->result();
    }
    public function getMedJust($id){
        $query="select count(justif) from det_receta where idreceta='{$id}' and validacion='false' group by idreceta";
        $resultado= $this->db->query($query);
        return $resultado->row();
    }

    public function getMedicinas_Alt($id){
        $query="select * from alternativa_medicamentos where idReceta='{$id}'";
        $resultado= $this->db->query($query);
        return $resultado->result();
    }
    
    public function getMedicinas_Alt2($id){
        $query="select * from alternativa_medicamentos where idReceta='{$id}'";
        $resultado= $this->db->query($query);
        return $resultado->result();
    }

    public function getMedAltJust($id){
        $query="select count(justif) from alternativa_medicamentos where idreceta='{$id}' and validacion='false' group by idreceta";
        $resultado= $this->db->query($query);
        return $resultado->row();
    }

    public function getMedicinas2($id){
        $query="select cat_med.clave, cat_med.nombregen, detRec.idReceta, detRec.dilucion, detRec.id_medicamento, detRec.descripcion, --MEDICAMENTOS
        detRec.dosis,detRec.frecuencia, detRec.via_administracion, detRec.fecha_aplicacion, detRec.validacion, detRec.justif
        from det_receta as detRec, cat_medicamentos as cat_med
        where idreceta='{$id}' and detRec.id_medicamento=cat_med.idmed";
        $resultado= $this->db->query($query);
        return $resultado->result();
    }
    
    public function getPac($id){
        $query="select nt.diagnostico, diag.desdiag, nt.fecha, nt.etapa, sv.peso, sv.estatura, sv.imc,p.fin_poliza, p.fecha_nac, p.no_exp
                from nota_medica as nt, signosvitales as sv, paciente as p, receta as r, cat_diagnostico as diag
                where r.idreceta='{$id}' and r.id_pac=p.id_pac and r.id_notamedica=nt.id_nota and p.id_pac=nt.id_pac and nt.id_signosvitales=sv.cns and nt.diagnostico=diag.id_diag";
        $resultado= $this->db->query($query);
        return $resultado->row();
    }
    
	public function update($idMedicina,$idRec,$idMedDet,$valid,$justif,$fecha_Act,$nom_usuario,$idMedAlt,$id_recetaAlt,$validAlt,$justifAlt){
        $tot=count($valid)+1;
        $cont=1;
        $pas=false;

        
        while($cont<$tot){

            $query="update det_receta
                set validacion={$valid[$cont]}, justif='{$justif[$cont]}'
                where idreceta='{$idRec[$cont]}' and id_medicamento='{$idMedicina[$cont]}' and id_detreceta='{$idMedDet[$cont]}'";
            pg_query ($query);

            $query2="update receta
            set verificado='true', fecha_valid ='{$fecha_Act}', usuario_valid='{$nom_usuario}'
            where idreceta='{$idRec[$cont]}' ";

            pg_query ($query2);


            $cont++;
            $pas=true;
        }

        
        $cont=1;
        $tot=count($idMedAlt)+1;

        while ($cont<$tot) {
            $query="update alternativa_medicamentos
                set validacion={$validAlt[$cont]}, justif='{$justifAlt[$cont]}'
                where idreceta='{$id_recetaAlt[$cont]}' and id_alternativa='{$idMedAlt[$cont]}'";
            pg_query($query);

            $cont++;
            
        }
        
        return $pas;
	}

    public function get_paciente_no_exp($no_exp){
        $query="select nombrepx, ape_pat, ape_mat, no_exp, fin_poliza from paciente where no_exp='{$no_exp}'";
        $resultado= $this->db->query($query);
        return $resultado->row();
    }

    public function get_tabla_receta($no_exp){
        $query="select r3.idreceta, r3.fecha, r3.usuario_valid, r3.verificado, cat_emp.nombre, cat_emp.ape_pat, cat_emp.ape_mat
                from cat_empleados as cat_emp, (select med.id_emp, r2.idreceta, r2.id_medico, r2.fecha, r2.usuario_valid, r2.verificado
                                                from medicos as med, (  select rec.idreceta, rec.id_medico, rec.fecha, rec.usuario_valid, rec.verificado
                                                                        from receta as rec, (select id_pac 
                                                                                             from paciente
                                                                                             where no_exp='{$no_exp}') as r1    --Se Obtiene la Id del PACIENTE
                                                                        where rec.id_pac=r1.id_pac) as r2   --Se obtiene los detalles de la RECETA, e ID del MEDICO
                                                where r2.id_medico=med.id_med) as r3    --Se mantienen los datos de la RECETA, se obtiene la ID de EMPLEADO DE MEDICO
                where r3.id_emp=cat_emp.id_emp
                order by r3.fecha desc,
                r3.idreceta desc";

        $resultado= $this->db->query($query);
        return $resultado->result();
    }
}