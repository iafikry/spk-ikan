<?php

class MY_Model extends CI_Model
{
	public function ambilSemuaData($table){
		return $this->db->get($table);
	}

	public function ambilDataById($table, $where){
		return $this->db->get_where($table, $where)->row_array();
	}

	public function tambahData($table, $data){
		$this->db->insert($table, $data);
	}

	public function updateData($table, $data, $where){
		$this->db->update($table, $data, $where);
	}

	public function hapusData($table, $where){
		$this->db->delete($table, $where);
	}
}
