<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}

	

	public function create_event(){
		$this->load->model('event_model');
		$couple_id=$this->input->post("pareja_id");
		$location=$this->input->post("location");
		$direction_street=$this->input->post("direction_street");
		$direction_number=$this->input->post("direction_number");
		$location_id=$this->input->post("location_id");
		$event_name=$this->input->post("event_name");
		$date_time=$this->input->post("date_time");
		$this->events_model->create_event($couple_id,$location,$direction_street,$direction_number,$location_id,$event_name,$date_time);
		redirect("home");
	}

	public function list_event (){
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
			}else{
			$this->load->model("event_model"); 
			$datos=array();
			$datos["events"]=$this->event_model->list_event();
			$datos["total"]=count($datos["events"]);
			$this->load->view("lists/list_event",$datos); 
    }
}

	public function update_event_couple(){
        $this->load->model("event_model");
		$event_id=$this->input->post("event_id");
		$couple_id=$this->input->post("pareja_id");
		$this->event_model->update_event_couple($event_id,$couple_id);
		redirect("home/index");
    }

	public function update_event_location(){
        $this->load->model("events_model");
		$event_id=$this->input->post("event_id");
		$location=$this->input->post("location");
		$this->event_model->update_event_location($event_id,$location);
		redirect("home/index");
    }

	public function update_event_direction_street(){
        $this->load->model("event_model");
		$event_id=$this->input->post("event_id");
		$direction_street=$this->input->post("direction_street");
		$this->event_model->update_event_direction_street($event_id,$direction_street);
		redirect("home/index");
    }

	public function update_event_direction_number(){
        $this->load->model("events_model");
		$event_id=$this->input->post("event_id");
		$direction_number=$this->input->post("direction_number");
		$this->event_model->update_event_direction_number($event_id,$direction_number);
		redirect("home/index");
    }

	public function update_event_localities(){
        $this->load->model("events_model");
		$event_id=$this->input->post("event_id");
		$location_id=$this->input->post("location_id");
		$this->event_model->update_event_location($event_id,$location_id);
		redirect("home/index");
    }

	public function update_event_name(){
        $this->load->model("even_model");
		$event_id=$this->input->post("event_id");
		$name=$this->input->post("name");
		$this->event_model->update_event_location($event_id,$name);
		redirect("home/index");
    }

	public function update_event_date_time(){
        $this->load->model("event_model");
		$event_id=$this->input->post("event_id");
		$date_time=$this->input->post("date_time");
		$this->event_model->update_event_location($event_id,$date_time);
		redirect("home/index");
    }

	public function delete_event($event_id=null){
		$event_id=intval($event_id);
		if($event_id>0){
			$this->load->model("event_model");
			$this->event_model->delete_event($event_id);
		}
		redirect("home/index");
	}

}

    ?>