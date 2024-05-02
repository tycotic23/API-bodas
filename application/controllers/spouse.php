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

	public function update_spouse_name(){
        $this->load->model("spouse_model");
		$spouse_id=$this->input->post("spouse_id");
		$name=$this->input->post("name");
		$this->spouse_model->update_spouse_name($spouse_id,$name);
		redirect("home/index");
    }

	public function update_spouse_surname(){
		$this->load->model("spouse_model");
		$spouse_id=$this->input->post("spouse_id");
		$surname=$this->input->post("surname");
		$this->spouse_model->update_spouse_surname($spouse_id,$surname);
		redirect("home/index");
	}        

	public function update_spouse_birthdate(){
        $this->load->model("spouse_model");
		$spouse_id=$this->input->post("spouse_id");
		$birthdate=$this->input->post("birthdate");
		$this->spouse_model->update_spouse_birthdate($spouse_id,$birthdate);
		redirect("home/index");
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