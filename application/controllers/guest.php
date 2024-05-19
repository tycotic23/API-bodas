<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {
	/* public function __construct(){
		 parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}  */

	public function get_by_mail($email=false){
		if(!$email){
			redirect('home');
		}else{
			$this->load->model("guest_model");
			if($this->guest_model->check_mail($email)){
				$datos=array();
				$datos=$this->guest_model->get_id_by_email($email);
				redirect("guest_x_events/get_by_guest/".$datos["invitado_id"]);
			}else{
				redirect('home');
			}
		}
	}

	public function view_create_guest(){

		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}

		$this->load->view("forms/form_create_guest");
	}

	/* redirect to edit_view */
	public function edit_view($guest_id){
		if(!$guest_id){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('couple');
		}else{
			$this->load->model("guest_model");
			$datos=array();
			$datos["guest"]=$this->guest_model->get_by_id($guest_id);
			$this->load->view("edits/guest",$datos);
		}
	}

	public function load_view(){
		$this->load->view("forms/form_guest");
	}



	public function create_guest(){

		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			/* redirect('user/index'); */
		}

		$couple_id=$this->session->userdata("pareja_id");
		$this->form_validation->set_rules('name', 'Name', 'required|trim|strtolower');
        $this->form_validation->set_rules('surname', 'Surname', 'required|trim|strtolower');
		$this->form_validation->set_rules('mail', 'Mail', 'required|valid_email');
		$this->form_validation->set_rules('phone_number', 'Phone_number', 'required|is_natural');
		$this->form_validation->set_rules('attached', 'Attached', 'required|is_natural');

		if($this->form_validation->run()===false){
			$this->session->set_flashdata('OP','PROHIBIDO');
			$couple_id=$this->session->userdata("pareja_id");
			redirect("home");
			$this->get_by_couple($couple_id);
			
		}else{
			$this->load->model('guest_model');
			$name=$this->input->post("name");
			$surname=$this->input->post("surname");
			$email=$this->input->post("mail");
			$phone_number=$this->input->post("phone_number");
			$attached=$this->input->post("attached");
			$couple_id=$this->session->userdata("pareja_id");
				if (!($this->guest_model->check_mail($email))) {
					$this->guest_model->create_guest($name,$surname,$email,$phone_number,$attached,$couple_id);
					$this->get_by_couple($couple_id);
				}else{
					$this->session->set_flashdata("OP","ERROR");
					$couple_id=$this->session->userdata("pareja_id");
					$this->get_by_couple($couple_id);
				}
			}
    }

	public function list_guest (){
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
			}else{
			$this->load->model("guest_model"); 
			$datos=array();
			$datos["guests"]=$this->guest_model->list_guest();
			$datos["total"]=count($datos["guests"]);
			$this->load->view("lists/list_guest",$datos); 
    }
}

	public function get_by_couple($couple_id=false){
			
		if(!$couple_id){
			redirect('home');
		}else{
			$this->load->model("guest_model");
			$datos["guests"]=$this->guest_model->get_by_couple($couple_id);
			$datos["total"]=count($datos["guests"]);
			$this->load->view('lists/list_guest',$datos);
		}
	}

	public function edit ($guest_id){
		$this->form_validation->set_rules('name', 'Name', 'trim|strtolower');
        $this->form_validation->set_rules('surname', 'Surname', 'trim|strtolower');
		$this->form_validation->set_rules('phone_number', 'Phone', 'trim|is_natural');
		$this->form_validation->set_rules('attached', 'Attached', 'trim|is_natural');

		if($this->form_validation->run()===false){

			$this->edit_view($guest_id);
			
		}else{

			$name=set_value("name");
			$surname=set_value("surname");
			$phone_number=set_value("phone_number");
			$attached=set_value("attached");

			if($name){
				$this->update_guest_name($guest_id,$name);
			}

			if($surname){
				$this->update_guest_surname($guest_id,$surname);
			}

			if($phone_number){
				$this->update_guest_phone_number($guest_id,$phone_number);
			}

			if($attached){
				$this->update_guest_attached($guest_id,$location_id);
			}

				redirect("guest/edit_view/".$guest_id);
		}
	}

	public function update_guest_name($guest_id,$name){
		if(!$guest_id){
			redirect("couple");
		}else{
			$this->load->model("guest_model");
			$this->guest_model->update_guest_name($guest_id,$name);
			$this->edit_view($guest_id);
		}
    }

	public function update_guest_surname($guest_id,$surname){
        if(!$guest_id){
			redirect("couple");
		}else{
			$this->load->model("guest_model");
			$this->guest_model->update_guest_surname($guest_id,$surname);
			$this->edit_view($guest_id);
		}
    }

	public function update_guest_phone_number($guest_id,$phone_number){
        if(!$guest_id){
			redirect("couple");
		}else{
			$this->load->model("guest_model");
			$this->guest_model->update_guest_phone_number($guest_id,$phone_number);
			$this->edit_view($guest_id);
		}
    }

	public function update_guest_attached($guest_id,$attached){
        if(!$guest_id){
			redirect("couple");
		}else{
			$this->load->model("guest_model");
			$this->guest_model->update_guest_attached($guest_id,$attached);
			$this->edit_view($guest_id);
		}
    }

	public function update_guest_couple_id(){
        $this->load->model("guest_model");
		$couple_id=$this->input->post("guest_id");
		$couple_id=$this->input->post("couple_id");
		$this->guest_model->update_phone_number_guest($guest_id,$couple_id);
		redirect("home/index");
    }


	public function delete_guest($id=null){
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
		$guest_id=intval($id);
		if($guest_id>0){
			$this->load->model("guest_model");
			$this->guest_model->delete_guest($guest_id);
		}
		$this->get_by_couple($couple_id);
	}


}


    ?>