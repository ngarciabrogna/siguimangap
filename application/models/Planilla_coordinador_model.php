<?php

class Planilla_coordinador_model extends CI_Model
{
    
    public function getCoordinadores()
    {
        $this->db->select('c.*,e.nombre empresa');
        $this->db->from('coordinadores c');
        $this->db->join('empresas e' ,'c.id_empresa=e.id');
        $this->db->where("c.estado","1");
        $this->db->where('c.activo', 1);
        $this->db->where("e.estado","1");
        $this->db->where('e.activo', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getEmpresas()
    { 
        $this->db->where("estado","1");
        $this->db->where('activo', 1);
        $query = $this->db->get("empresas");
        return $query->result();
    }
    public function save($data)
    { 
        return $this->db->insert("coordinadores",$data);
    }
    public function getCoordinador($id){
        $this->db->where("id", $id);
        $this->db->where("estado", "1");
        $this->db->where('activo', 1);
        $resultado = $this->db->get("coordinadores");
        return $resultado->row();
    }
    public function update($id,$data){
        $this->db->where("id",$id);
        return $this->db->update("coordinadores",$data);
    }
   
}
    