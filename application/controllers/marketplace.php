<?php 
/**
* 
*/
class marketplace extends CI_Controller{
	
	function index($page = 'home'){
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/content/home');
		$this->load->view('marketplace/layout/footer');
	}
	function product($page = 'product'){
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/layout/pagination', $id);
		$this->load->view('marketplace/content/product', $id);
		$this->load->view('marketplace/layout/footer');
	}
	function detail($page = 'detail produk'){
		$id['page'] = $page;
		$this->load->view('marketplace/layout/header', $id);
		$this->load->view('marketplace/layout/pagination', $id);
		$this->load->view('marketplace/content/detail', $id);
		$this->load->view('marketplace/layout/footer');
	}
}
 ?>