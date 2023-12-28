<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    private $permisosA;
    public function __construct()

    {

        parent::__construct();
        $this->permisosA= $this->backend_lib->control();
        $this->load->model("planilla_actividades_model");
        $this->load->model("Empleado_model");

        if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
    }
    public function index()
    {
        $data = array(
            'actividades' => $this->planilla_actividades_model->getActividades(),
            'grupos' => $this->planilla_actividades_model->getGrupos(),
            'empleados' => $this->planilla_actividades_model->getEmpleados(),
            'coordinadores' => $this->planilla_actividades_model->getCoordinadores(),
            'actividades_activar' => $this->planilla_actividades_model->activarActividad(),
            'permisosA' => $this->permisosA,

        );
	

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
        $this->load->view('layouts/raside');
        $this->load->view('planilla_actividades/activas', $data);
        $this->load->view('layouts/footer');
    }
    public function cargar()
    {
        $this->load->view('layouts/head');
        $this->load->view('layouts/aside');
        $this->load->view('layouts/raside');
        $this->load->view('planilla_actividades/cargar');
        $this->load->view('layouts/footer');
    }
    public function guardar()
    {
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");

        $data = array(
            'nombre' => $nombre,
            'descripcion' => $descripcion,
            'estado' => 1
        );
        if ($this->Actividades_model->save($data)) {
            redirect(base_url() . "planilla_actividades");
        } else {
            $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            redirect(base_url() . "planilla_actividades/main/cargar");
        }
    }

    public function editar($id)
    {
        $data = array(

            'actividades' => $this->Actividades_model->getActividad($id),
        );
        $this->load->view('layouts/head');
        $this->load->view('layouts/aside');
        $this->load->view('layouts/raside');
        $this->load->view('planilla_actividades/editar', $data);
        $this->load->view('layouts/footer');
    }


    public function actualizar()
    {
        $idActividad = $this->input->post("idActividad");
        $nombre = $this->input->post("nombre");
        $descripcion = $this->input->post("descripcion");


        $data = array(

            'nombre' => $nombre,
            'descripcion' => $descripcion,
        );
        if ($this->Actividades_model->update($idActividad, $data)) {
            redirect(base_url() . "planilla_actividades");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "planilla_actividades/main/editar/" . $idActividad);
        }
    }
    public function eliminar($id)
    {
        $data = array(
            'estado' => "0",
        );
        $this->Actividades_model->update($id, $data);
        redirect(base_url() . "planilla_actividades");
    }



    public function activarGrupo()
    {
        $grupo = $this->input->post("grupo");
        $coordinador = $this->input->post("coordinador");
        $empleado = $this->input->post("empleado");

        $data = array(

            'id_grupo' => $grupo,
            'id_coordinador' => $coordinador,
            'id_empleado' => $empleado,
            'fecha' => date('d-m-y'),
            'estado' => 1
        );

        if ($this->planilla_actividades_model->activarGrupo($data)) {
            redirect(base_url() . "planilla_actividades");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "planilla_actividades");
        }
    }


    public function activarActividad2()
    {

        $this->planilla_actividades_model->activarActividad2();
    }



    public function cambiarEstadoActividadKarting()

    {
        $id_grupo = $this->input->post('id_grupo');
        $id = $this->input->post('id');
        $idActividad = $this->input->post("idActividad");
        $id_tiempo_actividad = 1;
        //cambio el estado de la actividad
        if ($id == 4) {

            $id = 1;
            $data = array(

                'inicio' => null,
                'fin' => null,
            );
            $this->planilla_actividades_model->deleteTiempoActividad($data, $id_grupo,$id_tiempo_actividad);
        } else {
            $id++;
        }

        //mido hora de incio y fin de actividad
        if ($id == 3) {
            $start = date('H:i:s');
            $data = array(

                'inicio' => $start,
            );

            $this->planilla_actividades_model->setInicioActividad($data, $id_grupo,$id_tiempo_actividad);
        } elseif ($id == 4) {

            $fin = date('H:i:s');
            $data = array(

                'fin' => $fin,
            );

            $this->planilla_actividades_model->setFinActividad($data, $id_grupo,$id_tiempo_actividad);
        }





        $data = array(
            'id_estado_karting' => $id,

        );


        if ($this->planilla_actividades_model->actualizarEstadoActividad($data, $idActividad)) {


            redirect(base_url() . "planilla_actividades");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "planilla_actividades");
        }
    }

    public function cambiarEstadoActividadCuadri()
    {
        $id_grupo = $this->input->post('id_grupo');
        $id = $this->input->post('id');
        $idActividad = $this->input->post("idActividad");
        $id_tiempo_actividad = 2;
        //cambio el estado de la actividad
        if ($id == 4) {

            $id = 1;
            $data = array(

                'inicio' => null,
                'fin' => null,
            );
           
            $this->planilla_actividades_model->deleteTiempoActividad($data, $id_grupo,$id_tiempo_actividad);
        } else {
            $id++;
        }

        //mido hora de incio y fin de actividad
        if ($id == 3) {
            $start = date('H:i:s');
            $data = array(

                'inicio' => $start,
            );

            $this->planilla_actividades_model->setInicioActividad($data, $id_grupo,$id_tiempo_actividad);
        } elseif ($id == 4) {

            $fin = date('H:i:s');
            $data = array(

                'fin' => $fin,
            );

            $this->planilla_actividades_model->setFinActividad($data, $id_grupo,$id_tiempo_actividad);
        }

        $data = array(
            'id_estado_cuadri' => $id,
        );

        if ($this->planilla_actividades_model->actualizarEstadoActividad($data, $idActividad)) {
            redirect(base_url() . "planilla_actividades");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "planilla_actividades");
        }
    }

    public function cambiarEstadoActividadSuper()
    {
        $id_grupo = $this->input->post('id_grupo');
        $id = $this->input->post('id');
        $idActividad = $this->input->post("idActividad");
        $id_tiempo_actividad = 3;
        //cambio el estado de la actividad
        if ($id == 4) {

            $id = 1;
            $data = array(

                'inicio' => null,
                'fin' => null,
            );
            $this->planilla_actividades_model->deleteTiempoActividad($data, $id_grupo,$id_tiempo_actividad);
        } else {
            $id++;
        }

        //mido hora de incio y fin de actividad
        if ($id == 3) {
            $start = date('H:i:s');
            $data = array(

                'inicio' => $start,
            );

            $this->planilla_actividades_model->setInicioActividad($data, $id_grupo,$id_tiempo_actividad);
        } elseif ($id == 4) {

            $fin = date('H:i:s');
            $data = array(

                'fin' => $fin,
            );

            $this->planilla_actividades_model->setFinActividad($data, $id_grupo,$id_tiempo_actividad);
        }

        $data = array(
            'id_estado_super' => $id,
        );

        if ($this->planilla_actividades_model->actualizarEstadoActividad($data, $idActividad)) {
            redirect(base_url() . "planilla_actividades");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "planilla_actividades");
        }
    }

    public function cambiarEstadoActividadCachi()
    {
        $id_grupo = $this->input->post('id_grupo');
        $id = $this->input->post('id');
        $idActividad = $this->input->post("idActividad");
        $id_tiempo_actividad = 4;
        //cambio el estado de la actividad
        if ($id == 4) {

            $id = 1;
            $data = array(

                'inicio' => null,
                'fin' => null,
            );
            $this->planilla_actividades_model->deleteTiempoActividad($data, $id_grupo,$id_tiempo_actividad);
        } else {
            $id++;
        }

        //mido hora de incio y fin de actividad
        if ($id == 3) {
            $start = date('H:i:s');
            $data = array(

                'inicio' => $start,
            );

            $this->planilla_actividades_model->setInicioActividad($data, $id_grupo,$id_tiempo_actividad);
        } elseif ($id == 4) {

            $fin = date('H:i:s');
            $data = array(

                'fin' => $fin,
            );

            $this->planilla_actividades_model->setFinActividad($data, $id_grupo,$id_tiempo_actividad);
        }

        $data = array(
            'id_estado_cachi' => $id,
        );

        if ($this->planilla_actividades_model->actualizarEstadoActividad($data, $idActividad)) {
            redirect(base_url() . "planilla_actividades");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "planilla_actividades");
        }
    }

    public function cambiarEstadoActividadBuggy()
    {
        $id_grupo = $this->input->post('id_grupo');
        $id = $this->input->post('id');
        $idActividad = $this->input->post("idActividad");
        $id_tiempo_actividad = 5;
        //cambio el estado de la actividad
        if ($id == 4) {

            $id = 1;
            $data = array(

                'inicio' => null,
                'fin' => null,
            );
            $this->planilla_actividades_model->deleteTiempoActividad($data, $id_grupo,$id_tiempo_actividad);
        } else {
            $id++;
        }

        //mido hora de incio y fin de actividad
        if ($id == 3) {
            $start = date('H:i:s');
            $data = array(

                'inicio' => $start,
            );

            $this->planilla_actividades_model->setInicioActividad($data, $id_grupo,$id_tiempo_actividad);
        } elseif ($id == 4) {

            $fin = date('H:i:s');
            $data = array(

                'fin' => $fin,
            );

            $this->planilla_actividades_model->setFinActividad($data, $id_grupo,$id_tiempo_actividad);
        }

        $data = array(
            'id_estado_buggy' => $id,
        );

        if ($this->planilla_actividades_model->actualizarEstadoActividad($data, $idActividad)) {
            redirect(base_url() . "planilla_actividades");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "planilla_actividades");
        }
    }

    public function cambiarEstadoActividadPile()
    {
        $id_grupo = $this->input->post('id_grupo');
        $id = $this->input->post('id');
        $idActividad = $this->input->post("idActividad");
        $id_tiempo_actividad = 6;
        //cambio el estado de la actividad
        if ($id == 4) {

            $id = 1;
            $data = array(

                'inicio' => null,
                'fin' => null,
            );
            $this->planilla_actividades_model->deleteTiempoActividad($data, $id_grupo,$id_tiempo_actividad);
        } else {
            $id++;
        }

        //mido hora de incio y fin de actividad
        if ($id == 3) {
            $start = date('H:i:s');
            $data = array(

                'inicio' => $start,
            );

            $this->planilla_actividades_model->setInicioActividad($data, $id_grupo,$id_tiempo_actividad);
        } elseif ($id == 4) {

            $fin = date('H:i:s');
            $data = array(

                'fin' => $fin,
            );

            $this->planilla_actividades_model->setFinActividad($data, $id_grupo,$id_tiempo_actividad);
        }

        $data = array(
            'id_estado_pile' => $id,
        );

        if ($this->planilla_actividades_model->actualizarEstadoActividad($data, $idActividad)) {
            redirect(base_url() . "planilla_actividades");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "planilla_actividades");
        }
    }

    public function cambiarEstadoActividadFutbol()
    {
        $id_grupo = $this->input->post('id_grupo');
        $id = $this->input->post('id');
        $idActividad = $this->input->post("idActividad");
        $id_tiempo_actividad = 7;
        //cambio el estado de la actividad
        if ($id == 4) {

            $id = 1;
            $data = array(

                'inicio' => null,
                'fin' => null,
            );
            $this->planilla_actividades_model->deleteTiempoActividad($data, $id_grupo,$id_tiempo_actividad);
        } else {
            $id++;
        }

        //mido hora de incio y fin de actividad
        if ($id == 3) {
            $start = date('H:i:s');
            $data = array(

                'inicio' => $start,
            );

            $this->planilla_actividades_model->setInicioActividad($data, $id_grupo,$id_tiempo_actividad);
        } elseif ($id == 4) {

            $fin = date('H:i:s');
            $data = array(

                'fin' => $fin,
            );

            $this->planilla_actividades_model->setFinActividad($data, $id_grupo,$id_tiempo_actividad);
        }
        $data = array(
            'id_estado_futbol' => $id,
        );

        if ($this->planilla_actividades_model->actualizarEstadoActividad($data, $idActividad)) {
            redirect(base_url() . "planilla_actividades");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "planilla_actividades");
        }
    }

    public function cambiarEstadoActividadVolley()
    {
        $id_grupo = $this->input->post('id_grupo');
        $id = $this->input->post('id');
        $idActividad = $this->input->post("idActividad");
        $id_tiempo_actividad = 8;
        //cambio el estado de la actividad
        if ($id == 4) {

            $id = 1;
            $data = array(

                'inicio' => null,
                'fin' => null,
            );
            $this->planilla_actividades_model->deleteTiempoActividad($data, $id_grupo,$id_tiempo_actividad);
        } else {
            $id++;
        }

        //mido hora de incio y fin de actividad
        if ($id == 3) {
            $start = date('H:i:s');
            $data = array(

                'inicio' => $start,
            );

            $this->planilla_actividades_model->setInicioActividad($data, $id_grupo,$id_tiempo_actividad);
        } elseif ($id == 4) {

            $fin = date('H:i:s');
            $data = array(

                'fin' => $fin,
            );

            $this->planilla_actividades_model->setFinActividad($data, $id_grupo,$id_tiempo_actividad);
        }

        $data = array(
            'id_estado_volley' => $id,
        );

        if ($this->planilla_actividades_model->actualizarEstadoActividad($data, $idActividad)) {
            redirect(base_url() . "planilla_actividades");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "planilla_actividades");
        }
    }
}
