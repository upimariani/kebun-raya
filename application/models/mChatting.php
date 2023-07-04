<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mChatting extends CI_Model
{
	public function chatting()
	{
		$this->db->select('*');
		$this->db->from('tbl_chatting');
		$this->db->join('tbl_wisatawan', 'tbl_chatting.id_wisatawan = tbl_wisatawan.id_wisatawan', 'left');
		return $this->db->get()->result();
	}
	public function insert($data)
	{
		$this->db->insert('tbl_chatting', $data);
	}

	//admin
	public function chat_admin()
	{
		$this->db->select('*');
		$this->db->from('tbl_chatting');
		$this->db->join('tbl_wisatawan', 'tbl_chatting.id_wisatawan = tbl_wisatawan.id_wisatawan', 'left');
		$this->db->group_by('tbl_chatting.id_wisatawan');
		return $this->db->get()->result();
	}
	public function view_chatting($id_wisatawan)
	{
		$this->db->select('*');
		$this->db->from('tbl_chatting');
		$this->db->join('tbl_wisatawan', 'tbl_chatting.id_wisatawan = tbl_wisatawan.id_wisatawan', 'left');
		$this->db->where('tbl_chatting.id_wisatawan', $id_wisatawan);
		return $this->db->get()->result();
	}
}

/* End of file mChatting.php */
