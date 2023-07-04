<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cDashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('mDashboard');
		$this->load->model('mChatting');
	}


	public function index()
	{
		$data = array(
			'jml' => $this->mDashboard->total(),
			'transaksi' => $this->mDashboard->konfirmasi_transaksi(),
			'chatting' => $this->mChatting->chat_admin(),
			'member' => $this->db->query("SELECT COUNT(id_wisatawan) as jml, member FROM `tbl_wisatawan` GROUP BY member")->result(),
			'total_penjualan' => $this->db->query("SELECT SUM(total_bayar) as bayar, tgl_po_tiket FROM `tbl_po_tiket` GROUP BY tgl_po_tiket")->result()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/vDashboard', $data);
		$this->load->view('Admin/Layout/footer', $data);
	}
	public function view_chatting($id_wisatawan)
	{
		$data = array(
			'id_wisatawan' => $id_wisatawan,
			'view_chatting' => $this->mChatting->view_chatting($id_wisatawan)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/vViewChatting', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function kirim_pesan($id)
	{
		$data = array(
			'staff_send' => $this->input->post('message'),
			'id_wisatawan' => $id,
			'id_user' => '1'
		);
		$this->mChatting->insert($data);
		$this->session->set_flashdata('success', 'Pesan Berhasil Dikirim!');
		redirect('Admin/cDashboard/view_chatting/' . $id);
	}
}

/* End of file cDashboard.php */
