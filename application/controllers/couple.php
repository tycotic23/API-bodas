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
    
}


    ?>