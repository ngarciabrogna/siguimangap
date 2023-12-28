<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
	public function __construct()

	{
		parent::__construct();

		$this->load->model("Dash_model");
		$this->load->model("Empleado_model");
		if (!$this->session->userdata('login')) { // valida si esta logeado el usuario , si no, lo devuelve al login.
			redirect(base_url() . "login");
		}
	}
	public function index()
	{

		$data = array(
			'tareas' => $this->Dash_model->get_tareas(),
			'actividades' => $this->Dash_model->getTiempoActividades(),

		);

		$idemp =  $this->session->userdata("id_empleado");
		$data2 = array(

			'empleado' => $this->Empleado_model->getEmpleado($idemp),
		);

		$this->load->view('layouts/head', $data2); //cabecera 
		$this->load->view('layouts/aside', $data2); //menu lateral
		$this->load->view('layouts/raside');           // rosquita de la derecha
		$this->load->view('dash', $data);           // pagina a cargar en cuestion
		$this->load->view('layouts/footer'); // pie de pagina
	}
	public function cargar_tarea()
	{
		$nombre = $this->input->post("nombre");
		$fecha = $this->input->post("fecha");

		$data = array(
			'nombre' => $nombre,
			'fecha' => $fecha,
			'estado' => 0

		);
		if ($this->Dash_model->cargar_tarea($data)) {
			redirect(base_url());
		} else {
			$this->session->set_flashdata("error", "No se pudo guardar la informacion");
			redirect(base_url());
		}
	}

	public function update_tarea()
	{
		$id = $this->input->post("id");
		$estado = $this->input->post("estado");

		if ($estado == 0) {
			$estado = 1;
		} else {
			$estado = 0;
		}

		$data = array(
			'estado' => $estado
		);
		if ($this->Dash_model->update_tarea($id, $data)) {

			echo 'edited';
		} else {
			$this->session->set_flashdata("error", "No se pudo guardar la informacion");
			redirect(base_url());
		}
	}
	public function borrarToDoList()
	{ //this method will delete the activities from "to do list dashboard" ('^_^')

		$this->Dash_model->borrarToDoList();
		redirect(base_url());
	}

	public function getTiempoActividades()
	{
		$this->Dash_model->getTiempoActividades;
	}
}
