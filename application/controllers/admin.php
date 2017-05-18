<?php 
/**
* 
*/
/**
*
*/
class admin extends CI_Controller{	
	function index(){
		if ($this->session->has_userdata('username_admin')) {
			$this->load->view('admin/layout/nav');
			$this->load->view('admin/content/dashboard');
			$this->load->view('admin/layout/footer');
		}
		else{
			redirect(base_url('admin/masuk'));
		}
	}
	function setting(){
		if ($this->session->has_userdata('username_admin')) {
			$this->load->view('admin/layout/nav');
			$this->load->view('admin/content/setting');
			$this->load->view('admin/layout/footer');
		}
		else{
			redirect(base_url('admin/masuk'));
		}
	}
	function masuk(){
		if ($this->session->has_userdata('username_admin')) {
			redirect('admin');
		}
		else{
			$this->load->view('admin/login');
		}
	}
	
	function produk(){
		if ($this->session->has_userdata('username_admin')) {
			$data = $this->data->read('produk')->result_array();
			$tampil['produk'] = $data;
			$this->load->view('admin/layout/nav');
			$this->load->view('admin/content/produk', $tampil);
			$this->load->view('admin/layout/footer');
		}
		else{
			redirect(base_url('admin/masuk'));
		}
	}

	function tambah(){
		if ($this->session->has_userdata('username_admin')) {
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
		$read = $this->data->readWh('admin_user', $username, 'admin_username')->result_array();
		foreach ($read as $r) {
			$user = $r['admin_username'];
			$pass = $r['admin_password'];
			$nama = $r['admin_nama'];
			$email = $r['admin_email'];
		}
		
		$hashed_password = $this->data->rahasia($password);
		if ($username==$user) {
			if ($hashed_password==$pass) {
				$data = array(
			        'username_admin'  => $user,
			        'email_admin'     => $email,
			        'nama_admin' => $nama, 
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
		unset($_SESSION['username_admin']);
		redirect(base_url('admin'));
	}
	function tambahProduk(){
		$config['upload_path']          = './assets/marketplace/img/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 5000;
        $config['max_width']            = 2048;
        $config['max_height']           = 2048;

        $this->load->library('upload', $config);
        if ( ! $this->upload->do_upload('gambar')) {
			echo print_r(array('error' => $this->upload->display_errors()));	
			//redirect(base_url());
		}
		else{
			$url = base_url().$config['upload_path'].$this->upload->data('file_name');
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$harga = $this->input->post('harga');
			$kategori = $this->input->post('kategori');
			$data = array(
				'id_produk' => $id,
				'nama_produk' => $nama,
				'harga_produk' => $harga,
				'kategori' => $kategori,
				'gambar_produk' => $url,
				'timestamp' => mdate(time()),
				 
				);
			$insert= $this->data->insertData('produk', $data);
			redirect($uri = base_url('admin/tambah'), $method = 'auto', $code = NULL);
		}
	}
	function ubahPass(){
		$username = $this->session->userdata('username');
		$pasBaru = $this->
		$data = $this->data->readWh('admin_user', $username)->result_array();
		foreach ($data as $d) {
			$password = $d['admin_password'];
		}
		$passLama = $this->data->rahasia($this->input->post('pass-lama'));
		if ($passLama == $password) {
			echo 'yups ner';
		}
	} 
		public function delete($id){
		$where = array('id_produk' => $id);
		$tampung = $this->data->deleteProduck('produk', $where);
		if($tampung>=0){
			redirect('admin/produk');
		}
	}
	public function update($id){
		//$where = array('id_produk' => $id);
		//$dataDB = $this->myModel->getBarang("where kode_barang = '$kode_barang' ");
		$dataDB = $this->data->readWh('produk', $id, 'id_produk');
		$data = array(
			"id_produk" =>$dataDB[0]['id_produk'], 
			"nama_produk" =>$dataDB[0]['nama_produk'],
			"harga_produk" =>$dataDB[0]['harga_produk'], 
			"kategori" =>$dataDB[0]['kategori'],
		);
		$id = $_POST['id_produk'];
		$nama = $_POST['nama_produk'];
		$harga = $_POST['harga_produk'];
		$kategori = $_POST['kategori'];
		$data_update = array(
			'jumlah' => $jumlah, 
			'id_produk' => $id,
			'nama_produk' => $nama,
			'harga_produk' => $harga,
			'kategori' => $kategori
		);
		$where = array('id_produk' => $id);
		$tampung = $this->data->updateProduk('produk', $data_update, $where);
		if($tampung >= 1){
			redirect('admin/produk');
		} 
	}
	

}
 ?>