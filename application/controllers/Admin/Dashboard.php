<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

  var $c_name = "Dashboard";
  
  public function index()
  {
    $data = [
      'c_name' => $this->c_name,
    ];
    $this->load->view('admin/header');
    $this->load->view('admin/dashboard',$data);
    $this->load->view('admin/footer');
  }
}

?>
