<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cProfile extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mProfile');
	}

	public function index()
	{
		$data = array(
			'profile' => $this->mProfile->profile()
		);
		$this->load->view('Wisatawan/Layouts/head');
		$this->load->view('Wisatawan/Layouts/header');
		$this->load->view('Wisatawan/vDaftarMember', $data);
		$this->load->view('Wisatawan/Layouts/footer');
	}
	public function update($id)
	{
		$data = array(
			'nama_wisatawan' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'tgl_lahir' => $this->input->post('tgl'),
			'tempat_lahir' => $this->input->post('tempat'),
			'jk' => $this->input->post('jk'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'no_hp_wisatawan' => $this->input->post('no_hp'),
			'email' => $this->input->post('email'),
		);
		$this->mProfile->update_profile($id, $data);
		$this->session->set_flashdata('success', 'Data Profile berhasil diperbaharui!!!');
		redirect('Wisatawan/cProfile');
	}
	public function daftar_member($id)
	{
		$data = array(
			'member' => '1'
		);
		$this->mProfile->update_profile($id, $data);
		$this->session->set_flashdata('success', 'Anda berhasil menjadi member!!!');
		redirect('Wisatawan/cProfile');
	}
}

/* End of file cProfile.php */
