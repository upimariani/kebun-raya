<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cChatting extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('mChatting');
	}


	public function index()
	{
		$data = array(
			'chatting' => $this->mChatting->chatting()
		);
		$this->load->view('Wisatawan/Layouts/head');
		$this->load->view('Wisatawan/Layouts/header');
		$this->load->view('Wisatawan/vChatting', $data);
		$this->load->view('Wisatawan/Layouts/footer');
	}
	public function insert()
	{
		$data = array(
			'pelanggan_send' => $this->input->post('message'),
			'id_wisatawan' => $this->session->userdata('id_wisatawan'),
			'id_user' => '1'
		);
		$this->mChatting->insert($data);
		$this->session->set_flashdata('success', 'Pesan Berhasil Dikirim!');
		redirect('Wisatawan/cChatting');
	}
}

/* End of file cChatting.php */
