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

	public function create_spouse($name="",$surname="",$birthdate=""){
		$this->load->model('spouse_model');
        $this->spouse_model->create_spouse($name,$surname,$birthdate);
        redirect("home/index");
	}

	public function update_spouse_name($spouse_id,$name){
        $this->load->model("spouse_model");
		$this->spouse_model->update_spouse_name($spouse_id,$name);
		redirect("home/index")
    }

	public function update_spouse_surname($spouse_id,$surname){
		$this->load->model("spouse_model");
		$this->spouse_model->update_spouse_surname($spouse_id,$surname);
		redirect("home/index")
	}        

	public function update_spouse_birthdate($spouse_id,$birthdate){
        $this->load->model("spouse_model");
		$this->spouse_model->update_spouse_birthdate($spouse_id,$birthdate);
		redirect("home/index")
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