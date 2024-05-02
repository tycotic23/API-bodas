<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_controller {

    public function index(){
        
        {
            $datos=array();
            $this->load->model('user_model');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('usuario', 'Usuario', 'trim|strtolower|required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if($this->form_validation->run()===false){
    
                $this->load->view('login',$datos);
                
            }else{
                $user=set_value("usuario");
                $pass=set_value("password");
                $id=$this->user_model->check_login($user,$pass);
                if($id){
                    $u=$this->user_model->get_by_id($id);
                    if($u["estado"]==1){
                        $this->session->set_userdata("usuario",$u["usuario"]);
                        $this->session->set_userdata("usuario_id",$u["usuario_id"]);
                        redirect("user/admin");
                    }else{
                        $this->session->set_flashdata("OP","INACTIVO");
                        redirect("user/index");
                    }
                }else{
                    $this->session->set_flashdata("OP","INEXISTENTE");
                    redirect("user/index");
                }
            }
        }
    }
    public function ingresar(){
        $this->load->view("list_users");
    }

    /*public function Registrarse(){
        $this->load->view("new_usser");
    }*/

    public function admin (){
            if(!$this->session->userdata('usuario_id')){
                $this->session->set_flashdata('OP','PROHIBIDO');
                redirect('user/index');
                }else{
                $datos=array();
                $this->load->model("user_model"); 
                $datos["users"]=$this->user_model->list_users();
                $datos["total"]=count($datos["users"]);

                $this->load->view("lists/list_users",$datos); 
        }
    }

    public function create_user(){
        $this->load->model('user_model');
        $usuario=$this->input->post("usuario");
        $password=$this->input->post("password");

        if(!($this->user_model->check_user($usuario))){
        $this->user_model->create_user($usuario,$password);
        }
        redirect("user/registrarse");
    }

    public function change_password(){
        $this->load->model('user_model');
        $passwordnew=$this->input->post("passwordnew");
        $passwordold=$this->input->post("passwordold");
        $usuario=$this->input->post("usuario");

        if($this->user_model->return_password($usuario)==$passwordold){
            $this->user_model->change_password($usuario, $passwordnew);
            redirect("user/logout");
        }    
        else{
        redirect("user/logout");
        }
    }

    public function delete_user($id=null){
		$usuario_id=intval($id);
		if($usuario_id>0){
			$this->load->model('user_model'); 
            $this->user_model->delete_user($usuario_id);
		}
		redirect("user/index");
	}


    public function log_out(){
		$this->session->sess_destroy();
		redirect("user/index");
	}
    
    
}
?>