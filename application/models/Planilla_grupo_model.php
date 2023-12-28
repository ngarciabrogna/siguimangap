<?php

class Planilla_grupo_model extends CI_Model
{



    public function getGrupos()
    {
        $this->db->select('g.*,c.nombre coordinador,c.imagen foto,e.nombre empresa,e.imagen fondo');
        $this->db->from('grupos g');
        $this->db->join('coordinadores c', 'g.id_coordinador=c.id');
        $this->db->join('empresas e', 'g.id_empresa=e.id');
        $this->db->where('g.estado', '1');
        $this->db->where('g.activo', 1);
        $this->db->where('e.activo', 1);
        $this->db->where('e.activo', 1);
        $resultados = $this->db->get();
        return $resultados->result();
    }
    public function getCoordinadores()
    {
        $this->db->select('c.*');
        $this->db->from('coordinadores c');
        $this->db->where('c.estado', '1');
        //$this->db->where('c.activo', 1); por ahora comentado hasta que hagamos el select dependiente de otro select
        $resultados = $this->db->get();
        return $resultados->result();
    }

    public function getEmpresas()
    {
        $this->db->select('e.*');
        $this->db->from('empresas e');
        $this->db->where('e.estado', '1');
        $this->db->where('e.activo', 1);
        $resultados = $this->db->get();
        return $resultados->result();
    }
    public function save($data)
    {
        return $this->db->insert("grupos", $data);
    }

    public function getGrupo($id)

    {
        $this->db->from("grupos");
        $this->db->where("id", $id);
        $this->db->where("estado", "1");
        $this->db->where('activo', 1);
        $resultado = $this->db->get();

        return $resultado->row();
    }
    public function update($id, $data)
    {
        $this->db->where("id", $id);
        return $this->db->update("grupos", $data);
    }

    public function liberarGrupo($id, $data)
    {
        
        $this->db->where("id", $id);
        $this->db->update("grupos", $data);
    }

    public function liberarCoordinador($id_coordinador, $data2)
    {
        $this->db->from('coordinadores');
        $this->db->where("id", $id_coordinador);
        $this->db->update("coordinadores", $data2);
    }




    //////////////////////////////////////////////////////////////////////////

    public function getGrupoIdEmpresaLiberar($id)

    {
        $this->db->select('id_empresa');
        $this->db->from("grupos");
        $this->db->where("id", $id);
        $this->db->where("estado", "1");
        $this->db->where('activo', 1);
        $resultado = $this->db->get();

        return $resultado->row();
    }


    public function getCoorG($id)

    {
        $this->db->select('id,id_coordinador');
        $this->db->from("grupos");
        $this->db->where("id", $id);
        $this->db->where("estado", 1);
        $this->db->where('activo', 1);
        $resultado = $this->db->get();

        return $resultado->result();
    }
    public function comentario($dataComent)

    {
        return $this->db->insert("comentarios", $dataComent);
    }
    //////////////////////////////////////////////////////////////////////////////////////////////
    public function getGrupoIdCoordinadorLiberar($id)

    {
        $this->db->select('id_coordinador');
        $this->db->from("grupos");
        $this->db->where("id", $id);
        $this->db->where("estado", "1");
        $this->db->where('activo', 1);
        $resultado = $this->db->get();

        return $resultado->row();
    }

    public function limpiarActividadesGrupo($id){

   
        $this->db->where("id_grupo", $id);
        $this->db->delete("detalle_actividad");

    }
    public function limpiarTiempoActividadesGrupo($id){

   
        $this->db->where("id_grupo", $id);
        $this->db->delete("tiempo_actividades");

    }
    
}
