<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
<section class="content container-fluid">
  <div class="card shadow mb-4">
      <div class="card-body">
        <?php echo form_hidden('id_produk', $barang->id_produk);?>
        <div class="right-layout">
          <img src="<?php echo base_url().'/uploads/'.$barang->gambar; ?>" class="img-fluid" alt="Responsive image">
          <div class="deskripsi-content">
            <p><?php echo $barang->deskripsi ; ?></p>
          </div>
        </div>
        <div class="left-layout">
          <div class="img-avatar">
            <img src="...." alt="">
          </div>
          <div class="deks-seller">
            <h3 <?php  $barang->users_id; ?>><?php  $this->db->where('id', $barang->users_id);$k = $this->db->get('users')->row();print_r($k->username);?></h3>
            <p <?php $barang->users_id; ?>><?php  $this->db->where('id', $barang->users_id);$k = $this->db->get('users')->row();print_r($k->alamat); ?></p>
            <a href="https://api.whatsapp.com/send?phone=<?php $barang->users_id; $this->db->where('id', $barang->users_id);$k = $this->db->get('users')->row();print_r($k->notelp); ?>">whatsapp</a>
          </div>
        </div>
      </div>
  </div>
</section>
