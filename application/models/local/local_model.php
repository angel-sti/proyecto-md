<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Local_model extends CI_Model {
	public function crearLocal($nombre, $pais, $region)
	{
		$this->load->model('usuario/usuario_model');

		if ($nombre == null || $pais == null || $region == null){
			return false;
		}
		
		$this->db->query("INSERT INTO locales (id_usuario, nombre, pais, region) VALUES ('{$this->session->data_usuario->id}', '{$nombre}', '{$pais}', '{$region}')");
		
		$this->usuario_model->addLocalAsociado($this->session->data_usuario->id, $this->db->insert_id());

		return true;		
	}

	public function editarLocal($id, $nombre, $estado, $pais, $region)
	{
		$this->load->model('usuario/usuario_model');

		if ($id == null || $estado == null || $nombre == null || $pais == null || $region == null){
			return false;
		}
		
		$this->db->query("UPDATE locales SET nombre = '{$nombre}', estado = {$estado}, pais = {$pais}, region = {$region} WHERE id = {$id}");	

		return true;		
	}

	public function getNombre($id_local)
	{
		$query = $this->db->query("SELECT nombre FROM locales WHERE id = {$id_local}");

		return $query->row()->nombre;
	}

	public function getEstado($id_local)
	{
		$query = $this->db->query("SELECT estado FROM locales WHERE id = {$id_local}");

		return $query->row()->estado;
	}

	public function getPaisAsString($id_local)
	{
		$this->load->model('ubicacion/pais_model');

		$query = $this->db->query("SELECT pais FROM locales WHERE id = {$id_local}");

		return $this->pais_model->getNombrePais($query->row()->pais);
	}

	public function getRegionAsString($id_local)
	{
		$this->load->model('ubicacion/pais_model');

		$query = $this->db->query("SELECT region FROM locales WHERE id = {$id_local}");

		return $this->pais_model->getNombreRegion($query->row()->region);
	}

	public function getAll()
	{
		$query = $this->db->query("SELECT id, nombre, pais, region, estado FROM locales ORDER BY nombre");

		return $query->result();
	}
}

?>