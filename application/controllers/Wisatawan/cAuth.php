<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cAuth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mAuth');
	}


	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('hak_akses', 'Hak Akses', 'required');

		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Wisatawan/Layouts/head');
			$this->load->view('Wisatawan/Layouts/header');
			$this->load->view('Wisatawan/vLogin');
			$this->load->view('Wisatawan/Layouts/footer');
		} else {
			$hak_akses = $this->input->post('hak_akses');
			if ($hak_akses == '1') {
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$data_cek = $this->mAuth->login_wisatawan($username, $password);
				if ($data_cek) {
					$id = $data_cek->id_wisatawan;
					$nama = $data_cek->nama_wisatawan;
					$member = $data_cek->member;

					$array = array(
						'id_wisatawan' => $id,
						'nama_wisatawan' => $nama,
						'member' => $member
					);

					$this->session->set_userdata($array);
					redirect('Wisatawan/cHome', 'refresh');
				} else {
					$this->session->set_flashdata('error', 'Username dan Password Anda Salah!!!');
					redirect('Wisatawan/cAuth', 'refresh');
				}
			} else {
				$username = $this->input->post('username');
				$password = $this->input->post('password');

				$auth = $this->mAuth->Auth($username, $password);
				if ($auth) {

					$array = array(
						'id' => $auth->id_user,
						'level' => $auth->level_user
					);

					$this->session->set_userdata($array);

					if ($auth->level_user == '1') {
						redirect('Admin/cDashboard');
					} else if ($auth->level_user == '2') {
						redirect('Pengelola/cDashboard');
					}
				} else {
					$this->session->set_flashdata('error', 'Username dan Password Anda Salah!!!');
					redirect('Wisatawan/cAuth', 'refresh');
				}
			}
		}
	}
	public function registrasi()
	{
		$this->form_validation->set_rules('nama', 'Nama Wisatawan', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('tempat', 'Tempat Lahir', 'required');
		$this->form_validation->set_rules('tgl', 'Tanggal Lahir', 'required');
		$this->form_validation->set_rules('jk', 'Jenis Kelamin', 'required');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required|email');
		$this->form_validation->set_rules('no_hp', 'No Telepon', 'required|min_length[11]|max_length[12]');


		if ($this->form_validation->run() == FALSE) {
			$this->load->view('Wisatawan/Layouts/head');
			$this->load->view('Wisatawan/Layouts/header');
			$this->load->view('Wisatawan/vRegistrasi');
			$this->load->view('Wisatawan/Layouts/footer');
		} else {
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
				'member' => '0'
			);
			$this->mAuth->registrasi($data);
			$this->session->set_flashdata('success', 'Anda Berhasil Registrasi!!! Silahkan Login!!!');
			redirect('Wisatawan/cAuth', 'refresh');
		}
	}
	public function logout()
	{

		$this->session->unset_userdata('id_wisatawan');
		$this->session->unset_userdata('nama_wisatawan');
		$this->session->unset_userdata('member');
		$this->cart->destroy();
		$this->session->set_flashdata('success', 'Anda Berhasil Logout!!!');
		redirect('Wisatawan/cAuth', 'refresh');
	}
}

/* End of file cLogin.php */
