<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Genero_model extends CI_Model {
	public function getNombre($id_genero)
	{
		$query = $this->db->query("SELECT nombre FROM generos WHERE id = {$id_genero}");

		return $query->row()->nombre;
	}
}

?>