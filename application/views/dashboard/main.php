<!-- <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="<?= base_url('assets/img/slider1.jpg'); ?>" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src"<?= base_url('assets/img/slider2.jpg'); ?>" alt="Second slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div> -->

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
