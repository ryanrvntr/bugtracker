<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function autentifikasi($email,$password)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$query = $this->db->get('users');
		return $query->result();

		// $this->db->select('*');
		// $this->db->from($user_login);
		// $this->db->where(array(
		// 	"email" => $email,
		//  	"password" => $password,
		// $result =
		// // // 	"aktif" => 1
		// ));
		// $query = $this->db->get();
		// if($query->num_rows() == 1){
		// 	return $query->result_array()[0];
		// }else{
		// 	return false;
		// }
	}
}