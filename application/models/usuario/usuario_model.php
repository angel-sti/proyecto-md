<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	public function load($id)
	{
		$query = $this->db->query("SELECT id, nombre, email, asoc_banda, asoc_local, fecha_registro FROM usuarios WHERE id = {$id}");

		if ($query->num_rows() > 0){
			return $query->row();
		}

		return false;
	}

	public function addBandaAsociada($id_usuario, $id_banda)
	{
		$query = $this->db->query("UPDATE usuarios SET asoc_banda = {$id_banda} WHERE id = {$id_usuario}");
	}

	public function addLocalAsociado($id_usuario, $id_local)
	{
		$query = $this->db->query("UPDATE usuarios SET asoc_local = {$id_local} WHERE id = {$id_usuario}");
	}
}
?>