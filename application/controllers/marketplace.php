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
		$read = $this->data->readWh('produk', $cat, 'kategori')->result_array();
		$id['produk'] = $read;
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/layout/pagination', $id);
		$this->load->view('marketplace/content/payment', $id);
		$this->load->view('marketplace/layout/footer');
	}
	function login($cat=0, $page = 'login'){
		$read = $this->data->readWh('produk', $cat, 'kategori')->result_array();
		$id['produk'] = $read;
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/layout/pagination', $id);
		$this->load->view('marketplace/content/login', $id);
		$this->load->view('marketplace/layout/footer');
	}

}
 ?>