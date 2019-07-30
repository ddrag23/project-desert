<section class="content container-fluid">
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
    </div>
    <div class="card-body">
      <form class="" action="" method="post" enctype="multipart/form-data">
        <!-- pemberitahuan -->
				<?php if(validation_errors()): ?>
					<div class="alert alert-danger" role="alert"><?php echo validation_errors('<p>', '</p>'); ?></div>
					<?php endif; ?>
					<?php if($message = $this->session->flashdata('message')): ?>
						<div class="alert alert-success" role="alert"><?php echo $message['message']; ?></div>
							<?php endif; ?>
        <!-- pemeberitahuan end -->
        <!-- form isi  -->
        <?php echo form_hidden('id_produk', $barang->id_produk); ?>
            <div class="for-group">
              <label for="nama">Nama Barang</label>
              <input id="nama" class="form-control" type="text" name="nama" value="<?php echo $barang->nama; ?>">
            </div>
            <div class="for-group">
              <label for="kategori">Kategori</label>
              <input id="kategori" class="form-control" type="text" name="kategori" value="<?php echo $barang->kategori; ?>">
            </div>
            <div class="for-group">
              <label for="harga">Harga</label>
              <input id="harga" class="form-control" type="text" name="harga" value="<?php echo $barang->harga; ?>">
            </div>
            <div class="for-group">
              <label for="deskripsi">Deskripsi</label>
              <input id="deskripsi" class="form-control" type="text" name="deskripsi" value="<?php echo $barang->deskripsi; ?>">
            </div>
            <div class="form-group">
              <label for="gambar">Upload Gambar</label>
          		<input id="gambar" class="form-control" name="gambar" type="file" >
          	</div>

            <input type="submit" name="update" value="Simpan" class="btn btn-primary mt-3">
        <!-- end form isi  -->
      </form>
    </div>
    </div>
</section>
