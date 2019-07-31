<?php

class Model_barang extends CI_Model
{
  public $table = 'produks';

  public function get(){
      $this->db->select('produks.*,users.username,notelp,alamat,nama_lengkap,pasfoto,email,level');
      $this->db->from('produks');
      $this->db->join('users', 'users.id = produks.users_id');
      $query = $this->db->get();
      return $query;
  }
  public function getBarangPenjual(){
    $this->db->select('*');
    $this->db->from('produks');
    $this->db->join('users', 'users.id = produks.users_id');
    $this->db->where('users_id',$this->session->userdata('id'));
    return $this->db->get();
  }
  public function search($keyword){
    $this->db->select('*');
    $this->db->from('produks');
    $this->db->join('users', 'users.id = produks.users_id');
    $this->db->like('nama',$keyword);
    $this->db->or_like('harga',$keyword);
    $this->db->or_like('username',$keyword);
    return $this->db->get()->result();
  }
  public function get_where($where)
  {
      // Jalankan query
      $query = $this->db->join('users', 'users.id = produks.users_id')
        ->where($where)
        ->get($this->table);

      // Return hasil query
      return $query;
  }
  public function insert($data){
		$query = $this->db->insert($this->table, $data);
		return $query;
	}

	public function update($id_produk, $data)
  {
      // Jalankan query
      $query = $this->db
        ->where('id_produk', $id_produk)
        ->update($this->table, $data);

      // Return hasil query
      return $query;
  }

  public function delete($id_produk)
  {
      // Jalankan query
      $query = $this->db
        ->where('id_produk', $id_produk)
        ->delete($this->table);

      // Return hasil query
      return $query;
  }


}
