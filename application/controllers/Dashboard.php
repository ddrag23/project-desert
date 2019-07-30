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
    $keyword = $this->input->get('keyword');
    $data['barang'] =empty($keyword) ? $this->Model_barang->get()->result() : $this->Model_barang->search($keyword);
    // echo json_encode($data['barang']);
    // die();
    $data['pageTitle'] = 'Dashboard';
    $data['pageContent'] = $this->load->view('dashboard/main.php',  $data, TRUE);
    $this->load->view('template/layout', $data);

  }
  public function page($id_produk = null){
    $barang = $this->Model_barang->get_where(array('id_produk' => $id_produk))->row();
    // echo json_encode($barang);
    // die();
    $data['barang'] = $barang;
    $data['penjual'] = $this->model_users->getPenjual()->row();
    $data['pageTitle'] = 'isi';
    $data['pageContent'] = $this->load->view('dashboard/pageDesk', $data, TRUE);
    $this->load->view('template/layout', $data);
  }
}
