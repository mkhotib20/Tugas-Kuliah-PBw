<?php 

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
			$data = $this->data->read('produk', 'timestamp')->result_array();
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
	
	function latihan(){
		if($this->session->has_userdata('latihan_username')){
			echo 'ini halaman admin, selamat datang ';
			echo $this->session->userdata('latihan_nama');
			echo '<a href="'.base_url('admin/latihanlogout').'">Logout</a>';
		}else{
			redirect('admin/latihanlogin');
		}
	}
	function latihanlogout(){
		unset($_SESSION['latihan_username']);
		redirect('admin/latihanlogin');
	}
	function latihanlogin(){
		echo '
			<form action="'.base_url('admin/latihancek').'">
				<input type="text" name="username">
				<input type="password" name="password">
				<input type="submit">
			</form>

			';
	}
	public function latihancek(){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$nama = 'david';

		if($username = 'david' && $password = 'david1'){
			$this->session->set_userdata('latihan_username', $username);
			$this->session->set_userdata('latihan_nama', $nama);
			redirect('admin/latihan');
			
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
        	$coba = array('error' => $this->upload->display_errors());
        	foreach ($coba as $c) {
        		# code...
        	}
        	$this->session->set_flashdata('tambahBerhasil', '
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <strong>Gagal!</strong> '.$c.'
				</div>
			');	

			redirect(base_url('admin/tambah'));
		}
		else{
			$url = base_url().$config['upload_path'].$this->upload->data('file_name');
			$id = $this->input->post('id');
			$nama = $this->input->post('nama');
			$harga = $this->input->post('harga');
			$kategori = $this->input->post('kategori');
			$deskripsi = $this->input->post('deskripsi');
			$data = array(
				'id_produk' => $id,
				'nama_produk' => $nama,
				'harga_produk' => $harga,
				'kategori' => $kategori,
				'deskripsi' => $deskripsi,
				'gambar_produk' => $url,
				'timestamp' => mdate(time()),
				 
				);
			$insert= $this->data->insertData('produk', $data);
					$this->session->set_flashdata('tambahBerhasil', '
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Success!</strong> Berhasil menambahkan produk
							</div>
						');
			redirect($uri = base_url('admin/produk'), $method = 'auto', $code = NULL);
		}
	}
	public function delete($id){
		$where = array('id_produk' => $id);
		$tampung = $this->data->deleteProduk('produk', $where);
		if($tampung>=0){
			$this->session->set_flashdata('tambahBerhasil', '
							<div class="alert alert-warning	 alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <strong>Success!</strong> Berhasil Menghapus produk
							</div>
						');
			redirect('admin/produk');
		}
	}
	public function deleteOrder($id){
		$where = array('id_order' => $id);
		$tampung = $this->data->deleteProduk('order', $where);

		if($tampung>=0){
			$this->session->set_flashdata('success', '
        			<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Success!</strong> Hapus Order Berhasil!
					</div>
        		');
			redirect('admin/order');
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
	function order(){
		if ($this->session->has_userdata('username_admin')) {
			$data = $this->data->selectOrder()->result_array();
			$tampil['order'] = $data;
			$this->load->view('admin/layout/nav');
			$this->load->view('admin/content/order', $tampil);
			$this->load->view('admin/layout/footer');
		}
		else{
			redirect(base_url('admin/masuk'));
		}
	}
	public function validasi($id){
		$where = array('id_order' => $id);
		$data ["status_order"] = 1;
		if($this->data->updateProduk('order', $data, $where)){
			$this->session->set_flashdata('success', '
        			<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <strong>Success!</strong> Validasi Pembayaran Berhasil!
					</div>
        		');
			redirect('admin/order');
		}else{
			redirect('admin/order');
		}
	}
	

}

 ?>