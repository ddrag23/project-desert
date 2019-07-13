<?php $this->db->select('*');
$this->db->from('produks');
$this->db->join('users','users.id = produks.users_id','left');
$query = $this->db->get()->result(); ?>
<div class="row text-center">
  <?php foreach ($query as $brg) : ?>
<div class="card ml-3" style="width: 16rem;">
  <img class="card-img-top" src="<?php echo base_url().'/uploads/'.$brg->gambar; ?>" alt="Card image cap">
  <div class="card-body">
    <h5 class="card-title mb-2"><?= $brg->nama; ?></h5>
    <small ><?= $brg->deskripsi ?></small><br>
    <a href="<?= base_url('dashboard/page/'.$brg->id_produk); ?>" class="btn btn-primary">lihat rincian</a>
  </div>
</div>
<?php endforeach; ?>

</div>
