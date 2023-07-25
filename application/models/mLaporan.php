<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mLaporan extends CI_Model
{

	//---------laporan transaksi------------
	public function lap_harian_transaksi($tanggal, $bulan, $tahun, $type)
	{
		$this->db->select('*');
		$this->db->from('tbl_po_tiket');
		$this->db->join('tbl_wisatawan', 'tbl_po_tiket.id_wisatawan = tbl_wisatawan.id_wisatawan', 'left');
		$this->db->where('tbl_po_tiket.status_order=3');
		$this->db->where('type_po', $type);



		$this->db->where('DAY(tbl_po_tiket.tgl_po_tiket)', $tanggal);
		$this->db->where('MONTH(tbl_po_tiket.tgl_po_tiket)', $bulan);
		$this->db->where('YEAR(tbl_po_tiket.tgl_po_tiket)', $tahun);
		return $this->db->get()->result();
	}
	public function lap_bulanan_transaksi($bulan, $tahun, $type)
	{

		$this->db->select('*');
		$this->db->from('tbl_po_tiket');
		$this->db->join('tbl_wisatawan', 'tbl_po_tiket.id_wisatawan = tbl_wisatawan.id_wisatawan', 'left');
		$this->db->where('tbl_po_tiket.status_order=3');
		$this->db->where('type_po', $type);

		$this->db->where('MONTH(tbl_po_tiket.tgl_po_tiket)', $bulan);
		$this->db->where('YEAR(tbl_po_tiket.tgl_po_tiket)', $tahun);
		return $this->db->get()->result();
	}
	public function lap_tahunan_transaksi($tahun, $type)
	{
		$this->db->select('*');
		$this->db->from('tbl_po_tiket');
		$this->db->join('tbl_wisatawan', 'tbl_po_tiket.id_wisatawan = tbl_wisatawan.id_wisatawan', 'left');
		$this->db->where('tbl_po_tiket.status_order=3');
		$this->db->where('type_po', $type);

		$this->db->where('YEAR(tbl_po_tiket.tgl_po_tiket)', $tahun);
		return $this->db->get()->result();
	}
}


/* End of file mLaporan.php */
