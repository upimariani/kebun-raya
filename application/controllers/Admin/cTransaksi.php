<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
	}
	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/transaksi/vtransaksi', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function detail_transaksi($id, $member_wisatawan)
	{
		$data = array(
			'detail' => $this->mTransaksi->detail_transaksi($id, $member_wisatawan)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/transaksi/vdetailtransaksi', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function konfirmasi($id)
	{
		$data = array(
			'status_order' => '2'
		);
		$this->mTransaksi->update_status($id, $data);
		$this->session->set_flashdata('success', 'Pesanan Berhasil Dikonfirmasi!');
		redirect('Admin/cTransaksi');
	}
}

/* End of file cTransaksi.php */
