<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cHome extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mHome');
		$this->load->model('mProfile');
	}


	public function index()
	{
		$data = array(
			'tiket' => $this->mHome->tiket(),
			'ulasan' => $this->mHome->ulasan(),
			'profile' => $this->mProfile->profile()
		);
		$this->load->view('Wisatawan/Layouts/head');
		$this->load->view('Wisatawan/Layouts/header');
		$this->load->view('Wisatawan/vHome', $data);
		$this->load->view('Wisatawan/Layouts/footer');
	}
	public function add_to_cart()
	{
		$data_cart = array(
			'name' => $this->input->post('name'),
			'id' => $this->input->post('id'),
			'price' => $this->input->post('price'),
			'qty' => $this->input->post('qty')
		);
		$this->cart->insert($data_cart);
		redirect('Wisatawan/cHome', 'refresh');
	}
}

/* End of file cHome.php */
