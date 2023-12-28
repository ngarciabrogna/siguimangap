<?php

class Grupo_model extends CI_Model
{



  public function getGrupos()
  {
    $this->db->select('g.*,c.nombre coordinador,e.nombre empresa');
    $this->db->from('grupos g');
    $this->db->join('coordinadores c', 'g.id_coordinador=c.id');
    $this->db->join('empresas e', 'g.id_empresa=e.id');
    $this->db->where('g.estado', '1');
    // $this->db->where('g.activo', 1);
    $resultados = $this->db->get();
    return $resultados->result();
  }
  public function getCoordinadores()
  {
    $this->db->select('c.*');
    $this->db->from('coordinadores c');
    $this->db->where('c.estado', '1');
    // $this->db->where('c.activo', 1);
    $resultados = $this->db->get();
    
    return $resultados->result();
  }

  public function getCoordinadoresDependiente($id_empresa)
  {
    $this->db->select('c.id, c.nombre');
    $this->db->from('coordinadores c');
    $this->db->where('c.estado', '1');
 
    $this->db->where('c.asignado', 0);///// mantener en cero
    $this->db->where('id_empresa', $id_empresa);
    $this->db->order_by("nombre", "ASC");
    
    $resultados = $this->db->get();
    if (isset($resultados)) {
      return $resultados->result();
    }else {
      return 0;
    }
   
  }
  public function getChoferes()
  {
    $this->db->select('COUNT(id) choferes');
    $this->db->from('grupos');
    $this->db->where('estado', 1);
     $this->db->where('activo', 1);
    $resultado = $this->db->get();
    return $resultado->result();
  }
  public function getActividadesCount()
  {
    //$this->db->select('CUNT(id) cantidad_actividades');
    $this->db->select('id id_actividad');
    $this->db->from('actividades');
    $this->db->where('estado', 1);

    $resultado = $this->db->get();
    return $resultado->result();
  }

  public function getCoordinadoressum()
  {
    $this->db->select('sum(cantidad_coordinadores) coordinadores');
    $this->db->from('grupos');
    $this->db->where('estado', 1);
    $this->db->where('activo', 1);
    $resultado = $this->db->get();
    return $resultado->result();
  }

  public function getEgresados_acompanantes()
  {
    $this->db->select('sum(cantidad_egresados+cantidad_acompanantes) eya');
    $this->db->from('grupos');
    $this->db->where('estado', 1);
     $this->db->where('activo', 1);
    $resultado = $this->db->get();
    return $resultado->result();
  }

  public function getEmpresas()
  {
    $this->db->select('e.*');
    $this->db->from('empresas e');
    $this->db->where('e.estado', '1');
    //   $this->db->where('e.activo', 1);
    $resultados = $this->db->get();
    return $resultados->result();
  }
  public function save($data)
  { 

    return $this->db->insert("grupos", $data);
  }

  public function save2($data2)
  {
    return $this->db->insert("detalle_actividad", $data2);
  }

  public function save3($data3)
  {

    return $this->db->insert('tiempo_actividades', $data3);
    
  }
  public function activarCoordinador($coordinador,$data){
    $this->db->where("id",$coordinador);
    return $this->db->update("coordinadores",$data);
}

  public function getGrupo($id)

  {
    $this->db->from("grupos");
    $this->db->where("id", $id);
    // $this->db->where("estado","1");
    $this->db->where('activo', 1);
    $resultado = $this->db->get();

    return $resultado->row();
  }
  public function update($id, $data)
  {
    $this->db->where("id", $id);
    return $this->db->update("grupos", $data);
  }


  public function get($id_empresa)
	{
		//$id_empresa = $_POST['id_empresa'];

    $this->db->select('c.id, c.nombre');
    $this->db->from("coordinadores c");
    $this->db->where("id", $id_empresa);

		$resultadoM = $this->db->get();
		return $resultadoM->result();

		$html = "<option value='0'>Seleccionar Coordinador</option>";

		while ($rowM = $resultadoM->fetch_assoc()) {
			$html .= "<option value='" . $rowM['id_coordinador'] . "'>" . $rowM['nombre'] . "</option>";
		}


		echo $html;
	}
}
