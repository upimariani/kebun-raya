<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mDashboard extends CI_Model
{
	public function total()
	{
		$data['wisatawan_member'] = $this->db->query("SELECT COUNT(id_wisatawan) as jml_wisatawan_member FROM tbl_wisatawan WHERE member =1")->row();
		$data['wisatawan_non_member'] = $this->db->query("SELECT COUNT(id_wisatawan) as jml_wisatawan_non_member FROM tbl_wisatawan WHERE member =0")->row();
		$data['tiket'] = $this->db->query("SELECT COUNT(id_tiket) as jml_tiket FROM tbl_tiket")->row();
		$data['user'] = $this->db->query("SELECT COUNT(id_user) as jml_user FROM `tbl_user`;")->row();
		return $data;
	}
	public function konfirmasi_transaksi()
	{
		$this->db->select('*');
		$this->db->from('tbl_po_tiket');
		$this->db->join('tbl_wisatawan', 'tbl_po_tiket.id_wisatawan = tbl_wisatawan.id_wisatawan', 'left');
		$this->db->where('status_order=1');
		return $this->db->get()->result();
	}
}

/* End of file mDashboard.php */
