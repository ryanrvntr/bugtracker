<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {

  var $table = "users";
  var $primary_key = "id";
  
  public function get_data()
  {
    $this->db->select('*');
    $this->db->from($this->table);
    return $this->db->get()->result();
  }
  public function get_client($id)
  {
    $this->db->select('*');
    $this->db->from($this->table);
    $this->db->where('level_id',$id);
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
      'firstname' => $this->input->post('firstname'),
      'lastname' => $this->input->post('lastname'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password'),
      'address' => $this->input->post('address'),
      'telp' => $this->input->post('telp'),
      'image' => $foto,
      'level_id' => $this->input->post('level'),
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
      'firstname' => $this->input->post('firstname'),
      'lastname' => $this->input->post('lastname'),
      'email' => $this->input->post('email'),
      'password' => $this->input->post('password'),
      'address' => $this->input->post('address'),
      'telp' => $this->input->post('telp'),
      'image' => $foto,
      'level_id' => $this->input->post('level'),
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
