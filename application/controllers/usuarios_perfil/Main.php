<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{private $permisosA;
    public function __construct()

    {
        parent::__construct();
        $this->permisosA= $this->backend_lib->control();
        $this->load->model("Empleado_model");


        if (!$this->session->userdata('login')) {
            redirect(base_url());
        }
    }
    public function index()
    {
        $idemp =  $this->session->userdata("id_empleado");
        $data = array(

            'empleado' => $this->Empleado_model->getEmpleado($idemp),
            'permisosA' => $this->permisosA,
        );
        $data2 = $data;
        $this->load->view('layouts/head', $data2);
        $this->load->view('layouts/aside', $data2);
        $this->load->view('layouts/raside');
        $this->load->view('usuarios/perfil', $data);
        $this->load->view('layouts/footer');
    }

    public function updatePerfil()
    {


        $idEmpleado = $this->input->post("id");
        $nombre = $this->input->post("nombre");
        $dni = $this->input->post("dni");
        $telefono = $this->input->post("telefono");
        $direccion = $this->input->post("direccion");
        $edad = $this->input->post("edad");

        $data = array(
            'nombre' => $nombre,
            'dni' => $dni,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'edad' => $edad,
        );


        if ($this->Empleado_model->update($idEmpleado, $data)) {
            redirect(base_url() . "usuarios_perfil");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "usuarios_perfil");
        }
    }





    public function cambiarFoto()
    {

        $idEmpleado =  $this->session->userdata("id_empleado");

        $fotonombre = $_FILES["userimage"]['name'];
        $fotonombre = str_replace(' ', '', $fotonombre);
        $new_name = time() . $fotonombre; //This line will be generating random name for images that are uploaded  

        if ($new_name == time()) { //you are a smart assshole nicolassssssssss
            $new_name = 'default.jpg';
        }
        
        $config['upload_path'] = FCPATH . "assets/images/empleados/";
        $config['allowed_types'] = 'gif|jpg|png|jpeg|';
        $config['file_name'] = $new_name;

        $dir = FCPATH . "assets/images/empleados/";
        $this->load->library('upload', $config); //Loads the Uploader Library
        $this->upload->initialize($config);
   

        if (!$this->upload->do_upload('userimage')) {
        } else {
            $data = $this->upload->data(); //This will upload the `image/file` using native image upload 
        }

        $data = array(
            'nombre' => $new_name,

        );

        var_dump($data);
        die();
        $this->foto_redimencionar($data['full_path'], $data['file_name'], $dir);

        if ($this->Empleado_model->cambiarFoto($idEmpleado, $data)) {
            redirect(base_url() . "usuarios_perfil");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "usuarios_perfil");
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
}
