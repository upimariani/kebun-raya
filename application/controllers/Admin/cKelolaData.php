<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cKelolaData extends CI_Controller
{


	public function __construct()
	{
		parent::__construct();
		$this->load->model('mKelolaData');
	}

	//kategori
	public function kategori()
	{
		$data = array(
			'kategori' => $this->mKelolaData->select_kategori()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/kategori/vkategori', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createkategori()
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama')
		);
		$this->mKelolaData->insert_kategori($data);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Disimpan!');
		redirect('Admin/cKelolaData/kategori');
	}
	public function updatekategori($id)
	{
		$data = array(
			'nama_kategori' => $this->input->post('nama')
		);
		$this->mKelolaData->updatekategori($id, $data);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Update!');
		redirect('Admin/cKelolaData/kategori');
	}
	public function deletekategori($id)
	{
		$this->mKelolaData->deletekategori($id);
		$this->session->set_flashdata('success', 'Data Kategori Berhasil Dihapus!');
		redirect('Admin/cKelolaData/kategori');
	}

	//tiket
	public function tiket()
	{
		$data = array(
			'tiket' => $this->mKelolaData->select_tiket(),
			'kategori' => $this->mKelolaData->select_kategori()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Tiket/vTiket', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createtiket()
	{
		$data = array(
			'id_kategori' => $this->input->post('kategori'),
			'nama_tiket' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi'),
			'harga' => $this->input->post('harga'),
			'gambar' => 'tiket.png'
		);
		$this->mKelolaData->insert_tiket($data);

		$id_tiket = $this->db->query("SELECT MAX(id_tiket) as id_tiket FROM `tbl_tiket`")->row();

		for ($i = 0; $i < 2; $i++) {
			$data_diskon = array(
				'id_tiket' => $id_tiket->id_tiket,
				'nama_diskon' => 0,
				'diskon' => 0,
				'stat_member' => $i,
			);
			$this->mKelolaData->insert_diskon($data_diskon);
		}

		$this->session->set_flashdata('success', 'Data Tiket Berhasil Disimpan!');
		redirect('Admin/cKelolaData/tiket');
	}
	public function updatetiket($id)
	{
		$data = array(
			'id_kategori' => $this->input->post('kategori'),
			'nama_tiket' => $this->input->post('nama'),
			'deskripsi' => $this->input->post('deskripsi'),
			'harga' => $this->input->post('harga'),
			'gambar' => 'tiket.png'
		);
		$this->mKelolaData->updatetiket($id, $data);
		$this->session->set_flashdata('success', 'Data Tiket Berhasil Update!');
		redirect('Admin/cKelolaData/tiket');
	}
	public function deletetiket($id)
	{
		$this->mKelolaData->deletetiket($id);
		$this->session->set_flashdata('success', 'Data Tiket Berhasil Dihapus!');
		redirect('Admin/cKelolaData/tiket');
	}

	//diskon
	public function diskon()
	{
		$data = array(
			'tiket' => $this->mKelolaData->select_tiket(),
			'diskon' => $this->mKelolaData->select_diskon()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Diskon/vDiskon', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function creatediskon()
	{
		$data = array(
			'id_tiket' => $this->input->post('tiket'),
			'nama_diskon' => $this->input->post('nama'),
			'diskon' => $this->input->post('besar'),
			'stat_member' => $this->input->post('member')
		);
		$this->db->where('id_tiket', $data['id_tiket']);
		$this->db->where('stat_member', $data['stat_member']);
		$this->db->update('tbl_diskon', $data);



		$this->session->set_flashdata('success', 'Data Diskon Berhasil Disimpan!');
		redirect('Admin/cKelolaData/diskon');
	}
	public function updatediskon($id)
	{
		$data = array(
			'id_tiket' => $this->input->post('tiket'),
			'nama_diskon' => $this->input->post('nama'),
			'diskon' => $this->input->post('besar'),
			'stat_member' => $this->input->post('member')
		);
		$this->db->where('id_tiket', $data['id_tiket']);
		$this->db->where('stat_member', $data['stat_member']);
		$this->db->update('tbl_diskon', $data);

		$this->session->set_flashdata('success', 'Data Diskon Berhasil Update!');
		redirect('Admin/cKelolaData/diskon');
	}
	public function deletediskon($id)
	{
		$data = array(
			'nama_diskon' => '0',
			'diskon' => '0'
		);
		$this->db->where('id_diskon', $id);
		$this->db->update('tbl_diskon', $data);

		$this->session->set_flashdata('success', 'Data Tiket Berhasil Dihapus!');
		redirect('Admin/cKelolaData/diskon');
	}

	//user
	public function user()
	{
		$data = array(
			'user' => $this->mKelolaData->select_user()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/user/vuser', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function createuser()
	{
		$data = array(
			'nama_user' => $this->input->post('nama'),
			'no_hp_user' => $this->input->post('no_hp'),
			'alamat_user' => $this->input->post('alamat'),
			'username_user' => $this->input->post('username'),
			'password_user' => $this->input->post('password'),
			'level_user' => $this->input->post('level'),
		);
		$this->mKelolaData->insert_user($data);
		$this->session->set_flashdata('success', 'Data User Berhasil Disimpan!');
		redirect('Admin/cKelolaData/user');
	}
	public function updateuser($id)
	{
		$data = array(
			'nama_user' => $this->input->post('nama'),
			'no_hp_user' => $this->input->post('no_hp'),
			'alamat_user' => $this->input->post('alamat'),
			'username_user' => $this->input->post('username'),
			'password_user' => $this->input->post('password'),
			'level_user' => $this->input->post('level'),
		);
		$this->mKelolaData->updateuser($id, $data);
		$this->session->set_flashdata('success', 'Data User Berhasil Diperbaharui!');
		redirect('Admin/cKelolaData/user');
	}
	public function deleteuser($id)
	{
		$this->mKelolaData->delete($id);
		$this->session->set_flashdata('success', 'Data User Berhasil Dihapus!');
		redirect('Admin/cKelolaData/user');
	}
}

/* End of file cKelolaData.php */
