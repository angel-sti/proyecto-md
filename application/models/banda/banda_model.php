<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Banda_model extends CI_Model {
	public function crearBanda($nombre, $generos, $pais, $region)
	{
		$this->load->model('usuario/usuario_model');

		if ($nombre == null || $generos == null || $pais == null || $region == null){
			return false;
		}

		$generos = json_encode($generos);
		
		$this->db->query("INSERT INTO bandas (id_usuario, nombre, generos, pais, region) VALUES ('{$this->session->data_usuario->id}','{$nombre}','{$generos}','{$pais}', '{$region}')");
		
		$this->usuario_model->addBandaAsociada($this->session->data_usuario->id, $this->db->insert_id());

		return true;		
	}

	public function editarBanda($id, $nombre, $estado, $generos, $pais, $region)
	{
		$this->load->model('usuario/usuario_model');

		if ($id == null || $estado == null || $nombre == null || $generos == null || $pais == null || $region == null){
			return false;
		}

		$generos = json_encode($generos);
		
		$this->db->query("UPDATE bandas SET nombre = '{$nombre}', estado = {$estado}, generos = '{$generos}', pais = {$pais}, region = {$region} WHERE id = {$id}");	

		return true;		
	}

	public function getEstado($id_banda)
	{
		$query = $this->db->query("SELECT estado FROM bandas WHERE id = {$id_banda}");

		return $query->row()->estado;
	}

	public function getAllGeneros()
	{
		$query = $this->db->query("SELECT id, nombre FROM generos ORDER BY nombre");

		return $query->result();
	}

	public function getGeneros($id_banda)
	{
		$query = $this->db->query("SELECT generos FROM bandas WHERE id = {$id_banda}");

		return json_decode($query->row()->generos);
	}

	public function getNombre($id_banda)
	{
		$query = $this->db->query("SELECT nombre FROM bandas WHERE id = {$id_banda}");

		return $query->row()->nombre;
	}

	public function getPaisAsString($id_banda)
	{
		$this->load->model('ubicacion/pais_model');

		$query = $this->db->query("SELECT pais FROM bandas WHERE id = {$id_banda}");

		return $this->pais_model->getNombrePais($query->row()->pais);
	}

	public function getRegionAsString($id_banda)
	{
		$this->load->model('ubicacion/pais_model');

		$query = $this->db->query("SELECT region FROM bandas WHERE id = {$id_banda}");

		return $this->pais_model->getNombreRegion($query->row()->region);
	}

	public function getAll()
	{
		$query = $this->db->query("SELECT id, nombre, pais, region, estado FROM bandas ORDER BY nombre");

		return $query->result();
	}
}

?>