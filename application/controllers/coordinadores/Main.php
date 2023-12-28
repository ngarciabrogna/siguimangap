<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    private $permisosA;
    public function __construct()

    {
        parent::__construct();
        $this->permisosA= $this->backend_lib->control();
        $this->load->model("Coordinador_model");
        $this->load->model("Empleado_model");
        $this->load->helper('url'); //This will load up all the URL parameters from the helper class
        $this->load->helper('form'); //This will load up all the form attributes that are need by the form.

        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    }

    public function index()
    {
        $data = array(
            'coordinadores' => $this->Coordinador_model->getCoordinadores(),
            'empresas' => $this->Coordinador_model->getEmpresas(),
            'permisosA' => $this->permisosA,
        );
		$idemp =  $this->session->userdata("id_empleado");
		$data2 = array(

			'empleado' => $this->Empleado_model->getEmpleado($idemp),
		);

		$this->load->view('layouts/head', $data2); //cabecera 
		$this->load->view('layouts/aside', $data2); //menu lateral
        $this->load->view('layouts/raside');
        $this->load->view('coordinadores/lista', $data);
        $this->load->view('layouts/footer');
    }
    public function coments($id)
    {
        if(!$this->permisosA->actualizar){ redirect(base_url()); return; } 
        $data = array(
            'comentarios' => $this->Coordinador_model->getComentarios($id),
            'coordinador' => $this->Coordinador_model->getCoordinador1($id),
        );
       
		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
        $this->load->view('layouts/raside');
        $this->load->view('coordinadores/listaComentarios', $data);
        $this->load->view('layouts/footer');
    }
    public function modal()
    {
        $salida = array();
        $coor = $this->Coordinador_model->getCoordinador($_POST["idcoordinador"]);

        foreach ($coor as $row) {
            $salida['id'] = $row->id;
            $salida['empresa'] = $row->id_empresa;
            $salida['nombre'] = $row->nombre;
            $salida['dni'] = $row->dni;
            $salida['imagen'] = $row->imagen;
        }
        echo json_encode($salida);
    }
    public function getComentariosEdit()
    {
        $salida = array();
        $coment = $this->Coordinador_model->getComentariosEdit($_POST["idcomentario"]);

        foreach ($coment as $row) {
            $salida['id'] = $row->id;
            $salida['descripcion'] = $row->descripcion;
        }
        echo json_encode($salida);
    }
    public function cargar()
    {
        $data = array(
            'empresas' => $this->Coordinador_model->getEmpresas(),


        );
        $this->load->view('layouts/head');
        $this->load->view('layouts/aside');
        $this->load->view('layouts/raside');
        $this->load->view('coordinadores/cargar', $data);
        $this->load->view('layouts/footer');
    }

    public function guardar()
    {
       


        $fotonombre = $_FILES["userimage"]['name'];
        $fotonombre = str_replace(' ', '', $fotonombre);
        $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
        $new_name = $random_string . $fotonombre; //This line will be generating random name for images that are uploaded  

        if ($new_name == $random_string) { //you are a smart assshole nicolassssssssss
            $new_name = 'default.jpg';
        }

            $empresa = $this->input->post("empresa");
            $nombre = $this->input->post("nombre");
            $dni = $this->input->post("dni");

            $config['upload_path'] = FCPATH . "assets/images/users/";
            $config['allowed_types'] = 'gif|jpg|png|jpeg|';
            $config['file_name'] = $new_name;

            $dir = FCPATH . "assets/images/users/";

            $this->load->library('upload', $config); //Loads the Uploader Library
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userimage')) {
            } else {
                $data = $this->upload->data(); //This will upload the `image/file` using native image upload 
            }

            $data_value = array(

                'id_empresa' => $empresa,
                'nombre' => $nombre,
                'dni' => $dni,
                'estado' => 1,
                'asignado'=> 0,
                'imagen' => $new_name
                
            );

            $this->foto_redimencionar($data['full_path'], $data['file_name'], $dir);

            if ( //Paso la data al model como un array --->>>>>>> dale de una monster
                $this->Coordinador_model->save($data_value)
            ) {
                redirect(base_url() . "coordinadores");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url() . "coordinadores/main/cargar");
            }
        
    }


    private function foto_redimencionar($ruta, $nombre, $dir)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $ruta;
        $config['new_image'] = $dir . '/' . $nombre;
        $config['maintain_ratio'] = false;
        $config['width'] = 640;
        $config['height'] = 480;


        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }
    /////////////////////////////////////////////////////////////
    public function guardarComent()
    {
        $idCoor = $this->input->post("coordinadorCarga");
        $descripcion = $this->input->post("comentarioCarga");
        $fecha_actual = new DateTime();
        $fecha =  $fecha_actual->format("Y-m-d");


        $data = array(

            'id_coordinador' => $idCoor,
            'descripcion' => $descripcion,
            'fecha' => $fecha,

        );

        $this->Coordinador_model->guardarComentario($data);
        redirect(base_url() . "coordinadores/main/coments/$idCoor");
    }
    /////////////////////////////////////////////////////////////
    public function editar($id)
    {
        $data = array(
            'coordinador' => $this->Coordinador_model->getCoordinador($id),
            'empresas' => $this->Coordinador_model->getEmpresas(),
        );
        $this->load->view('layouts/head');
        $this->load->view('layouts/aside');
        $this->load->view('layouts/raside');
        $this->load->view('coordinadores/editar', $data);
        $this->load->view('layouts/footer');
    }
    public function actualizar()
    {

        $idCoordinador = $this->input->post("idCoordinador");
        $empresa = $this->input->post("empresa");
        $nombre = $this->input->post("nombreEdit");
        $dni = $this->input->post("dniEdit");


        $data = array(
            'id_empresa' => $empresa,
            'nombre' => $nombre,
            'dni' => $dni,
        );
        if ($this->Coordinador_model->update($idCoordinador, $data)) {
            redirect(base_url() . "planilla_coordinadores");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "coordinadores/main/editar/" . $idCoordinador);
        }
    }
    public function actualizarComentario()
    {

        $idcomentario = $this->input->post("idcomentario");
        $comentario = $this->input->post("comentarioEdit");
        $fecha_actual = new DateTime();
        $fecha =  $fecha_actual->format("Y-m-d");

        $idCoor1 = $this->Coordinador_model->llamar($idcomentario);
        $idCoor = $idCoor1->id_coordinador;

        $data = array(
            'id' => $idcomentario,
            'descripcion' => $comentario,
            'fecha' => $fecha,
        );
        $this->Coordinador_model->updateComent($idcomentario, $data);
        redirect(base_url() . "coordinadores/main/coments/$idCoor");
    }
    public function eliminar($id)
    {
        $id = $this->input->post("id");
        $data = array(
            'estado' => "0",
        );
        $this->Coordinador_model->update($id, $data);
        redirect(base_url() . "Coordinadores");
    }
    public function eliminarComentario($id)
    {
        $id = $this->input->post("id");
        $idCoor1 = $this->Coordinador_model->llamar($id);
        $idCoor = $idCoor1->id_coordinador;
        $this->Coordinador_model->eliminar($id);

        redirect(base_url() . "coordinadores/main/coments/$idCoor");
    }
}
