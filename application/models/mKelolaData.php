<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mKelolaData extends CI_Model
{
	//kategori
	public function select_kategori()
	{
		$this->db->select('*');
		$this->db->from('tbl_kategori');
		return $this->db->get()->result();
	}
	public function insert_kategori($data)
	{
		$this->db->insert('tbl_kategori', $data);
	}
	public function updatekategori($id, $data)
	{
		$this->db->where('id_kategori', $id);
		$this->db->update('tbl_kategori', $data);
	}
	public function deletekategori($id)
	{
		$this->db->where('id_kategori', $id);
		$this->db->delete('tbl_kategori');
	}

	//tiket
	public function select_tiket()
	{
		$this->db->select('*');
		$this->db->from('tbl_tiket');
		$this->db->join('tbl_kategori', 'tbl_tiket.id_kategori = tbl_kategori.id_kategori', 'left');

		return $this->db->get()->result();
	}
	public function insert_tiket($data)
	{
		$this->db->insert('tbl_tiket', $data);
	}
	public function updatetiket($id, $data)
	{
		$this->db->where('id_tiket', $id);
		$this->db->update('tbl_tiket', $data);
	}
	public function deletetiket($id)
	{
		$this->db->where('id_tiket', $id);
		$this->db->delete('tbl_tiket');
	}

	//diskon
	public function select_diskon()
	{
		$this->db->select('*');
		$this->db->from('tbl_diskon');
		$this->db->join('tbl_tiket', 'tbl_diskon.id_tiket = tbl_tiket.id_tiket', 'left');
		$this->db->where('diskon != 0');
		return $this->db->get()->result();
	}
	public function insert_diskon($data)
	{
		$this->db->insert('tbl_diskon', $data);
	}
	public function updatediskon($id, $data)
	{
		$this->db->where('id_diskon', $id);
		$this->db->update('tbl_diskon', $data);
	}
	public function deletediskon($id)
	{
		$this->db->where('id_diskon', $id);
		$this->db->delete('tbl_diskon');
	}

	//user
	public function select_user()
	{
		$this->db->select('*');
		$this->db->from('tbl_user');
		return $this->db->get()->result();
	}
	public function insert_user($data)
	{
		$this->db->insert('tbl_user', $data);
	}
	public function updateuser($id, $data)
	{
		$this->db->where('id_user', $id);
		$this->db->update('tbl_user', $data);
	}
	public function delete($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('tbl_user');
	}
}

/* End of file mKelolaData.php */
