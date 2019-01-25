<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DetailReport extends CI_Controller {

  var $c_name = "Dashboard";
  
  function __construct()
  {
    parent::__construct();
    $this->load->model('Report_model');
    $this->load->library('form_validation');
  }
  public function index($id_report)
  {
    $data = [
      'c_name' => $this->c_name,
      'report' => $this->Report_model->get_id($id_report),
    ];
    $this->form_validation->set_rules('message',"Message","required");
    if ($this->form_validation->run() == FALSE) {
      $this->load->view('admin/header');
      $this->load->view('admin/report/detail',$data);
      $this->load->view('admin/footer');
    }else{
      $config['upload_path'] = './uploads/report/';
      $config['allowed_types'] = 'gif|jpg|png';
      $config['max_size']  = '2000';
      $config['max_width']  = '10240';
      $config['max_height']  = '7680';
      
      $this->load->library('upload', $config);
      
      if ( ! $this->upload->do_upload('image')){
        $error = array('error' => $this->upload->display_errors());
        $data['error'] = $error['error'];
        $this->load->view('admin/header');
        $this->load->view('admin/report/detail',$data);
        $this->load->view('admin/footer');
      }
      else{
        $data = array('upload_data' => $this->upload->data());
        #dipindah di model
        
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
        redirect('DetailReport/index/'.$id_report);
      }
    }
  }
}

?>
