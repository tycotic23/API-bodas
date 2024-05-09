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
    redirect("guest/load_view");
    }
    public function get_guest_by_email(){

        {
            $datos=array();
            $this->load->model('guest_model');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('mail', 'Mail', 'required|valid_email');

            if($this->form_validation->run() === False){
                $this->session->set_flashdata("OP","INCORRECT");
                redirect("guest/load_view");
                
            }else{
                $email=set_value("mail");
                if($this->guest_model->check_mail($email)){
                    $datos_guest=$this->guest_model->get_by_email($email);
                    //$this->session->set_userdata('guest_id',$datos_guest["invitado_id"]);
                    $this->session->set_flashdata('OP','APPROVED');
                    $this->get_by_guest($datos_guest["invitado_id"]);

                }else{
                    $this->session->set_flashdata("OP","INEXIST");
                    $this->load->view('lists/list_event',$datos);
                }
            }
        }
    }

    public function get_by_guest($guest_id=false){
        if($this->session->flashdata("OP") === 'APPROVED'){
                if($guest_id === false){
                    redirect('guest/load_view');
                }else{
                    $datos=array();
                    $this->load->model("guest_x_event_model");
                    $datos["invitados_x_evento"]=$this->guest_x_event_model->get_by_guest($guest_id);
                    $datos["total"]=count($datos["invitados_x_evento"]);
                    $this->load->view('guest_x_event',$datos);
                }
            }else{
                redirect("home");
            }
	}

    public function event_confirm($guest_x_event_id){// 0=no dijo nada 1=asiste 2=no asiste
        $this->load->model("guest_x_event_model");
        //$guest_x_event_id=$this->input->post("guest_x_event_id");
        $this->guest_x_event_model->event_confirm($guest_x_event_id);
        redirect("guest_x_events/get_by_guest/1");
    }

    public function event_disconfirm($guest_x_event_id){// 0=no dijo nada 1=asiste 2=no asiste
        $this->load->model("guest_x_event_model");
        //$guest_x_event_id=$this->input->post("guest_x_event_id");
        $this->guest_x_event_model->event_disconfirm($guest_x_event_id);
        redirect("guest_x_events/get_by_guest/1");
    }

    public function delete_guest_x_event($guest_x_event_id=null){
		$guest_x_event_id=intval($guest_x_event_id);
		if($guest_x_event_id>0){
			$this->load->model("guest_x_event_model");
			$this->guest_x_event_model->delete_guest_x_event($guest_x_event_id);
		}
		redirect("guest_x_events/get_by_guest/1");
	}

}


    ?>