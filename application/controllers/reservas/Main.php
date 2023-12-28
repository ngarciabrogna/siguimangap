<?php if (!defined('BASEPATH')) exit('No direct script access allowed');





class Main extends CI_Controller
{
  private $permisosA;

  public function __construct()
  {
    parent::__construct();
    $this->permisosA = $this->backend_lib->control();
    $this->load->model("Reserva_model");
    $this->load->model("Empleado_model");


    if (!$this->session->userdata('login')) {
      redirect(base_url());
    }
  }
  public function erradicar($id)
  {
    $data = array(
      'estado' => "0",
    );
    $this->Reserva_model->update($id, $data);
  }
  public function index()
  {

    $data = array(
      'empresas' => $this->Reserva_model->getEmpresas(),
      'paquetes' => $this->Reserva_model->getPaquetes(),
      'permisosA' => $this->permisosA,



    );


    $fecha_actual = new DateTime();
    $fechas = $this->Reserva_model->getFechas();

    foreach ($fechas as $fecha) {
      if (new DateTime($fecha->fecha) < $fecha_actual) {
        $this->erradicar($fecha->id);
      } else {
      }
    }


    $this->load->view('layouts/head'); //cabecera 
    $this->load->view('layouts/aside'); //menu lateral
    $this->load->view('layouts/raside');
    $this->load->view("reservas/lista", $data);
    $this->load->view("layouts/footer");
  }


  public function listado()
  {

    $data = array(
      'reservas' => $this->Reserva_model->getReservas(),

    );
    $this->load->view('layouts/head');
    $this->load->view('layouts/aside');
    $this->load->view('layouts/raside');
    $this->load->view("reservas/listado", $data);
    $this->load->view("layouts/footer");
  }

  public function carga()
  {

    $data = array(
      'empresas' => $this->Reserva_model->getEmpresas(),
      'paquetes' => $this->Reserva_model->getPaquetes(),

    );

    $this->load->view('layouts/head');
    $this->load->view('layouts/aside');
    $this->load->view('layouts/raside');
    $this->load->view("reservas/cargar", $data);
    $this->load->view("layouts/footer");
  }

  public function guardar()
  {
    $empresa = $this->input->post("empresa1");
    $paquete = $this->input->post("paquete1");
    $fecha = $this->input->post("ffecha");
    $cantidad_pasajeros = $this->input->post("pasajeross");

    $data = array(
      'id_empresa' => $empresa,
      'id_paquete' => $paquete,
      'fecha' => $fecha,
      'cantidad_pasajeros' => $cantidad_pasajeros,
      'estado' => "1",

    );

    if ($this->Reserva_model->save($data)) {
      redirect(base_url() . "reservas");
    } else {
      $this->session->set_flashdata("error", "No se pudo guardar la informacion");
      redirect(base_url() . "reservas/main/cargar");
    }
  }

  public function editar($id)
  {

    $data = array(
      'empresas' => $this->Reserva_model->getEmpresas(),
      'paquetes' => $this->Reserva_model->getPaquetes(),
      'reserva' => $this->Reserva_model->getReserva($id),
    );

    $this->load->view('layouts/head');
    $this->load->view('layouts/aside');
    $this->load->view('layouts/raside');
    $this->load->view("reservas/editar", $data);
    $this->load->view("layouts/footer");
  }

  public function actualizar()
  {

    $idReserva = $this->input->post("idReserva");
    $empresa = $this->input->post("empresa");
    $paquete = $this->input->post("paquete");
    $fecha = $this->input->post("fecha");
    $cantidad_pasajeros = $this->input->post("pasajeros");

    $data = array(
      'id_empresa' => $empresa,
      'id_paquete' => $paquete,
      'fecha' => $fecha,
      'cantidad_pasajeros' => $cantidad_pasajeros,
    );
    if ($this->Reserva_model->update($idReserva, $data)) {
      redirect(base_url() . "reservas");
    } else {
      $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
      redirect(base_url() . "reservas/main/editar/" . $idReserva);
    }
  }

  public function actualizar1()
  {

    if ($this->input->post('id'))

      $data = array(
        'fecha' => $this->input->post('start'),

      );
    if ($this->Reserva_model->update($this->input->post('id'), $data)) {
      redirect(base_url() . "reservas");
    } else {
      $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
      redirect(base_url() . "reservas/main/editar/" . $this->input->post('id'));
    }
  }

  public function update()
  {

    if ($this->input->post('empresa'))
      $idEmpresa = $this->Reserva_model->idEmpresa($this->input->post('empresa'));
    $idPaquete = $this->Reserva_model->idPaquete($this->input->post('paquete'));
    $idReserva = $this->input->post("idReserva");
    $empresa = $idEmpresa->id;
    $paquete = $idPaquete->id;
    $fecha = $this->input->post("fecha");
    $cantidad_pasajeros = $this->input->post("pasajeros");


    $data = array(
      'id_empresa' => $empresa,
      'id_paquete' => $paquete,
      'fecha' => $fecha,
      'cantidad_pasajeros' => $cantidad_pasajeros,
    );

    if ($this->Reserva_model->update($idReserva, $data)) {
      redirect(base_url() . "reservas");
    } else {
      $this->session->set_flashdata("error", "No se pudo actualizar la informacion");
      redirect(base_url() . "reservas/main/editar/" . $idReserva);
    }
  }


  public function eliminar()
  {
    $id = $this->input->post('id');
    $data = array(
      'estado' => "0",
      'cancelada' => "1",
    );
    $this->Reserva_model->update($id, $data);
    redirect(base_url() . "reservas");
  }
  public function cargar()
  {
    $r = $this->Reserva_model->getReservas();
    echo json_encode($r);
  }
}
