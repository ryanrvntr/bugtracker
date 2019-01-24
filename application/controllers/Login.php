<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model("Login_model");
	}

	public function index()
	{
		// var_dump($this->session);

		$this->load->view('login');		
	}

	public function proses_login()
	{
		$name = "";$level = "";
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$validate = $this->Login_model->autentifikasi($email, $password);
		if($validate > 0){
			foreach ($validate as $key) {
				$name = $key->firstname;
				$email = $key->email;
				$level = $key->level_id;
			}
			
			$sesdata = array(
				'username' => $name,
				'email' => $email,
				'level' => $level,
				'logged_in' => TRUE
			);

			$this->session->set_userdata($sesdata);
			
			if ($level == 1) {
				redirect('admin/project','refresh');
			}elseif ($level == 2){
				//redirect('admin/project','refresh');
			}elseif ($level == 3) {
				//redirect('Client','refresh');
			}
		}else{
			echo $this->session->$this->session->set_flashdata('msg', 'Username and Password was Wrong'); redirect('Login','refresh');
		}
	}

}