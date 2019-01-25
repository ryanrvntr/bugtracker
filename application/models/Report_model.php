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

	public function get_data_full()
	{
		$this->db->select("report.*,concat(created_at,'/',updated_at) as date,concat(users.firstname,' ',users.lastname) as name, project.name as project, status.name as status, priority.name as priority");
		$this->db->join('users', 'users_id = users.id');
		$this->db->join('project', 'project_id = project.id');
		$this->db->join('status', 'status_id = status.id');
		$this->db->join('priority', 'priority_id = priority.id');
		$this->db->order_by('report.id', 'asc');
		return $this->db->get('report')->result();

	}

	public function get_id($id)
	{
		$this->db->select('*, (select concat(users.firstname," ",users.lastname) from users where id=report.users_id) as name_users, (select image from users where id=report.users_id) as image_users');
		$this->db->from($this->table);
		$this->db->where('id',$id);
		return $this->db->get()->row(0);
	}

	public function insert_data($foto)
	{
		$db_debug = $this->db->db_debug;
		$this->db->db_debug = FALSE;
		$set = [
			'users_id' => $this->input->post('users'),
			'project_id' => $this->input->post('project'),
			'status_id' => $this->input->post('status'),
			'priority_id' => $this->input->post('priority'),
			'subject' => $this->input->post('subject'),
			'description' => $this->input->post('description'),
			'image' => $foto,
			'created_at' => date('Y-m-d H:m:s'),
			'updated_at' => date('Y-m-d H:m:s'),
		];

		$insert = $this->db->insert($this->table,$set);
		$error = $this->db->error();
		$this->db->db_debug = $db_debug;
		return $error;
	}

	public function insert_detail($data,$id_report)
	{
		$set = [
          'message' => $this->input->post('message'),
          'image' => $data['upload_data']['file_name'],
          'report_id' => $id_report,
          'created_at' => date('Y-m-d H:m:s'),
        ];

        if ($this->session->userdata('level') == '3') {
          $set['users_id_client'] = $this->session->userdata('id');
        }else if($this->session->userdata('level') == '1'){
          $set['users_id_mod'] = $this->session->userdata('id');
        }



        $this->db->insert('report_detail',$set);
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