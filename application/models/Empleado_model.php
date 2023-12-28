<?php

class Empleado_model extends CI_Model
{
    
    public function getEmpleados()
    {
        $this->db->select('e.*');
        $this->db->from('empleados e');
        $this->db->where('e.estado','1');
        $resultados= $this->db->get();
        return $resultados->result();
    }
    public function save($data)
    { 
        return $this->db->insert("empleados",$data);
    }
    public function getEmpleado($idemp){
        $this->db->where("id", $idemp);
        $this->db->where("estado", "1");
        $resultado = $this->db->get("empleados");
        return $resultado->result();
    }
    
    public function update($id,$data){
        $this->db->where("id",$id);
        return $this->db->update("empleados",$data);
    }

    public function cambiarFoto($idEmpleado,$data) {
        $this->db->where("id",$idEmpleado);
        return $this->db->update("empleados",$data);

    }
   
}
    