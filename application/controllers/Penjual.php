<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjual extends MY_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->cekLogin();
	    $this->load->model('model_users');
	    $this->load->model('model_barang');
			//$this->load->model('model_master');
			// $this->load->model('model_upload');
			// $this->load->library('csvreader');

  }

  public function index()
  {
      $data['pageTitle'] = 'Data Penjual';
      $data['penjual'] = $this->model_users->getPenjual()->result();
      $data['pageContent'] = $this->load->view('admin/penjual/listpenjual.php', $data, TRUE);
      $this->load->view('template/layout', $data);
  }
	public function dashboard(){
		$data['pageTitle'] = 'Data Penjual';
		$data['totalProduk'] = $this->model_barang->getBarangPenjual()->num_rows();
		$data['pageContent'] = $this->load->view('admin/penjual/mainpenjual.php', $data, TRUE);
		$this->load->view('template/layout', $data);

	}

	public function add(){

		if ($this->input->post('submit')) {
      $this->form_validation->set_rules('username','Username','required|min_length[5]|is_unique[users.username]');
			$this->form_validation->set_rules('namalengkap','Nama Lengkap','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('jeniskelamin','Jenis Kelamin','required|in_list[L,P]');
			$this->form_validation->set_rules('notelp','Nomor Telepon','required');
			$this->form_validation->set_rules('email','Email','required');

				$created = date('YmdHis');

				$this->form_validation->set_message('required', '%s tidak boleh kosong!');
	      		// $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
	      		// $this->form_validation->set_message('matches', '{field} tidak sama dengan {param}.');

				if ($this->form_validation->run() == TRUE) {
					$data = array(
						'username' => $this->input->post('username'),
						'level' => 'penjual',
						'active' => '1',
						'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
						'nama_lengkap' => $this->input->post('namalengkap'),
						'jenis_kelamin' => $this->input->post('jeniskelamin'),
						'alamat' => $this->input->post('alamat'),
						'notelp' => $this->input->post('notelp'),
						'email' => $this->input->post('email')
					);

					$query = $this->model_users->insert($data);

					if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan data');
					else $message = array('status' => false, 'message' => 'Gagal menambahkan data');

					$this->session->set_flashdata('message', $message);

					redirect('penjual', 'refresh');
				}

			}
			// $data['kelurahan'] = $this->model_master->getKelurahan()->result();
			// $data['kecamatan'] = $this->model_master->getKecamatan()->result();
			// $data['kabupaten'] = $this->model_master->getKabupaten()->result();
			// $data['provinsi'] = $this->model_master->getProvinsi()->result();
			$data['pageTitle'] = 'Tambah Data Penjual';
	    $data['pageContent'] = $this->load->view('penjual/listpenjual', $data, TRUE);

	  	$this->load->view('template/layout', $data);
  }

	public function edit($id = null)
	{
		if ($this->input->post('update')) {
			$this->form_validation->set_rules('username','Username','required');
			// $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			$this->form_validation->set_rules('namalengkap','Nama Lengkap','required');
			$this->form_validation->set_rules('alamat','Alamat','required');
			$this->form_validation->set_rules('jeniskelamin','Jenis Kelamin','required|in_list[L,P]');
			$this->form_validation->set_rules('notelp','Nomor Telepon','required');
			$this->form_validation->set_rules('email','Email','required');


			$created = date('YmdHis');
			$this->form_validation->set_message('required', '%s tidak boleh kosong!');
			// $this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');

					if ($this->form_validation->run() === TRUE) {

						$data = array(
							'username' => $this->input->post('username'),
							'level' => 'penjual',
							'active' => '1',
							'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
							'nama_lengkap' => $this->input->post('namalengkap'),
							'jenis_kelamin' => $this->input->post('jeniskelamin'),
							'alamat' => $this->input->post('alamat'),
							'notelp' => $this->input->post('notelp'),
							'email' => $this->input->post('email')

						);

						$id = $this->input->post('id');

						$query = $this->model_users->update($id, $data);

						if ($query) {
							$message = array('status' => true, 'message' => 'Berhasil memperbarui data');
						} else {
							$message = array('status' => false, 'message' => 'Gagal memperbarui data');
				}

				$this->session->set_flashdata('message', $message);
				redirect('penjual/edit/'. $id, 'refresh');


					}
		}
		// $data['kelurahan'] = $this->model_master->getKelurahan()->result();
		// $data['kecamatan'] = $this->model_master->getKecamatan()->result();
		// $data['kabupaten'] = $this->model_master->getKabupaten()->result();
		// $data['provinsi'] = $this->model_master->getProvinsi()->result();
		//
		$penjual = $this->model_users->get_where(array('id' => $id))->row();


		if (!$penjual) show_404();

		$data['pageTitle'] = 'Edit Data Penjual';
    $data['penjual'] = $penjual;
		$data['pageContent'] = $this->load->view('admin/penjual/editpenjual', $data, TRUE);
		$this->load->view('template/layout', $data);
}

public function delete($id)
{
	$penjualId = $this->model_users->get_where(array('id' => $id))->row();

	if (!$penjualId) show_404();

	$query = $this->model_users->delete($id);

	if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus Data');
		else $message = array('status' => true, 'message' => 'Gagal menghapus Data');

		$this->session->set_flashdata('message', $message);

		redirect('penjual', 'refresh');

}
}
