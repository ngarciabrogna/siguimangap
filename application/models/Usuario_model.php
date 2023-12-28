<?php

class Usuario_model extends CI_Model
{


    public function login($username, $password)
    {

        $this->db->where("username", $username);
        $this->db->where("password", $password);
        $this->db->where("estado","1");
        $resultados = $this->db->get("usuarios");

        if ($resultados->num_rows() > 0) {
            return $resultados->row();
        } else {
            return false;
        }
    }
    
    public function getUsuarios()
    {
        $this->db->select('u.*,e.nombre empleado,r.nombre rol');
        $this->db->from('usuarios u');
        $this->db->join('empleados e' ,'u.id_empleado=e.id');
        $this->db->join('roles r' ,'u.id_rol=r.id');
        $this->db->where("u.estado","1");
        $query = $this->db->get();
        return $query->result();
    }
    public function getRoles()
    {
        $query = $this->db->get("roles");
        return $query->result();
    }
    public function getEmpleados()
    {
        $this->db->where("estado","1");
        $query = $this->db->get("empleados");
        
        return $query->result();
    }

    public function getUsuario($idusuarios)

    { $this->db->from("usuarios");
        $this->db->where("id",$idusuarios);
        $this->db->where("estado","1");
        $resultado = $this->db->get();
        
        return $resultado->result();
    }
    
    public function save($data)
    {
       
        $query = $this->db->insert("usuarios",$data);
        
    }
    

    public function update($idUsuario,$data){
        $this->db->where("id",$idUsuario);
        $this->db->update("usuarios",$data);
      
    
    }
}
