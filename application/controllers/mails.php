<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mails extends CI_Controller {

    public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
        $this->load->library('email');
	}
    

    public function send_mail(){

        $this->email->from('tu@email.com', 'boda');
        $this->email->to('geronimosilvestrer@hotmail.com');
        $this->email->subject('BODA');
        $this->email->message('te invito a mi boda');

        if ($this->email->send()) {
            echo 'Correo enviado correctamente.';
        } else {
            echo 'Error al enviar el correo: ' . $this->email->print_debugger();
        }
    }
}
?>