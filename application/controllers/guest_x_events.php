<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class guest_x_events extends CI_Controller {


	/*public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}*/
    
    public function index(){

        {
            $datos=array();
            $this->load->model('guest_model');
            $this->load->library('form_validation');

            $this->form_validation->set_rules('mail', 'Mail', 'aveiguar como validar mails|required');/*averiguar como validar mails con el form validation*/

            if($this->form_validation->run()===false){
    
                $this->load->view('guest_events',$datos);
                /*colocar un set flash data*/
            }else{
                $email=set_value("mail");
                $guest=$this->guest_model->get_by_email($email);
                
                if($guest){
                    if(){
                        
                    }else{
                        
                    }
                }
                
            }
        }
    }


}


    ?>