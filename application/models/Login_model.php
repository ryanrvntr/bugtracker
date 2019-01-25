<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function autentifikasi($email,$password,$level)
	{
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->where('level_id', $level);
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