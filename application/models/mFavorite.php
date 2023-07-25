<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mFavorite extends CI_Model
{
	public function wisatawan()
	{
		return $this->db->query("SELECT * FROM `tbl_po_tiket` JOIN tbl_wisatawan ON tbl_wisatawan.id_wisatawan=tbl_po_tiket.id_wisatawan GROUP BY tbl_po_tiket.id_wisatawan")->result();
	}
	public function favorite_wisatawan($id_wisatawan)
	{
		return $this->db->query("SELECT SUM(qty) as qty, member, tbl_wisatawan.id_wisatawan, tbl_tiket.id_tiket, tbl_wisatawan.nama_wisatawan, nama_tiket, harga FROM `tbl_po_tiket` JOIN tbl_detail_po_tiket ON tbl_po_tiket.id_po_tiket = tbl_detail_po_tiket.id_po_tiket JOIN tbl_wisatawan ON tbl_wisatawan.id_wisatawan=tbl_po_tiket.id_wisatawan JOIN tbl_tiket ON tbl_tiket.id_tiket=tbl_detail_po_tiket.id_tiket WHERE tbl_wisatawan.id_wisatawan='" . $id_wisatawan . "' GROUP BY tbl_tiket.id_tiket, tbl_wisatawan.id_wisatawan ORDER BY qty DESC")->result();
	}
}

/* End of file mfavorite.php */
