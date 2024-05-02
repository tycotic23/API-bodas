<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guest extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}
    
	public function create_guest(){
        $this->load->model('guest_model');
		$name=$this->input->post("name");
		$surname=$this->input->post("surname");
		$email=$this->input->post("mail");
		$phone_number=$this->input->post("phone_number");
		$attached=$this->input->post("attached");
		$couple_id=$this->input->post("couple_id");
			if (!($this->guest_model->check_mail($email))) {
			$this->guest_model->create_guest($name,$surname,$email,$phone_number,$attached,$couple_id);
			}
				redirect("home/index");
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
			$this->load->view("list_guest",$datos); 
    }
}

	public function update_guest_name(){
        $this->load->model("guest_model");
		$guest_id=$this->input->post("guest_id");
		$name=$this->input->post("name");
		$this->guest_model->update_name_guest($guest_id,$name);
		redirect("home/index");
    }

	public function update_guest_surname(){
        $this->load->model("guest_model");
		$couple_id=$this->input->post("guest_id");
		$surname=$this->input->post("surname");
		$this->guest_model->update_surname_guest($guest_id,$surname);
		redirect("home/index");
    }

	public function update_guest_phone_number(){
        $this->load->model("guest_model");
		$couple_id=$this->input->post("guest_id");
		$phone_number=$this->input->post("phone_number");
		$this->guest_model->update_phone_number_guest($guest_id,$phone_number);
		redirect("home/index");
    }

	public function update_guest_attached(){
        $this->load->model("guest_model");
		$couple_id=$this->input->post("guest_id");
		$attached=$this->input->post("attached");
		$this->guest_model->update_attached_guest($guest_id,$attached);
		redirect("home/index");
    }

	public function update_guest_couple_id(){
        $this->load->model("guest_model");
		$couple_id=$this->input->post("guest_id");
		$couple_id=$this->input->post("couple_id");
		$this->guest_model->update_phone_number_guest($guest_id,$couple_id);
		redirect("home/index");
    }


	public function delete_guest($id=null){
		$guest_id=intval($id);
		if($guest_id>0){
			$this->load->model("guest_model");
			$this->couple_model->delete_guest($guest_id);
		}
		redirect("home/index");
	}


}


    ?>