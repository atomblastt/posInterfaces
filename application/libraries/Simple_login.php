<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Simple_login
{
	protected $CI;

	public function __construct()
	{
        $this->CI =& get_instance();
	}

	// fungsi login user
	public function login($data)
	{
		$check = sendCurl('/login',$data);
		$check = json_decode($check);
		if ($check->status == '00') {
			$check = $check->data[0];
		}
		// jika ada data user, maka buat session loginnya
		if ($check->status == '00') {
			$user_id		=	$check->user_id;
			$name			=	$check->name;
			$username		=	$check->username;
			$email			=	$check->email;
			$role			=	$check->role;
			// buat session
			$this->CI->session->set_userdata('user_id',$user_id);
			$this->CI->session->set_userdata('name',$name);
			$this->CI->session->set_userdata('email',$email);
			$this->CI->session->set_userdata('username',$username);
			$this->CI->session->set_userdata('role',$role);
			if ($role === '101') {
				// lemparkan ke halaman admin yang di proteksi
			redirect(base_url('admin/produk'),'refresh');
			}else {
					// lemparkan ke halaman admin yang di proteksi
			redirect(base_url('home'),'refresh');
			}
			
		}else{
				// jika username dan password salah
			$this->CI->session->set_flashdata('warning','Username atau Password yang anda masukan SALAH !!!');
			redirect(base_url('login/user'),'refresh');
			}
		}

	// fungsi cek login
	public function cek_login()
	{
		// memeriksa apakah session sudah ada , jika belum maka lemparkan ke halaman login
		if ($this->CI->session->userdata('username') == "") {
			$this->CI->session->set_flashdata('warning','Silahkan Login Terlebih Dahulu');
			redirect(base_url('login/user'),'refresh');
		}
	}

	// fungsi cek login
	public function cek_akses_level()
	{
		// memeriksa apakah session sudah ada , jika belum maka lemparkan ke halaman login
		if ($this->CI->session->userdata('role') == "User") {
			// $this->CI->session->set_flashdata('warning','Anda Bukan Admin');
			redirect(base_url('login/user'),'refresh');
		}
	}

	// fungsi logout
	public function logout()
	{
		// membuang semua session di saat login
		$this->CI->session->unset_userdata('user_id');
		$this->CI->session->unset_userdata('name');
		$this->CI->session->unset_userdata('email');
		$this->CI->session->unset_userdata('username');
		$this->CI->session->unset_userdata('role');
		// jika logout berhasil , redirect ke halaman login
		$this->CI->session->set_flashdata('sukses','Anda berhasil logout');
		redirect(base_url(),'refresh');
		}

}
