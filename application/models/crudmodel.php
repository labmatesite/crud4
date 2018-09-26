<?php
defined('BASEPATH') or exit('No direct script access is allowed');
class crudmodel extends CI_Model{
	function insertdata($data){
		$this->db->insert('products', $data);
		return true;
	}

	function get(){
		$this->db->select('*');
		$this->db->from('products');
		$query = $this->db->get();
		return $query->result_array();
	}

	function getbyid($id){
		$this->db->select('*');
		$this->db->where('id', $id);
		$this->db->from('products');
		$query = $this->db->get();
		return $query->result_array();

	}

	function editdata($data, $id){
		$this->db->where('id', $id);
		$this->db->update('products', $data);
		return true;
	}

	function deletedata($id){
		$this->db->where('id', $id);
		$this->db->delete('products');
		return true;
	}
}