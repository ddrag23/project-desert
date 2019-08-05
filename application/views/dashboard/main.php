<?php if (empty($this->session->userdata('username'))): ?>
<section class="container">

<div class="row text-center">
  <?php foreach ($barang as $brg) : ?>
<div class="card ml-3 mb-3" style="width: 16rem;">
  <img class="card-img-top" src="<?php echo base_url().'/uploads/'.$brg->gambar; ?>" alt="Card image cap" style="overflow:hidden; height:10em;">
  <div class="card-body">
    <h5 class="card-title mb-1"><?= $brg->nama; ?></h5>
    <small><?= $brg->deskripsi ?></small><br>
    <a href="<?= base_url('dashboard/page/'.$brg->id_produk); ?>" class="btn btn-primary">lihat rincian</a>
  </div>
</div>
<?php endforeach; ?>

</div>

</section>
<?php endif; ?>
