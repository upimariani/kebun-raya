<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mTransaksi extends CI_Model
{

	//admin
	public function transaksi()
	{
		$this->db->select('*');
		$this->db->from('tbl_po_tiket');
		$this->db->join('tbl_wisatawan', 'tbl_po_tiket.id_wisatawan = tbl_wisatawan.id_wisatawan', 'left');
		$this->db->where('type_po=0');
		return $this->db->get()->result();
	}
	public function transaksi_langsung()
	{
		$this->db->select('*');
		$this->db->from('tbl_po_tiket');
		$this->db->join('tbl_wisatawan', 'tbl_po_tiket.id_wisatawan = tbl_wisatawan.id_wisatawan', 'left');
		$this->db->where('type_po=1');
		return $this->db->get()->result();
	}
	public function detail_transaksilangsung($id_transaksi)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM `tbl_po_tiket` WHERE tbl_po_tiket.id_po_tiket='" . $id_transaksi . "'")->row();
		$data['tiket'] = $this->db->query("SELECT * FROM `tbl_po_tiket`JOIN tbl_detail_po_tiket ON tbl_po_tiket.id_po_tiket = tbl_detail_po_tiket.id_po_tiket JOIN tbl_tiket ON tbl_tiket.id_tiket = tbl_detail_po_tiket.id_tiket  WHERE tbl_po_tiket.id_po_tiket='" . $id_transaksi . "'")->result();
		return $data;
	}

	//wisatawan
	public function insert_transaksi($data)
	{
		$this->db->insert('tbl_po_tiket', $data);
	}
	public function insert_detail_transaksi($data)
	{
		$this->db->insert('tbl_detail_po_tiket', $data);
	}
	public function transaksi_saya()
	{
		$this->db->select('*');
		$this->db->from('tbl_po_tiket');
		$this->db->join('tbl_wisatawan', 'tbl_po_tiket.id_wisatawan = tbl_wisatawan.id_wisatawan', 'left');
		$this->db->where('tbl_po_tiket.id_wisatawan', $this->session->userdata('id_wisatawan'));

		return $this->db->get()->result();
	}
	public function detail_transaksi($id_transaksi, $member_wisatawan)
	{
		$data['transaksi'] = $this->db->query("SELECT * FROM `tbl_po_tiket` JOIN tbl_wisatawan ON tbl_po_tiket.id_wisatawan=tbl_wisatawan.id_wisatawan LEFT JOIN tbl_ulasan ON tbl_ulasan.id_po_tiket=tbl_po_tiket.id_po_tiket WHERE tbl_po_tiket.id_po_tiket='" . $id_transaksi . "'")->row();
		$data['tiket'] = $this->db->query("SELECT * FROM `tbl_po_tiket`JOIN tbl_detail_po_tiket ON tbl_po_tiket.id_po_tiket = tbl_detail_po_tiket.id_po_tiket JOIN tbl_tiket ON tbl_tiket.id_tiket = tbl_detail_po_tiket.id_tiket LEFT JOIN tbl_diskon ON tbl_diskon.id_tiket = tbl_tiket.id_tiket  WHERE stat_member='" . $member_wisatawan . "' AND tbl_po_tiket.id_po_tiket='" . $id_transaksi . "'")->result();
		return $data;
	}
	public function update_status($id, $data)
	{
		$this->db->where('id_po_tiket', $id);
		$this->db->update('tbl_po_tiket', $data);
	}
	public function ulasan($data)
	{
		$this->db->insert('tbl_ulasan', $data);
	}
}

/* End of file mTransaksi.php */
