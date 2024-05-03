<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		/*parejas*/
class Client extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}

	public function create_client(){
        $this->load->model('client_model');
		$couple_id=$this->input->post("couple_id");
		$name=$this->input->post("name");
		$surname=$this->input->post("surname");
		$direction_street=$this->input->post("direction_street");
		$direction_number=$this->input->post("direction_number");
		$localitie_id=$this->input->post("localitie_id");
		$email=$this->input->post("mail");
			if(!($this->client_model->check_mail($mail))){
			$this->client_model->create_client($couple_id,$name,$surname,$direction_street,$direction_number,$localitie_id,$email);
			}
				redirect("home");
    }

	public function list_client (){
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
			}else{
			$this->load->model("client_model"); 
			$datos=array();
			$datos["clients"]=$this->client_model->list_client();
			$datos["total"]=count($datos["clients"]);
			$this->load->view("lists/list_clients",$datos); 
    }
}

	public function update_client_couple(){
        $this->load->model("client_model");
		$client_id=$this->input->post("client_id");
		$name=$this->input->post("name");
		$this->client_model->update_client_name($client_id,$name);
		redirect("home/index");
    }

	
	public function update_client_surname(){
        $this->load->model("client_model");
		$client_id=$this->input->post("client_id");
		$surname=$this->input->post("surname");
		$this->client_model->update_client_surname($client_id,$surname);
		redirect("home/index");
    }

	
	public function update_client_direction_street(){
        $this->load->model("client_model");
		$client_id=$this->input->post("client_id");
		$direction_street=$this->input->post("direction_street");
		$this->client_model->update_client_direction_street($client_id,$direction_street);
		redirect("home/index");
    }
	
	public function update_client_direction_number(){
        $this->load->model("client_model");
		$client_id=$this->input->post("client_id");
		$direction_number=$this->input->post("direction_number");
		$this->client_model->update_client_direction_number($client_id,$direction_number);
		redirect("home/index");
    }
	
	public function update_client_localitie(){
        $this->load->model("client_model");
		$client_id=$this->input->post("client_id");
		$localitie_id=$this->input->post("localitie_id");
		$this->client_model->update_client_localitie($client_id,$localitie_id);
		redirect("home/index");
    }

	public function update_client_mail(){
        $this->load->model("client_model");
		$client_id=$this->input->post("client_id");
		$email=$this->input->post("mail");
		if(!($this->client_model->check_mail($mail))){
			$this->client_model->update_client_mail($client_id,$email);
			$this->session->set_flashdata('OP','EXITO');
		}
		redirect("home/index");
    }

	public function delete_client($id=null){
		$client_id=intval($id);
		if($client_id>0){
			$this->load->model("client_model");
			$this->client_model->delete_client($client_id);
		}
		redirect("home/index");
	}

}
?>