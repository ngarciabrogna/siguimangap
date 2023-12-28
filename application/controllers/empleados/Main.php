<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    private $permisosA;
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
        $data = array(
            'empleados' => $this->Empleado_model->getEmpleados(),
            'permisosA' => $this->permisosA,
        );


		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
        $this->load->view('layouts/raside');
        $this->load->view('empleados/lista', $data);
        $this->load->view('layouts/footer');
    }
    public function modal()
    {
        $salida = array();
        $emp = $this->Empleado_model->getEmpleado($_POST["idemp"]);

        foreach ($emp as $row) {
            $salida['id'] = $row->id;
            $salida['nombre'] = $row->nombre;
            $salida['dni'] = $row->dni;
            $salida['telefono'] = $row->telefono;
            $salida['direccion'] = $row->direccion;
            $salida['edad'] = $row->edad;
        }
        echo json_encode($salida);
    }

    public function cargar()
    {
        $this->load->view('layouts/head');
        $this->load->view('layouts/aside');
        $this->load->view('layouts/raside');
        $this->load->view('empleados/cargar');
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

        $nombre = $this->input->post("nombre");
        $dni = $this->input->post("dni");
        $telefono = $this->input->post("telefono");
        $direccion = $this->input->post("direccion");
        $edad = $this->input->post("edad");

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
            'nombre' => $nombre,
            'dni' => $dni,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'edad' => $edad,
            'estado' => 1,
            'imagen' => $new_name
        );

        $this->foto_redimencionar($data['full_path'], $data['file_name'], $dir);
    
        if ($this->Empleado_model->save($data)) {
            redirect(base_url() . "empleados");
        } else {
            $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            redirect(base_url() . "empleados/main/cargar");
        }
    }


    public function cambiarFoto()
    {
        $idEmpleado =  $this->session->userdata("id_empleado"); //id del empleado claro

        $fotonombre = $_FILES["userimage"]['name'];
        $fotonombre = str_replace(' ', '', $fotonombre);
        $random_string = chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90)) . chr(rand(65,90));
        $new_name = $random_string . $fotonombre; //This line will be generating random name for images that are uploaded  

        if ($new_name == $random_string) { //you are a smart assshole nicolassssssssss
            $new_name = 'default.jpg';
        }

        $nombre = $this->input->post("nombre");
     

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
            
         
            'imagen' => $new_name
        );

        $this->foto_redimencionar($data['full_path'], $data['file_name'], $dir);
    
        if ($this->Empleado_model->cambiarFoto($idEmpleado,$data)) {
            redirect(base_url() . "usuarios_perfil");
        } else {
            $this->session->set_flashdata("error", "No se pudo guardar la informacion");
            redirect(base_url() . "usuarios_perfil");
        }
    }



    private function foto_redimencionar($ruta, $nombre, $dir)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $ruta;
        $config['new_image'] = $dir . '/' . $nombre;
        $config['maintain_ratio'] = false;
        $config['height'] = 800;
        $config['width'] = 418;
        


        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }

    public function editar($id)
    {
        $data = array(
            'empleado' => $this->Empleado_model->getEmpleado($id)
        );
        $this->load->view('layouts/head');
        $this->load->view('layouts/aside');
        $this->load->view('layouts/raside');
        $this->load->view('empleados/editar', $data);
        $this->load->view('layouts/footer');
    }
    public function actualizar()
    {

        $idEmpleado = $this->input->post("idEmpleado");
        $nombre = $this->input->post("nombreEdit");
        $dni = $this->input->post("dniEdit");
        $telefono = $this->input->post("telefonoEdit");
        $direccion = $this->input->post("direccionEdit");
        $edad = $this->input->post("edadEdit");

        $data = array(
            'nombre' => $nombre,
            'dni' => $dni,
            'telefono' => $telefono,
            'direccion' => $direccion,
            'edad' => $edad,
        );
        if ($this->Empleado_model->update($idEmpleado, $data)) {
            redirect(base_url() . "empleados");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "empleados/main/editar/" . $idEmpleado);
        }
    }
    public function eliminar($id)
    {
        $id = $this->input->post("id");
        $data = array(
            'estado' => "0",
        );
        $this->Empleado_model->update($id, $data);
        redirect(base_url() . "empleados");
    }
}
