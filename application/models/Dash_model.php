<?php

class Dash_model extends CI_Model
{

      public function cargar_tarea($data)
      {

            return $this->db->insert("lista_tareas", $data);
      }
      public function get_tareas()
      { {
                  $this->db->select('t.*');
                  $this->db->from('lista_tareas t');

                  $this->db->order_by('fecha', 'asc');
                  $resultados = $this->db->get();
                  return $resultados->result();
            }
      }


      public function update_tarea($id, $data)
      {
            $this->db->where("id", $id);
            return $this->db->update("lista_tareas", $data);
      }
      public function borrarToDoList(){
            $this->db->truncate('lista_tareas');

      }


      public function getTiempoActividades(){
            $this->db->select('t.*,a.nombre actividad ,c.nombre coordinador,e.nombre empresa, g.hora_salida hora');
            $this->db->from('tiempo_actividades t');
            $this->db->join('actividades a', 't.id_actividad=a.id');
            $this->db->join('coordinadores c', 't.id_coordinador=c.id');
            $this->db->join('empresas e', 't.id_empresa=e.id');
            $this->db->join('grupos g' , 't.id_grupo=g.id');
            $this->db->order_by('id_grupo', 'desc');
            $resultados = $this->db->get();
            return $resultados->result();

      }

}
