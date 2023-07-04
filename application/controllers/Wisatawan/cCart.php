<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cCart extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}


	public function index()
	{
		$this->load->view('Wisatawan/Layouts/head');
		$this->load->view('Wisatawan/Layouts/header');
		$this->load->view('Wisatawan/vCart');
		$this->load->view('Wisatawan/Layouts/footer');
	}
	public function update_cart()
	{
		$i = 1;
		foreach ($this->cart->contents() as $items) {
			$data = array(
				'rowid'  => $items['rowid'],
				'qty'    => $this->input->post($i . '[qty]')
			);
			$this->cart->update($data);
			$i++;
		}
		redirect('Wisatawan/ccart');
	}
	public function checkout()
	{
		$data = array(
			'id_wisatawan' => $this->session->userdata('id_wisatawan'),
			'tgl_po_tiket' => date('Y-m-d'),
			'total_bayar' => $this->cart->total(),
			'status_order' => '0',
			'stat_bayar' => '0',
			'bukti_bayar' => '0',
			'tgl_boking' => $this->input->post('date')
		);
		$this->mTransaksi->insert_transaksi($data);

		$id_transaksi = $this->db->query("SELECT MAX(id_po_tiket) as id FROM `tbl_po_tiket`")->row();

		//menyimpan pesanan ke detail transaksi
		$i = 1;
		foreach ($this->cart->contents() as $item) {
			$data_rinci = array(
				'id_po_tiket' => $id_transaksi->id,
				'id_tiket' => $item['id'],
				'qty' => $item['qty']
			);
			$this->mTransaksi->insert_detail_transaksi($data_rinci);
		}

		$this->cart->destroy();
		redirect('Wisatawan/cHome');
	}
}

/* End of file cCart.php */
