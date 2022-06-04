
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	//halaman login
	public function user(){
		// validasi
		// print_r(test('ini helper test'));
		// die();
		$this->form_validation->set_rules('username','Username','required',
				array('required' => 'Harus di isi' ));
		$this->form_validation->set_rules('password','Password','required',
				array('required' => 'Harus di isi' ));

		if ($this->form_validation->run()) {
			$data = array(
				'username' 	=> $this->input->post('username'),
				'password' 	=> $this->input->post('password')
			);
			// prosses ke simple login
			$this->simple_login->login($data);
		}
		// end validasi
		$data = array( 'title' 	=> 	'Login Administrator');
		$this->load->view('admin/login/list', $data, FALSE);
	}
		
	// ambil fungsi logout
	public function logout()
	{
		$this->simple_login->logout();
	}	
}