<?php
defined ('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_controller {

    public function index(){
        
        {
            $datos=array();
            $this->load->model('User_model');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('usuario', 'Usuario', 'trim|strtolower|required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if($this->form_validation->run()===false){
    
                $this->load->view('login',$datos);
                
            }else{
                $user=set_value("usuario");
                $pass=set_value("password");
                $id=$this->User_model->check_login($user,$pass);
                if($id){
                    /* check roll to future */
                    $u=$this->User_model->get_by_id($id);
                    if($u["estado"]==1){
                        $this->session->set_userdata("usuario",$u["usuario"]);
                        $this->session->set_userdata("usuario_id",$u["usuario_id"]);
                        $this->session->set_userdata("pareja_id",$u["pareja_id"]);
                        $this->load->model("couple_model");
                        $url=$this->couple_model->get_url_by_id($u["pareja_id"]);
                        $this->session->set_userdata("url",$url);
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

    public function list_user (){
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
			}else{
			$this->load->model("User_model"); 
			$datos=array();
			$datos["users"]=$this->User_model->list_user();
			$datos["total"]=count($datos["users"]);
			$this->load->view("lists/list_users",$datos); 
        }
    }
    public function ingresar(){
        $this->load->view("list_users");
    }
    public function create_user_view(){
        $this->load->view("forms/form_create_user");
    }

    public function admin (){
            if(!$this->session->userdata('usuario_id')){
                $this->session->set_flashdata('OP','PROHIBIDO');
                redirect('user/index');
                }else{
                $datos=array();
                $this->load->model("User_model"); 
                $datos["users"]=$this->User_model->list_user();
                $datos["total"]=count($datos["users"]);

                redirect("home");
        }
    }

    public function valid_datetime($str) {
		// Define el formato de fecha y hora que estás esperando
		$formato = 'Y-m-d';
		// Intenta analizar la fecha y hora utilizando el formato especificado
		$fecha_hora = DateTime::createFromFormat($formato, $str);

		// Verifica si la fecha y hora se analizó correctamente y coincide con el formato
		if (($fecha_hora && $fecha_hora->format($formato) == $str) || $str==null) {
			return true; // La fecha y hora es válida
		} else {
			return false; // La fecha y hora no es válida
		}
	}

    public function create_user(){ /* este controlador tiene que crear usuario, pareja y conyugues. */
        $this->load->model('User_model');
        $this->load->model('Spouse_model');
        $this->load->model('Couple_model');

        $this->form_validation->set_rules('user', 'User', 'required|trim|strtolower');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|strtolower');
		$this->form_validation->set_rules('mail', 'Mail', 'required|valid_email');
		$this->form_validation->set_rules('url', 'Url', 'required|trim');
		$this->form_validation->set_rules('name_spouse_1', 'Name_spouse_1', 'required|trim|strtolower');
		$this->form_validation->set_rules('surname_spouse_1', 'Surname_spouse_1', 'required|trim|strtolower');
        $this->form_validation->set_rules('birthday_spouse_1', 'Birthday_spouse_1', 'required|callback_valid_datetime');
		$this->form_validation->set_rules('name_spouse_2', 'Name_spouse_2', 'required|trim|strtolower');
		$this->form_validation->set_rules('surname_spouse_2', 'Surname_spouse_2', 'required|trim|strtolower');
		$this->form_validation->set_rules('birthday_spouse_2', 'Birthday_spouse_2', 'required|callback_valid_datetime');

        if($this->form_validation->run()===false){

			redirect("home");
			
		}else{

            $user=$this->input->post("user");
            $password=$this->input->post("password");
            $mail=$this->input->post("mail");
            $url=$this->input->post("url");
            $name_spouse_1=$this->input->post("name_spouse_1");
            $surname_spouse_1=$this->input->post("surname_spouse_1");
            $birthday_spouse_1=$this->input->post("birthday_spouse_1");
            $name_spouse_2=$this->input->post("name_spouse_2");
            $surname_spouse_2=$this->input->post("surname_spouse_2");
            $birthday_spouse_2=$this->input->post("birthday_spouse_2");

            if($this->User_model->check_user($user)){
                $this->session->set_flashdata('OP','YA_EXISTE');
                redirect("home");
            }
            
            $id_spouse_1=$this->Spouse_model->create_spouse($name_spouse_1,$surname_spouse_1,$birthday_spouse_1);
            $id_spouse_2=$this->Spouse_model->create_spouse($name_spouse_2,$surname_spouse_2,$birthday_spouse_2);
            $couple_id=$this->Couple_model->create_couple($id_spouse_1,$id_spouse_2,$cvu="");
            $this->User_model->create_user($usuario,$password,$couple_id);
            $this->session->set_flashdata('OP','EXITO');
            redirect("home");
        }

    }

    public function change_password(){
        $this->load->model('User_model');
        $passwordnew=$this->input->post("passwordnew");
        $passwordold=$this->input->post("passwordold");
        $usuario=$this->input->post("usuario");

        if($this->User_model->return_password($usuario)==$passwordold){
            $this->User_model->change_password($usuario, $passwordnew);
            redirect("user/log_out");
        }    
        else{
        redirect("user/logout");
        }
    }

    public function delete_user($id=null){
		$usuario_id=intval($id);
		if($usuario_id>0){
			$this->load->model('User_model'); 
            $this->User_model->delete_user($usuario_id);
		}
		redirect("user/index");
	}


    public function log_out(){
		$this->session->sess_destroy();
		redirect("user/index");
	}
    
    
}
?>
