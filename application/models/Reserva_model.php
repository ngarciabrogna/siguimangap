<?php

class Reserva_model extends CI_Model
{


    
    public function getReservas()
    {
        $this->db->select('r.id,r.fecha start,r.cantidad_pasajeros pasajeros,e.nombre title,p.nombre paquete');
        $this->db->from('reservas r');
        $this->db->join('empresas e' ,'r.id_empresa=e.id');
        $this->db->join('paquetes p' ,'r.id_paquete=p.id');
        $this->db->where('r.estado','1');
        $this->db->where('r.cancelada','0');
        $resultados= $this->db->get();
        return $resultados->result();
    }
    public function getEmpresas()
    {
        $this->db->select('e.*');
        $this->db->from('empresas e');
        $this->db->where('e.estado','1');
        $resultados= $this->db->get();
        return $resultados->result();
    }

    public function getFechas()
    {
        $this->db->select('id,fecha');
        $this->db->from('reservas');
        $this->db->where('estado','1');
        $this->db->where('cancelada','0');
        $resultados= $this->db->get();
        return $resultados->result();
    }
   /////////////////////////////////////////////////
    public function idEmpresa($empresa)
    {
        $this->db->select('id');
        $this->db->from('empresas');
        $this->db->where("nombre",$empresa);
        $resultado= $this->db->get();
        return $resultado->row();
    }

    public function idPaquete($paquete)
    {
        $this->db->select('id');
        $this->db->from('paquetes');
        $this->db->where("nombre",$paquete);
        $resultado= $this->db->get();
        return $resultado->row();
    }
    ////////////////////////////////////////////////
    public function getPaquetes()
    {
        $this->db->select('p.*');
        $this->db->from('paquetes p');
        $this->db->where('p.estado','1');
        $resultados= $this->db->get();
        return $resultados->result();
    }
    public function save($data)
    { 
        return $this->db->insert("reservas",$data);
    }

    public function getReserva($id)

    { $this->db->from("reservas");
        $this->db->where("id",$id);
        $this->db->where("estado","1");
        $this->db->where("cancelada","0");
        $resultado = $this->db->get();
        
        return $resultado->row();
    }
    public function update($id,$data){
        $this->db->where("id",$id);
        return $this->db->update("reservas",$data);
    }
   
}
