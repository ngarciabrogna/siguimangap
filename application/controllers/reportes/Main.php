<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    private $permisosA;
    public function __construct()

    {
        parent::__construct();
        $this->permisosA= $this->backend_lib->control();
        $this->load->model("Reporte_model");
        $this->load->model("Empleado_model");

        if (!$this->session->userdata('login')) {
			redirect(base_url());
		}
    }
    public function index()
    {
        $data = array(
            'years' => $this->Reporte_model->years(),
          
        );
		$idemp =  $this->session->userdata("id_empleado");
		$data2 = array(

			'empleado' => $this->Empleado_model->getEmpleado($idemp),
		);

		$this->load->view('layouts/head', $data2); //cabecera 
		$this->load->view('layouts/aside', $data2); //menu lateral 
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/desempeno',$data);
        $this->load->view('layouts/footer');
    }
    public function empresasConcretas()
    {
        $data = array(
            'years' => $this->Reporte_model->years(),
          
        );
        $idemp =  $this->session->userdata("id_empleado");
		$data2 = array(

			'empleado' => $this->Empleado_model->getEmpleado($idemp),
		);

		$this->load->view('layouts/head', $data2); //cabecera 
		$this->load->view('layouts/aside', $data2); //menu lateral 
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/empresasConcretas',$data);
        $this->load->view('layouts/footer');
    }
    public function getData()
    {
        $year1= $this->input->post("year1");
        $resultados= $this->Reporte_model->cantidades($year1);
        echo json_encode($resultados);
    }
    public function indexAnio()
    {
        
        $idemp =  $this->session->userdata("id_empleado");
		$data2 = array(

			'empleado' => $this->Empleado_model->getEmpleado($idemp),
		);

		$this->load->view('layouts/head', $data2); //cabecera 
		$this->load->view('layouts/aside', $data2); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/desempenoAnio');
        $this->load->view('layouts/footer');
    }
    public function getDataAnio()
    {
      
        $resultadosAnio= $this->Reporte_model->cantidadesAnio();
        echo json_encode($resultadosAnio);
    }
    public function indexDia()
    {
        $data = array(
            'years' => $this->Reporte_model->years(),
            'meses' => $this->Reporte_model->meses(),
          
        );
		$idemp =  $this->session->userdata("id_empleado");
		$data2 = array(

			'empleado' => $this->Empleado_model->getEmpleado($idemp),
		);

		$this->load->view('layouts/head', $data2); //cabecera 
		$this->load->view('layouts/aside', $data2); //menu lateral 
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/desempenoDia',$data);
        $this->load->view('layouts/footer');
    }
    public function getDataDia()
    {
        $yy= $this->input->post("ye1"); 
        $mm= $this->input->post("mes1");
        $resultadosDia= $this->Reporte_model->cantidadesDias($yy,$mm);
        echo json_encode($resultadosDia);
      

    }
    public function tabla1()
    {
        

        if ($this->input->post("fecha1")!="") {
            $inicio =$this->input->post("fecha1");
            $fin=$this->input->post("fecha2");
            $data = array(
                'reservas' => $this->Reporte_model->reservasCompletadasFecha($inicio,$fin),
                
              
            );
            $idemp =  $this->session->userdata("id_empleado");
            $data2 = array(
    
                'empleado' => $this->Empleado_model->getEmpleado($idemp),
            );
    
            $this->load->view('layouts/head', $data2); //cabecera 
            $this->load->view('layouts/aside', $data2); //menu lateral
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/desempenoTabla',$data);
            $this->load->view('layouts/footer');
        } else {
            $data = array(
                'reservas' => $this->Reporte_model->reservasCompletadas(),
                
              
            );
            $idemp =  $this->session->userdata("id_empleado");
            $data2 = array(
    
                'empleado' => $this->Empleado_model->getEmpleado($idemp),
            );
    
            $this->load->view('layouts/head', $data2); //cabecera 
            $this->load->view('layouts/aside', $data2); //menu lateral
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/desempenoTabla',$data);
            $this->load->view('layouts/footer');
        }
        
    }

    public function tabla2()
    {
        

        if ($this->input->post("fecha1")!="") {
            $inicio =$this->input->post("fecha1");
            $fin=$this->input->post("fecha2");
            $data = array(
                'reservasCanceladas' => $this->Reporte_model->reservasCanceladasTablaFecha($inicio,$fin),
                
              
            );
            $idemp =  $this->session->userdata("id_empleado");
            $data2 = array(
    
                'empleado' => $this->Empleado_model->getEmpleado($idemp),
            );
    
            $this->load->view('layouts/head', $data2); //cabecera 
            $this->load->view('layouts/aside', $data2); //menu lateral
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/canceladaTabla',$data);
            $this->load->view('layouts/footer');
        } else {
            $data = array(
                'reservasCanceladas' => $this->Reporte_model->reservasCanceladasTabla(),
                
              
            );
        $this->load->view('layouts/head'); //cabecera 
            $this->load->view('layouts/aside'); //menu lateral 
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/canceladaTabla',$data);
            $this->load->view('layouts/footer');
        }
        
    }
    public function tabla3()
    {
        

        if ($this->input->post("fecha1")!="") {
            $inicio =$this->input->post("fecha1");
            $fin=$this->input->post("fecha2");
            $data = array(
                'pasajeros' => $this->Reporte_model->pasajerosTablaFecha($inicio,$fin),
                
              
            );
        $this->load->view('layouts/head'); //cabecera 
            $this->load->view('layouts/aside'); //menu lateral 
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/pasajerosTabla',$data);
            $this->load->view('layouts/footer');
        } else {
            $data = array(
                'pasajeros' => $this->Reporte_model->pasajerosTabla(),
                
              
            );
            $idemp =  $this->session->userdata("id_empleado");
            $data2 = array(
    
                'empleado' => $this->Empleado_model->getEmpleado($idemp),
            );
    
            $this->load->view('layouts/head', $data2); //cabecera 
            $this->load->view('layouts/aside', $data2); //menu lateral
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/pasajerosTabla',$data);
            $this->load->view('layouts/footer');
        }
        
    }
    public function tabla4()
    {
        

        if ($this->input->post("fecha1")!="") {
            $inicio =$this->input->post("fecha1");
            $fin=$this->input->post("fecha2");
            $data = array(
                'empresas' => $this->Reporte_model->empresasTablaFecha($inicio,$fin),
                
              
            );
            $idemp =  $this->session->userdata("id_empleado");
            $data2 = array(
    
                'empleado' => $this->Empleado_model->getEmpleado($idemp),
            );
    
            $this->load->view('layouts/head', $data2); //cabecera 
            $this->load->view('layouts/aside', $data2); //menu lateral
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/empresasTabla',$data);
            $this->load->view('layouts/footer');
        } else {
            $data = array(
                'empresas' => $this->Reporte_model->empresasTabla(),
                
              
            );
            $idemp =  $this->session->userdata("id_empleado");
            $data2 = array(
    
                'empleado' => $this->Empleado_model->getEmpleado($idemp),
            );
    
            $this->load->view('layouts/head', $data2); //cabecera 
            $this->load->view('layouts/aside', $data2); //menu lateral
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/empresasTabla',$data);
            $this->load->view('layouts/footer');
        }
        
    }

    public function tabla5()
    {
        

        if ($this->input->post("fecha1")!="") {
            $inicio =$this->input->post("fecha1");
            $fin=$this->input->post("fecha2");
            $data = array(
                'empresas' => $this->Reporte_model->empresasReservasConcretasTablaFecha($inicio,$fin),
                
              
            );
        $this->load->view('layouts/head'); //cabecera 
            $this->load->view('layouts/aside'); //menu lateral 
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/empresasConcretasTabla',$data);
            $this->load->view('layouts/footer');
        } else {
            $data = array(
                'empresas' => $this->Reporte_model->empresasReservasConcretasTabla(),
                
              
            );
        $this->load->view('layouts/head'); //cabecera 
            $this->load->view('layouts/aside'); //menu lateral 
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/empresasConcretasTabla',$data);
            $this->load->view('layouts/footer');
        }
        
    }

    public function tabla6()
    {
        

        if ($this->input->post("fecha1")!="") {
            $inicio =$this->input->post("fecha1");
            $fin=$this->input->post("fecha2");
            $data = array(
                'empresas' => $this->Reporte_model->empresasReservasCanceladasTablaFecha($inicio,$fin),
                
              
            );
            $idemp =  $this->session->userdata("id_empleado");
            $data2 = array(
    
                'empleado' => $this->Empleado_model->getEmpleado($idemp),
            );
    
            $this->load->view('layouts/head', $data2); //cabecera 
            $this->load->view('layouts/aside', $data2); //menu lateral
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/empresasCanceladasTabla',$data);
            $this->load->view('layouts/footer');
        } else {
            $data = array(
                'empresas' => $this->Reporte_model->empresasReservasCanceladasTabla(),
                
              
            );
       
    
            $this->load->view('layouts/head'); //cabecera 
            $this->load->view('layouts/aside'); //menu lateral 
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/empresasCanceladasTabla',$data);
            $this->load->view('layouts/footer');
        }
        
    }

    public function tabla7()
    {
        

        if ($this->input->post("fecha1")!="") {
            $inicio =$this->input->post("fecha1");
            $fin=$this->input->post("fecha2");
            $data = array(
                'coordinadores' => $this->Reporte_model->coordinadoresGrupoTablaFecha($inicio,$fin),
                
              
            );
     
    
            $this->load->view('layouts/head'); //cabecera 
            $this->load->view('layouts/aside'); //menu lateral
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/coordinadoresTabla',$data);
            $this->load->view('layouts/footer');
        } else {
            $data = array(
                'coordinadores' => $this->Reporte_model->coordinadoresGrupoTabla(),
                
              
            );
  
    
            $this->load->view('layouts/head'); //cabecera 
            $this->load->view('layouts/aside'); //menu lateral
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/coordinadoresTabla',$data);
            $this->load->view('layouts/footer');
        }
        
    }

    //////
    public function tabla8()
    {
        

        if ($this->input->post("fecha1")!="") {
            $inicio =$this->input->post("fecha1");
            $fin=$this->input->post("fecha2");
            $data = array(
                'paquetes' => $this->Reporte_model->paquetesTablaFecha($inicio,$fin),
                
              
            );
 
   
    
            $this->load->view('layouts/head'); //cabecera 
            $this->load->view('layouts/aside'); //menu lateral
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/paquetesTabla',$data);
            $this->load->view('layouts/footer');
        } else {
            $data = array(
                'paquetes' => $this->Reporte_model->paquetesTabla(),
                
              
            );
     
    
            $this->load->view('layouts/head'); //cabecera 
            $this->load->view('layouts/aside'); //menu lateral
            $this->load->view('layouts/raside');   
            $this->load->view('reportes/paquetesTabla',$data);
            $this->load->view('layouts/footer');
        }
        
    }
    public function pasajeros()
    {
        $data = array(
            'years' => $this->Reporte_model->yearsPasajeros(),
          
        );
		$idemp =  $this->session->userdata("id_empleado");
	

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/pasajeros',$data);
        $this->load->view('layouts/footer');
    }
    public function getDataPasajeros()
    {
        $yearPasajero= $this->input->post("yearPasajero");
        $resultadosp= $this->Reporte_model->cantidadesPasajeros($yearPasajero);
        echo json_encode($resultadosp);
    }
    public function pasajerosDia()
    {
        $data = array(
            'years' => $this->Reporte_model->yearsPasajeros(),
            'meses' => $this->Reporte_model->mesesPasajeros(),
          
        );


		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/pasajerosDia',$data);
        $this->load->view('layouts/footer');
    }
    public function getDataPasajerosDia()               
    {
        $yPasajero= $this->input->post("yPasajero1");
        $mPasajero= $this->input->post("mPasajero1");
        $resultadosPD= $this->Reporte_model->cantidadesPasajerosDias($yPasajero,$mPasajero);
        echo json_encode($resultadosPD); 
    }

    public function empresasGrupos()
    {
        $data = array(
            'years' => $this->Reporte_model->yearsPasajeros(),

          
        );
		$idemp =  $this->session->userdata("id_empleado");
	

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/empresasGrupos',$data);
        $this->load->view('layouts/footer');
    }

    public function getDataEmpresasGrupos()               
    {
        $y= $this->input->post("yearPasajero");
        $resultadosPD= $this->Reporte_model->empresasGruposReporte($y);
        echo json_encode($resultadosPD); 
    }

    public function paquete()
    {
        $data = array(
            'years' => $this->Reporte_model->years(),

          
        );


		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/paquetes',$data);
        $this->load->view('layouts/footer');
    }
    public function getDataPaquetes()               
    {
        $y= $this->input->post("year2");
        $resultadosPD= $this->Reporte_model->paquetes($y);
        echo json_encode($resultadosPD); 
    }

    public function empresas()
    {
        $data = array(
            'years' => $this->Reporte_model->yearsPasajeros(),
          
        );
		

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/empresas',$data);
        $this->load->view('layouts/footer');
    }

    public function getDataEmpresas()
    {
        $y= $this->input->post("yearPasajero");
        $resultadose= $this->Reporte_model->empresasGrupos($y);
        echo json_encode($resultadose);
    }

    public function getDataEmpresasConcretas()
    {
        $y= $this->input->post("yearPasajero");
        $resultadose= $this->Reporte_model->empresasReservasConcretas($y);
        echo json_encode($resultadose);
    }

    public function canceladas()
    {
        $data = array(
            'yearsCancel' => $this->Reporte_model->yearsCanceladas(),
            
        );
   
		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/reservas_canceladas',$data);
        $this->load->view('layouts/footer');
    }
    public function empresasCanceladas()
    {
        $data = array(
            'yearsCancel' => $this->Reporte_model->yearsCanceladas(),
            
        );
       

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/empresasCanceladas',$data);
        $this->load->view('layouts/footer');
    }
    public function getCanceladas()
    {
        $yCancelada= $this->input->post("yearCanceladas");
        $resultados= $this->Reporte_model->reservasCanceladas($yCancelada);
        echo json_encode($resultados);
    }
    public function getEmpresasCanceladas()
    {
        $y= $this->input->post("yearCanceladas");
        $resultados= $this->Reporte_model->empresasReservasCanceladas($y);
        echo json_encode($resultados);
    }
    public function getCoordinadores()
    {
        $y= $this->input->post("yearPasajero");
        $resultados= $this->Reporte_model->coordinadoresGrupo($y);
        echo json_encode($resultados);
    }

    public function coordinadoresGrupos()
    {
        $data = array(
            'years' => $this->Reporte_model->yearsPasajeros(),
            
        );
 

        $this->load->view('layouts/head'); //cabecera 
        $this->load->view('layouts/aside'); //menu lateral 
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/coordinadoresGrupos',$data);
        $this->load->view('layouts/footer');
    }
    public function canceladasDia()
    {
        $data = array(
            'yearsCancel' => $this->Reporte_model->yearsCanceladas(),
            'mesesCancel' => $this->Reporte_model->mesesCanceladas(),
            
        );
		

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/reservas_canceladas_dia',$data);
        $this->load->view('layouts/footer');
    }
    public function getCanceladasDias()
    {
        $yCc= $this->input->post("yCancel");
        $mCc= $this->input->post("mCancel");
        $resultados= $this->Reporte_model->reservasCanceladasDia($yCc,$mCc);
        echo json_encode($resultados);
    }
    public function canceladasAnio()
    {
        
		

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral 
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/reservas_canceladas_anio');
        $this->load->view('layouts/footer');
    }
    public function getCanceladasAnio()
    {
      
        $resultadosAnio= $this->Reporte_model->reservasCanceladasAnio();
        echo json_encode($resultadosAnio);
    }

    public function pasajerosAnio()
    {
     

		$this->load->view('layouts/head'); //cabecera 
		$this->load->view('layouts/aside'); //menu lateral
		$this->load->view('layouts/raside');   
        $this->load->view('reportes/pasajerosAnio');
        $this->load->view('layouts/footer');
    }
    public function getDataPasajerosAnio()
    {
       
        $resultadosp= $this->Reporte_model->cantidadesPasajerosAnio();
        echo json_encode($resultadosp);
    }
}
