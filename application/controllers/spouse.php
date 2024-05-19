<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Spouse extends CI_Controller {
		/*conyugues*/ 
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}
			/* pensar como ingresar el spouse_id */
	public function edit_view($spouse_id=null){
		if(!$spouse_id){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('couple');
		}else{
			$this->load->model("spouse_model");
			$datos=array();
			$datos["spouse"]=$this->spouse_model->get_by_id($spouse_id);
			$this->load->view("edits/spouse",$datos);
		}
	}

	public function create_spouse(){
		$name=$this->input->post("name");
		$surname=$this->input->post("surname");
		$birthdate=$this->input->post("birthdate");
		$this->load->model('spouse_model');
        $this->spouse_model->create_spouse($name,$surname,$birthdate);
        redirect("home/index");
	}

	public function list_spouse (){
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
			}else{
			$this->load->model("spouse_model"); 
			$datos=array();
			$datos["spouse"]=$this->spouse_model->list_spouse();
			$datos["total"]=count($datos["spouse"]);
			$this->load->view("lists/list_spouse",$datos); 
    }
}


	public function valid_datetime($str) {
		// Define el formato de fecha y hora que estás esperando
		$formato = 'Y-m-d';
		// Intenta analizar la fecha y hora utilizando el formato especificado
		$fecha_hora = DateTime::createFromFormat($formato, $str);

		// Verifica si la fecha y hora se analizó correctamente y coincide con el formato
		if ($fecha_hora && $fecha_hora->format($formato) == $str) {
			return true; // La fecha y hora es válida
		} else {
			return false; // La fecha y hora no es válida
		}
	}
		/* pensar como ingresar el spouse_id */
	public function edit ($spouse_id){
			
		$this->form_validation->set_rules('name', 'Name', 'alpha_numeric|trim');
		$this->form_validation->set_rules('surname', 'Surname', 'alpha_numeric|trim');
		$this->form_validation->set_rules('birthdate', 'Birthdate', 'callback_valid_datetime');

		if($this->form_validation->run()===false){

			redirect("couple");
			
		}else{

			$name=set_value("name");
			$surname=set_value("surname");
			$birthdate=set_value("birthdate");

			if($name){
				$this->session->set_flashdata('OP','PASS');
				$this->update_spouse_name($spouse_id,$name);
			}

			if($surname){
				$this->session->set_flashdata('OP','PASS');
				$this->update_spouse_surname($spouse_id,$surname);
			}

			if($birthdate){
				$this->session->set_flashdata('OP','PASS');
				$this->update_spouse_birthdate($spouse_id,$birthdate);
				redirect("home");
			}

				redirect("couple");
		}

	}

	public function update_spouse_name($spouse_id,$name){
        $this->load->model("spouse_model");
		$this->spouse_model->update_spouse_name($spouse_id,$name);
		redirect("couple");
    }

	public function update_spouse_surname($spouse_id,$surname){
		$this->load->model("spouse_model");
		$this->spouse_model->update_spouse_surname($spouse_id,$surname);
		redirect("couple");
	}        

	public function update_spouse_birthdate($spouse_id,$birthdate){
        $this->load->model("spouse_model");
		$this->spouse_model->update_spouse_birthdate($spouse_id,$birthdate);
		redirect("couple");
    }

	public function delete_spouse($spouse_id=null){
		$spouse_id=intval($id);
		if($spouse_id>0){
			$this->load->model("spouse_model");
			$this->spouse_model->delete_spouse($spouse_id);
		}
		redirect("home/index");
	}

    
}
    ?>