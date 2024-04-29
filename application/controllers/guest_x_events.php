<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class guest_x_events extends CI_Controller {


	/*public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}*/
    
    public function index(){

        {
            $datos=array();
            $this->load->model('guest_model');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('mail', 'Mail', 'required|valid_email');

            if($this->form_validation->run()===false){
                $this->session->set_flashdata("OP","INCORRECT");
                $this->load->view('guest_events',$datos);
                
            }else{
                $email=set_value("mail");
                if($this->guest_model->check_mail($email)){

                    $datos_guest=$this->guest_model->get_by_email($email);
                    $this->session->set_userdata("mail",$datos_guest["invitado_id"]);
                    $this->load->view('guest_events',$datos_guest);

                }else{
                    $this->session->set_flashdata("OP","INEXIST");
                    $this->load->view('guest_events',$datos);
                }
                
            }
        }
    }

    public function event_confirm($event_id){
        $id=$this->session->userdata("invitado_id");
        
    }


}


    ?>