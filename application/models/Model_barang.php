<?php

class Model_barang extends CI_Model
{
  public $table = 'produks';
  public function get(){

    	$query = $this->db->get($this->table);
    	return $query;
  }
  public function get_where($where)
  {
      // Jalankan query
      $query = $this->db
        ->where($where)
        ->get($this->table);

      // Return hasil query
      return $query;
  }
  public function insert($data){
		$query = $this->db->insert($this->table, $data);
		return $query;
	}

	public function update($id, $data)
  {
      // Jalankan query
      $query = $this->db
        ->where('id', $id)
        ->update($this->table, $data);

      // Return hasil query
      return $query;
  }

  public function delete($id)
  {
      // Jalankan query
      $query = $this->db
        ->where('id', $id)
        ->delete($this->table);

      // Return hasil query
      return $query;
  }


}
