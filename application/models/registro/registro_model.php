<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registro_Model extends CI_Model {

	public function registrar($nombre, $email, $pass){

		if ($nombre == null || $email == null || $pass == null){
			redirect(site_url(), 'refresh');
		}

		$fecha_registro = time();
		
		$this->db->query("INSERT INTO usuarios (nombre, email, password, fecha_registro) VALUES ('{$nombre}','{$email}','{$pass}','{$fecha_registro}')");
		redirect(site_url(), 'refresh');
	}

}
?>