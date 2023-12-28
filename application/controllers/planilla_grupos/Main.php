<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{ private $permisosA;
    public function __construct()

    {
        parent::__construct();
        $this->permisosA= $this->backend_lib->control();
        $this->load->model("Planilla_grupo_model");
        $this->load->model("Coordinador_model");
        $this->load->model("Empleado_model");

        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    }
    public function index()
    {
        $data = array(
            'grupos' => $this->Planilla_grupo_model->getGrupos(),
            'permisosA' => $this->permisosA,
        );
   

        $this->load->view('layouts/head'); //cabecera 
        $this->load->view('layouts/aside'); //menu lateral
        $this->load->view('layouts/raside');
        $this->load->view('planilla_grupos/activos', $data);
        $this->load->view('layouts/footer');
    }

    public function cargar()
    {
        if(!$this->permisosA->leer){ redirect(base_url()); return; } 
        $data = array(
            'empresas' => $this->Planilla_grupo_model->getEmpresas(),
            'coordinadores' => $this->Planilla_grupo_model->getCoordinadores(),
        );

      

        $this->load->view('layouts/head'); //cabecera 
        $this->load->view('layouts/aside'); //menu lateral
        $this->load->view('layouts/raside');
        $this->load->view('grupos/cargar', $data);
        $this->load->view('layouts/footer');
    }

    public function guardar()
    {
        $coordinador = $this->input->post("coordinador");
        $empresa = $this->input->post("empresa");
        $fecha = $this->input->post("fecha");
        $cantidad_egresados = $this->input->post("cantidad_egresados");
        $cantidad_acompanantes = $this->input->post("cantidad_acompanantes");
        $cantidad_choferes = $this->input->post("cantidad_choferes");
        $cantidad_coordinadores = $this->input->post("cantidad_coordinadores");
        $dieta = $this->input->post("dieta");
        $hora_salida = $this->input->post("hora_salida");
        $descripcion = $this->input->post("descripcion");


        $data = array(
            'id_coordinador' => $coordinador,
            'id_empresa' => $empresa,
            'fecha' => $fecha,
            'cantidad_egresados' => $cantidad_egresados,
            'cantidad_acompanantes' => $cantidad_acompanantes,
            'cantidad_choferes' => $cantidad_choferes,
            'cantidad_coordinadores' => $cantidad_coordinadores,
            'total_personas' => $cantidad_egresados + $cantidad_acompanantes + $cantidad_choferes + $cantidad_coordinadores,
            'dieta_especial' => $dieta,
            'hora_salida' => $hora_salida,
            'descripcion' => $descripcion,
            'activo' => 1,
            'estado' => 1
        );
        $data2 = array(
            'asignado' => 1
        );

        if ($this->Planilla_grupo_model->save($data)) {

     
            $this->Coordinador_model->update($coordinador, $data2);
            redirect(base_url() . "grupos");
        } else {
            $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            redirect(base_url() . "grupos/main/cargar");
        }
    }

    public function editar($id)
    {
        $data = array(
            'grupo' => $this->Planilla_grupo_model->getGrupo($id),
            'empresas' => $this->Planilla_grupo_model->getEmpresas(),
            'coordinadores' => $this->Planilla_grupo_model->getCoordinadores(),
        );
        $this->load->view('layouts/head');
        $this->load->view('layouts/aside');
        $this->load->view('layouts/raside');
        $this->load->view('grupos/editar', $data);
        $this->load->view('layouts/footer');
    }
    public function update()
    {

        $idGrupo = $this->input->post("idGrupo");
        $coordinador = $this->input->post("coordinador");
        $empresa = $this->input->post("empresa");
        $fecha = $this->input->post("fecha");
        $descripcion = $this->input->post("descripcion");
        $cantidad_egresados = $this->input->post("cantidad_egresados");
        $cantidad_acompanantes = $this->input->post("cantidad_acompanantes");
        $cantidad_choferes = $this->input->post("cantidad_choferes");
        $cantidad_coordinadores = $this->input->post("cantidad_coordinadores");
        $dieta = $this->input->post("dieta");
        $hora_salida = $this->input->post("hora_salida");
        $descripcion = $this->input->post("descripcion");

        $data = array(
            'id_coordinador' => $coordinador,
            'id_empresa' => $empresa,
            'fecha' => $fecha,
            'cantidad_egresados' => $cantidad_egresados,
            'cantidad_acompanantes' => $cantidad_acompanantes,
            'cantidad_choferes' => $cantidad_choferes,
            'cantidad_coordinadores' => $cantidad_coordinadores,
            'dieta_especial' => $dieta,
            'total_personas' => $cantidad_egresados + $cantidad_acompanantes + $cantidad_choferes + $cantidad_coordinadores,
            'hora_salida' => $hora_salida,
            'descripcion' => $descripcion,


        );
        if ($this->Planilla_grupo_model->update($idGrupo, $data)) {
            redirect(base_url() . "grupos");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "grupos/main/editar/" . $idGrupo);
        }
    }
    public function eliminar($id)
    {
        $data = array(
            'estado' => "0"
        );
        $this->Planilla_grupo_model->update($id, $data);
        redirect(base_url() . "grupos");
    }

    public function getCoor()
    {
        $salida = array();
        $coor = $this->Planilla_grupo_model->getCoorG($_POST["idgrupo"]);

        foreach ($coor as $row) {
            $salida['id'] = $row->id;
            $salida['id_coordinador'] = $row->id_coordinador;
        }
        echo json_encode($salida);
    }
    public function comentario()
    {

        $idGrupo = $this->input->post("grupo1");
        $idCoordinador = $this->input->post("coordinador1");
        $comentario = $this->input->post("comentario");
        $fecha_actual = new DateTime();
        $fecha =  $fecha_actual->format("Y-m-d");

        if ($comentario == '') {
            $this->liberarGrupo($idGrupo);
        } else {
            $dataComent = array(

                'id_coordinador' => $idCoordinador,
                'descripcion' => $comentario,
                'fecha' => $fecha,
            );
            $this->Planilla_grupo_model->comentario($dataComent);
            $this->liberarGrupo($idGrupo);
        }
    }
    public function liberarGrupo($idGrupo)
    {


        $id_empresa  = $this->Planilla_grupo_model->getGrupoiDEmpresaLiberar($idGrupo);
        $id_coordinador =  $this->Planilla_grupo_model->getGrupoiDCoordinadorLiberar($idGrupo);
        $coordinador = $id_coordinador->id_coordinador;
        //  $empresa = $id_empresa->id_empresa;  por ahora no lo necesito

        $data = array(

            'activo ' => 0
            
        ); // data general para desactivar los campos

        $data2 = array(

            'activo ' => 0,
            'asignado ' => 0
        ); // data  para desactivar los campos de coord





        //libero coordinador antes de soltar el grupo para evitar errores
        $this->Planilla_grupo_model->liberarCoordinador($coordinador, $data2);
        //libero el grupo, queda fuera del planilleo
        $this->Planilla_grupo_model->liberarGrupo($idGrupo, $data);
        //funcion de limpiar actividades
        $this->Planilla_grupo_model->limpiarActividadesGrupo($idGrupo, $id_empresa);
        //borrar los tiempos de las actividades para evitar sobrecarga de registros no utiles
        $this->Planilla_grupo_model->limpiarTiempoActividadesGrupo($idGrupo, $id_empresa);
        redirect(base_url() . "planilla_grupos");
    }
}
