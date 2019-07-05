
<div class="row text-center">
  <?php foreach ($barang as $brg) : ?>
<div class="card ml-3" style="width: 16rem;">
  <img class="card-img-top" src="<?php echo base_url().'/uploads/'.$brg->gambar; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title mb-2"><?= $brg->nama; ?></h5>
    <small ><?= $brg->deskripsi ?></small><br>
    <span class="badge badge-pill badge-success mb-3"><?= $brg->harga; ?></span><br>
    <a href="#" class="btn btn-primary">lihat rincian</a>
  </div>
</div>
<?php endforeach; ?>

</div>
