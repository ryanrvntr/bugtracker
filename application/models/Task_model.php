<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task_model extends CI_Model {

	var $table = "task";
	var $primary_key = "id";

	public function get_full()
	{
		$this->db->select("task.*,concat(users.firstname,' ',users.lastname) as name ,(report.subject) as subject,(priority.name) as priority");
		$this->db->join('users', 'users_id = users.id');
		$this->db->join('report', 'report_id = report.id');
		$this->db->join('priority', 'task.priority_id = priority.id');
		$this->db->order_by('task.id', 'asc');
		return $this->db->get('task')->result();

	}

	public function get_full_task()
	{
		$this->db->select("task.*, (project.name) as project, (report.subject) as subject, (status.name) as status, (priority.name) as priority");
		$this->db->join('report', 'task.report_id = report.id'); 
		$this->db->join('project', 'project_id = project.id');
		$this->db->join('status', 'status_id = status.id');
		$this->db->join('users', 'task.users_id = users.id');
		$this->db->join('priority', 'task.priority_id = priority.id');
		return $this->db->get('task')->result();
	}

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

	public function insert_data()
	{
		$db_debug = $this->db->db_debug;
		$this->db->db_debug = FALSE;
		$set = [
			'users_id' => $this->input->post('users'),
			'report_id' => $this->input->post('report'),
			'priority_id' => $this->input->post('priority'),
			'message' => $this->input->post('message'),
		];

		$insert = $this->db->insert($this->table,$set);
		$error = $this->db->error();
		$this->db->db_debug = $db_debug;
		return $error;
	}

	public function update_data($id)
	{
		$db_debug = $this->db->db_debug;
		$this->db->db_debug = FALSE;
		$set = [
			'users_id' => $this->input->post('users'),
			'report_id' => $this->input->post('report'),
			'priority_id' => $this->input->post('priority'),
			'message' => $this->input->post('message'),
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

/* End of file Task_model.php */
/* Location: ./application/models/Task_model.php */