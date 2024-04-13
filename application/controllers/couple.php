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

	public function create_couple($usuario_id,$conyugue_1_id,$conyugue_2_id,$cvu_regalos,$url){
        $this->load->model('couple_model');
			if(!($this->couple_model->check_couple_url($url))){
			$this->couple_model->create_couple($usuario_id,$conyugue_1_id,$conyugue_2_id,$cvu_regalos,$url);
			}
				redirect("home");
    }

	function check_couple_url($url=""){
        $this->db->select("couple_id");
        $this->db->where("url",$url);
        $this->db->limit(1);
        $res=$this->db->get("parejas");
        if($res->num_rows()){
            return true;
        }else{
            return false;
        }
    }

	public function delete_couple($id=null){
		$couple_id=intval($id);
		if($couple_id>0){
			$this->load->model("couple_model");
			$this->couple_model->delete_couple($couple_id);
		}
		redirect("home/index");
	}

}
?>