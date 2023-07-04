<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mProfile extends CI_Model
{
	public function profile()
	{
		$this->db->select('*');
		$this->db->from('tbl_wisatawan');
		$this->db->where('id_wisatawan', $this->session->userdata('id_wisatawan'));
		return $this->db->get()->row();
	}
	public function update_profile($id, $data)
	{
		$this->db->where('id_wisatawan', $id);
		$this->db->update('tbl_wisatawan', $data);
	}
}

/* End of file mProfile.php */
