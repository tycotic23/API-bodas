<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if(!$this->session->userdata('usuario_id')){
			$this->session->set_flashdata('OP','PROHIBIDO');
			redirect('user/index');
		}
	}
	public function index()
	{	
		$datos=array();
		$this->load->model('articulos_model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('articulo', 'Articulo', 'required|trim');
		$this->form_validation->set_rules('stock_min', 'Stock minimo', 'required|is_natural');
		$this->form_validation->set_rules('stock_actual', 'Stock_actual', 'required|is_natural');
		if($this->form_validation->run()===false){
			$datos["articulos"]=$this->articulos_model->listar();
			$this->load->view('principal',$datos);
		}else{
			$nuevo=array();
			$nuevo['articulo']=set_value("articulo");
			$nuevo['stock_min']=set_value("stock_min");
			$nuevo['stock_actual']=set_value("stock_actual");

			$id=$this->articulos_model->crear($nuevo);
			$this->session->set_flashdata('OP',"creado");
			redirect ("principal/index");
		}
	}
}

?>
