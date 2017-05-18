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

	function setting($page = 'setting'){
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/layout/pagination', $id);
		$this->load->view('marketplace/content/setting', $id);
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
		if ($this->session->has_userdata('username')) {
			redirect('marketplace');
		}
		else{
			$read = $this->data->readWh('produk', $kode, 'kategori')->result_array();
			$id['kode'] = $kode;
			$id['page'] = $page;
			$this->load->view('marketplace/layout/header', $id);
			$this->load->view('marketplace/layout/pagination', $id);
			$this->load->view('marketplace/content/login', $id);
			$this->load->view('marketplace/layout/footer');

		}
	}
	function cek_login($kode){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$read = $this->data->readWh('user_account', $username, 'id_user')->result_array();
		$hashed_password = $this->data->rahasia($password);
		foreach ($read as $r) {
			$user = $r['id_user'];
			$pass = $r['password_user'];
			$nama = $r['nama_user'];
			$email = $r['email_user'];
		}
		if ($username==$user) {
			if ($hashed_password==$pass) {
				$data = array(
			        'username'  => $username,
			        'email'     => $email,
			        'nama' => $nama, 
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
				echo 'kurang';
			}
			
		}
		else{
			echo 'salah';
		}
	}
	function logout(){
		unset($_SESSION['username']);		
		redirect(base_url());
	}

	function email(){
		$this->load->library('email');
	   $config = array();
	   $config['charset'] = 'utf-8';
	   $config['useragent'] = 'Codeigniter'; //bebas sesuai keinginan kamu
	   $config['protocol']= "smtp";
	   $config['mailtype']= "text";
	   $config['smtp_host']= "ssl://smtp.gmail.com";
	   $config['smtp_port']= "465";
	   $config['smtp_timeout']= "5";
	   $config['smtp_user']= "muhammad.khotib20@gmail.com";              //isi dengan email anda
	   $config['smtp_pass']= "muhammad1998";            // isi dengan password dari email anda
	   $config['crlf']="\r\n";
	   $config['newline']="\r\n";
	  
	   $config['wordwrap'] = TRUE;

	 //memanggil library email dan set konfigurasi untuk pengiriman email
	   
	   $this->email->initialize($config);
	 //konfigurasi pengiriman kotak di view ke pengiriman email di gmail
	   $this->email->from('muhammad.khotib20@gmail.com');
	   $this->email->to('mkhotib20@gmail.com');
	   $this->email->subject('Percobaan');
	   $this->email->message('Ini Notifikasi');
	  
	   if($this->email->send())
	   {
	    echo "tutorial pengiriman email primasaja.com berhasil";
	   }else
	   {
	    echo "tutorial pengiriman email primasaja.com gagal";
	   }

	}

}
 ?>