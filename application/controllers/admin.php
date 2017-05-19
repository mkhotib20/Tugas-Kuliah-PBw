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
				$this->session->set_flashdata('pesan', 'Maaf Password salah');
				redirect(base_url('admin/masuk'));
			}
		}
		else{
			$this->session->set_flashdata('pesan', 'Username belum terdaftar');
			redirect(base_url('admin/masuk'));
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
	public function forUpdate($id){
		if ($this->session->has_userdata('username_admin')) {
			$read = $this->data->readWh('produk', $id, 'id_produk');
			$data['tampil'] = $read->result_array();
			$this->load->view('admin/layout/nav');
			$this->load->view('admin/content/forUpdate', $data);
			$this->load->view('admin/layout/footer');

		}
		else{
			redirect(base_url('admin/masuk'));
		}
	}
	public function updatecoy($id){
		$where = array('id_produk' => $id);
		$data = array(
			"nama_produk" => $this->input->post('nama'),
			"harga_produk" => $this->input->post('harga'),
			"kategori" => $this->input->post('kategori')
		);
		if ($this->data->updateProduk('produk', $data, $where)) {
			redirect('admin/produk');
		}
		else
			redirect('admin/forUpdate'.$id);

	}
	

}

 ?>