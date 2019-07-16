<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Local extends CI_Controller {

	public function view($id)
	{
		$this->login_model->checkLogin();

		$owner = $this->session->data_usuario->asoc_local == $id ? true : false;

		$this->load->model('local/local_model');

		$data = [
			'local_id' => $id,
			'local_nombre' => $this->local_model->getNombre($id),
			'local_pais' => $this->local_model->getPaisAsString($id),
			'local_region' => $this->local_model->getRegionAsString($id),
			'local_estado' => $this->local_model->getEstado($id),
			'owner' => $owner
		];

		$this->load->view('local/view', $data);
	}

	public function crear()
	{
		$this->load->model('local/local_model');
		$this->load->model('ubicacion/pais_model');

		$this->login_model->checkLogin();
		$user = $this->usuario_model->load(get_cookie('id'));

		$data = [
			'user' => $user,
			'paises' => $this->pais_model->getAllPaises()
		];

		$this->load->view('local/crear', $data);
	}

	public function administrar($id)
	{
		$this->login_model->checkLogin();

		$owner = $this->session->data_usuario->asoc_local == $id ? true : false;

		if (!$owner){
			redirect(site_url(), 'refresh');
		}

		$this->load->model('ubicacion/pais_model');
		$this->load->model('local/local_model');

		$data = [
			'local_id' => $id,
			'local_nombre' => $this->local_model->getNombre($id),			
			'paises' => $this->pais_model->getAllPaises(),
			'owner' => $owner
		];

		$this->load->view('local/administrar', $data);
	}

	public function editar(){
		$this->login_model->checkLogin();
		$this->load->model('local/local_model');

		if ($this->local_model->editarLocal(
			$this->input->post('id'),
			$this->input->post('nombre'),
			$this->input->post('estado'),
			$this->input->post('pais'),
			$this->input->post('region')
		)){
			echo "Local editado";
			redirect(site_url("local/view/{$this->input->post('id')}"), 'refresh');
		} else {
			echo "Error";
			sleep(2);
			redirect(site_url("local/view/{$this->input->post('id')}"), 'refresh');
		}
	}

	public function submit(){
		$this->login_model->checkLogin();
		$this->load->model('local/local_model');

		if ($this->local_model->crearLocal(
			$this->input->post('nombre'),
			$this->input->post('pais'),
			$this->input->post('region')
		)){
			echo "Local creado";
			redirect(site_url("usuario/view/{$this->session->data_usuario->id}"), 'refresh');
		} else {
			echo "Error";
			sleep(2);
			redirect(site_url("local/crear"), 'refresh');
		}
	}

	public function all()
	{
		$this->login_model->checkLogin();
		$this->load->model('local/local_model');

		$data = [
			'local_model' => $this->local_model,
			'locales' => $this->local_model->getAll()
		];

		$this->load->view('local/all', $data);
	}
}
