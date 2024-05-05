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

    public function get_by_guest($guest_id=false){
		
		if(!$guest_id){
			redirect('home');
		}else{
			$this->load->model("event_x_model");
			$datos["event_x_guest"]=$this->event_x_model->get_by_guest($guest_id);
			$this->load->view('event_x_guest',$datos);
		}
	}

    public function event_x_guest_confirm($guest_x_event_id,$asist){// 0=no dijo nada 1=asiste 2=no asiste
        $this->load_model("guest_x_event");
        $guest_x_event_id=$this->input->post("guest_x_event_id");
        $this->guest_x_event_model->update_asist_guest_x_event_confirm($guest_x_event_id);
        redirect("home/index");
    }

    public function event_x_guest_disconfirm($guest_x_event_id,$asist){// 0=no dijo nada 1=asiste 2=no asiste
        $this->load_model("guest_x_event");
        $guest_x_event_id=$this->input->post("guest_x_event_id");
        $this->guest_x_event_model->update_asist_guest_x_event_confirm($guest_x_event_id);
        redirect("home/index");
    }


}


    ?>