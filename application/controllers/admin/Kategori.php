<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		$this->simple_login->cek_login();
	}

	// data kategori
	public function index()
	{
		$data = array(	'title' => 'Data Kategori Produk' ,
						'isi' 	=> 'admin/kategori/list'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function ajaxAllData()
	{
		$sendApi 	= sendCurl('/category','GET');
		$sendApi 	= json_decode($sendApi);
		$sendApi 	= $sendApi->data;
		$count = count($sendApi);
		// print_r($count);
		// die();
		$result = array();
		// $no = 1;
		foreach ($sendApi as $key => $val) {
			$result[] = $val;
		}
		$array = array
			(
				"draw" => $_POST['draw'],
				"recordsTotal" => $count,
				"recordsFiltered" => $count,
				"data" => $result,
			);
		echo json_encode($array);
	}

	// Tambah kategori
	public function tambah()
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama Kategori','required',
			array( 	'required'		=> 	'%s harus diisi'));

		if ($valid->run()===FALSE) {

			$data = array(	'title' => 'Tambah Kategori Produk' ,
							'isi' 	=> 'admin/kategori/tambah'
							);	
			$this->load->view('admin/layout/wrapper', $data, FALSE);
		
		}else{
			
			$i 			= $this->input;
			$data 		= array(	'nama_kategori'		=>	$i->post('nama_kategori'));
			$sendApi 	= sendCurl('/category/add','POST',$data);
			$sendApi 	= json_decode($sendApi);
			if ($sendApi->status == '00') {
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
			}else{
				$this->session->set_flashdata('warning', 'Insert Gagal');
			}
			redirect(base_url('admin/kategori'),'refresh');
		}
	}

	// edit kategori
	public function edit($id_kategori)
	{
		$valid = $this->form_validation;

		$valid->set_rules('nama_kategori','Nama Kategori','required',
			array( 	'required'		=> '%s harus diisi'));

		if ($valid->run()===FALSE) {
			// end validasi
		$dataKat = array('id_kategori' => $id_kategori);
		$kategori = sendCurl('/category/detail','POST', $dataKat);
		// print_r($kategori);
		// die();
		$kategori = json_decode($kategori);
		$kategori = $kategori->data[0];
		$data = array(	'title' => 	'Edit Kategori Produk',
						'kategori'	=>	$kategori,
						'isi' 	=> 	'admin/kategori/edit'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
			}else{	
				$i 			= $this->input;
				$data 		= array(	
								'id_kategori'		=>	$id_kategori,
								'nama_kategori'		=>	$i->post('nama_kategori')
								);
				$sendApi 	= sendCurl('/category/edit','POST',$data);
				$sendApi 	= json_decode($sendApi);
				if ($sendApi->status == '00') {
					$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
				}else{
					$this->session->set_flashdata('warning', 'Edit data Gagal');
				}
				redirect(base_url('admin/kategori'),'refresh');
		}
		// end masuk database
	}
	// delete data
	public function delete($id_kategori)
	{
		// print_r($id_kategori);
		// die();
		$data = array('id_kategori' => $id_kategori );
		$sendApi 	= sendCurl('/category/delete','POST',$data);
		$sendApi 	= json_decode($sendApi);
		if ($sendApi->status == '00') {
			$this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		}else{
			$this->session->set_flashdata('warning', 'Hapus data Gagal');
		}
		redirect(base_url('admin/kategori'),'refresh');
	}
}

/* End of file Kategori.php */
/* Location: ./application/controllers/admin/Kategori.php */