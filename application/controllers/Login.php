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
		$allow_level = $this->input->post('allow_level');
		$validate = $this->Login_model->autentifikasi($email, $password,$allow_level);
		if(count($validate) > 0){
			foreach ($validate as $key) {
				$name = $key->firstname;
				$email = $key->email;
				$level = $key->level_id;
			}
			$datausers = $validate[0];
			
			$sesdata = array(
				'id' => $datausers->id,
				'username' => $datausers->firstname." ".$datausers->lastname,
				'email' => $email,
				'level' => $level,
				'image' => $datausers->image,
				'logged_in' => TRUE
			);

			$this->session->set_userdata($sesdata);
			
			if ($level == 1) {
				redirect('admin/project','refresh');
			}elseif ($level == 2){
				redirect('department/task','refresh');
			}elseif ($level == 3) {
				redirect('client/report','refresh');
			}
		}else{
			$this->session->set_flashdata('msg', 'Username and Password was Wrong'); 
			redirect('Login','refresh');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}

}