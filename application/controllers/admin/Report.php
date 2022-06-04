<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->load->model('transaksi_model');
		// proteksi halaman 
		$this->simple_login->cek_login();
	}

	// report penjualan
	public function index()
	{
		
	}
}