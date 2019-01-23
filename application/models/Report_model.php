<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	var $table = "report";
	var $primary_key = "id";

	public function get_data()
	{
		$this->db->select('*');
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

	public function insert_data($foto)
	{
		$db_debug = $this->db->db_debug;
		$this->db->db_debug = FALSE;
		$set = [
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
		];

		$insert = $this->db->insert($this->table,$set);
		$error = $this->db->error();
		$this->db->db_debug = $db_debug;
		return $error;
	}

	public function update_data($id,$foto = null)
	{
		$db_debug = $this->db->db_debug;
		$this->db->db_debug = FALSE;
		$set = [
			'name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
		];

    // if ($foto != null) {
    //   $set['foto'] = $foto;
    // }

		$this->db->where('id',$id);
		$update = $this->db->update($this->table,$set);
		$error = $this->db->error();
		$this->db->db_debug = $db_debug;
		return $error;
	}

	public function delete_data($id)
	{
		$this->db->where('id',$id);
		$this->db->delete($this->table);
	}
	

}

/* End of file Report_model.php */
/* Location: ./application/models/Report_model.php */