<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
  public function cekAkun()
  {
    // Memanggil model users
    $this->load->model('model_users');

    // Mengambil data dari form login dengan method POST
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    // Jalankan function cekAkun pada model_users
    $query = $this->model_users->cekAkun($username, $password);

    // Jika query gagal maka return false
    if (!$query) {

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('cekAkun', 'Username atau password yang Anda masukkan salah!');
      return FALSE;

    // Jika berhasil maka set user session dan return true
    } else {

      // data user dalam bentuk array
      $userData = array(
        'id' => $query->id,
        'username' => $query->username,
        'level' => $query->level,
        'pasfoto' => $query->pasfoto,
        'nama_lengkap' => $query->nama_lengkap,
        'email' => $query->email,
        'alamat' => $query->alamat,
        'notelp' => $query->notelp,
        'logged_in' => TRUE
      );

      // set session untuk user
      $this->session->set_userdata($userData);

      return TRUE;
    }
  }

  public function login()
  {
    // Jika user telah login, redirect ke base_url
    if ($this->session->userdata('logged_in')) redirect(base_url());

    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {

      // Mengatur validasi data username,
      // required = tidak boleh kosong
      $this->form_validation->set_rules('username', 'Username', 'required');

      // Mengatur validasi data password,
      // required = tidak boleh kosong
      // callback_cekAkun = menjalankan function cekAkun()
      $this->form_validation->set_rules('password', 'Password', 'required|callback_cekAkun');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');

      // Jalankan validasi jika semuanya benar maka redirect ke controller dashboard
      if ($this->form_validation->run() === TRUE) {
        redirect('dashboardadmin');
      }
    }

    // Jalankan view auth/login.php
    $this->load->view('auth/login');
  }

  public function logout()
  {
    // Hapus semua data pada session
    $this->session->sess_destroy();

    // redirect ke halaman login
    redirect('auth/login');
  }
  public function forgot()
 {
   if ($this->input->post('submit')) {

     $this->form_validation->set_rules('email', 'Email', 'required');
       $this->form_validation->set_message('required', '%s tidak boleh kosong!');

       if ($this->form_validation->run() === TRUE) {

         $cekemail = $this->model_users->get_whereUsers(array('email' => $this->input->post('email') ))->row();

         if (!$cekemail) {
           $message = array('error' => true, 'error' => 'Email anda belum terdaftar');
         $this->session->set_flashdata('error', $message);
         } else {
           $resetpassword = uniqid();

         //print_r($cekemail);
               $id_user = $cekemail->id_user;
               $user = $cekemail->username;

             $data = array(
                 'password' => password_hash($resetpassword, PASSWORD_DEFAULT),
                 'active' => '1',
                 'verifikasi' => 'verified'
             );

             $query = $this->model_users->updateUsers($id_user,$data);

             if (!$query) {
               $message = array('error' => true, 'error' => 'Gagal verifikasi email');
           $this->session->set_flashdata('error', $message);
             } else {
               $from_email = "cyber@unusa.ac.id";
                 $to_email = $this->input->post('email');

                 //Load email library
                 $this->load->library('email');

                 $this->email->from($from_email, 'E-Pendaftaran Admin');
                 $this->email->to($to_email);
                 $this->email->subject('E-Pendaftaran: Reset Password.');
                 $this->email->message('
             Anda telah melakukan reset password untuk aplikasi E-Pendaftaran.
             Username : '.$user.'
             Email   : '.$this->input->post('email').'
             Password: '.$resetpassword.'

             Terima kasih telah menggunakan pelayanan kami.


                TTD

             Admin E-Pendaftaran.
           ');

           if ($this->email->send()) {
             $message = array('status' => true, 'message' => 'Berhasil reset password, silahkan cek email');
             $this->session->set_flashdata('message', $message);
           } else {
             $message = array('error' => true, 'error' => 'Gagal reset password');
             $this->session->set_flashdata('error', $message);
           }
             }

         }

         redirect('auth/forgot', 'refresh');

       }
   }

   $data['pageTitle'] = 'Login System';
   $this->load->view('auth/forgotpass', $data);
 }
}
