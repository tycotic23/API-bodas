<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Localities extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}

	public function create_localitie(){
		$this->load->model('Localities_model');
		$localitie=$this->input->post("localitie");
		$postal_code=$this->input->post("postal_code");
			if(!($this->Localities_model->check_postal_code($postal_code))){
			$this->localitie_model->create_localitie($localitie,$postal_code);
			}
				redirect("home");
	}

	public function list_localities (){
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
			}else{
			$this->load->model("Localities_model"); 
			$datos=array();
			$datos["localities"]=$this->Localities_model->list_localities();
			$datos["total"]=count($datos["localities"]);
			$this->load->view("lists/list_localities",$datos); 
    }
}

	public function update_localitie_localitie(){
        $this->load->model("localitie_model");
		$localitie_id=$this->input->post("localitie_id");
		$localitie=$this->input->post("localitie");
		$this->localitie_model->update_localitie_localitie($localitie_id,$localitie);
		redirect("home/index");
    }

	public function update_localitie_postal_code(){
        $this->load->model("localitie_model");
		$localitie_id=$this->input->post("localitie");
		$postal_code=$this->input->post("postal_code");
		$this->localitie_model->update_localitie_postal_code($localitie_id,$postal_code);
		redirect("home/index");
    }

	public function delete_localitie($localitie_id=null){
		$localitie_id=intval($localitie_id);
		if($localitie_id>0){
			$this->load->model("Localities_model");
			$this->Localities_model->delete_localitie($localitie_id);
		}
		redirect("home/index");
	}
}
?>
