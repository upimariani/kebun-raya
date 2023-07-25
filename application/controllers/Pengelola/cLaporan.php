<?php
defined('BASEPATH') or exit('No direct script access allowed');

class cLaporan extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('mLaporan');
	}


	public function index()
	{
		$this->load->view('Pengelola/Layout/head');
		$this->load->view('Pengelola/Layout/aside');
		$this->load->view('Pengelola/laporan_transaksi');
		$this->load->view('Pengelola/Layout/footer');
	}


	//laporan transaksi
	public function lap_harian_transaksi()
	{
		$type = $this->input->post('type');
		$tanggal = $this->input->post('tanggal');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'tanggal' => $tanggal,
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_harian_transaksi($tanggal, $bulan, $tahun, $type)
		);
		$this->load->view('Pengelola/Layout/head');
		$this->load->view('Pengelola/Layout/aside');
		$this->load->view('Pengelola/transaksi/harian', $data);
		$this->load->view('Pengelola/Layout/footer');
	}
	public function lap_bulanan_transaksi()
	{
		$type = $this->input->post('type');
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'bulan' => $bulan,
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_bulanan_transaksi($bulan, $tahun, $type)
		);
		$this->load->view('Pengelola/Layout/head');
		$this->load->view('Pengelola/Layout/aside');
		$this->load->view('Pengelola/transaksi/bulanan', $data);
		$this->load->view('Pengelola/Layout/footer');
	}
	public function lap_tahunan_transaksi()
	{
		$type = $this->input->post('type');
		$tahun = $this->input->post('tahun');

		$data = array(
			'tahun' => $tahun,
			'laporan' => $this->mLaporan->lap_tahunan_transaksi($tahun, $type)
		);
		$this->load->view('Pengelola/Layout/head');
		$this->load->view('Pengelola/Layout/aside');
		$this->load->view('Pengelola/transaksi/tahunan', $data);
		$this->load->view('Pengelola/Layout/footer');
	}
}

/* End of file cLaporan.php */
