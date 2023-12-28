<?php

class Permisos_model extends CI_Model
{

    
    public function getPermisos()
    {
        $this->db->select('p.*,r.nombre as rol,m.nombre as menu');
        $this->db->from('permisos p');
        $this->db->join('roles r' ,'p.id_rol=r.id');
        $this->db->join('menu m' ,'p.id_menu=m.id');
        $query = $this->db->get();
        return $query->result();
    }
    public function getRoles()
    {
        $this->db->select('*');
        $this->db->from('roles');
        $query = $this->db->get();
        return $query->result();
    }
    public function getMenus()
    {
        $this->db->select('*');
        $this->db->from('menu');
        $query = $this->db->get();
        return $query->result();
    }

    public function save($data)
    {

        $this->db->insert('permisos',$data);

    }
    public function saveRol($data)
    {

        $this->db->insert('roles',$data);

    }
    public function delete($id)
    {
        $this->db->where('id',$id);
        $this->db->delete('permisos');
       

    }
    public function getPermiso($idpermiso)

    { $this->db->from("permisos");
        $this->db->where("id",$idpermiso);
        $resultado = $this->db->get();
        
        return $resultado->result();
    }
    public function update($idPermiso,$data){
        $this->db->where("id",$idPermiso);
        $this->db->update("permisos",$data);
      
    
    }

}
