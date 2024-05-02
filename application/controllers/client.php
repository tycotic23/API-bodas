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

	public function create_couple(){
        $this->load->model('couple_model');
		$user_id=$this->input->post("user_id");
		$spouse_1_id=$this->input->post("spouse_1_id");
		$spouse_2_id=$this->input->post("spouse_2_id");
		$cvu_gift=$this->input->post("cvu_gift");
		$url=$this->input->post("url");
			if(!($this->couple_model->check_couple_url($url))){
			$this->couple_model->create_couple($user_id,$spouse_1_id,$spouse_2_id,$cvu_gift,$url);
			}
				redirect("home");
    }

	public function list_couple (){
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
			}else{
			$this->load->model("couple_model"); 
			$datos=array();
			$datos["couples"]=$this->couple_model->list_couple();
			$datos["total"]=count($datos["couples"]);
			$this->load->view("lists/list_couples",$datos); 
    }
}

	public function update_couple_user(){
        $this->load->model("couple_model");
		$couple_id=$this->input->post("couple_id");
		$user_id=$this->input->post("user_id");
		$this->couple_model->update_couple_user($couple_id,$user_id);
		redirect("home/index");
    }

	
	public function update_couple_spouse_1(){
        $this->load->model("couple_model");
		$couple_id=$this->input->post("couple_id");
		$spouse_1_id=$this->input->post("spouse_1_id");
		$this->couple_model->update_couple_spouse_1($couple_id,$spouse_1_id);
		redirect("home/index");
    }

	
	public function update_couple_spouse_2(){
        $this->load->model("couple_model");
		$couple_id=$this->input->post("couple_id");
		$spouse_2_id=$this->input->post("spouse_2");
		$this->couple_model->update_couple_spouse_2($couple_id,$spouse_2_id);
		redirect("home/index");
    }
	
	public function update_couple_cvu_gift(){
        $this->load->model("couple_model");
		$couple_id=$this->input->post("couple_id");
		$cvu_gift=$this->input->post("cvu_gift");
		$this->couple_model->update_couple_cvu_gift($couple_id,$cvu_gift);
		redirect("home/index");
    }
	
	public function update_couple_url(){
        $this->load->model("couple_model");
		$couple_id=$this->input->post("couple_id");
		$url=$this->input->post("url");
		if(!($this->couple_model->check_couple_url($url))){
			$this->couple_model->update_couple_url($couple_id,$url);
		}
		redirect("home/index");
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