<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Usuario_model");
    }

    public function index(){
        if ($this->session->userdata("login")){
            redirect(base_url());
        }
        else{     
        $this->load->view('login');
        }
    }

    public function login(){
        $username = $this->input->post("username");
        $password = $this->input->post("password");
        
        $res = $this->Usuario_model->login($username, sha1($password));
        
        if (!$res) {
            $this->session->set_flashdata("error","el usuario y/o contraseña son incorrectos");
            redirect(base_url().'login');
           
        }else{
            $data = array(
                'id' => $res->id,
                'id_empleado' => $res->id_empleado,
                'rol' => $res->id_rol,
                'username' => $res->username,
                'password' => $res->password,
                'login' => TRUE
            );

			$this->session->set_userdata($data);
			
            redirect(base_url());
        }
    }
    public function logout() {
        $this->session->sess_destroy();
        redirect(base_url());
    }
}
