<?php
/* defined('BASEPATH') or exit('No direct script access allowed');

class main extends CI_Controller
{
    public function __construct()

    {
        parent::__construct();
        $this->load->model("Actividades_model");


        if (!$this->session->userdata('login')) {

			redirect(base_url());
		}
    }
    public function index()
    {
        $data = array(
            'actividades' =>$this->Actividades_model->getActividades(),
        );
        $this->load->view('layouts/head');  
		$this->load->view('layouts/aside'); 
		$this->load->view('layouts/raside');   
        $this->load->view('actividades/actividades', $data);
        $this->load->view('layouts/footer');
    }


    public function modal()
    {
             $salida = array();
             $act = $this->Actividades_model->getActividad($_POST["idactividad"]);
        
        foreach ($act as $row){
            $salida['id'] = $row->id;
            $salida['nombre'] = $row->nombre;
            $salida['descripcion'] = $row->descripcion;
        } 
echo json_encode($salida);
}

    public function cargar()
    {
        $this->load->view('layouts/head');  
		$this->load->view('layouts/aside'); 
		$this->load->view('layouts/raside');   
        $this->load->view('actividades/cargar');
        $this->load->view('layouts/footer');
    }
    public function guardar(){
        $nombre= $this->input->post("nombre");
        $descripcion= $this->input->post("descripcion");
       
        $data = array(
            'nombre'=> $nombre,
            'descripcion'=>$descripcion,
            'estado' => 1
        );
            if($this->Actividades_model->save($data)){
                redirect(base_url()."actividades/main");
            } else {
                $this->session->set_flashdata("error", "No se pudo guardar la informacion");
                redirect(base_url()."actividades/main/cargar");
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
        $this->load->view('actividades/editar', $data);
        $this->load->view('layouts/footer');
    }


    public function actualizar(){
        $idActividad= $this->input->post("idActividad");
        $nombre= $this->input->post("nombreEdit");
        $descripcion= $this->input->post("descripcionEdit");
     

            $data =array(
                
                'nombre' => $nombre,
                'descripcion' => $descripcion,
            );
            if($this->Actividades_model->update($idActividad,$data)){
                redirect(base_url()."Actividades/main");
            } else {
                $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
                redirect(base_url()."Actividades/main/editar/".$idActividad);
            }
        }
    public function eliminar($id){
        $data = array(
			'estado' => "0",		
				);
				$this->Actividades_model->update($id,$data);
                redirect(base_url()."Actividades/main");
}
}

  
*/