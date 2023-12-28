<?php

class Coordinador_model extends CI_Model
{
    
    public function getCoordinadores()
    {
        $this->db->select('c.*,e.nombre empresa');
        $this->db->from('coordinadores c');
        $this->db->join('empresas e' ,'c.id_empresa=e.id');
        $this->db->where("c.estado","1");
        //$this->db->where('c.activo', 1); 
        $query = $this->db->get();
        return $query->result();
    }
    public function getComentarios($id)
    {
        $this->db->select('id,id_coordinador,descripcion,fecha');
        $this->db->from('comentarios');
        $this->db->where("id_coordinador",$id);
        $query = $this->db->get();
        return $query->result();
    }
    public function getComentariosEdit($idcomentario){
        $this->db->select('id,descripcion');
        $this->db->where("id", $idcomentario);
        $resultado = $this->db->get("comentarios");
        return $resultado->result();
    }

    public function getEmpresas()
    { 
        $this->db->where("estado","1");
        //$this->db->where('activo', 1);
        $query = $this->db->get("empresas");
        return $query->result();
    }
    public function save($datavalue)
    { 
        return $this->db->insert("coordinadores",$datavalue);
    }

    public function eliminar($id)
    {     $this->db->where("id", $id);
         $this->db->delete("comentarios");
     
    }
    public function llamar($id)
    {  $this->db->select('id_coordinador');
        $this->db->from('comentarios');
        $this->db->where("id",$id);
        $query = $this->db->get();
        return $query->row();
     
    }
    public function guardarComentario($data)
    { 
        return $this->db->insert("comentarios",$data);
    }
    public function getCoordinador($idcoordinador){
        $this->db->where("id", $idcoordinador);
        $this->db->where("estado", "1");
        //$this->db->where('activo', 1);
        $resultado = $this->db->get("coordinadores");
        return $resultado->result();
    }
    public function getCoordinador1($idcoordinador){
        $this->db->where("id", $idcoordinador);
        $this->db->where("estado", "1");
        //$this->db->where('activo', 1);
        $resultado = $this->db->get("coordinadores");
        return $resultado->row();
    }

    public function getCoordinadorEmpresa($id){
        $this->db->select('c.id');
        $this->db->where("id_empresa", $id);
        $this->db->where("estado", "1");
        $this->db->where('activo', 1);
        $resultado = $this->db->get("coordinadores c");
        return $resultado->row();
    }
    public function update($id,$data){
        $this->db->where("id",$id);
        return $this->db->update("coordinadores",$data);
    }

    public function updateComent($idcomentario,$data){
        $this->db->where("id",$idcomentario);
        return $this->db->update("comentarios",$data);
    }
   
   


    
}
    