<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller {

  public function __construct()
  {
    parent::__construct();

    // Check apakah sudah login
    $this->cekLogin();

    $this->isAdmin();

    // Load model users
    $this->load->model('model_users');
  }

  public function index()
  {
    // Data untuk page index
    $data['pageTitle'] = 'Users';
    $data['users'] = $this->model_users->getAdmin()->result();
    $data['pageContent'] = $this->load->view('users/userlist', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function add()
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('submit')) {

      // Mengatur validasi data username,
      // # required = tidak boleh kosong
      // # min_length[5] = username harus terdiri dari minimal 5 karakter
      // # is_unique[users.username] = username harus bernilai unique,
      //   tidak boleh sama dengan record yg sudah ada pada tabel users
      $this->form_validation->set_rules('username', 'Username', 'required|min_length[5]|is_unique[users.username]');
      $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('notelp', 'No Telepon', 'required');

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

      // Mengatur validasi data level,
      // # required = tidak boleh kosong
      // # in_list[administrator, alumni] = hanya boleh bernilai
      //   salah satu di antara administrator atau alumni
      // $this->form_validation->set_rules('level', 'Level', 'required|in_list[administrator,penjual]');

      // Mengatur validasi data active,
      // # required = tidak boleh kosong
      // # in_list[0, 1] = hanya boleh bernilai
      // salah satu di antara 0 atau 1
      $this->form_validation->set_rules('active', 'Active', 'required|in_list[0,1]');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
          'username' => $this->input->post('username'),
          'nama_lengkap' => $this->input->post('namalengkap'),
          'alamat' => $this->input->post('alamat'),
          'jenis_kelamin' => $this->input->post('jeniskelamin'),
          'email' => $this->input->post('email'),
          'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'level' => 'administrator',
          'active' => $this->input->post('active')
        );

        // Jalankan function insert pada model_users
        $query = $this->model_users->insert($data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil menambahkan user');
        else $message = array('status' => true, 'message' => 'Gagal menambahkan user');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('users', 'refresh');
      }
    }

    // Data untuk page users/add
    $data['users'] = $this->model_users->getAdmin()->result();
    $data['pageTitle'] = 'Tambah Data User';
    $data['pageContent'] = $this->load->view('users/userlist', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function edit($id = null)
  {
    // Jika form di submit jalankan blok kode ini
    if ($this->input->post('update')) {

      // Mengatur validasi data password,
      // # required = tidak boleh kosong
      // # min_length[5] = password harus terdiri dari minimal 5 karakter
      // $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
      $this->form_validation->set_rules('namalengkap', 'Nama Lengkap', 'required');
      $this->form_validation->set_rules('alamat', 'Alamat', 'required');
      $this->form_validation->set_rules('jeniskelamin', 'Jenis Kelamin', 'required');
      $this->form_validation->set_rules('email', 'Email', 'required');
      $this->form_validation->set_rules('notelp', 'No Telepon', 'required');

      // Mengatur validasi data level,
      // # required = tidak boleh kosong
      // # in_list[administrator, alumni] = hanya boleh bernilai
      //   salah satu di antara administrator atau alumni
      $this->form_validation->set_rules('level', 'Level', 'required|in_list[administrator,alumni]');

      // Mengatur validasi data active,
      // # required = tidak boleh kosong
      // # in_list[0, 1] = hanya boleh bernilai
      // salah satu di antara 0 atau 1
      $this->form_validation->set_rules('active', 'Active', 'required|in_list[0,1]');

      // Mengatur pesan error validasi data
      $this->form_validation->set_message('required', '%s tidak boleh kosong!');
      $this->form_validation->set_message('min_length', '%s minimal %d karakter!');

      // Jalankan validasi jika semuanya benar maka lanjutkan
      if ($this->form_validation->run() === TRUE) {

        $data = array(
          'nama_lengkap' => $this->input->post('namalengkap'),
          'alamat' => $this->input->post('alamat'),
          'jenis_kelamin' => $this->input->post('jeniskelamin'),
          'notelp' => $this->input->post('notelp'),
          'email' => $this->input->post('email'),
          'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
          'level' => 'administrator',
          'active' => $this->input->post('active')
        );

        // Jalankan function insert pada model_users
        $query = $this->model_users->update($id, $data);

        // cek jika query berhasil
        if ($query) $message = array('status' => true, 'message' => 'Berhasil memperbarui user');
        else $message = array('status' => true, 'message' => 'Gagal memperbarui user');

        // simpan message sebagai session
        $this->session->set_flashdata('message', $message);

        // refresh page
        redirect('users/edit/'.$id, 'refresh');
      }
    }

    // Ambil data user dari database
    $user = $this->model_users->get_where(array('id' => $id))->row();

    // Jika data user tidak ada maka show 404
    if (!$user) show_404();

    // Data untuk page users/add
    $data['pageTitle'] = 'Edit Data User';
    $data['user'] = $user;
    $data['pageContent'] = $this->load->view('users/useredit', $data, TRUE);

    // Jalankan view template/layout
    $this->load->view('template/layout', $data);
  }

  public function delete($id)
  {
    // Ambil data user dari database
    $user = $this->model_users->get_where(array('id' => $id))->row();

    // Jika data user tidak ada maka show 404
    if (!$user) show_404();

    // Jalankan function delete pada model_users
    $query = $this->model_users->delete($id);

    // cek jika query berhasil
    if ($query) $message = array('status' => true, 'message' => 'Berhasil menghapus user');
    else $message = array('status' => true, 'message' => 'Gagal menghapus user');

    // simpan message sebagai session
    $this->session->set_flashdata('message', $message);

    // refresh page
    redirect('users', 'refresh');
  }
}
