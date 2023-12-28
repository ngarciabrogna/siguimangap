<?php

class Empresa_model extends CI_Model
{

    public function getEmpresas()
    {
        $this->db->select('e.*');
        $this->db->where('e.estado', 1);
        //$this->db->where('e.activo', 1);
        $this->db->from('empresas e');
        $this->db->order_by('nombre ASC');
        $query = $this->db->get();
        return $query->result();
    }


    public function getEmpresasActivas() //borrar
    {
        $this->db->select('e.*');
        $this->db->where('e.estado', 1);
        $this->db->where('e.activo', 1);
        $this->db->from('empresas e');
        $this->db->order_by('nombre ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function save($data)
    {
        return $this->db->insert("empresas", $data);
    }
    public function getEmpresa($idempresa)
    {
        $this->db->where("id", $idempresa);
        $this->db->where('estado', 1);
        $resultado = $this->db->get("empresas");
        return $resultado->result();
    }


    public function update($idEmpresa, $data)
    {
        $this->db->where("id", $idEmpresa);
        return $this->db->update("empresas", $data);
    }


    public function activar($idEmpresa, $data)
    {
        $this->db->where('id', $idEmpresa);

        return $this->db->update("empresas", $data);
    }

    public function reset()
    {
        $this->db->set('activo', 0);
        return  $this->db->update('empresas');
    }

    public function resetGrupos()
    {
        $this->db->set('activo', 0);
        return  $this->db->update('grupos');
    }

    public function resetCoordinadores()
    {
        $this->db->set('activo', 0);
        $this->db->set('asignado', 0);
        return  $this->db->update('coordinadores');
    }

    public function resetActividades()
    {
        $this->db->set('activo', 0);
        return  $this->db->update('detalle_actividad');
    }


    public function liberarEmpresa($id)

    {

        $this->db->set('activo', 0);
        $this->db->where('id', $id);
        return  $this->db->update('empresas');
    }
}
