<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Couple extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}

	public function create_couple($usuario_id,$conyugue_1,$conyugue_2,$cvu_regalos,$url){
        $this->load->model('couple_model');
        $usuario=$this->input->post("usuario");
        $password=$this->input->post("password");

        if(!($this->user_model->check_user($usuario))){
        $this->user_model->create_user($usuario,$password);
        }
        redirect("user/registrarse");
    }

    public function delete_user($id=null){
		$usuario_id=intval($id);
		if($usuario_id>0){
			$this->load->model('user_model');
            $this->user_model->delete_user($usuario_id);
		}
		redirect("user/index");
	}

}
?>