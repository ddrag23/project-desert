<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->cekLogin();
    $this->load->model('Model_barang');
  }

  public function index()
  {
    $data['barang'] = $this->Model_barang->get()->result();
    $data['pageTitle'] = 'Dashboard';
    $data['pageContent'] = $this->load->view('dashboard/main.php',  $data, TRUE);
    $this->load->view('template/layout', $data);

  }
}
