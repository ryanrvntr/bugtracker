<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Levels_model extends CI_Model {

	var $table = "levels";
	var $primary_key = "id";

	public function get_data()
	{
		$this->db->from($this->table);
		$this->db->order_by('id');
		return $this->db->get()->result();
	}

}

/* End of file Levels_model.php */
/* Location: ./application/models/Levels_model.php */