<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Task extends CI_Controller {

	var $c_name = "Task";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Task_model');
		$this->load->model('Report_model');
		$this->load->model('Priority_model');
		$this->load->model('Users_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = [
			'c_name' => $this->c_name,
		];
		$this->load->view('department/header');
		$this->load->view('department/task',$data);
		$this->load->view('department/footer');

	}


	public function getdata()
	{
		$data['data'] = $this->Task_model->get_full_task();
		echo json_encode($data);
	}

	public function info($id)
	{
		$data = [
			'c_name' => $this->c_name,
			'data' => $this->Task_model->get_id($id),
		];
		$this->load->view('admin/task/info',$data);
	}

	public function update_status($id,$status){
		
		$this->Task_model->update_status($id,$status);
		 $set_log = [
		 	'status_id' => $status,
		 	'report_id' => $id,
		 	'created_at' => $this->db->where('id',$id)->get('report')->row(0)->created_at,
		 	'updated_at' => date('Y-m-d H:i:s'),
		 ];
		 $this->db->insert('report_log',$set_log);
	}

	public function update($id)
	{
		$data = [
			'c_name' => $this->c_name,
			'data' => $this->Task_model->get_id($id),
			'priority' => $this->Priority_model->get_data(),
			'users' => $this->Users_model->get_data(),
			'report' => $this->Report_model->get_data(),
		];
		$this->form_validation->set_rules('message','message','required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/task/update',$data);
		}else{
			$error = $this->Task_model->update_data($id);
			$data['data'] = $this->Task_model->get_id($id);
			$this->load->view('admin/task/update',$data);
			if ($error['code'] == 0) {
				echo '<script>swal("Berhasil", "Data berhasil diubah", "success");</script>';
			}else{

				echo '<script>swal("Gagal", "'.$error['message'].'", "error");</script>';
				
			}
		}
	}

}

/* End of file Task.php */
/* Location: ./application/controllers/Admin/Task.php */