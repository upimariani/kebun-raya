<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cFavorite extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mFavorite');
	}

	public function index()
	{
		$data = array(
			'wisatawan' => $this->mFavorite->wisatawan()
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Favorite/vFavorite', $data);
		$this->load->view('Admin/Layout/footer');
	}
	public function detail_favorite($id)
	{
		$data = array(
			'favorite' => $this->mFavorite->favorite_wisatawan($id)
		);
		$this->load->view('Admin/Layout/head');
		$this->load->view('Admin/Layout/aside');
		$this->load->view('Admin/Favorite/vDetailFavorite', $data);
		$this->load->view('Admin/Layout/footer');
	}
}

/* End of file cFavorite.php */
