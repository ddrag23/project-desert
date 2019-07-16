<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboardadmin extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->cekLogin();
    $this->load->model('Model_users');
    $this->load->model('Model_barang');
  }

  public function index()
  {
    $data['allProduk'] = $this->Model_barang->get()->num_rows();
    $data['penjual'] = $this->Model_users->getPenjual()->num_rows();
    $data['admin'] = $this->Model_users->getAdmin()->num_rows();
    $data['pageTitle'] = 'Dashboard';
    $data['pageContent'] = $this->load->view('admin/main.php',  $data, TRUE);
    $this->load->view('template/layout', $data);

  }
}
