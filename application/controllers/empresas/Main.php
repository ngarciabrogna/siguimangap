<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    private $permisosA;
    public function __construct()

    {
        parent::__construct();
        $this->permisosA= $this->backend_lib->control();
        $this->load->model("Empresa_model");
        $this->load->model("Empleado_model");

        if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
    }
    public function index()
    {
        $data = array(
            'empresas' => $this->Empresa_model->getEmpresas(),
            'permisosA' => $this->permisosA,
        );
		$idemp =  $this->session->userdata("id_empleado");
		$data2 = array(

			'empleado' => $this->Empleado_model->getEmpleado($idemp),
		);

		$this->load->view('layouts/head', $data2); //cabecera 
		$this->load->view('layouts/aside', $data2); //menu lateral
        $this->load->view('layouts/raside');
        $this->load->view('empresas/empresas', $data);
        $this->load->view('layouts/footer');
    }

    public function modal()
    {
        $salida = array();
        $empresa = $this->Empresa_model->getEmpresa($_POST["idempresa"]);

        foreach ($empresa as $row) {
            $salida['id'] = $row->id;
            $salida['nombre'] = $row->nombre;
            $salida['cuit'] = $row->cuit;
            $salida['telefono'] = $row->telefono;
            $salida['razon'] = $row->razon_social;
        }
        echo json_encode($salida);
    }

    public function activas()
    { 
        
        {
            if(!$this->permisosA->leer){ redirect(base_url()); return; }
            $data = array(
                'empresas' => $this->Empresa_model->getEmpresas(),
            );
     
    
            $this->load->view('layouts/head'); //cabecera 
            $this->load->view('layouts/aside'); //menu lateral
            $this->load->view('layouts/raside');
            $this->load->view('empresas/activas', $data);
            $this->load->view('layouts/footer');
        }
    }


    public function editar($id)
    {
        $data = array(
            'empresa' => $this->Empresa_model->getEmpresa($id)
        );
		

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
        $this->load->view('layouts/raside');
        $this->load->view('empresas/editar', $data);
        $this->load->view('layouts/footer');
    }
    public function actualizar()
    {

        $idEmpresa = $this->input->post("idEmpresa");
        $nombre = $this->input->post("nombreEdit");
        $cuit = $this->input->post("cuitEdit");
        $telefono = $this->input->post("telefonoEdit");
        $razon_social = $this->input->post("razonEdit");

        $data = array(
            'nombre' => $nombre,
            'cuit' => $cuit,
            'telefono' => $telefono,
            'razon_social' => $razon_social
        );
        if ($this->Empresa_model->update($idEmpresa, $data)) {
            redirect(base_url() . "empresas");
        } else {
            $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
            redirect(base_url() . "empresas/main/editar/" . $idEmpresa);
        }
    }


    public function eliminar($id)
    {
        $id = $this->input->post("id");
        $data = array(
            'estado' => "0"
        );
        $this->Empresa_model->update($id, $data);
        redirect(base_url() . "empresas");
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
            $cuit = $this->input->post("cuit");
            $telefono = $this->input->post("telefono");
            $razon_social = $this->input->post("razon_social");

            $config['upload_path'] = FCPATH . "assets/images/empresas/";
            $config['allowed_types'] = 'gif|jpg|png';
            $config['file_name'] = $new_name;

            $dir = FCPATH . "assets/images/empresas/";

            $this->load->library('upload', $config); //Loads the Uploader Library
            $this->upload->initialize($config);

            if (!$this->upload->do_upload('userimage')) {
            } else {
                $data = $this->upload->data(); //This will upload the `image/file` using native image upload 
            }

            $data_value = array(

                'nombre' => $nombre,
                'cuit' => $cuit,
                'telefono' => $telefono,
                'razon_social' => $razon_social,
                'estado' => "1",
                'imagen' => $new_name
            );

            $this->foto_redimencionar($data['full_path'], $data['file_name'], $dir);

            if ( //Paso la data al model como un array --->>>>>>>
                $this->Empresa_model->save($data_value)
            ) {
                redirect(base_url() . "empresas");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url() . "empresas");
            }
        
    }

    private function foto_redimencionar($ruta, $nombre, $dir)
    {

        $config['image_library'] = 'gd2';
        $config['source_image'] = $ruta;
        $config['new_image'] = $dir . '/' . $nombre;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 480;
        $config['height'] = 640;


        $this->load->library('image_lib', $config);

        if (!$this->image_lib->resize()) {
            echo $this->image_lib->display_errors();
        }
    }


    function cartesianProduct($sets)
    {
        $cartesian = array();
        foreach ($sets as $key => $set) {

            // Si un grupo esta vació no afecta el producto cartesiano
            if (empty($set)) {
                continue;
            }

            // Si esta vacio agregamos el primer grupo
            if (empty($cartesian)) {
                $cartesian[] = array();
            }

            $subset = array();
            foreach ($cartesian as $product) {
                foreach ($set as $value) {
                    $product[$key] = $value;
                    $subset[] = $product;
                }
            }
            $cartesian = $subset;
        }
        return $cartesian;
    }

    public function reset()
    {
        $this->Empresa_model->reset();
        $this->Empresa_model->resetCoordinadores();
        $this->Empresa_model->resetGrupos();
        $this->Empresa_model->resetActividades();
        redirect(base_url() . "empresas/main/activas");
    }
    public function liberarEmpresa($id){ 

$id = $this->input->post("id");
        $this->Empresa_model->liberarEmpresa($id);

     

    }

    public function activar()
    {

        if (isset($_POST['submit'])) {
            //Para ejecutar PHP script en Submit
            if (!empty($_POST['check_list'])) {

                $check = $_POST['check_list'];
                foreach ($check as $valor) {

                    $idEmpresa = $valor;

                    $data = array(
                        'id' => $idEmpresa,
                        'activo' => (int)1,
                    );
                   
                    $this->Empresa_model->activar($idEmpresa, $data);
                }
             
            } 
        }

        redirect(base_url() . "empresas/main/activas");
    }
}
