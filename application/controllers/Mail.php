<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mail extends CI_Controller {

    public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
        
	}

    

    public function send_mail($guest_mail,$url) {
        $this->load->library('email');
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
        $this->email->to($guest_mail);
        $this->email->subject('Invitacion a nuestra boda!');
        $this->email->message($url);
        
        if ($this->email->send()) {
            echo 'Correo enviado correctamente';
        } else {
            show_error($this->email->print_debugger());
        }
        redirect("couple");
    }
}

?>
