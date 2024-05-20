<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

    public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
        $this->load->library('email');
	}

    

    public function send_mail(/* $guest_mail */) {

        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_port' => 587,
            'smtp_user' => 'organizacion.bodas.bodas@gmail.com',
            'smtp_pass' => 'pybj frjv zjjt vnaz',
            'smtp_crypto' => 'tls',
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'newline' => "\r\n"
        );

        $this->email->initialize($config);
        $this->email->from('organizacion.bodas.bodas', 'bodas');
        $this->email->to('geronimosilvestre@hotmail.com');
        $this->email->subject('Prueba.1');
        $this->email->message('Probando');
        
        if ($this->email->send()) {
            echo 'Correo enviado correctamente';
        } else {
            show_error($this->email->print_debugger());
        }
        redirect("couple");
    }
}

/*     public function send_mail(){

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
} */
?>