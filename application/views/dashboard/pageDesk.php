<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"> 
<section class="content container-fluid">
  <div class="card shadow mb-4">
      <div class="card-body">
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
            <h3>username</h3>
            <p>alamate</p>
            <p>nmer wae</p>
          </div>
        </div>
      </div>
  </div>
</section>
