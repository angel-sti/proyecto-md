<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {
	public function userExists($email, $password)
	{
		if ($email == null || $password == null){
			return false;
		}

		$query = $this->db->query("SELECT id FROM usuarios WHERE email = '{$email}' AND password = '{$password}'");

		if ($query->num_rows() > 0){			
			return $query->row()->id;
		} 

		return false;
	}

	public function checkLogin()
	{
		if (!$this->isLogged()){
			redirect(site_url(), 'refresh');
		}
	}

	public function isLogged()
	{
		if (get_cookie('id')){
			return true;
		}

		return false;
	}
}
?>