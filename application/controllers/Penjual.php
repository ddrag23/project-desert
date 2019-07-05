<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends MY_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->cekLogin();
	    $this->load->model('model_users');
			//$this->load->model('model_master');
			// $this->load->model('model_upload');
			// $this->load->library('csvreader');

  }

  public function index()
  {
      $data['pageTitle'] = 'Data Penjual';
      $data['kelahiran'] = $this->model_users->get()->result();
      $data['pageContent'] = $this->load->view('penjual/listproduk', $data, TRUE);
      $this->load->view('template/layout', $data);
  }

	public function add(){

		if ($this->input->post('submit')) {
      $this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('namalengkap','Nama Lengkap','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('jeniskelamin','Jenis Kelamin','required|in_list[L,P]');
			$this->form_validation->set_rules('notelp','Nomor Telepon','required');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
      $this->form_validation->set_rules('','','required');
      $this->form_validation->set_rules('','','required');

				$created = date('YmdHis');

				$this->form_validation->set_message('required', '%s tidak boleh kosong!');
	      		// $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
	      		// $this->form_validation->set_message('matches', '{field} tidak sama dengan {param}.');

				if ($this->form_validation->run() == TRUE) {
					$data = array(
						'username' => $this->input->post('username'),
						'nama_lengkap' => $this->input->post('namalengkap'),
						'jenis_kelamin' => $this->input->post('jeniskelamin'),
						'alamat' => $this->input->post('alamat'),
						'nama_ayah' => $this->input->post('namaayah'),
						'nama_ibu' => $this->input->post('namaibu'),
						'status' => $this->input->post('status'),
						'date_create' => $created
					);

					$query = $this->model_users->insert($data);

					if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan data');
					else $message = array('status' => false, 'message' => 'Gagal menambahkan data');

					$this->session->set_flashdata('message', $message);

					redirect('guru/add', 'refresh');
				}

			}
			// $data['kelurahan'] = $this->model_master->getKelurahan()->result();
			// $data['kecamatan'] = $this->model_master->getKecamatan()->result();
			// $data['kabupaten'] = $this->model_master->getKabupaten()->result();
			// $data['provinsi'] = $this->model_master->getProvinsi()->result();
			$data['pageTitle'] = 'Tambah Data Kelahiran';
	    // $data['pageContent'] = $this->load->view('datakelahiran/daftardatakelahiran.php', $data, TRUE);

	  	$this->load->view('template/layout', $data);
  }

	public function edit($id = null)
	{
		if ($this->input->post('update')) {
      $this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('jeniskelamin','Jenis Kelamin','required|in_list[L,P]');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
			$this->form_validation->set_rules('','','required');
      $this->form_validation->set_rules('','','required');
      $this->form_validation->set_rules('','','required');

			$created = date('YmdHis');
			$this->form_validation->set_message('required', '%s tidak boleh kosong!');
			// $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');

					if ($this->form_validation->run() === TRUE) {

						$data = array(
              'nip' => $this->input->post('nip'),
  						'nama_lengkap' => $this->input->post('namalengkap'),
  						'jenis_kelamin' => $this->input->post('jeniskelamin'),
  						'alamat' => $this->input->post('alamat'),
  						'nama_ayah' => $this->input->post('namaayah'),
  						'nama_ibu' => $this->input->post('namaibu'),
  						'status' => $this->input->post('status'),
  						'date_create' => $created
						);

						$id = $this->input->post('id');

						$query = $this->model_users->update($id, $data);

						if ($query) {
							$message = array('status' => true, 'message' => 'Berhasil memperbarui data');
						} else {
							$message = array('status' => false, 'message' => 'Gagal memperbarui data');
				}

				$this->session->set_flashdata('message', $message);
				redirect('datakelahiran/edit/'. $id, 'refresh');

					}
		}
		// $data['kelurahan'] = $this->model_master->getKelurahan()->result();
		// $data['kecamatan'] = $this->model_master->getKecamatan()->result();
		// $data['kabupaten'] = $this->model_master->getKabupaten()->result();
		// $data['provinsi'] = $this->model_master->getProvinsi()->result();
		//
		$guru = $this->model_users->get_where(array('id' => $id))->row();


		if (!$kelahiran) show_404();

		$data['pageTitle'] = 'Edit Data Kelahiran';
    $data['guru'] = $guru;
		$data['pageContent'] = $this->load->view('datakelahiran/datakelahiranedit', $data, TRUE);
		$this->load->view('template/layout', $data);
}

public function delete($id)
{
	$guruId = $this->model_users->get_where(array('id' => $id))->row();

	if (!$guruId) show_404();

	$query = $this->model_users->delete($id);

	if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus Data');
		else $message = array('status' => true, 'message' => 'Gagal menghapus Data');

		$this->session->set_flashdata('message', $message);

		redirect('guru', 'refresh');

}
}
