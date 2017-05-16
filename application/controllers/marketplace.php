<?php 
/**
* 
*/
class marketplace extends CI_Controller{
	
	function index($page = 'home'){
		$data = $this->data->readNew('produk')->result_array();
		$tampil['produk'] = $data;
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/content/home', $tampil);
		$this->load->view('marketplace/layout/footer');
	}
	function product($cat, $page = 'product'){
		$read = $this->data->readWh('produk', $cat, 'kategori')->result_array();
		$id['produk'] = $read;
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/layout/pagination', $id);
		$this->load->view('marketplace/content/product', $id);
		$this->load->view('marketplace/layout/footer');
	}
	function detail($cat, $page = 'detail produk'){
		$read = $this->data->readWh('produk', $cat, 'id_produk')->result_array();
		foreach ($read as $r) {
			$kategori = $r['kategori'];
		}
		$terkait = $this->data->readWh('produk', $kategori, 'kategori')->result_array();
		$id['produk'] = $read;
		$id['produkTerkait'] = $terkait;
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/layout/pagination', $id);
		$this->load->view('marketplace/content/detail', $id);
		$this->load->view('marketplace/layout/footer');
	}
	function payment($cat, $page = 'payment'){
		if ($this->session->has_userdata('username')) {
			$read = $this->data->readWh('produk', $cat, 'id_produk')->result_array();
			$id['produk'] = $read;
			$id['page'] = $page;
			$this->load->view('marketplace/layout/header', $id);
			$this->load->view('marketplace/layout/pagination', $id);
			$this->load->view('marketplace/content/payment', $id);
			$this->load->view('marketplace/layout/footer');
		}
		else{
			redirect('marketplace/login/'.$cat	);
		}
		
	}
	function login($kode=0, $page = 'login'){
		$read = $this->data->readWh('produk', $kode, 'kategori')->result_array();
		$id['kode'] = $kode;
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/layout/pagination', $id);
		$this->load->view('marketplace/content/login', $id);
		$this->load->view('marketplace/layout/footer');
	}
	function cek_login($kode){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		if ($username=='mkhotib') {
			$data = array(
			        'username'  => $username,
			        'email'     => 'mkhotib@gmail.com',
			        'nama' => 'Muhammad Khotib', 
				);
			$this->session->set_userdata($data);
			if ($kode != 0) {
				redirect('marketplace/payment/'.$kode);
			}
			else{
				redirect('marketplace');
			}
			
		}
		else{
			echo 'salah';
		}
	}
	function logout(){
		$this->session->sess_destroy();
		redirect(base_url());
	}

	function email(){
		
		$this->load->library('email');
		$config['protocol'] = 'sendmail';
		$config['mailpath'] = '/usr/sbin/sendmail';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;

		$this->email->initialize($config);
		$this->email->to('mkhotib20@gmail.com');
		$this->email->from('muhammad.khotib20@gmail.com','eHijab');
		$this->email->subject('[Notifikasi Pendaftaran]');
		$this->email->message('Silahkan klik ');
		$this->email->send();
	}

}
 ?>