<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller {

  var $c_name = "Report";
  public function __construct()
  {
    parent::__construct();
    $this->load->library('form_validation');
    $this->load->model("Report_model");
  }
}