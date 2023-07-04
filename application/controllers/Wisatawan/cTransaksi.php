<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cTransaksi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mTransaksi');
		$this->load->model('mProfile');
	}


	public function index()
	{
		$data = array(
			'transaksi' => $this->mTransaksi->transaksi_saya()
		);
		$this->load->view('Wisatawan/Layouts/head');
		$this->load->view('Wisatawan/Layouts/header');
		$this->load->view('Wisatawan/vTransaksiSaya', $data);
		$this->load->view('Wisatawan/Layouts/footer');
	}
	public function detail_transaksi($id)
	{
		$profile = $this->mProfile->profile();
		$data = array(
			'detail' => $this->mTransaksi->detail_transaksi($id, $profile->id_wisatawan),
			'profile' => $this->mProfile->profile()
		);
		$this->load->view('Wisatawan/Layouts/head');
		$this->load->view('Wisatawan/Layouts/header');
		$this->load->view('Wisatawan/vDetailTransaksi', $data);
		$this->load->view('Wisatawan/Layouts/footer');
	}
	public function bayar($id)
	{
		$config['upload_path']          = './asset/bukti-pembayaran';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 500000;
		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('gambar')) {
			$data = array(
				'detail' => $this->mTransaksi->detail_transaksi($id),
				'error' => $this->upload->display_errors()
			);
			$this->load->view('Wisatawan/Layouts/head');
			$this->load->view('Wisatawan/Layouts/header');
			$this->load->view('Wisatawan/vDetailTransaksi', $data);
			$this->load->view('Wisatawan/Layouts/footer');
		} else {
			$upload_data = $this->upload->data();
			$data = array(
				'status_order' => '1',
				'stat_bayar' => '1',
				'bukti_bayar' => $upload_data['file_name']
			);
			$this->mTransaksi->update_status($id, $data);
			$this->session->set_flashdata('success', 'Pembayaran Berhasil Dikirim!');
			redirect('Wisatawan/cTransaksi');
		}
	}
	public function ulasan($id)
	{
		$data = array(
			'id_po_tiket' => $id,
			'ulasan' => $this->input->post('ulasan')
		);
		$this->mTransaksi->ulasan($data);
		$this->session->set_flashdata('success', 'Kritik dan Saran Berhasil Dikirim!');
		redirect('Wisatawan/cTransaksi');
	}
}

/* End of file c.php */
