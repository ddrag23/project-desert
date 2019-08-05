<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends MY_Controller {

	public function __construct()
	{
	    parent::__construct();
	    $this->cekLogin();
	    $this->load->model('Model_users');
  	}

  	public function index()
	{
		if ($this->input->post('simpan')) {
			$data['pasfoto'] = '';

			if (!empty($_FILES['avatar']['name'])) {

		        $config['upload_path'] = './uploads/dir_'.$this->session->userdata('username').'/';

      			if(!is_dir($config['upload_path'])) mkdir($config['upload_path'], 0777, TRUE);
      			$config['overwrite'] = TRUE;
		        $config['allowed_types'] = 'gif|jpg|png|jpeg';
		        $config['max_size'] = 2000;
		        $config['file_name'] = $this->session->userdata('username').'_avatar';

		        // Load library upload
		        $this->load->library('upload', $config);

		        // Jika terdapat error pada proses upload maka exit
		        if (!$this->upload->do_upload('avatar')) {
		            exit($this->upload->display_errors());
		        }

		        $data['pasfoto'] = $this->upload->data()['file_name'];
		    }


		    $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
		    $this->form_validation->set_rules('alamat', 'alamat', 'required');
		    $this->form_validation->set_rules('notelp', 'Telepon', 'required');
		    $this->form_validation->set_message('required', '%s tidak boleh kosong!');

		    if ($this->form_validation->run() === TRUE) {
		    	// $data = array(
		    	// 	'nama_lengkap' => $this->input->post('namalengkap'),
		    	// 	'alamat' => $this->input->post('alamat'),
		    	// 	// 'pasfoto' => $data['avatar'],
		    	// 	'notelp' => $this->input->post('notelp')
		    	// );
					$data['nama_lengkap'] = $this->input->post('namalengkap');
        $data['alamat'] = $this->input->post('alamat');
        $data['notelp'] = $this->input->post('notelp');

		        $userId = $this->session->userdata('id');

		        $query = $this->Model_users->update($userId, $data);

		        if ($query) {
		        	$message = array('status' => true, 'message' => 'Berhasil memperbarui profile');
		        	$this->session->set_userdata($data);
		        } else {
		        	$message = array('status' => false, 'message' => 'Gagal memperbarui profile');
		        }

		        $this->session->set_flashdata('message_profile', $message);
		        redirect('profile', 'refresh');
		    }
		}

		$data['pageTitle'] = 'Profiles';
		$data['pageContent'] = $this->load->view('admin/profile', $data, TRUE);
		$this->load->view('template/layout', $data);
	}

	public function changePassword()
	{
		if ($this->input->post('simpan')) {
			$this->form_validation->set_rules('oldpassword', 'Password Lama', 'required|callback_cekpasswordlama');
			$this->form_validation->set_rules('newpassword', 'Password Baru', 'required|min_length[5]');
			$this->form_validation->set_rules('renewpassword', 'Konfirmasi Password', 'required|matches[newpassword]');

			$this->form_validation->set_message('required', '%s tidak boleh kosong!');
      		$this->form_validation->set_message('min_length', '{field} minimal {param} karakter.');
      		$this->form_validation->set_message('matches', '{field} tidak sama dengan {param}.');

      		if ($this->form_validation->run() === TRUE) {

      			$data = array(
		          'password' => password_hash($this->input->post('renewpassword'), PASSWORD_DEFAULT)
		        );

		        $userId = $this->session->userdata('id');

		        $query = $this->Model_users->update($userId, $data);

		        if ($query) {
 		        	$message = array('status' => true, 'message' => 'Berhasil memperbarui password');
 		        } else {
 			        $message = array('status' => false, 'message' => 'Gagal memperbarui password');
 				}

 				$this->session->set_flashdata('message', $message);
 				redirect('profile/changepassword', 'refresh');
      		}
		}

		$data['pageTitle'] = 'Changes Password';
		$data['pageContent'] = $this->load->view('dashboard/changepassword', $data, TRUE);
		$this->load->view('template/layout', $data);
	}

	public function cekpasswordlama()
	{
		$userId = $this->session->userdata('id');
		$password = $this->input->post('oldpassword');
		$query = $this->Model_users->cekpasswordlama($userId, $password);

		if (!$query) {
			$this->form_validation->set_message('cekpasswordlama', 'Password lama tidak sesuai!');
			return false;
		}

		return TRUE;
	}
}
