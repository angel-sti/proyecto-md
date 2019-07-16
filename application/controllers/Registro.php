<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro extends CI_Controller {

	public function index()
	{
		$this->load->view('usuario/registro');
	}

	public function registrar(){
		$this->load->model('registro/registro_model');
		$this->registro_model->registrar(
			$this->input->post('nombre'), 
			$this->input->post('email'),
			$this->input->post('pass')
		);
	}
}
