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

	public function view_new_event(){
		$this->load->view("forms/form_create_event");
	}

	/* redirect to edit_view */
	public function edit_view($event_id){
		if(!$event_id){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('couple');
		}else{
			$this->load->model("event_model");
			$datos=array();
			$datos["event"]=$this->event_model->get_by_id($event_id);
			$this->load->view("edits/event",$datos);
		}
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

	public function get_by_couple($couple_id=false){
		
		if(!$couple_id){
			redirect('home');
		}else{
			$this->load->model("event_model");
			$datos["event_x_couple"]=$this->event_model->get_by_couple($couple_id);
			$this->load->view('event_x_couple',$datos);
		}
	}
	

	public function create_event(){


		$this->form_validation->set_rules('location', 'Location', 'required|trim|strtolower');
        $this->form_validation->set_rules('direction_street', 'Direction_street', 'required|trim|strtolower');
		$this->form_validation->set_rules('direction_number', 'Direction_number', 'required|is_natural');
		$this->form_validation->set_rules('location_id', 'Location_id', 'required|is_natural');
		$this->form_validation->set_rules('name_event', 'Name_event', 'required|trim');
		$this->form_validation->set_rules('date_event', 'Date_event', 'required|callback_valid_datetime');

		if($this->form_validation->run()===false){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect("couple/view_couple_events");
			
		}else{

		$this->load->model('event_model');
		$couple_id=$this->session->userdata("pareja_id");
		$location=$this->input->post("location");
		$direction_street=$this->input->post("direction_street");
		$direction_number=$this->input->post("direction_number");
		$location_id=$this->input->post("location_id");
		$name_event=$this->input->post("name_event");
		$date_time=$this->input->post("date_event");
		$this->event_model->create_event($couple_id,$location,$direction_street,$direction_number,$location_id,$name_event,$date_time);
		redirect("couple/view_couple_events");
		}
	}

	public function valid_datetime($str) {
		// Define el formato de fecha y hora que estás esperando
		$formato = 'Y-m-d H:i:s';
		// Intenta analizar la fecha y hora utilizando el formato especificado
		$fecha_hora = DateTime::createFromFormat($formato, $str);

		// Verifica si la fecha y hora se analizó correctamente y coincide con el formato
		if ($fecha_hora && $fecha_hora->format($formato) == $str) {
			return true; // La fecha y hora es válida
		} else {
			return false; // La fecha y hora no es válida
		}
	}

	public function edit ($event_id){
		$this->form_validation->set_rules('location', 'Location', 'trim|strtolower');
        $this->form_validation->set_rules('direction_street', 'Direction_street', 'trim|strtolower');
		$this->form_validation->set_rules('direction_number', 'Direction_number', 'is_natural');
		$this->form_validation->set_rules('location_id', 'Location_id', 'is_natural');
		$this->form_validation->set_rules('name_event', 'Name_event', 'trim');
		$this->form_validation->set_rules('date_event', 'Date_event', 'callback_valid_datetime');

		if($this->form_validation->run()===false){

			$this->edit_view($event_id);
			
		}else{

			$location=set_value("location");
			$direction_street=set_value("direction_street");
			$direction_number=set_value("direction_number");
			$location_id=set_value("location_id");
			$name_event=set_value("name_event");
			$date_event=set_value("date_event");

			if($location){
				$this->session->set_flashdata('OP','PASS');
				$this->update_event_location($event_id,$location);
			}

			if($direction_street){
				$this->session->set_flashdata('OP','PASS');
				$this->update_event_direction_street($event_id,$direction_street);
			}

			if($direction_number){
				$this->update_event_direction_number($event_id,$direction_number);
			}

			if($location_id){
				$this->update_event_localities($event_id,$location_id);
			}

			if($name_event){
				$this->update_event_name($event_id,$name_event);
			}

			if($date_event){
				$this->update_event_date_time($event_id,$date_event);
			}

				redirect("event/edit_view/".$event_id);
		}

	}

/* 	
	edita la pareja a la que pertenece un evento (fue comentado por innecesario)
	public function update_event_couple(){
        $this->load->model("event_model");
		$event_id=$this->input->post("event_id");
		$couple_id=$this->input->post("pareja_id");
		$this->event_model->update_event_couple($event_id,$couple_id);
		redirect("home/index");
    } */

	public function update_event_location($event_id=null,$location=null){

		if(!$event_id){
			redirect("couple");
		}else{
			$this->load->model("event_model");
			$this->event_model->update_event_location($event_id,$location);
			$datos=array();
			$datos["event"]=$this->event_model->get_by_id($event_id);
			$this->load->view("edits/event",$datos);
		}
    }

	public function update_event_direction_street($event_id=null,$direction_street=null){

		if(!$event_id){
			redirect("couple");
		}else{
			$this->load->model("event_model");
			$this->event_model->update_event_name_street($event_id,$direction_street);
			$datos=array();
			$datos["event"]=$this->event_model->get_by_id($event_id);
			$this->load->view("edits/event",$datos);
		}
    }

	public function update_event_direction_number($event_id=null,$direction_number=null){
        if(!$event_id){
			redirect("couple");
		}else{
			$this->load->model("event_model");
			$this->event_model->update_event_number_street($event_id,$direction_number);
			$datos=array();
			$datos["event"]=$this->event_model->get_by_id($event_id);
			$this->load->view("edits/event",$datos);
		}
    }

	public function update_event_localities($event_id=null,$location_id=null){
        $this->load->model("event_model");
		$this->event_model->update_event_localities($event_id,$location_id);
		$datos=array();
		$datos["event"]=$this->event_model->get_by_id($event_id);
		$this->load->view("edits/event",$datos);
    }

	public function update_event_name($event_id=null,$name_event=null){
		if(!$event_id){
			redirect("couple");
		}else{
			$this->load->model("event_model");
			$this->event_model->update_event_name($event_id=null,$name_event=null);
			$datos=array();
			$datos["event"]=$this->event_model->get_by_id($event_id);
			$this->load->view("edits/event",$datos);
		}
    }

	public function update_event_date_time($event_id=null,$date_event=null){
		if(!$event_id){
			redirect("couple");
		}else{
			$this->load->model("event_model");
			$this->event_model->update_event_date_time($event_id,$date_event);
			$datos=array();
			$datos["event"]=$this->event_model->get_by_id($event_id);
			$this->load->view("edits/event",$datos);
		}
    }

	public function delete_event($event_id=null){
		$event_id=intval($event_id);
		if($event_id>0){
			$this->load->model("event_model");
			$this->event_model->delete_event($event_id);
		}
		redirect("couple");
	}

	public function event_finish($event_id=null){
		$event_id=intval($event_id,);
		if($event_id>0){
			$this->load->model("event_model");
			$this->event_model->update_event_status($event_id, EVENTOS_FINALIZADO);
		}
		redirect("couple");
	}

	public function event_active($event_id=null){
		$event_id=intval($event_id,);
		if($event_id>0){
			$this->load->model("event_model");
			$this->event_model->update_event_status($event_id, EVENTOS_ACTIVO);
		}
		redirect("couple");
	}


}

    ?>