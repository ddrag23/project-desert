<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller
{
  public function __construct()
  {
    parent::__construct();
    // $this->cekLogin();
    $this->load->model('Model_barang');
    $this->load->model('model_users');
  }

  public function index()
  {
    $data['barang'] = $this->Model_barang->get()->result();
    $data['pageTitle'] = 'Dashboard';
    $data['pageContent'] = $this->load->view('dashboard/main.php',  $data, TRUE);
    $this->load->view('template/layout', $data);

  }
  public function page($id_produk = null){
    $barang = $this->Model_barang->get_where(array('id_produk' => $id_produk))->row();
    $data['barang'] = $barang;
    $data['penjual'] = $this->model_users->getPenjual()->row();
    $data['pageTitle'] = 'isi';
    $data['pageContent'] = $this->load->view('dashboard/pageDesk', $data, TRUE);
    $this->load->view('template/layout', $data);
  }
}
