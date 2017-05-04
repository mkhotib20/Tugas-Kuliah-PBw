<?php 
/**
* 
*/
/**
*
*/
class admin extends CI_Controller{

	function index(){
		if ($this->session->has_userdata('username')) {
			$this->load->view('admin/layout/nav');
			$this->load->view('admin/content/dashboard');
			$this->load->view('admin/layout/footer');
		}
		else{
			redirect(base_url('admin/masuk'));
		}
	}
	function masuk(){
		$this->load->view('admin/login');
	}
	function produk(){
		if ($this->session->has_userdata('username')) {
			$this->load->view('admin/layout/nav');
			$this->load->view('admin/content/produk');
			$this->load->view('admin/layout/footer');
		}
		else{
			redirect(base_url('admin/masuk'));
		}
	}
	function tambah(){
		if ($this->session->has_userdata('username')) {
			$this->load->view('admin/layout/nav');
			$this->load->view('admin/content/tambah');
			$this->load->view('admin/layout/footer');
		}
		else{
			redirect(base_url('admin/masuk'));
		}

	}

	function cek_login(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$read = $this->data->readWh('admin_user', $username)->result_array();
		foreach ($read as $r) {
			$user = $r['admin_username'];
			$pass = $r['admin_password'];
			$nama = $r['admin_nama'];
			$email = $r['admin_email'];
		}
		echo '<br>';
		$key = $this->config->item('encryption_key');
	    $salt1 = hash('sha512', $key . $password);
	    $salt2 = hash('sha512', $password . $key);
	    $hashed_password = hash('sha512', $salt1 . $password . $salt2);
	    
		if ($username==$user) {
			if ($hashed_password==$pass) {
				$data = array(
			        'username'  => $user,
			        'email'     => $email,
			        'nama' => $nama, 
				);
				$this->session->set_userdata($data);
				redirect(base_url('admin'));
			}
			else{
				redirect(base_url('admin'));
			}
		}
		else{
				redirect(base_url('admin'));
		}


	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('admin'));
	}

}
 ?>