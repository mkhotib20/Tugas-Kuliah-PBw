<?php 
/**
* 
*/
class data extends CI_Model
{
	
	function read($table){
		return $this->db->get($table);
	}
	function readWh($table, $where, $id){
		return $this->db->get_where($table, array($id => $where));
	}
	function insertData($tabel, $data){
		return $this->db->insert($tabel, $data);
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
}
 ?>