<?php
/*
class Actividades_model extends CI_Model
{
    
    public function getActividades()
    {
        $this->db->select('a.*');
        $this->db->from('actividades a');
        //$this->db->join('detalle_actividad da' ,'da.id_estado_actividad = da.id'); 
        $this->db->where('a.estado', 1);
        $query = $this->db->get();
        return $query->result();
    }
    public function save($data)
    { 
        return $this->db->insert("actividades",$data);
    }
    public function getActividad($idactividad){
        $this->db->where("id", $idactividad);
        $this->db->where("estado", "1");
        $resultado = $this->db->get("actividades");
        return $resultado->result();
    } 
    public function update($id,$data){
        $this->db->where("id",$id);
        return $this->db->update("actividades",$data);
    }
} */