<section class="container-fluid">
        <?php echo form_hidden('id_produk', $barang->id_produk);?>
        <div class="row">
          <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Detail Barang</h6>
              </div>
              <div class="card-body">
                <div class="gambar-produk">
                  <img src="<?php echo base_url().'/uploads/'.$barang->gambar; ?>" class="img-fluid" alt="Responsive image">
                </div>
                <div class="desk">
                  <h4><?= $barang->nama; ?></h4>
                  <p><?= $barang->harga; ?></p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6">
            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
              <!-- Card Header - Dropdown -->
              <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Barang</h6>
              </div>
              <!-- Card Body -->
              <div class="card-body">
                <?= $barang->deskripsi; ?>
              </div>
            </div>

            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Profile Penjual</h6>
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-md-4">
                    <img class="img-thumbnail" src="<?php echo base_url() ?>uploads/<?php echo empty($barang->pasfoto) ? 'defaultAvatar.png' : 'dir_' . $barang->username . '/' . $barang->pasfoto ; ?>" alt=""  >
                  </div>
                  <div class="col-md-8">
                    <h3> <?=  $barang->username; ?></h3>
                    <p> <?= $barang->alamat; ?></p>
                    <a href="https://api.whatsapp.com/send?phone=<?= $barang->notelp; ?>"> <button type="button" class="btn btn-success"><i class="fab fa-whatsapp"></i>&nbsp; Pesan Barang </button></a>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</section>
