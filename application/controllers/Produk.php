<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends MY_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->cekLogin();
	    $this->load->model('model_barang');
			//$this->load->model('model_master');
			// $this->load->model('model_upload');
			// $this->load->library('csvreader');

  }

  public function index()
  {
      $data['pageTitle'] = 'Data Barang';
      $data['produk'] = $this->model_barang->get()->result();
      $data['pageContent'] = $this->load->view('produks/listproduk', $data, TRUE);
      $this->load->view('template/layout', $data);
			// echo json_encode($this->model_barang->get()->result());
			// die();
  }

	public function add(){

		$data['gambar'] = '';
		if ($this->input->post('submit')) {

			if (!empty($_FILES['gambar']['name'])) {

        // Konfigurasi library upload codeigniter
        $config['upload_path'] = './uploads';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['file_name'] = 'gambar';

        // Load library upload
        $this->load->library('upload', $config);

        // Jika terdapat error pada proses upload maka exit
        if (!$this->upload->do_upload('gambar')) {
            exit($this->upload->display_errors());
        }

        $data['gambar'] = $this->upload->data()['file_name'];
      }


      $this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('kategori','Kategori','required');
			$this->form_validation->set_rules('harga','Harga','required');
			$this->form_validation->set_rules('deskripsi','deskripsi','required');
			if (empty($_FILES['gambar']['name'])) {
				$this->form_validation->set_rules('gambar','Gambar','required');
			}

				$created = date('YmdHis');

				// $gambar = $_FILES['gambar']['name'];
				// if ($gambar = '') {}else {
				// 	$config ['upload_path'] = './uploads';
				// 	$config ['allowed_type'] = 'jpg|jpeg|png|gif';
				// 	$config['remove_spaces']=TRUE;
				// 	$config['overwrite']=TRUE;
				// 	$this->load->library('upload',$config);
				// 	if (!$this->upload->do_upload('file')) {
				// 		exit($this->upload->display_error());
				// 	}else {
				// 		$gambar = $this->upload->data('file_name');
				// 	}
				// }

				$this->form_validation->set_message('required', '%s tidak boleh kosong!');
	      		// $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
	      		// $this->form_validation->set_message('matches', '{field} tidak sama dengan {param}.');



				if ($this->form_validation->run() == TRUE) {
					$data = array(
						'users_id' => $this->session->userdata('id'),
						'nama' => $this->input->post('nama'),
						'kategori' => $this->input->post('kategori'),
						'harga' => $this->input->post('harga'),
						'deskripsi' => $this->input->post('deskripsi'),
						'gambar' => $data['gambar'],
						'date_create' => $created
					);
					// echo json_encode($data);
					// die();
					$query = $this->model_barang->insert($data);

					if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan data');
					else $message = array('status' => false, 'message' => 'Gagal menambahkan data');

					$this->session->set_flashdata('message', $message);

					redirect('produk', 'refresh');
				}

			}
			// $data['kelurahan'] = $this->model_master->getKelurahan()->result();
			// $data['kecamatan'] = $this->model_master->getKecamatan()->result();
			// $data['kabupaten'] = $this->model_master->getKabupaten()->result();
			// $data['provinsi'] = $this->model_master->getProvinsi()->result();
			$data['pageTitle'] = 'Tambah Data Penjual';
			$data['produk'] = $this->model_barang->get()->result();

	    $data['pageContent'] = $this->load->view('produks/listproduk', $data, TRUE);

	  	$this->load->view('template/layout', $data);
  }

	public function edit($id_produk = null)
	{
		if ($this->input->post('update')) {

			if (!empty($_FILES['gambar']['name'])) {

				// Konfigurasi library upload codeigniter
				$config['upload_path'] = './uploads';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['file_name'] = 'gambar';

				// Load library upload
				$this->load->library('upload', $config);

				// Jika terdapat error pada proses upload maka exit
				if (!$this->upload->do_upload('gambar')) {
						exit($this->upload->display_errors());
				}

				$data['gambar'] = $this->upload->data()['file_name'];
			}

			$this->form_validation->set_rules('nama','Nama','required');
			$this->form_validation->set_rules('kategori','Kategori','required');
			$this->form_validation->set_rules('harga','Harga','required');
			$this->form_validation->set_rules('deskripsi','deskripsi','required');
			if (empty($_FILES['gambar']['name'])) {
				$this->form_validation->set_rules('gambar','Gambar','required');
			}

			$created = date('YmdHis');
			$this->form_validation->set_message('required', '%s tidak boleh kosong!');
			// $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');

					if ($this->form_validation->run() === TRUE) {

						$data = array(
							'nama' => $this->input->post('nama'),
							'kategori' => $this->input->post('kategori'),
							'harga' => $this->input->post('harga'),
							'deskripsi' => $this->input->post('deskripsi'),
							'gambar' => $data['gambar'],
							'date_create' => $created
						);

						$id_produk = $this->input->post('id_produk');

						$query = $this->model_barang->update($id_produk, $data);

						if ($query) {
							$message = array('status' => true, 'message' => 'Berhasil memperbarui data');
						} else {
							$message = array('status' => false, 'message' => 'Gagal memperbarui data');
				}

				$this->session->set_flashdata('message', $message);
				redirect('produk/edit/'. $id_produk, 'refresh');

					}
		}
		// $data['kelurahan'] = $this->model_master->getKelurahan()->result();
		// $data['kecamatan'] = $this->model_master->getKecamatan()->result();
		// $data['kabupaten'] = $this->model_master->getKabupaten()->result();
		// $data['provinsi'] = $this->model_master->getProvinsi()->result();
		//
		$barang = $this->model_barang->get_where(array('id_produk' => $id_produk))->row();


		if (!$barang) show_404();

		$data['pageTitle'] = 'Edit Data Produk';
    $data['barang'] = $barang;
		$data['pageContent'] = $this->load->view('produk/editproduk', $data, TRUE);
		$this->load->view('template/layout', $data);
}

public function delete($id_produk)
{
	$produkId = $this->model_barang->get_where(array('id_produk' => $id_produk))->row();

	if (!$produkId) show_404();

	$query = $this->model_barang->delete($id_produk);

	if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus Data');
		else $message = array('status' => true, 'message' => 'Gagal menghapus Data');

		$this->session->set_flashdata('message', $message);

		redirect('produk', 'refresh');

}
}
