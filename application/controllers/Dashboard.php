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
    if (empty($this->session->userdata('username'))) {
      $keyword = $this->input->get('keyword');
      $data['barang'] =empty($keyword) ? $this->Model_barang->get()->result() : $this->Model_barang->search($keyword);
      $data['pageTitle'] = 'Dashboard';
      $data['pageContent'] = $this->load->view('dashboard/main.php',  $data, TRUE);
      $this->load->view('template/layout', $data);
    } elseif($this->session->userdata('level')=='admin'){
      $data['allProduk'] = $this->Model_barang->get()->num_rows();
      $data['penjual'] = $this->model_users->getPenjual()->num_rows();
      $data['admin'] = $this->model_users->getAdmin()->num_rows();
      $data['pageTitle'] = 'Dashboard';
      $data['pageContent'] = $this->load->view('admin/main.php',  $data, TRUE);
      $this->load->view('template/layout', $data);
    }else{
      $data['pageTitle'] = 'Data Penjual';
  		$data['totalProduk'] = $this->Model_barang->getBarangPenjual()->num_rows();
  		$data['pageContent'] = $this->load->view('admin/penjual/mainpenjual.php', $data, TRUE);
  		$this->load->view('template/layout', $data);
    }


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
