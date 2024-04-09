<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_controller { //mismo nombre que el archivo

    public function index(){
        redirect("user/admin");
    }
    
    public function ingresar(){
        $this->load->view("list_users");
    }

    /*public function Registrarse(){
        $this->load->view("new_usser");
    }*/

    public function admin (){
        $datos=array();
		$this->load->model("user_model"); //loader componente del model auth
		$datos["usuarios"]=$this->user_model->list_users();
		$datos["total"]=count($datos["usuarios"]);

        $this->load->view("list_users",$datos); //loader compronente de CI_controller
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

    public function delete_user($id=null){
		$usuario_id=intval($id);
		if($usuario_id>0){
			$this->load->model('user_model'); //loader componente del model auth
            $this->user_model->delete_user($usuario_id);
		}
		redirect("user/index");
	}


    
    
    
}
?>