<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Status_model extends CI_Model {

	var $table = "status";
	var $primary_key = "id";

	public function get_data()
	{
		$this->db->from($this->table);
		$this->db->order_by('id');
		return $this->db->get()->result();
	}

	

}

/* End of file Status_model.php */
/* Location: ./application/models/Status_model.php */