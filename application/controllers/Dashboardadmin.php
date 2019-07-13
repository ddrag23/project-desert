<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardadmin extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();
    $this->load->model('Model_users');
  }

  public function index()
  {
    // $data['barang'] = $this->Model_barang->get()->result();
    $data['pageTitle'] = 'Dashboard';
    $data['pageContent'] = $this->load->view('admin/main.php',  $data, TRUE);
    $this->load->view('template/layout', $data);

  }
}
