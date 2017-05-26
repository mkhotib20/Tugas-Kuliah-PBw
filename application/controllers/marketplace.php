<?php 

class marketplace extends CI_Controller{
	
	function index($page = 'home'){
		$data = $this->data->readNew('produk')->result_array();
		$tampil['produk'] = $data;
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/content/home', $tampil);
		$this->load->view('marketplace/layout/footer');
	}
	function gantiPass(){
		$username = $this->session->userdata('username');
		$passLama = $this->input->post('passLama');
		$passBaru = $this->input->post('passBaru');
		$confPassBaru = $this->input->post('confPassBaru');
		$data = $this->data->readWh('user_account', $username, 'id_user')->result_array();
		foreach ($data as $d) {
			$password = $d['password_user'];
		}
		$hashed_password = $this->data->rahasia($passLama);
		if ($passBaru==$confPassBaru) {
			if ($hashed_password==$password) {
				$hashedPassBaru = $this->data->rahasia($passBaru);
				$data = array('password_user' => $hashedPassBaru);
				$where = array('id_user' => $username);
				if ($this->data->updateProduk('user_account', $data, $where)) {
					$this->session->set_flashdata('msgSc', '
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Success!</strong> Update Password Berhasil
							</div>
						');
					redirect('marketplace/changePass');
				}
				else{
					$this->session->set_flashdata('msgSc', '
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Failed!</strong> Gagal mengganti password
							</div>
						');
					redirect('marketplace/changePass');
				}
			}
			else{
				$this->session->set_flashdata('msgSc', '
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Failed!</strong> Password yang anda masukan salah
							</div>
						');
					redirect('marketplace/changePass');
			}
		}
		else{
			$this->session->set_flashdata('msgSc', '
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Failed!</strong> Password tidak cocok
							</div>
						');
					redirect('marketplace/changePass');
		}
	}
	function changePass($page='ganti password'){
		$id['page'] = $page;
		if ($this->session->has_userdata('username')) {
			$username = $this->session->userdata('username');
			$data = $this->data->readWh('user_account', $username, 'id_user')->result_array();
			$id['read'] = $data;
			$this->load->view('marketplace/layout/header', $id);
			$this->load->view('marketplace/layout/pagination', $id);
			$this->load->view('marketplace/content/setPass', $id);
			$this->load->view('marketplace/layout/footer');
		}
		else{
			redirect('marketplace');
		}
	}
	function updateProfile(){
		if ($this->session->has_userdata('username')) {
			$config['upload_path']          = './assets/marketplace/img/profile_user';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 5000;
	        $config['max_width']            = 2048;
	        $config['max_height']           = 2048;
	        $this->load->library('upload', $config);
	        $username = $this->input->post('username');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$alamat = $this->input->post('alamat');
			$where = array('id_user' => $username);
	       

	        if ($this->upload->do_upload('gambar')) {
	        	$url = base_url('assets/marketplace/img/profile_user/').$this->upload->data('file_name');
	        	$data = array(
					'nama_user' => $nama, 
					'alamat_user' => $alamat, 
					'email_user' => $email, 
					'gambar_user' => $url
				);
				$this->session->set_userdata('gambar', $url);
	        }
	        else{
	        	 $data = array(
					'nama_user' => $nama, 
					'alamat_user' => $alamat, 
					'email_user' => $email, 
				);
	        }

			if ($this->data->updateProduk('user_account', $data, $where)) {
				$this->session->set_userdata('nama', $nama);
				$this->session->set_flashdata('success', '
        			<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Success!</strong> Update Profile Berhasil
					</div>
        		');
				redirect('marketplace/setting');
			}
			else{
				$this->session->set_flashdata('success', '
        			<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Warning!</strong> Update Gagal
					</div>
        		');
				redirect('marketplace/setting');
			}
        	
		}
		else{
			redirect('marketplace');
		}
	}
	function product($cat, $page = 'product'){
		$read = $this->data->readWh('produk', $cat, 'kategori', 'timestamp')->result_array();
		$id['produk'] = $read;
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/layout/pagination', $id);
		$this->load->view('marketplace/content/product', $id);
		$this->load->view('marketplace/layout/footer');
	}
	function searchResult($page = 'search result'){
		$keyword = $_POST['srch-term'];
		$data = $this->data->search('produk', 'nama_produk', $keyword)->result_array();
		$rows = $this->data->search('produk', 'nama_produk', $keyword)->num_rows();
		if ($rows>0) {
			$tampil['error'] = '';
		}
		else{
			$tampil['error'] = 'Data tidak ditemukan';
		}
		$tampil['produk'] = $data;
		$tampil['page'] = $page;
		$this->load->view('marketplace/layout/header', $tampil);
		$this->load->view('marketplace/layout/pagination', $tampil);
		$this->load->view('marketplace/content/searchResult', $tampil);
		$this->load->view('marketplace/layout/footer');
	}
	function setting($page = 'update profile'){
		$id['page'] = $page;
		if ($this->session->has_userdata('username')) {
			$username = $this->session->userdata('username');
			$data = $this->data->readWh('user_account', $username, 'id_user')->result_array();
			$id['read'] = $data;
			$this->load->view('marketplace/layout/header', $id);
			$this->load->view('marketplace/layout/pagination', $id);
			$this->load->view('marketplace/content/setting', $id);
			$this->load->view('marketplace/layout/footer');
		}
		else{
			redirect('marketplace');
		}
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
	function payment($cat, $warna, $jumlah, $page = 'payment'){
		$id_produk = $cat;
		$read = $this->data->readWh('produk', $id_produk, 'id_produk')->result_array();
		$id['produk'] = $read;
		$id['page'] = $page;
		$id['warna'] = $warna;
		$id['jumlah'] = $jumlah;
		$id['kode'] = $cat;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/layout/pagination', $id);
		$this->load->view('marketplace/content/payment', $id);
		$this->load->view('marketplace/layout/footer');
		
		
	}
	function po($id){
		$jumlah  = $_GET['jumlah'];
		$warna = $_GET['warna'];
		if ($this->session->has_userdata('username')) {
			if ($this->isVerified($this->session->userdata('username'))) {
				redirect('marketplace/payment/'.$id.'/'.$warna.'/'.$jumlah);
			}
			else{
				redirect('marketplace/veriv/'.$id.'/'.$warna.'/'.$jumlah);
			}
		}
		else
			redirect('marketplace/login/'.$id.'/'.$warna.'/'.$jumlah);
	}
	function login($kode=0, $warna=0, $jumlah=0, $page = 'login'){
		if ($this->session->has_userdata('username')) {
			if ($this->isVerified($this->session->userdata('username'))) {
				redirect('marketplace');
			}
			else{
				redirect('marketplace/veriv');
			}
		}
		else{
			$read = $this->data->readWh('produk', $kode, 'kategori')->result_array();
			$id['kode'] = $kode;
			$id['page'] = $page;
			$id['warna'] = $warna;
			$id['jumlah'] = $jumlah;
			$this->load->view('marketplace/layout/header', $id);
			$this->load->view('marketplace/layout/pagination', $id);
			$this->load->view('marketplace/content/login', $id);
			$this->load->view('marketplace/layout/footer');

		}
	}
	function cek_login($kode, $warna, $jumlah){
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$read = $this->data->readWh('user_account', $username, 'id_user')->result_array();
		$hashed_password = $this->data->rahasia($password);
		foreach ($read as $r) {
			$user = $r['id_user'];
			$pass = $r['password_user'];
			$nama = $r['nama_user'];
			$email = $r['email_user'];
			$gambar = $r['gambar_user'];
		}
		if ($username==$user) {
			if ($hashed_password==$pass) {
				$data = array(
			        'username'  => $username,
			        'email'     => $email,
			        'nama' => $nama, 
			        'gambar' => $gambar, 
				);
				$this->session->set_userdata($data);
				$this->session->set_flashdata('success', '
        			<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Berhasil!</strong> Selamat datang '.$nama.'  
					</div>
        		');
				if ($kode != 0) {
					redirect('marketplace/payment/'.$kode.'/'.$warna.'/'.$jumlah);
				}
				else{
					if ($this->isVerified($this->session->userdata('username'))) {
						redirect('marketplace');
					}
					else{
						redirect('marketplace/veriv');
					}
				}
			}
			else{
				$this->session->set_flashdata('pesan', 'Maaf Password salah');
				redirect('marketplace/login');
			}
			
		}
		else{
			$this->session->set_flashdata('pesan', 'Maaf Username anda tidak terdaftar');
			redirect('marketplace/login');
		}
	}
	function logout(){
		unset($_SESSION['username']);		
		redirect(base_url());
		$this->session->set_flashdata('success', '
        			<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Berhasil!</strong> Anda berhasil keluar  
					</div>
        		');
	}


	function email($receiver_email, $akun){
			$sender_email = "admin@ehijab.com";
			$user_password = "muhammad1998";
			$username = "Admin eHijab";
			$subject = "PENDAFTARAN BERHASIL";
			$message = "
				<h1>Selamat datang di eHijab</h1>
				<p>Selamat bergabung, silahkan ikuti link <a href='fp.dev/marketplace/verifAkun/".$akun."'>KLIK</a> untuk verifikasi akun anda</p>
			";
			
			$config = array(
				'protocol' 	=> 'smtp' , 
				'smtp_host' => 'ssl://smtp.googlemail.com' , 
				'smtp_port' => 465 , 
				'smtp_user' => 'muhammad.khotib20@gmail.com' ,
				'smtp_pass' => 'muhammad1998',
				'mailtype'	=> 'html', 
				'charset' 	=> 'utf-8', 
				'newline' 	=> "\r\n",  
				'wordwrap' 	=> TRUE 
				);
			
			// Load email library and passing configured values to email library
			$this->load->library('email',$config);


			// Sender email address
			$this->email->from($sender_email, $username);
			// Receiver email address.for single email
			$this->email->to($receiver_email);
			$this->email->subject($subject);
			// Message in email
			$this->email->message($message);
			// It returns boolean TRUE or FALSE based on success or failure
			
			$mail = ($this->email->send()) ? "Sent" : "Failed" ;
			echo $this->email->print_debugger();
			
			echo $mail;

	}
	function proses_order($kode, $tagihan, $warna, $jumlah){
		$user_order =  $this->session->userdata('username');
		$data = array(
				'id_order' => time(),
				'barang_order' => $kode,
				'user_order' => $user_order,
				'jumlah' => $jumlah,
				'warna' => $warna,
				'tagihan' => $tagihan,
				'status_order' => 0,
				 
		);
		if ($this->data->insertData('order', $data)) {
			redirect('marketplace/finish/'.$data['id_order']);
		}
		else{
			echo 'gagal';
		}
	}

	function finish($id_order, $page='finish order'){
		$id['page'] = $page;
		$id['id_order'] = $id_order;
		$data = $this->data->readWh('order', $id_order, 'id_order')->result_array();
		foreach ($data as $d) {
			$tagihan = $d['tagihan'];
		}
		$id['tagihan'] = $tagihan;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/layout/pagination', $id);
		$this->load->view('marketplace/content/finish', $id);
		$this->load->view('marketplace/layout/footer');
	}
	function veriv($kode=0, $warna=0, $jumlah=0, $page = 'verifikasi'){
		if ($this->session->has_userdata('username')) {
			$id['page'] = $page;
			$this->load->view('marketplace/layout/header', $id);
			$this->load->view('marketplace/layout/pagination', $id);
			$this->load->view('marketplace/content/verif', $id);
			$this->load->view('marketplace/layout/footer');
		}
	}
	function isVerified($username){
		$read = $this->data->readWh('user_account',$username,'id_user')->result_array();
		foreach ($read as $r) {
			$status = $r['status_user'];
		}
		if ($status!=0) {
			return true;
		}
		else{
			return false;
		}
	}
	function verifAkun($username){
		$data = array(
			'status_user' => 1, 
		);
		$where = array('id_user' => $username);
		$this->data->updateProduk('user_account', $data, $where);
		if ($this->db->affected_rows()>0) {
			redirect('marketplace');
		}
		else{
			echo 'verif Gagal';
		}
		
		
	}
	function daftar(){
		$nama = $this->input->post('nama');
		$username = $this->input->post('username');
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$confpass = $this->input->post('confpassword');
		$read = $this->data->readWh('user_account', $username, 'id_user')->num_rows();
		$hashed_pass = $this->data->rahasia($password);
		if ($read>0) {
			$this->session->set_flashdata('username_auth', 'Maaf, Username yang anda pilih sudah digunakan orang lain');
			redirect('marketplace/login');
		}
		else{
			if ($password==$confpass){
				if (strlen($password)<10) {
					$this->session->set_flashdata('ukuran_pass', 'Maaf, password anda terlalu pendek');
					redirect('marketplace/login');
				}
				else{
					$data = array(
			        'username'  => $username,
			        'email'     => $email,
			        'nama' => $nama, 
			        'gambar' => $gambar, 
				);
				$this->session->set_userdata($data);
					$data = array(
						'id_user' => $username ,
						'nama_user' => $nama ,
						'email_user' => $email ,
						'password_user' => $hashed_pass ,
						'status_user' => 0 , 
					);
					$this->data->insertData('user_account', $data);
					$this->email($email, $username);
					redirect('marketplace/veriv');

				}
			}
			else{
				$this->session->set_flashdata('error_daftar', 'Maaf, password anda tidak sama');
				redirect('marketplace/login');
			}
		}
	}

}
 ?>