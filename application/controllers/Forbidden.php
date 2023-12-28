<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Forbidden extends CI_Controller
{
	public function __construct()

	{
		parent::__construct();


		if (!$this->session->userdata('login')) { // valida si esta logeado el usuario , si no, lo devuelve al login.
			redirect(base_url() . "login");
		}
	}
	public function index()
	{

		

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');           // rosquita de la derecha
		$this->load->view('errors/403');           // pagina a cargar en cuestion
		$this->load->view('layouts/footer'); // pie de pagina
	}
	
}
