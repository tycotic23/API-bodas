<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class guest_x_events extends CI_Controller {


	/* public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	} */

    public function index(){
    redirect("guest/load_view");
    }

    public function add_guest_to_event_view(){

        $couple_id=$this->session->userdata("pareja_id");
        
        if($couple_id){
            $datos=array();
            $this->load->model('guest_model');
            $this->load->model('event_model');
            $datos["guest"]=$this->guest_model->get_by_couple($couple_id);
            $datos["event"]=$this->event_model->get_by_couple($couple_id);
            $this->load->view("forms/form_add_guest_to_event",$datos);

        }else{
            redirect("couple");
        }

    }

    public function get_guest_by_event($event_id=null){
        $this->load->model("Guest_x_event_model");
        $datos=array();
        $datos["invitados_x_evento"]=$this->Guest_x_event_model->get_by_event($event_id);
        $datos["total"]=count($datos["invitados_x_evento"]);
        $this->load->view("guests_in_event",$datos);
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
                    $this->get_by_guest($datos_guest["invitado_id"]);

                }else{
                    redirect("guest/load_view");
                }
            }
        }
    }

    public function create_guest_x_events($event_id=null,$guest_id=null){
            
            $this->form_validation->set_rules('event_id', 'Event_id', 'required|trim|is_natural');
            $this->form_validation->set_rules('guest_id', 'Guest_id', 'required|trim|is_natural');
    
            if($this->form_validation->run()===false){
                $this->session->set_flashdata('OP','PROHIBIDO');
                redirect("home");
                
            }else{
                $event_id=$this->input->post("event_id");
		        $guest_id=$this->input->post("guest_id");
                $this->load->model("Guest_x_event_model");
                $this->Guest_x_event_model->create_guest_x_event($event_id,$guest_id);
                redirect("couple");
            }
    }



    public function get_by_guest($guest_id=null){

                if(!$guest_id){
                    redirect('guest/load_view');
                }else{
                    $datos=array();
                    $this->load->model("Guest_x_event_model");
                    $datos["invitados_x_evento"]=$this->Guest_x_event_model->get_by_guest($guest_id);
                    $datos["total"]=count($datos["invitados_x_evento"]);
                    $this->load->view('guest_x_event',$datos);
                }
            }

    public function load_view_guest_confirm ($guest_x_event_id=null){
        $this->load->model("Guest_x_event_model");
        $datos=array();
        $datos["guest_x_event"]=$this->Guest_x_event_model->get_by_id($guest_x_event_id);
        $this->load->view("edits/guest_x_event",$datos);
        }

    public function event_confirm($guest_x_event_id=null){

        $this->form_validation->set_rules('coments', 'Coments', 'trim|strtolower|required');
        $this->form_validation->set_rules('attached', 'Attached', 'is_natural|required');

        if($this->form_validation->run()===false){

			$this->load_view_guest_confirm($guest_x_event_id);
			
		}else{
            $this->load->model("Guest_x_event_model");
            $coments=set_value("coments");
			$attached=set_value("attached");
            $this->Guest_x_event_model->update_coments_guest_x_event($guest_x_event_id,$coments);
            $this->Guest_x_event_model->update_attached_guest_x_event($guest_x_event_id,$attached);    
            $this->Guest_x_event_model->update_status_guest_x_event($guest_x_event_id,CONFIRMAR_ASISTENCIA);
            $this->session->set_flashdata('OP','CONFIRM');

            $this->get_by_guest($guest_x_event_id);

        }
        
    }

    public function event_disconfirm($guest_x_event_id=null){
        $this->load->model("Guest_x_event_model");
        $this->Guest_x_event_model->update_status_guest_x_event($guest_x_event_id,DESCONFIRMAR_ASISTENCIA);
        $this->session->set_flashdata('OP','DISCONFIRM');

        $this->get_by_guest($guest_x_event_id);
    }

    public function delete_guest_x_event($guest_x_event_id=null){
		$guest_x_event_id=intval($guest_x_event_id);
		if($guest_x_event_id>0){
			$this->load->model("Guest_x_event_model");
			$this->Guest_x_event_model->delete_guest_x_event($guest_x_event_id);
		}
		redirect("couple");
	}

}


    ?>
