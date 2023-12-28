<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{ private $permisosA;
    public function __construct()

    {
        parent::__construct();
        $this->permisosA= $this->backend_lib->control();
        $this->load->model("Planilla_coordinador_model");
        $this->load->model("Empleado_model");

        if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
    }
    public function index()
    {
        $data = array(
            'coordinadores' => $this->Planilla_coordinador_model->getCoordinadores(),
            'empresas' => $this->Planilla_coordinador_model->getEmpresas(),
            'permisosA' => $this->permisosA,
        );
		

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
        $this->load->view('layouts/raside');
        $this->load->view('planilla_coordinadores/activos', $data);
        $this->load->view('layouts/footer');
    }
    public function liberar($id)
    {
        $data = array(
            'activo' => "0",
        );
        $this->Planilla_coordinador_model->update($id, $data);
        redirect(base_url() . "planilla_coordinadores");
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
            $config['allowed_types'] = 'gif|jpg|png';
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
                'activo' => 1,
                'imagen' => $new_name
            );

            $this->foto_redimencionar($data['full_path'], $data['file_name'], $dir);

            if ( //Paso la data al model como un array --->>>>>>>
                $this->Planilla_coordinador_model->save($data_value)
            ) {
                redirect(base_url() . "planilla_coordinadores");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url() . "planilla_coordinadores");
            }
        
    }

    private function foto_redimencionar($ruta, $nombre, $dir)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $ruta;
        $config['new_image'] = $dir . '/' . $nombre;
        $config['maintain_ratio'] = FALSE;
        $config['width'] = 640;
        $config['height'] = 480; /////probar sacando uno de los dos


        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }
}
