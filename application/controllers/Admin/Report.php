<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report extends CI_Controller {

	var $c_name = "Report";

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Report_model');
		$this->load->model('Report_model');
		$this->load->model('Project_model');
		$this->load->model('Status_model');
		$this->load->model('Priority_model');
		$this->load->model('Users_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data = [
			'c_name' => $this->c_name,
		];
		$this->load->view('admin/header');
		$this->load->view('admin/report/report',$data);
		$this->load->view('admin/footer');
	}

	public function getdata()
	{
		$data['data'] = $this->Report_model->get_data_full();
		echo json_encode($data);
	}
	public function info($id)
	{
		$data = [
			'c_name' => $this->c_name,
			'data' => $this->Report_model->get_id($id),
		];
		$this->load->view('admin/report/info',$data);
	}
	public function insert()
	{
		$this->load->model('Levels_model');

		$data = [
			'c_name' => $this->c_name,
			'level' => $this->Levels_model->get_data(),
			'project' => $this->Project_model->get_data(),
			'client' => $this->Users_model->get_client(3),
			'priority' => $this->Priority_model->get_data(),
			'status' => $this->Status_model->get_data(),
		];
		$this->form_validation->set_rules('firstname','firstname','required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/header');
			$this->load->view('admin/report/insert',$data);
			$this->load->view('admin/footer');
		}else{
			$config['upload_path'] = './uploads/report/';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2000';
			$config['max_width']  = '1024';
			$config['max_height']  = '768';

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload('foto')){
				$data['error'] = $this->upload->display_errors();
				$this->load->view('admin/report/insert',$data);
			}
			else{
				$upload_data = $this->upload->data();
				$this->load->view('admin/report/insert',$data);
				$error = $this->Report_model->insert_data($upload_data['file_name']);
				if ($error['code'] == 0) {
					echo '<script>swal("Berhasil", "Data berhasil ditambahkan", "success");</script>';
				}else{

					echo '<script>swal("Gagal", "'.$error['message'].'", "error");</script>';
				}
			}
		}
	}



	public function update($id)
	{
		$data = [
			'c_name' => $this->c_name,
			'data' => $this->Report_model->get_id($id),
			'level' => $this->Levels_model->get_data(),
		];
		$this->form_validation->set_rules('firstname','Nama','required');
		if ($this->form_validation->run() == false) {
			$this->load->view('admin/report/update',$data);
		}else{
			if ($_FILES['foto']['name'] != "") {
				$config['upload_path'] = './uploads/report/';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '2000';
				$config['max_width']  = '1024';
				$config['max_height']  = '768';

				$this->load->library('upload', $config);

				if ( ! $this->upload->do_upload('foto')){
					$data['error'] = $this->upload->display_errors();
					$this->load->view('admin/report/update',$data);
				}
				else{
					$upload_data = $this->upload->data();
					$error = $this->Report_model->update_data($id,$upload_data['file_name']);
					$data['data'] = $this->Report_model->get_id($id);
					$this->load->view('admin/report/update',$data);
					if ($error['code'] == 0) {
						echo '<script>swal("Berhasil", "Data berhasil ditambahkan", "success");</script>';
					}else{

						echo '<script>swal("Gagal", "'.$error['message'].'", "error");</script>';
					}
				}
			}else{
				$error = $this->Report_model->update_data($id,null);
				$data['data'] = $this->Report_model->get_id($id);
				$this->load->view('admin/report/update',$data);
				if ($error['code'] == 0) {
					echo '<script>swal("Berhasil", "Data berhasil diubah", "success");</script>';
				}else{

					echo '<script>swal("Gagal", "'.$error['message'].'", "error");</script>';
				}
			}
		}
	}


	public function delete($id)
	{
		$this->Report_model->delete_data($id);
	}

}

/* End of file Report.php */
/* Location: ./application/controllers/Admin/Report.php */