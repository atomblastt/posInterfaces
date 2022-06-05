<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
	
	// laod model
	public function __construct()
	{
		parent::__construct();
		// $this->load->model('produk_model');
		// $this->load->model('kategori_model');
		// $this->load->model('transaksi_kasir_model');
		// $this->load->library('Zend');
		// $this->load->model('konfigurasi_model');
		// proteksi halaman 
		// $this->simple_login->cek_login();
	}

	// data produk
	public function index()
	{
		$produk 	= sendCurl('/product','GET');
		$produk 	= json_decode($produk);
		$produk 	= $produk->data;
		// $site 					=	$this->konfigurasi_model->listing();
		// print_r($produk);
		// die();
		$data = array(	'title' => 'Data Produk' ,
						'produk' 	=> $produk ,
						// 'site' 	=> $site ,
						'isi' 	=> 'admin/produk/list'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	public function ajaxAllData()
	{
		$sendApi 	= sendCurl('/product','GET');
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

	// Tambah produk
	public function tambah()
	{
		$kategori 	= sendCurl('/category','GET');
		$kategori 	= json_decode($kategori);
		$kategori 	= $kategori->data;

		// validasi tambah
		$valid = $this->form_validation;

		$valid->set_rules('nama_produk','Nama Produk','required',
			array( 	'required'		=> '%s harus diisi'));

		$valid->set_rules('kode_produk','Kode Produk','required',		
			array( 	'required'		=> 	'%s harus diisi'));
		
		if ($valid->run()) {
			$nmfile = "file_".time();
			$config['upload_path'] 		= './assets/upload/image/';
			$config['allowed_types']	= 'gif|jpg|png|jpeg';
			$config['max_size']  		= '2400'; //dalam KB
			$config['max_width']  		= '2024';
			$config['max_height']  		= '2024';
			$config['file_name'] 		= $nmfile;
			
			$this->load->library('upload', $config);
			if (! $this->upload->do_upload('gambar')){
			// end validasi

		$data = array(	'title' 	=> 'Tambah Produk' ,
						'kategori' 	=> $kategori,
						'error'		=> $this->upload->display_errors(),
						'isi' 		=> 'admin/produk/tambah'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
		// masuk Database
		}else{
			$upload_gambar = array('upload_data' => $this->upload->data());
			$i= $this->input;
			$data = array(	'id_user'			=>	$this->session->userdata('user_id'),
							'id_kategori'		=>	$i->post('id_kategori'),
							'kode_produk'		=>	$i->post('kode_produk'),
							'nama_produk'		=>	$i->post('nama_produk'),
							'keterangan'		=>	$i->post('keterangan'),
							'harga'				=>	$i->post('harga'),
							'stok'				=>	$i->post('stok'),
							'gambar'			=>	$upload_gambar['upload_data']['file_name'],
							'status_produk'		=>	$i->post('status_produk'),
							'tanggal_post'		=>	date('Y-m-d H:i:s')
						);
			$sendApi 	= sendCurl('/product/add','POST',$data);
			$sendApi 	= json_decode($sendApi);
			// print_r($data);
			// die();
			if ($sendApi->status == '00') {
				$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
			}else{
				$this->session->set_flashdata('warning', 'Insert Gagal - '.$sendApi->message);
			}
			// die();
			redirect(base_url('admin/produk'),'refresh');
		}}
		// end masuk database
		$data = array(	'title' 	=> 'Tambah Produk',
						'kategori' 	=> $kategori,
						'isi' 		=> 'admin/produk/tambah'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}
	// edit produk
	public function edit($id_produk)
	{
		// ambil data produk yang akan di edit
		$kategori 	= sendCurl('/category','GET');
		$kategori 	= json_decode($kategori);
		$kategori 	= $kategori->data;
		
		$dataPro = array('id_produk' => $id_produk);
		$produk = sendCurl('/product/detail','POST', $dataPro);
		$produk 	= json_decode($produk);
		$produk 	= $produk->data[0];

		// print_r($produk);
		// die();
		if ($this->input->post('keterangan') == "") {
			$keterangan = $produk->description;
		}else{
			$keterangan = $this->input->post('keterangan');
		}
		// validasi tambah
		$valid 		= 	$this->form_validation;

		$valid->set_rules('nama_produk','Nama Produk','required',
			array( 	'required'		=> '%s harus diisi'));
		$valid->set_rules('kode_produk','Kode Produk','required',		
			array( 	'required'		=> 	'%s harus diisi'));
		
		if ($valid->run()) {
			// cek jika gambar diganti
			if(!empty($_FILES['gambar']['name'])){
				$nmfile = "file_".time();
				$config['upload_path'] 		= './assets/upload/image/';
				$config['allowed_types']	= 'gif|jpg|png|jpeg';
				$config['max_size']  		= '2400'; //dalam KB
				$config['max_width']  		= '2024';
				$config['max_height']  		= '2024';
				$config['file_name'] 		= $nmfile;
				
				$this->load->library('upload', $config);
				if (! $this->upload->do_upload('gambar')){
				// end validasi

				$data = array(	'title' 	=> 'Edit Produk:	'.$produk->nama_produk ,
								'kategori' 	=> $kategori,
								'produk'	=> $produk,
								'error'		=> $this->upload->display_errors(),
								'isi' 		=> 'admin/produk/edit'
								);	
				$this->load->view('admin/layout/wrapper', $data, FALSE);
				// masuk Database
				}else{
					$upload_gambar = array('upload_data' => $this->upload->data());
					$i= $this->input;
					// slug produkx
					$slug_produk = url_title($this->input->post('nama_produk').'_'.$this->input->post('kode_produk'), 'dash', TRUE);
					$data = array(	'id_produk'			=>	$id_produk,
									'id_kategori'		=>	$i->post('id_kategori'),
									'kode_produk'		=>	$i->post('kode_produk'),
									'nama_produk'		=>	$i->post('nama_produk'),
									'keterangan'		=>	$keterangan,
									'harga'				=>	$i->post('harga'),
									'stok'				=>	$i->post('stok'),
									'gambar'			=>	$upload_gambar['upload_data']['file_name'],
									'status_produk'		=>	$i->post('status_produk'),
									'tanggal_post'		=>	date('Y-m-d H:i:s')
								);
					$sendApi 	= sendCurl('/product/edit','POST',$data);
					$sendApi 	= json_decode($sendApi);
					// print_r($sendApi);
					// die();
					if ($sendApi->status == '00') {
						$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
					}else{
						$this->session->set_flashdata('warning', 'Update Gagal - '.$sendApi->message);
					}
					redirect(base_url('admin/produk'),'refresh');
				}
			}else{
				$i= $this->input;
				// slug produk
				$slug_produk = url_title($this->input->post('nama_produk').'_'.$this->input->post('kode_produk'), 'dash', TRUE);
				$data = array(	'id_produk'			=>	$id_produk,
								'id_kategori'		=>	$i->post('id_kategori'),
								'kode_produk'		=>	$i->post('kode_produk'),
								'nama_produk'		=>	$i->post('nama_produk'),
								'keterangan'		=>	$keterangan,
								'harga'				=>	$i->post('harga'),
								'stok'				=>	$i->post('stok'),
								// 'gambar'			=>	$upload_gambar['upload_data']['file_name'],
								'status_produk'		=>	$i->post('status_produk'),
								'tanggal_post'		=>	date('Y-m-d H:i:s')
							);
				$sendApi 	= sendCurl('/product/edit','POST',$data);
				$sendApi 	= json_decode($sendApi);
				// print_r($data);
				// die();
				if ($sendApi->status == '00') {
					$this->session->set_flashdata('sukses', 'Data Berhasil Di Simpan');
				}else{
					$this->session->set_flashdata('warning', 'Update Gagal - '.$sendApi->message);
				}
				// die();
				redirect(base_url('admin/produk'),'refresh');
		}}
		// end masuk database
		$data = array(	'title' 	=> 'Edit Produk' ,
						'kategori' 	=> $kategori,
						'produk'	=> $produk,
						'isi' 		=> 'admin/produk/edit'
						);	
		$this->load->view('admin/layout/wrapper', $data, FALSE);
	}

	// delete data
	public function delete($id_produk)
	{
		$dataPro 	= array('id_produk' => $id_produk);
		$produk 	= sendCurl('/product/detail','POST', $dataPro);
		$produk 	= json_decode($produk);
		$produk 	= $produk->data[0];
		// unlink('./assets/upload/image/'.$produk->image);
		$data 		= array('id_produk' => $id_produk );
		// print_r($data);
		// die();
		$sendApi 	= sendCurl('/product/delete','POST',$data);
		$sendApi 	= json_decode($sendApi);
		if ($sendApi->status == '00') {
			$this->session->set_flashdata('sukses', 'Data Berhasil Di Hapus');
		}else{
			$this->session->set_flashdata('warning', 'Hapus data Gagal');
		}
		redirect(base_url('admin/produk'),'refresh');
	}
}

/* End of file Produk.php */
/* Location: ./application/controllers/admin/Produk.php */