<?php 
/**
* 
*/
class data extends CI_Model
{
	
	function read($table){
		return $this->db->get($table);
	}
	function readWh($table, $where){
		return $this->db->get_where($table, array('admin_username' => $where));
	}
}
 ?>