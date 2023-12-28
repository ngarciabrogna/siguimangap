<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{  private $permisosA;
    public function __construct()

    {
        parent::__construct();
        $this->permisosA= $this->backend_lib->control();
        $this->load->model("Permisos_model");
        $this->load->model("Empleado_model");

        if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
    }
    public function index()
    {
        
        $data = array(
            'permisos' =>$this->Permisos_model->getPermisos(),
            'roles' => $this->Permisos_model->getRoles(),
            'menus' =>$this->Permisos_model->getMenus(), 
            'permisosA' => $this->permisosA,
        );
        
		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('permisos/lista',$data);
        $this->load->view('layouts/footer');
    }

    public function guardar(){	
      
        $rol=$this->input->post("rol");
        $menu=$this->input->post("menu");
        $leer=$this->input->post("leer");
        $insertar=$this->input->post("insertar");
        $actualizar=$this->input->post("actualizar");
        $borrar=$this->input->post("borrar");
    
        $data = array(
            'id_rol' => $rol,
            'id_menu' => $menu,
            'leer' => $leer,  
            'insertar' => $insertar,
            'actualizar' => $actualizar,
            'borrar' => $borrar, 
            
                );
             
                $this->Permisos_model->save($data);
                    redirect(base_url()."permisos");
                
        }

        public function guardarRol(){	
      
            $rol=$this->input->post("addrol");
            $descripcion=$this->input->post("adddescripcion");
 
        
            $data = array(
                'nombre' => $rol,
                'descripcion' => $descripcion,

                
                    );
                 
                    $this->Permisos_model->saveRol($data);
                        redirect(base_url()."permisos");
                    
            }
        public function eliminar($id)
        {
            $id = $this->input->post("id");
            $this->Permisos_model->delete($id);
            redirect(base_url() . "permisos");
        }

        public function modal()
    {
             $salida = array();
             $permiso = $this->Permisos_model->getPermiso($_POST["idpermiso"]);
        
        foreach ($permiso as $row){
            $salida['id'] = $row->id;
            $salida['rol'] = $row->id_rol;
            $salida['menu'] = $row->id_menu;
            $salida['leer'] = $row->leer;
            $salida['insertar'] = $row->insertar;
            $salida['actualizar'] = $row->actualizar;
            $salida['borrar'] = $row->borrar;
            
        } 
echo json_encode($salida);
}

   
public function actualizar()
{
$idPermiso=$this->input->post("idPermiso");	
$rol=$this->input->post("editrol");
$menu=$this->input->post("editmenu");
$leer=$this->input->post("editleer");
$insertar=$this->input->post("editinsertar");
$actualizar=$this->input->post("editactualizar");
$borrar=$this->input->post("editborrar");

$data = array(
    'id_rol' => $rol,
    'id_menu' => $menu,
    'leer' => $leer,  
    'insertar' => $insertar,  
    'actualizar' => $actualizar,  
    'borrar' => $borrar, 
        );
      
$this->Permisos_model->update($idPermiso,$data);
            redirect(base_url()."permisos");
        
}
  
    
  
}
