<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mHome extends CI_Model
{
	public function tiket()
	{
		$this->db->select('tbl_tiket.id_tiket, nama_tiket, harga, deskripsi, diskon, nama_diskon, stat_member');
		$this->db->from('tbl_tiket');
		$this->db->join('tbl_kategori', 'tbl_tiket.id_kategori = tbl_kategori.id_kategori', 'left');
		$this->db->join('tbl_diskon', 'tbl_diskon.id_tiket = tbl_tiket.id_tiket', 'left');
		$this->db->where('stat_member', $this->session->userdata('member'));
		return $this->db->get()->result();
	}
	public function ulasan()
	{
		$this->db->select('*');
		$this->db->from('tbl_ulasan');
		$this->db->join('tbl_po_tiket', 'tbl_ulasan.id_po_tiket = tbl_po_tiket.id_po_tiket', 'left');
		$this->db->join('tbl_wisatawan', 'tbl_wisatawan.id_wisatawan = tbl_po_tiket.id_wisatawan', 'left');
		return $this->db->get()->result();
	}
	public function diskon_recomended()
	{
		return $this->db->query("SELECT SUM(qty) as qty, member, tbl_wisatawan.id_wisatawan, tbl_tiket.id_tiket, tbl_wisatawan.nama_wisatawan, nama_tiket, harga, diskon FROM `tbl_po_tiket` JOIN tbl_detail_po_tiket ON tbl_po_tiket.id_po_tiket = tbl_detail_po_tiket.id_po_tiket JOIN tbl_wisatawan ON tbl_wisatawan.id_wisatawan=tbl_po_tiket.id_wisatawan JOIN tbl_tiket ON tbl_tiket.id_tiket=tbl_detail_po_tiket.id_tiket JOIN tbl_diskon ON tbl_tiket.id_tiket=tbl_diskon.id_diskon WHERE tbl_wisatawan.id_wisatawan='" . $this->session->userdata('id_wisatawan') . "' GROUP BY tbl_tiket.id_tiket, tbl_wisatawan.id_wisatawan ORDER BY qty DESC")->result();
	}
}

/* End of file mHome.php */
