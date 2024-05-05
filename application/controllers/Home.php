<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	

	public function __construct(){
		parent::__construct();
		$this->datos["usuario"]= $this->session->userdata("usuario");
		$this->datos["usuario_id"]= $this->session->userdata("usuario_id");
	}
	/*public function __construct(){
		parent::__construct();
		$this->load->model('couple_model');
		$u=$this->couple_model->get_by_id($id);
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}*/
	protected $datos=array();

	public function index ($url=false){

		if(!$url){
			
			$this->datos["couple_id"]=FALSE;
			$this->load->view('home',$this->datos);
		}
		else{
				$this->load->model('couple_model');
				$u=$this->couple_model->get_by_url($url);
				if(!$u){
					redirect("home/index");
				}
				else{
					
					/*$datos["usuario_id"]=$u["usuario_id"];*/
					$this->datos["conyugue_1"]=$u["conyugue_1_id"];
					$this->datos["conyugue_2"]=$u["conyugue_2_id"];
					$this->datos["cvu_regalos"]=$u["cvu_regalos"];
					$this->datos["url"]=$url;
					$tmp["usuario_id"]=$this->datos["usuario_id"];
					$tmp["usuario"]=$this->datos["usuario"];
					$this->datos["navbar"] =$this->load->view("navbar", $tmp, TRUE);
					$this->load->view('home',$this->datos);
			}
		}
	}


	public function couple_by_url ($url=false){

		//esto sucede cuando la variable url esta vacia
		if(!$url){
			
			$this->datos["couple_id"]=FALSE;
			$this->load->view('home',$this->datos);
		}
		else{
				$this->load->model('couple_model');
				if(!$this->couple_model->check_url($url)){
					$this->session->set_flashdata("OP","INEXISTENTE");
					$this->load->view("home");

				}
				$u=$this->couple_model->get_by_url($url);
				//esto sucede cuando no encuentra la url de esa pareja
				if(!$u){
					redirect("home/index");
				}
				else{
					
					/*$datos["usuario_id"]=$u["usuario_id"];*/
					$this->datos["couple_id"]=$u["pareja_id"];
					$this->datos["conyugue_1"]=$u["conyugue_1_id"];
					$this->datos["conyugue_2"]=$u["conyugue_2_id"];
					$this->datos["cvu_regalos"]=$u["cvu_regalos"];
					$this->datos["url"]=$url;
					$this->load->view('home',$this->datos);
			}
		}
	}

}
?>
