<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais_model extends CI_Model{
	public function getRegionesFrom($id_pais)
	{
		$query = $this->db->query("SELECT id, nombre FROM regiones WHERE id_pais = {$id_pais} ORDER BY nombre");

		return $query->result();
	}

	public function getNombrePais($id_pais)
	{
		$query = $this->db->query("SELECT nombre FROM paises WHERE id = {$id_pais}");

		return $query->row()->nombre;
	}

	public function getNombreRegion($id_region)
	{
		$query = $this->db->query("SELECT nombre FROM regiones WHERE id = {$id_region}");

		return $query->row()->nombre;
	}

	public function getAllPaises()
	{
		$query = $this->db->query("SELECT id, nombre FROM paises ORDER BY nombre");

		return $query->result();
	}
}

?>