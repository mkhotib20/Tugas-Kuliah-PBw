<?php 
class data extends CI_Model
{
	
	function read($table, $order='', $limit=0){
		$this->db->limit($limit);
		$this->db->order_by($order, 'desc');
		return $this->db->get($table);
	}
	function readWh($table, $id, $where, $order='', $limit=0){
		$this->db->order_by($order, 'DESC');
		$this->db->limit($limit);
		return $this->db->get_where($table, array($where => $id));
	}
	function insertData($tabel, $data){
		return $this->db->insert($tabel, $data);
	}
	function search($table, $kolom, $keyword){
		return $this->db->query("SELECT * FROM $table WHERE $kolom LIKE '%$keyword%'");
	}
	function rahasia($password){
		$key = $this->config->item('encryption_key');
	    $salt1 = hash('sha512', $key . $password);
	    $salt2 = hash('sha512', $password . $key);
	    return hash('sha512', $salt1 . $password . $salt2);
	}
	function readNew($table){
		$this->db->limit(4);
		$this->db->order_by('timestamp', 'DESC');
		return $this->db->get($table);
	}
	public function updateProduk($table, $data, $where){
		$tampung = $this->db->update($table, $data, $where);
		return $tampung;
	}
		
	function selectOrder(){
		return $this->db->query('SELECT 
			`order`.*, `produk`.*,`user_account`.*
			FROM
			`order`, `produk`, `user_account`
			WHERE
			`order`.`barang_order` = `produk`.`id_produk`
			AND
			`order`.`user_order` = `user_account`.`id_user`'
		);

	}
	public function deleteProduk($tabel, $where){
		return $this->db->delete($tabel, $where);	
	}
}
 ?>