<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function access()
	{
		$this->load->model('login/login_model');
		$this->load->model('usuario/usuario_model');

		if ($user_id = $this->login_model->userExists($this->input->post('email'), $this->input->post('password'))){

			$this->session;

			$user = $this->usuario_model->load($user_id);

			$this->session->set_userdata('data_usuario', $user);

			$this->input->set_cookie([
				'name' => 'id',
				'value' => $user_id,
				'expire' => 60*60*24*7
			]);

			redirect(site_url("/usuario/view/{$user_id}"), 'refresh');
		} else {
			echo "Error, usuario y/o contraseña incorrectos";
			sleep(2);
			redirect(site_url(), 'refresh');
		}
	}

	public function logout()
	{
		session_destroy();
		session_unset();

		delete_cookie('id');

		redirect(site_url(), 'refresh');
	}
}
