<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	    $this->load->model('Model_users');
	}

	public function index()
	{
		if ($this->input->post('submit')) {
			# code...
			//echo '<script type="text/javascript">alert("REGISTRASI")</script>';
			$this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
			$this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('notelp', 'No Telepon', '');
			$this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
			// $this->form_validation->set_rules('email', 'Email Address', 'required');
			//$this->form_validation->set_rules('nis', 'NIS', 'required');

			$this->form_validation->set_message('required', '%s tidak boleh kosong!');
      		$this->form_validation->set_message('min_length', '%s minimal %d karakter!');

      		//$level = $this->input->post('tipe_login');
					// print($level);
      		//$active = "0";
      		if ($this->form_validation->run() === TRUE) {
      			$data = array(
		          	'username' => $this->input->post('username'),
		          	'nama_lengkap' => $this->input->post('namalengkap'),
		          	'alamat' => $this->input->post('alamat'),
		          	'notelp' => $this->input->post('notelp'),
		          	'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
		          	// 'email' => $this->input->post('email'),
		          	'level' => 'penjual',
		          	'active' => '1',
					// 'nis '=>$this->input->post('nis'),
					// 'verifikasi' => uniqid()
		        );
		        $query = $this->Model_users->insert($data);

		         if ($query) {
							 $message = array('status' => true, 'message' => 'Berhasil menambahkan penjual');
  //           //$mail = "TRUE";
  //           $from_email = "cyber@unusa.ac.id";
  //           $to_email = $this->input->post('email');
	//
  //           //Load email library
  //           $this->load->library('email');
	//
  //           $this->email->from($from_email, 'E-Pendaftaran Admin');
  //           $this->email->to($to_email);
  //           $this->email->subject('Email Verifikasi');
  //           $this->email->message('
  // Klik link dibawah ini untuk verifikasi dan mengaktifkan akun di E-Pendaftaran.
	//
  //  '.base_url().'register/verifikasi/'.$data['verifikasi'].'
	//
  // Terima kasih telah menggunakan pelayanan kami.
	//
	//
  //  TTD
	//
  // Admin E-Pendaftaran.
  //           ');
	//
  //           //Send mail tutup sementara
  //           if($this->email->send())
  //            $message = array('status' => true, 'message' => 'Berhasil mendaftarkan user, silahkan cek email untuk verifikasi');
  //           else
  //            $message = array('status' => true, 'message' => 'Gagal mengirimkan email pendaftaran');
  //           //$this->load->view('email_form');
	//
	//
          } //if query
          else $message = array('status' => false, 'message' => 'Gagal mendaftarkan user');
        		$this->session->set_flashdata('message', $message);

        		redirect('register', 'refresh');
      		}
		}

		$data['pageTitle'] = 'Register System';
		$this->load->view('auth/register.php', $data);
	}

	// public function verifikasi($token)
  // {
  //   $query = $this->Model_users->get_where('verifikasi',$token);
	//
  //   if($query) {
  //     $data = array(
  //       'active' => '1',
  //       'verifikasi' => 'verified'
  //     );
  //     $this->Model_users->activate($token,$data);
	//
  //     redirect('auth/login', 'refresh');
  //   } else {
  //     $data['pageTitle'] = 'Pendaftaran Online';
  //     // Data ini akan ditampilkan di content.php
  //     $data["pageContent"] = $this->load->view("auth/register", $data, TRUE);
  //     $this->load->view('template/layout', $data);
  //   }
  // }

}
