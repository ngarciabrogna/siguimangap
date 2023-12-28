<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{private $permisosA;
    public function __construct()

    {
        parent::__construct();
        $this->load->model("Usuario_model");
        $this->load->model("Empleado_model");
        $this->permisosA= $this->backend_lib->control();
        if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
    }
    public function index()
    {
        
        $data = array(
            'usuarios' =>$this->Usuario_model->getUsuarios(),
            'roles' => $this->Usuario_model->getRoles(),
            'empleados' =>$this->Usuario_model->getEmpleados(), 
            'permisosA' => $this->permisosA,
        );
       

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('usuarios/lista',$data);
        $this->load->view('layouts/footer');
    }


    public function modal()
    {
             $salida = array();
             $user = $this->Usuario_model->getUsuario($_POST["idusuarios"]);
        
        foreach ($user as $row){
            $salida['id'] = $row->id;
            $salida['empleado'] = $row->id_empleado;
            $salida['rol'] = $row->id_rol;
            $salida['username'] = $row->username;
            $salida['password'] = $row->password;
            
        } 
echo json_encode($salida);
}




public function eliminar($id)
	{
        $id = $this->input->post("id");
        $data = array(
			'estado' => "0",		
				);
				$this->Usuario_model->update($id,$data);
                redirect(base_url()."usuarios");
	}
	
    public function cargar()
	{

		$data = array(
            'roles' => $this->Usuario_model->getRoles(),
            'empleados' =>$this->Usuario_model->getEmpleados(), 
		
                );
		
                $this->load->view('layouts/head');  
                $this->load->view('layouts/aside'); 
                $this->load->view('layouts/raside');   
		$this->load->view("usuarios/cargar",$data);
		$this->load->view("layouts/footer" );
    }
    
    public function editar($id)
	{

		$data = array(
            'roles' => $this->Usuario_model->getRoles(),
            'empleados' =>$this->Usuario_model->getEmpleados(), 
            'usuario' =>$this->Usuario_model->getUsuario($id),
		
                );
		
                $this->load->view('layouts/head');  
                $this->load->view('layouts/aside'); 
                $this->load->view('layouts/raside');   
		$this->load->view("usuarios/editar",$data);
		$this->load->view("layouts/footer" );
    }
    public function actualizar()
	{
	$idUsuario=$this->input->post("idUsuario");	
	$empleado=$this->input->post("editempleado");
    $rol=$this->input->post("rolEdit");
    $username=$this->input->post("usernameEdit");
    $password=$this->input->post("passwordEdit");

	$data = array(
		'id_empleado' => $empleado,
        'id_rol' => $rol,
        'username' => $username,  
        'password' => sha1($password), 
            );
          
	$this->Usuario_model->update($idUsuario,$data);
				redirect(base_url()."usuarios");
			
	}
    public function guardar(){	
	$empleado=$this->input->post("empleado");
    $rol=$this->input->post("rol");
    $username=$this->input->post("username");
    $password=$this->input->post("password");

	$data = array(
		'id_empleado' => $empleado,
        'id_rol' => $rol,
        'username' => $username,  
        'password' => sha1($password),
        'estado' => "1",   
		
            );
         
            $this->Usuario_model->save($data);
				redirect(base_url()."usuarios");
			
		

    }
   
	
  
    
  
}
