<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banda extends CI_Controller {

	public function view($id)
	{
		$this->login_model->checkLogin();

		$owner = $this->session->data_usuario->asoc_banda == $id ? true : false;

		$this->load->model('banda/banda_model');
		$this->load->model('genero/genero_model');

		$generos = $this->banda_model->getGeneros($id);

		$data = [
			'banda_id' => $id,
			'banda_nombre' => $this->banda_model->getNombre($id),
			'banda_pais' => $this->banda_model->getPaisAsString($id),
			'banda_region' => $this->banda_model->getRegionAsString($id),
			'banda_estado' => $this->banda_model->getEstado($id),
			'genero_model' => $this->genero_model,
			'generos' => $generos,
			'owner' => $owner
		];

		$this->load->view('banda/view', $data);
	}

	public function administrar($id)
	{
		$this->login_model->checkLogin();

		$owner = $this->session->data_usuario->asoc_banda == $id ? true : false;

		if (!$owner){
			//redirect(site_url(), 'refresh');
		}

		$this->load->model('ubicacion/pais_model');
		$this->load->model('banda/banda_model');

		$data = [
			'banda_id' => $id,
			'banda_nombre' => $this->banda_model->getNombre($id),			
			'generos' => $this->banda_model->getAllGeneros(),
			'paises' => $this->pais_model->getAllPaises()
		];

		$this->load->view('banda/administrar', $data);
	}

	public function crear()
	{
		$this->load->model('banda/banda_model');
		$this->load->model('ubicacion/pais_model');

		$this->login_model->checkLogin();
		$user = $this->usuario_model->load(get_cookie('id'));

		$data = [
			'user' => $user,
			'generos' => $this->banda_model->getAllGeneros(),
			'paises' => $this->pais_model->getAllPaises()
		];

		$this->load->view('banda/crear', $data);
	}

	public function editar(){
		$this->login_model->checkLogin();
		$this->load->model('banda/banda_model');

		if ($this->banda_model->editarBanda(
			$this->input->post('id'),
			$this->input->post('nombre'),
			$this->input->post('estado'),
			$this->input->post('generos'),
			$this->input->post('pais'),
			$this->input->post('region')
		)){
			echo "Banda editada";
			redirect(site_url("banda/view/{$this->input->post('id')}"), 'refresh');
		} else {
			echo "Error";
			sleep(2);
			redirect(site_url("banda/view/{$this->input->post('id')}"), 'refresh');
		}
	}

	public function submit(){
		$this->login_model->checkLogin();
		$this->load->model('banda/banda_model');

		if ($this->banda_model->crearBanda(
			$this->input->post('nombre'),
			$this->input->post('generos'),
			$this->input->post('pais'),
			$this->input->post('region')
		)){
			echo "Banda creada";
			redirect(site_url("usuario/view/{$this->session->data_usuario->id}"), 'refresh');
		} else {
			echo "Error";
			sleep(2);
			redirect(site_url("banda/crear"), 'refresh');
		}
	}

	public function all()
	{
		$this->login_model->checkLogin();
		$this->load->model('banda/banda_model');

		$data = [
			'banda_model' => $this->banda_model,
			'bandas' => $this->banda_model->getAll()
		];

		$this->load->view('banda/all', $data);
	}
}
