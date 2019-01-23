<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Priority_model extends CI_Model {


	var $table = "priority";
	var $primary_key = "id";

	public function get_data()
	{
		$this->db->select('*');
		$this->db->order_by('id');
		$this->db->from($this->table);
		return $this->db->get()->result();
	}

	public function get_id($id)
	{
		$this->db->select('*');
		$this->db->from($this->table);
		$this->db->where('id',$id);
		return $this->db->get()->row(0);
	}

}

/* End of file Priority_model.php */
/* Location: ./application/models/Priority_model.php */