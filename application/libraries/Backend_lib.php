<?php 

class backend_lib {
    private $CI;
    public function __construct(){
        $this->CI= & get_instance();
    }
    public function control(){
        if (!$this->CI->session->userdata("login")) {

            redirect(base_url());
        }
        $url =$this->CI->uri->segment(1);
        if ($this->CI->uri->segment(2)) {
            $url = $this->CI->uri->segment(1)."/".$this->CI->uri->segment(2);
        }
        $infomenu =$this->CI->Backend_modal->getID($url);
        $permisosA= $this->CI->Backend_modal->getPermisos($infomenu->id,$this->CI->session->userdata("rol"));

        if ($permisosA->leer==0) {
            redirect(base_url()."forbidden");
        } else {
            return $permisosA;
        }

    }
}





?>