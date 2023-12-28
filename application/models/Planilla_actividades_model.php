<?php

class Planilla_actividades_model extends CI_Model
{

    ///////////////////////////////////////////////////////esto se va a shir tode 
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
        return $this->db->insert("actividades", $data);
    }
    public function getActividad($id)
    {
        $this->db->where("id", $id);
        $this->db->where("estado", "1");
        $resultado = $this->db->get("actividades");
        return $resultado->row();
    }
    public function update($id, $data)
    {
        $this->db->where("id", $id);
        return $this->db->update("actividades", $data);
    }

    public function getGrupos()
    {
        $this->db->select('g.*');
        $this->db->from('grupos g');
        $this->db->where('g.estado', 1);
        $this->db->where('g.activo', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getCoordinadores()
    {
        $this->db->select('c.*');
        $this->db->from('coordinadores c');
        $this->db->where('c.estado', 1);
        $this->db->where('c.activo', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function getEmpleados()
    {
        $this->db->select('e.*');
        $this->db->from('empleados e');
        $this->db->where('e.estado', 1);
        $query = $this->db->get();
        return $query->result();
    }

    public function activarGrupo($data)
    {

        return $this->db->insert("detalle_actividad", $data);
    }


    ///traer actividades coordinadores y nose que mas para la tabla de activas.

    public function getActividadesCount()
    {
        //$this->db->select('CUNT(id) cantidad_actividades');
        $this->db->select('id id_actividad');
        $this->db->from('actividades');
        $this->db->where('activo', 1);

        $resultado = $this->db->get();
        return $resultado->result();
    }



    public function activarActividad()
    {

        /* $this->db->select('k.*,b.*,ca.*,cu.*,p.*,s.*,v.*,f.*, g.id_coordinador coordinador, g.id_empresa empresa, g.estado, g.activo, g.hora_salida salida, g.fecha fecha');
        $this->db->from('actividad_karting k, actividad_buggy b, actividad_cachi ca, actividad_cuadri cu, actividad_pile p, actividad_super s, actividad_volley v, actividad_futbol f');
        $this->db->join('grupos g', 'k.id_grupo=g.id');
        $this->db->where("g.estado", "1");
        $this->db->where('g.activo', 1);
        $query = $this->db->get();
        return $query->result(); */ // que feliz seria todo la wea caca weona qlo reqlo cosmico sacowea 


        $this->db->select('a.*, g.estado, g.activo, g.hora_salida hora, g.fecha fecha ,c.nombre coordinador,e.nombre empresa');
        $this->db->from('detalle_actividad a');
        
        $this->db->join('grupos g', 'a.id_grupo=g.id');
        $this->db->join('coordinadores c', 'a.id_coordinador=c.id');
        $this->db->join('empresas e', 'a.id_empresa=e.id');

        
        $this->db->where('g.activo', 1);
        $this->db->where('a.activo', 1);
        $query = $this->db->get();
        return $query->result();
    }



    public function cambiarEstadoActividad($data)
    {

        return $this->db->insert("situacion_actividad", $data);
    }

    public function actualizarEstadoActividad($data, $idActividad)
    {
        $this->db->where("id", $idActividad);
        return $this->db->update("detalle_actividad", $data);
    }

    public function setInicioActividad($data,$id_grupo,$id_tiempo_actividad )
    {

        $this->db->where("id_grupo", $id_grupo);
        $this->db->where("id_actividad", $id_tiempo_actividad );
        return $this->db->update('tiempo_actividades', $data);
    }

    public function setFinActividad($data, $id_grupo,$id_tiempo_actividad )
    {
        $this->db->where("id_grupo", $id_grupo);
        $this->db->where("id_actividad", $id_tiempo_actividad );
        return $this->db->update('tiempo_actividades', $data);
    }

  public function deleteTiempoActividad($data, $id_grupo,$id_tiempo_actividad )
  {
    $this->db->where('id_grupo', $id_grupo);
    $this->db->where("id_actividad", $id_tiempo_actividad );
    return $this->db->update('tiempo_actividades', $data);
    }
}
