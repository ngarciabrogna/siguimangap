<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    private $permisosA;
    public function __construct()

    {
        parent::__construct();
        $this->permisosA = $this->backend_lib->control();
        $this->load->model("Grupo_model");
        $this->load->model("Empleado_model");
        $this->load->model("Empresa_model");

        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    }
    public function index()
    {
        $data = array(
            'grupos' => $this->Grupo_model->getGrupos(),
            'permisosA' => $this->permisosA,
        );


        $this->load->view('layouts/head'); //cabecera 
        $this->load->view('layouts/aside'); //menu lateral
        $this->load->view('layouts/raside');
        $this->load->view('grupos/lista', $data);
        $this->load->view('layouts/footer');
    }

    public function sumas()
    {
        $salida = array();
        $choferes = $this->Grupo_model->getChoferes();
        $coor = $this->Grupo_model->getCoordinadoressum();
        $eya = $this->Grupo_model->getEgresados_acompanantes();
        foreach ($choferes as $row) {
            $salida['choferes'] = $row->choferes;
        }
        foreach ($coor as $row) {
            $salida['coordinadores'] = $row->coordinadores;
        }
        foreach ($eya as $row) {
            $salida['eya'] = $row->eya;
        }
        echo json_encode($salida);
    }

    public function cargar()
    {
        if (!$this->permisosA->insertar) {
            redirect(base_url());
            return;
        }
        $data = array(
            'empresas' => $this->Grupo_model->getEmpresas(),
            'coordinadores' => $this->Grupo_model->getCoordinadores(),
        );

        $this->load->view('layouts/head');
        $this->load->view('layouts/aside');
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
            'total_personas' => intval($cantidad_egresados) + intval($cantidad_acompanantes) + intval($cantidad_choferes) + intval($cantidad_coordinadores),            'dieta_especial' => $dieta,
            'hora_salida' => $hora_salida,
            'descripcion' => $descripcion,
            'activo' => 1,
            'estado' => 1,

        );



        if (!$empresa) {
            $this->session->set_flashdata("errorEmpresa", " ¡Campo empresa obligatorio!");
            redirect(base_url() . 'planilla_grupos/main/cargar');
        }

        if (!$coordinador) {
            $this->session->set_flashdata("errorCoordinador", " ¡Campo coordinador obligatorio!");
            redirect(base_url() . 'planilla_grupos/main/cargar');
        }



        if ($this->Grupo_model->save($data)) {
            $ultimoId = $this->db->insert_id();
            $data2 = array(
                'id_grupo' => $ultimoId,
                'id_coordinador' => $coordinador,
                'id_empresa' => $empresa,
                'id_estado_karting' => 1,
                'id_estado_cuadri' => 1,
                'id_estado_super' => 1,
                'id_estado_cachi' => 1,
                'id_estado_buggy' => 1,
                'id_estado_pile' => 1,
                'id_estado_futbol' => 1,
                'id_estado_volley' => 1,
                'fecha' => $fecha,


                'activo' => 1,

            );
            if ($this->Grupo_model->save2($data2)) {



                $data3 = array(

                    'id_coordinador' => $coordinador,
                    'id_empresa' => $empresa,
                    'id_grupo' => $ultimoId,
                    'id_actividad' => 1
                );

                $this->Grupo_model->save3($data3);

                $data3 = array(
                    'id_coordinador' => $coordinador,
                    'id_empresa' => $empresa,
                    'id_grupo' => $ultimoId,
                    'id_actividad' => 2
                );

                $this->Grupo_model->save3($data3);

                $data3 = array(
                    'id_coordinador' => $coordinador,
                    'id_empresa' => $empresa,
                    'id_grupo' => $ultimoId,
                    'id_actividad' => 3
                );

                $this->Grupo_model->save3($data3);



                $data3 = array(
                    'id_coordinador' => $coordinador,
                    'id_empresa' => $empresa,
                    'id_grupo' => $ultimoId,
                    'id_actividad' => 4
                );

                $this->Grupo_model->save3($data3);

                $data3 = array(
                    'id_coordinador' => $coordinador,
                    'id_empresa' => $empresa,
                    'id_grupo' => $ultimoId,
                    'id_actividad' => 5
                );

                $this->Grupo_model->save3($data3);
                $data3 = array(
                    'id_coordinador' => $coordinador,
                    'id_empresa' => $empresa,
                    'id_grupo' => $ultimoId,
                    'id_actividad' => 6
                );

                $this->Grupo_model->save3($data3);
                $data3 = array(
                    'id_coordinador' => $coordinador,
                    'id_empresa' => $empresa,
                    'id_grupo' => $ultimoId,
                    'id_actividad' => 7
                );

                $this->Grupo_model->save3($data3);

                $data3 = array(
                    'id_coordinador' => $coordinador,
                    'id_empresa' => $empresa,
                    'id_grupo' => $ultimoId,
                    'id_actividad' => 8
                );

                if ($this->Grupo_model->save3($data3)) {
                    $coordinador = $this->input->post('coordinador');

                    $data = array(
                        'activo' => 1,
                        'asignado' => 1
                    );

                    $this->Grupo_model->activarCoordinador($coordinador, $data);
                }
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url() . "grupos");
            }

            redirect(base_url() . "planilla_grupos");
        }
    }






    public function editar($id)
    {
        $data = array(
            'grupo' => $this->Grupo_model->getGrupo($id),
            'empresas' => $this->Grupo_model->getEmpresas(),
            'coordinadores' => $this->Grupo_model->getCoordinadores(),
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
        if ($this->Grupo_model->update($idGrupo, $data)) {
            redirect(base_url() . "grupos");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "grupos/main/editar/" . $idGrupo);
        }
    }
    public function eliminar($id)
    {
        $id = $this->input->post("id");
        $data = array(
            'estado' => "0"
        );
        $this->Grupo_model->update($id, $data);
        redirect(base_url() . "grupos");
    }

    public function getCordinadoresDependiente()
    {



        if ($this->input->post('id_empresa')) {

            $id_empresa = $this->input->post("id_empresa");

            $coordinadores = $this->Grupo_model->getCoordinadoresDependiente($id_empresa);

            foreach ($coordinadores as $fila) {

?>
                <option value="<?php echo $fila->id ?>"><?php echo $fila->nombre ?></option>
<?php
            }


            $this->Grupo_model->get($id_empresa);
        }
    }
}
