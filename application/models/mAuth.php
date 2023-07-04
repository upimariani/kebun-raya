<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mAuth extends CI_Model
{
	public function Auth($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		$this->db->where(array(
			'username_user' => $username,
			'password_user' => $password
		));
		return $this->db->get()->row();
	}


	//wisatawan
	public function registrasi($data)
	{
		$this->db->insert('tbl_wisatawan', $data);
	}
	public function login_wisatawan($username, $password)
	{
		$this->db->select('*');
		$this->db->from('tbl_wisatawan');
		$this->db->where('username', $username);
		$this->db->where('password', $password);
		return $this->db->get()->row();
	}
}

/* End of file mAuth.php */
