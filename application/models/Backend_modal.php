<?php

class Backend_modal extends CI_Model
{
    
    public function getID($link)
    {
        $this->db->like('referencia',$link);
        $resultado=$this->db->get('menu');
        return $resultado->row();

    }
    public function getPermisos($menu,$rol)
    {
        $this->db->where('id_menu',$menu);
        $this->db->where('id_rol',$rol);
        $resultado=$this->db->get('permisos');
        return $resultado->row();

    }

} 