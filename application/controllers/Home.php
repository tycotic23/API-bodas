<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	
	/*public function __construct(){
		parent::__construct();
		$this->load->model('couple_model');
		$u=$this->couple_model->get_by_id($id);
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}*/
	public function index($url=false){
		if(!$url){
			$this->load->view("Home");
		}
		else{
				$this->load->model('couple_model');
				$u=$this->couple_model->get_by_url($url);
				if(!$u){
					redirect("home/index");
				}
				else(){
					$datos=array();
					/*$datos["usuario_id"]=$u["usuario_id"];*/
					$datos["conyugue_1"]=$u["conyugue_1"];
					$datos["conyugue_2"]=$u["conyugue_2"];
					$datos["cvu_regalos"]=$u["cvu_regalos"];
					$this->load->view('home',$datos);
			}
			
		}

	}

}
?>
