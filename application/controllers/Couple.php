<?php
defined('BASEPATH') OR exit('No direct script access allowed');
		/*parejas*/
class Couple extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}
 /* mis datos, eventos creados e invitados asociados a estos eventos */
	public function index(){
		$this->load->model("Couple_model");
		$couple_id=$this->session->userdata("pareja_id");
		$datos=array();
		$datos["couple"]=$this->Couple_model->get_by_id($couple_id);
		$this->load->view("couple",$datos); 
		

	}

	public function edit_view(){
		$couple_id=$this->session->userdata("pareja_id");
		if(!$couple_id){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('couple');
		}else{
			$this->load->model("Couple_model");
			$datos=array();
			$datos["couple"]=$this->Couple_model->get_by_id($couple_id);
			$this->load->view("edits/couple",$datos);
		}
	}

	

	public function view_couple_events(){
		$couple_id=$this->session->userdata("pareja_id");
		redirect("event/get_by_couple/".$couple_id);
	}

	public function list_couple (){
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
			}else{
			$this->load->model("Couple_model"); 
			$datos=array();
			$datos["couples"]=$this->Couple_model->list_couple();
			$datos["total"]=count($datos["couples"]);
			$this->load->view("lists/list_couples",$datos); 
    }
}

	public function create_couple(){

			$this->form_validation->set_rules('user_id', 'User_id', 'required|trim|is_natural');
            $this->form_validation->set_rules('spouse_1_id', 'Spouse_1_id', 'required|trim|is_natural');
			$this->form_validation->set_rules('spouse_2_id', 'Spouse_2_id', 'required|trim|is_natural');
			$this->form_validation->set_rules('cvu_gift', 'Cvu_gift', 'required|trim|is_natural');
			$this->form_validation->set_rules('url', 'Url', 'required|trim');

			if($this->form_validation->run()===false){
                $this->session->set_flashdata('OP','PROHIBIDO');
                redirect("home");
                
            }else{
                $this->load->model('Couple_model');
				$user_id=$this->input->post("user_id");
				$spouse_1_id=$this->input->post("spouse_1_id");
				$spouse_2_id=$this->input->post("spouse_2_id");
				$cvu_gift=$this->input->post("cvu_gift");
				$url=$this->input->post("url");
					if(!($this->Couple_model->check_couple_url($url))){
					$this->Couple_model->create_couple($user_id,$spouse_1_id,$spouse_2_id,$cvu_gift,$url);
					$this->session->set_flashdata('OP','SUCCESFULLY');
					}
						redirect("home");
            }

        
    }

	public function edit (){
		
		$this->form_validation->set_rules('cvu_gift', 'Cvu_gift', 'is_natural|trim');
		$this->form_validation->set_rules('url', 'Url', 'alpha_numeric|trim|strtolower');

		if($this->form_validation->run()===false){

			redirect("couple");
			
		}else{
			$couple_id=$this->session->userdata("pareja_id");
			$cvu_gift=set_value("cvu_gift");
			$url=set_value("url");

			if($cvu_gift){
				$this->session->set_flashdata('OP','PASS');
				$this->update_couple_cvu_gift($couple_id,$cvu_gift);
			}

			if($url){
				$this->session->set_flashdata('OP','PASS');
				$this->update_couple_url($couple_id,$url);
			}

				redirect("couple");
		}

	}

	

	public function update_couple_user(){
        $this->load->model("Couple_model");
		$couple_id=$this->input->post("couple_id");
		$user_id=$this->input->post("user_id");
		$this->Couple_model->update_couple_user($couple_id,$user_id);
		redirect("home/index");
    }

	
	public function update_couple_spouse_1(){
        $this->load->model("Couple_model");
		$couple_id=$this->input->post("couple_id");
		$spouse_1_id=$this->input->post("spouse_1_id");
		$this->Couple_model->update_couple_spouse_1($couple_id,$spouse_1_id);
		redirect("home/index");
    }

	
	public function update_couple_spouse_2(){
        $this->load->model("Couple_model");
		$couple_id=$this->input->post("couple_id");
		$spouse_2_id=$this->input->post("spouse_2");
		$this->Couple_model->update_couple_spouse_2($couple_id,$spouse_2_id);
		redirect("home/index");
    }
	
	public function update_couple_cvu_gift($couple_id,$cvu_gift){
        $this->load->model("Couple_model");
		$this->Couple_model->update_couple_cvu_gift($couple_id,$cvu_gift);
		redirect("couple");
    }
	
	public function update_couple_url($couple_id,$url){
        $this->load->model("Couple_model");

		if(!($this->Couple_model->check_couple_url($url))){
			$this->Couple_model->update_couple_url($couple_id,$url);
		}
		redirect("couple");
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
			$this->load->model("Couple_model");
			$this->Couple_model->delete_couple($couple_id);
		}
		$this->log_out();
		redirect("home/index");
	}

	public function log_out(){
		$this->session->sess_destroy();
		redirect("user/index");
	}

}
?>
