<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksiLangsung extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
		$this->load->model('mKelolaData');
	}
	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi_langsung(),
			'tiket' => $this->mKelolaData->select_tiket()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/transaksi/vtransaksilangsung', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function addtocart()
	{
		$data = array(
			'id' => $this->input->post('id'),
			'name' => $this->input->post('nama'),
			'price' => $this->input->post('harga'),
			'qty' => $this->input->post('qty')
		);
		$this->cart->insert($data);
		$this->session->set_flashdata('success', 'Tiket Berhasil Ditambahkan ke Keranjang!');
		redirect('Admin/cTransaksiLangsung', 'refresh');
	}
	public function deletecart($id)
	{
		$this->cart->remove($id);
		redirect('Admin/cTransaksiLangsung', 'refresh');
	}
	public function selesai()
	{
		//data transaksi
		$transaksi = array(
			'id_wisatawan' => '-',
			'tgl_po_tiket' => date('Y-m-d'),
			'total_bayar' => $this->cart->total(),
			'status_order' => '3',
			'stat_bayar' => '-',
			'bukti_bayar' => '-',
			'tgl_boking' => '-',
			'type_po' => '1'
		);
		$this->db->insert('tbl_po_tiket', $transaksi);
		$id_transaksi = $this->db->query("SELECT MAX(id_po_tiket) as id FROM `tbl_po_tiket`")->row();

		//data tiket
		foreach ($this->cart->contents() as $key => $value) {
			$tiket = array(
				'id_po_tiket' => $id_transaksi->id,
				'id_tiket' => $value['id'],
				'qty' => $value['qty']
			);
			$this->db->insert('tbl_detail_po_tiket', $tiket);
		}

		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Data Transaksi Langsung Berhasil Disimpan!!!');
		redirect('Admin/cTransaksiLangsung', 'refresh');
	}
	public function detail_transaksi($id)
	{
		$data = array(
			'detail' => $this->mTransaksi->detail_transaksilangsung($id)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/transaksi/vdetailtransaksilangsung', $data);
		$this->load->view('Admin/Layout/footer');
	}
}

/* End of file cTransaksiLangsung.php */
