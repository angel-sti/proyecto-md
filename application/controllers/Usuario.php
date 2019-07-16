<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario extends CI_Controller {

	public function view($id)
	{
		if ($id == null || $id == ""){
			redirect(site_url(), 'refresh');
		}

		$owner = $this->session->data_usuario->id == $id ? true : false;

		$this->load->model('usuario/usuario_model');
		$this->load->model('login/login_model');
		$this->load->model('banda/banda_model');
		$this->load->model('local/local_model');

		$this->login_model->checkLogin();

		if ($user = $this->usuario_model->load($id)){
			$data = [
				'user' => $user,
				'banda_model' => $this->banda_model,
				'local_model' => $this->local_model,
				'owner' => $owner
			];

			$this->load->view('usuario/view', $data);
		} else {
			redirect(site_url(), 'refresh');
		}		
	}
}
