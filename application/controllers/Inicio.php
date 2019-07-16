<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	public function index()
	{
		if ($this->login_model->isLogged()){
			redirect(site_url("usuario/view/{$this->session->data_usuario->id}"), 'refresh');
		}

		$this->load->view('index');
	}
}
